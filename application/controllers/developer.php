<?php

class developer extends CI_Controller {

    private $userInfo;
	
	public function __construct() {
        parent::__construct();      

		if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
		
        $this->load->model('developer_pm_model');
        
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_developer_pm', $data);
		$this->load->view('admin/footer', $data);
	}

    public function insertOrUpdate() 
	{ 
		$temp_id = trim($_POST["temp_id"]);			
			
		if($temp_id == "0" || empty($temp_id)){
		
			$data = array(
				'pm_date' => $this->input->post('pm_date'),
				'amount' => $this->input->post('amount'),
				'notes' => $this->input->post('notes'),
				'created_by' => $this->userInfo->username
			);

			if($this->developer_pm_model->insert($data)){				
				echo '{"msg":"1"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Insert Error."}';
			}	
		} else {
		
			$data = array(
				'pm_date' => $this->input->post('pm_date'),
				'amount' => $this->input->post('amount'),
				'notes' => $this->input->post('notes'),
				'enabled' => $this->input->post('isActive'),
				'created_by' => $this->userInfo->username
			);

			if($this->developer_pm_model->update($temp_id,$data)){				
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->developer_pm_model->getPaymentList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id) 
	{
        $userInfo = $this->developer_pm_model->getInfo($id);
		$data['pmInfo'][] = $userInfo;
		echo json_encode($data);		
    }    

}
