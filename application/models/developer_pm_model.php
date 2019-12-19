<?php

class Developer_pm_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('developer_pm', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('developer_pm', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('developer_pm')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getPaymentList() {
        $this->db->select("*");
        $this->db->from('developer_pm');
		$this->db->where('enabled', 'A');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('developer_pm');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    
}
