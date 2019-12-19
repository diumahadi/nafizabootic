<?php

class User_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('users', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('username', $id);
        if ($this->db->update('users', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('username', $id);
        if ($this->db->delete('users')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getUserList() {
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('authority =', 'ROLE_USER');
        $this->db->order_by('full_name', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getSingleUserInfo($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $id);
        return $this->db->get()->row();
    }
    
    public function getUserByUsername($username) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $this->db->get()->row();
    }
 
    
	
	function getMatchList($term){
		$this->db->select('*');
		$this->db->like('name', $term);
		$this->db->order_by('name', 'asc');
		return $this->db->get('medicine');
	}
    
    
}
