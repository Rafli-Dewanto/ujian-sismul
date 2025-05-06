<?php
defined('BASEPATH') OR exit('No directed script access allowed');

class M_welcome extends CI_Model{
    
  
  public function create($id, $filepath){
        $data = [
            'id' => $id,
            'name' =>$this->input->post('name', TRUE),
            'description' =>$this->input->post('description', TRUE),
            'filepath'=> $filepath
        ];
        $this->db->insert('post', $data);
    }

    public function read($id=false){
        if ($id===false) {
            return $this->db->get('post')->result_array();
        }
        else {
            $query = $this->db->get_where('post',array('id'=>$id));
            return $query->row();
        } 
        return $this->db->get('post')->result_array();
    }

    // pertemuan 4
    public function update($id) {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('post');
    }

    public function deleteAll(){
        $this->db->empty_table('post');
    }
}

?>