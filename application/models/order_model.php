<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 09-Jun-19
 * Time: 7:51 AM
 */

class Order_model extends CI_Model {

    public function insert($data) {
        if ($this->db->insert('orders', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('orders', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('orders')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function findAllByOrderStatus($status) {
        $this->db->select("*");
        $this->db->from('orders');
        $this->db->where('order_status',$status);
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }

    public function findOrderDetailsByOrderStatus($status) {
        $sql_query = "SELECT o.id,o.order_no,o.customer_id,c.full_name,
        c.email,c.mobile,o.order_date,o.deliver_date,o.payment_tp,
        o.paid_amount,o.total_amount,o.discount,o.shipping_rate,
        o.transaction_id,o.reference_no,o.order_status
        FROM orders o
        JOIN customers c ON c.id=o.customer_id
        where o.order_status='".$status."' 
        ORDER BY o.id DESC";
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }

    public function findAll() {
        $this->db->select("*");
        $this->db->from('orders');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }



    public function findOne($id) {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }


    public function getTotalPendingOrders() {
        $this->db->select("*");
        $this->db->from('orders');
        $this->db->where('order_status','P');
        $this->db->order_by('id', 'asc');
        return count($this->db->get()->result_array());
    }

    public function getNewOrderNo() {
        $yearAndMonth = date('y').date('m');
        $sql_query = "SELECT (COUNT(*)+1) newOrderNo FROM orders WHERE SUBSTR(order_no,1,4)= '".$yearAndMonth."'";
        $query = $this->db->query($sql_query);
        if(!empty($query)) {
            return $yearAndMonth.$query->row()->newOrderNo;
        } else{
            return $yearAndMonth."1";
        }
    }


}