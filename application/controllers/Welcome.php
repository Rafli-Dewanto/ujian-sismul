<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_welcome', 'model');
		$this->load->helper('url');
		$this->load->library('session');
	}


	public function index($id = false)
	{
		if ($id === false) {
			$data['images'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer'); // result_array
		} else {
			$data['image'] = $this->model->read($id); // single object
			$this->load->view('header');
			$this->load->view('image', $data);
			$this->load->view('footer');
		}
	}

	public function create($id = false)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else {
			$id = uniqid('item', TRUE);

			$config['upload_path'] = './upload/images';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '100000';
			$config['file_ext_tolower'] = TRUE;
			$config['file_name'] = str_replace('.', '_', $id);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image1')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('welcome/index');
			} else {
				$filepath = $this->upload->data('file_name');
				$this->model->create($id, $filepath);
				redirect('');
			}
		}
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('update', $data);
			$this->load->view('footer');
		} else {
			if ($this->input->post('file')) {
				$post = $this->model->read($id);

				$config['upload_path'] = './upload/post';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = '100000';
				$config['file_ext_tolower'] = TRUE;
				$config['overwrite'] = TRUE;
				$config['file_name'] = $post->filename;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect('welcome/update/' . $id);
				} else {
					$this->model->update($id);
					redirect('');
				}
			} else {
				$this->model->update($id);
				redirect('');
			}
		}
	}

	public function delete($id = FALSE)
	{
		$post = $this->model->read($id);

		$this->model->delete($id);

		unlink('./upload/post/' . $post->filename);

		redirect('');
	}

	public function deleteAll()
	{
		$this->model->deleteAll();

		$directory = "./upload/post/";
		$files = glob($directory . "*.*");

		foreach ($files as $file) {
			if (is_file($file))
				unlink($file);
		}

		redirect('');
	}

}
