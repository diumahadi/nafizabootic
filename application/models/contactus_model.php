<?php

class Contactus_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('contact_us', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('contact_us', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('contact_us')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_contact_us');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_contact_us');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
     
    
}
