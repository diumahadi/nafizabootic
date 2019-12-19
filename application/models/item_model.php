<?php

class Item_model extends CI_Model {
    
    public function insert($data) {
        if ($this->db->insert('item', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('item', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('item')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getList() {
        $this->db->select("*");
        $this->db->from('vw_item');
        $this->db->order_by('item_name', 'asc');
        return $this->db->get()->result_array();
    }
	
	public function getFeaturedList($category) {
        $this->db->select("*");
        $this->db->from('vw_item');
		$this->db->where('group_tp', $category);
		$this->db->where('display', 'S');
        $this->db->order_by('RAND()');
		$this->db->limit(6);
        return $this->db->get()->result_array();
    }
	
	public function getRelatedList($category) {
        $this->db->select("*");
        $this->db->from('vw_item');
		$this->db->where('group_tp', $category);
		$this->db->where('display', 'S');
        $this->db->order_by('RAND()');
		$this->db->limit(4);
        return $this->db->get()->result_array();
    }
	
	public function getGroupList($category) {
        $this->db->select("*");
        $this->db->from('vw_item');
		$this->db->where('group_tp', $category);
		$this->db->where('display', 'S');
        return $this->db->get()->result_array();
    }
	
	public function getItemByGroupId($group_id) {
        $this->db->select("*");
        $this->db->from('vw_item');
		$this->db->where('group_id', $group_id);
		$this->db->where('display', 'S');
        return $this->db->get()->result_array();
    }

    public function findOne($id) {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_item');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
	public function getUserInsertedItems() {      
        $sql_query = "SELECT COUNT(*) totalCount,us.full_name
		FROM vw_item itm
		JOIN users us ON us.username=itm.created_by
		GROUP BY us.username
		ORDER BY us.full_name";        
        $query = $this->db->query($sql_query);
        return $query->result_array(); 
    }
	
	public function getItemEntryProgress() {      
        $sql_query = "SELECT COUNT(*) totalCount, MONTHNAME(itm.created_at) monthLevel, YEAR(itm.created_at) yearLevel
		FROM vw_item itm
		WHERE YEAR(itm.created_at)= YEAR(NOW())
		GROUP BY MONTH(itm.created_at), YEAR(itm.created_at)";        
        $query = $this->db->query($sql_query);
        return $query->result_array(); 
    }
	
	public function getItemEntryEachGroup() {      
        $sql_query = "SELECT COUNT(*) totalCount,itm.group_name
		FROM vw_item itm
		GROUP BY itm.group_id
		ORDER BY itm.group_name";        
        $query = $this->db->query($sql_query);
        return $query->result_array(); 
    }


    public function getNewItemCode() {
        $yearAndMonth = date('y').date('m');
        $sql_query = "SELECT (COUNT(*)+1) newItemCode FROM item WHERE SUBSTR(item_code,5,4)= '".$yearAndMonth."'";
        $query = $this->db->query($sql_query);
        if(!empty($query)) {
            return $yearAndMonth.$query->row()->newItemCode;
        } else {
            return $yearAndMonth."1";
        }
    }
     
    
}
