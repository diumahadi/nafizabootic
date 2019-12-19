<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 13-Jun-19
 * Time: 10:23 PM
 */

class expense_head_model extends CI_Model {

    public function insert($data) {
        $insert = $this->db->insert('expense_heads', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('expense_heads', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('expense_heads')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getList() {
        $this->db->select("*");
        $this->db->from('expense_heads');
        $this->db->order_by('head_name', 'asc');
        return $this->db->get()->result_array();
    }

    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('expense_heads');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function getInfoByHeadName($head_name) {
        $this->db->select('*');
        $this->db->from('expense_heads');
        $this->db->where('head_name', $head_name);
        return $this->db->get()->row();
    }


}