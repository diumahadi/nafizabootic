<?php

class Item_group extends CI_Controller {

	private $userInfo;
	
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
        $this->load->model('item_group_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_item_group', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);	
		$group_name = $this->input->post('group_name');
			
			
		if($temp_id == "0" || empty($temp_id)){
		
			
			
			$groupInfo = $this->item_group_model->getInfoByGroupName(strtolower($group_name));
			
			if(!empty($groupInfo)){
				echo '{"msg":"EX","exists":"'.$groupInfo->group_name.'"}';				 
			} else {
				
				$data = array(
					'group_name' => $group_name,					
					'group_tp' => $this->input->post('group_tp'),
					'display' => $this->input->post('diplay'),
					'created_by' => $this->userInfo->username
				);

				if($this->item_group_model->insert($data)){				
					echo '{"msg":"1"}';	
				} else {
					echo '{"error":"EE","errorDesc":"Insert Error."}';
				}
			}	
		} else {
		
			$data = array(
				'group_name' => $group_name,					
				'group_tp' => $this->input->post('group_tp'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);

			if($this->item_group_model->update($temp_id,$data)){				
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->item_group_model->getItemGroupList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id) 
	
	{
        $groupInfo = $this->item_group_model->getInfo($id);
		$data=array();
		$data['groupInfo'][] = $groupInfo;
		echo json_encode($data);		
    }


    
   

}
