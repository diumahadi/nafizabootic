<?php

class event_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('event', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('event', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('event')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_event');
		$this->db->where('display', 'S');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }
	
	public function getLatestList() {
        $this->db->select("*");
        $this->db->from('vw_event');
		$this->db->where('display', 'S');
        $this->db->order_by('created_at', 'DESC');
		$this->db->limit(5);
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
     
    
}
