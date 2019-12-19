<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 09-Jun-19
 * Time: 7:52 AM
 */

class Order_item_model extends CI_Model {

    public function insert($data) {
        if ($this->db->insert('order_items', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('order_items', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('order_items')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findAllByOrderId($id) {
        $this->db->select("*");
        $this->db->from('order_items');
        $this->db->where('order_id', $id);
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }

    public function findAll() {
        $this->db->select("*");
        $this->db->from('order_items');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }

    public function findOne($id) {
        $this->db->select('*');
        $this->db->from('order_items');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }


}