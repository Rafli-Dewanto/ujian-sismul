<?php
defined('BASEPATH') OR exit('No directed script access allowed');

class M_welcome extends CI_Model{
    
  
  public function create($id, $filepath) {
        $data = [
            'id' => $id,
            'name' =>$this->input->post('name', TRUE),
            'description' =>$this->input->post('description', TRUE),
            'filepath'=> $filepath
        ];
        $this->db->insert('images', $data);
    }

    public function read($id=false){
        if ($id === false) {
            return $this->db->get('images')->result_array();
        } else {
            $query = $this->db->get_where('images', array('id'=>$id));
            return $query->row();
        } 
        return $this->db->get('images')->result_array();
    }

    public function update($id) {
        $data = [
            'name' => $this->input->post('name', TRUE),
            'description' => $this->input->post('description', TRUE),
        ];
        $this->db->where('id', $id);
        $this->db->update('images', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('images');
    }

    public function deleteAll(){
        $this->db->empty_table('images');
    }
}

?>