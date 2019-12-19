<?php

class Slider_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('slider', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('slider', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('slider')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_slider');
        $this->db->order_by('slider_title', 'asc');
        return $this->db->get()->result_array();
    }
	
	public function getRandomSlider() {
        $this->db->select("*");
        $this->db->from('slider');
        $this->db->where('display', 'S');
        $this->db->order_by('RAND()');
		$this->db->limit(3);
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_slider');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
     
    
}
