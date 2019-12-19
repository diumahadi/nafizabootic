<?php

class Branch_manager_model extends CI_Model {

    public function insert($data) {
        $insert = $this->db->insert('branch_manager', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('branch_manager', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('branch_manager')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_branch_manager');
        $this->db->order_by('manager_name', 'asc');
        return $this->db->get()->result_array();
    }

    public function getActiveList() {
        $this->db->select("*");
        $this->db->from('vw_branch_manager');
        $this->db->where('display', 'S');
        $this->db->order_by('manager_name', 'asc');
        return $this->db->get()->result_array();
    }

    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_branch_manager');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }



}
