<?php

class brand_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('brand', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('brand', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('brand')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_brand');
        $this->db->order_by('brand_name', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_brand');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
	public function getInfoByBrandName($brand_name) {
        $this->db->select('*');
        $this->db->from('vw_brand');
        $this->db->where('brand_name', $brand_name);
        return $this->db->get()->row();
    }
     
    
}
