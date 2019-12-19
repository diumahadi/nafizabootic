<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 13-Jun-19
 * Time: 10:26 PM
 */
class expense_model extends CI_Model {

    public function insert($data) {
        $insert = $this->db->insert('expenses', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('expenses', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('expenses')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getList() {
        $this->db->select("*");
        $this->db->from('expenses');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result_array();
    }

    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('expenses');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function getExpenseListByDate() {
        $sql_query = "SELECT COUNT(*) totalCount, MONTHNAME(itm.created_at) monthLevel, YEAR(itm.created_at) yearLevel
		FROM vw_item itm
		WHERE YEAR(itm.created_at)= YEAR(NOW())
		GROUP BY MONTH(itm.created_at), YEAR(itm.created_at)";
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }

    public function getExpenseList() {
        $sql_query = "SELECT ex.id,ex.head_id,hd.head_name,ex.expense_amount,ex.expense_date,ex.notes,ex.enabled
        FROM expenses ex
        JOIN expense_heads hd ON hd.id = ex.head_id
        ORDER BY ex.expense_date,hd.id";
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }


}