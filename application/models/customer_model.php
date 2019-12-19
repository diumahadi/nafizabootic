<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 09-Jun-19
 * Time: 8:33 PM
 */

class Customer_model extends CI_Model {

    public function insert($data) {
        if ($this->db->insert('customers', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('customers', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('customers')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findAll() {
        $this->db->select("*");
        $this->db->from('customers');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }

    public function findOne($id) {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }



}