<?php

class Item_group_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('item_group', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('item_group', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('item_group')) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getItemGroupList() {
        $this->db->select("*");
        $this->db->from('vw_item_group');
        $this->db->order_by('group_name', 'asc');
        return $this->db->get()->result_array();
    }
	
	public function getGroupsByGroupType($groupTp) {
        $this->db->select("*");
        $this->db->from('vw_item_group');
		$this->db->where('group_tp', $groupTp);
        $this->db->order_by('group_name', 'asc');
        return $this->db->get()->result_array();
    }
    
    public function getInfo($id) {
        $this->db->select('*');
        $this->db->from('vw_item_group');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
	
	public function getInfoByGroupName($group_name) {
        $this->db->select('*');
        $this->db->from('item_group');
        $this->db->where('group_name', $group_name);
        return $this->db->get()->row();
    }
     
    
}
