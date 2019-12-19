<?php

class User extends CI_Controller {

    private $userInfo;
	
	public function __construct() {
        parent::__construct();      

        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_user', $data);
		$this->load->view('admin/footer', $data);
	}

    public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);			
			
		if($temp_id == "0" || empty($temp_id)){
		
			$username = $this->input->post('username');
			
			$userInfo = $this->user_model->getUserByUsername(strtolower($username));
			
			if(!empty($userInfo)){
				echo '{"msg":"EX","userExists":"'.$userInfo->username.'"}';				 
			} else {
				
				$data = array(
					'username' => strtolower($this->input->post('username')),
					'password' => md5('123456'),
					'full_name' => $this->input->post('full_name'),
					'email' => $this->input->post('user_email'),
					'mobile' => $this->input->post("mobile_number"),
					'enabled' => $this->input->post("isActive")
				);

				if($this->user_model->insert($data)){				
					echo '{"msg":"1"}';	
				} else {
					echo '{"error":"EE","errorDesc":"Insert Error."}';
				}
			}	
		} else {
		
			$data = array(	
				'full_name' => $this->input->post('full_name'),
				'email' => $this->input->post('user_email'),
				'mobile' => $this->input->post("mobile_number"),
				'enabled' => $this->input->post("isActive")
			);

			if($this->user_model->update($temp_id,$data)){				
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->user_model->getUserList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($username) 
	{
        $userInfo = $this->user_model->getUserByUsername(strtolower($username));
		$data['userInfo'][] = $userInfo;
		echo json_encode($data);		
    }
	
	/*public function match_name($terms){		
		//$terms = $this->input->post('term');
		//$q = strtolower($terms);
        $result = $this->medicine_model->getMatchList(strtolower($terms));
		
		$json = array();		
		if($result->num_rows() > 0){			
			foreach ($result->result_array() as $row){
				$json[] = array('id' => $row["id"],'label' => $row["name"]);
		    }
		  echo json_encode($json);
		} else {
			$json[] = array('id' => "0",'label' => "No Medicine Found !!!");
			echo json_encode($json);
		}
	}*/

    

    

}
