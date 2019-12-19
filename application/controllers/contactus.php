<?php

class contactus extends CI_Controller {
	
	private $userInfo;
	
	public function __construct() {
        parent::__construct(); 
			
		if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
        $this->load->model('brand_model');
        $this->load->model('contactus_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_contactus', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
		$data = array(
			'person_name' => $this->input->post('contact_name'),
			'email' => $this->input->post('contact_email'),
			'topic_tp' => $this->input->post('topic_tp'),
			'message' => $this->input->post('contact_message')
		);
		
		if($this->contactus_model->insert($data)){				
			echo '{"msg":"1"}';	
		} else {
			echo '{"error":"EE","errorDesc":"Insert Error."}';
		}
		
    }

    public function loadGrid() 
	{
        $result = $this->contactus_model->getList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id)
	{
        $brandInfo = $this->brand_model->getInfo($id);
		$data=array();
		$data['brandInfo'][] = $brandInfo;
		echo json_encode($data);		
    }


    
   

}
