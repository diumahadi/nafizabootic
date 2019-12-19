<?php

class Visit_model extends CI_Model {
    
    public function insert($data) {
        $insert = $this->db->insert('website_visit', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        if ($this->db->update('website_visit', $data)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getInfo($visit_date) {
        $this->db->select('*');
        $this->db->from('website_visit');
        $this->db->where('visit_date', $visit_date);
        return $this->db->get()->row();
    }
	
	public function getVisitorProgress() {      
        $sql_query = "SELECT vs.total_visitor totalCount, MONTHNAME(vs.visit_date) monthLevel, YEAR(vs.visit_date) yearLevel
		FROM website_visit vs
		WHERE YEAR(vs.visit_date)= YEAR(NOW())
		GROUP BY MONTH(vs.visit_date), YEAR(vs.visit_date)
		ORDER BY MONTH(vs.visit_date)";        
        $query = $this->db->query($sql_query);
        return $query->result_array(); 
    }
	
     
    
}
