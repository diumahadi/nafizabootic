<?php

class event extends CI_Controller {

	private $userInfo;
	
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
        $this->load->model('event_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_event', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);				
			
		if($temp_id == "0" || empty($temp_id)){		
			
			$data = array(
				'event_name' =>  $this->input->post('event_name'),
				'organize_date' => $this->input->post('organize_date'),
				'description' => $this->input->post('description'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './uploads/event/';
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '30000';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload()) {
					echo '{"error":"EE","errorDesc":"'.$this->upload->display_errors().'"}';
				} else {
					$f['f'] = $this->upload->data();
					$fileName = $f['f']['file_name'];
					$data['profile_image'] = $fileName;
				}
			}

			if($this->event_model->insert($data)){				
				echo '{"msg":"1"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Insert Error."}';
			}	
		} else {
		
			$data = array(
				'event_name' =>  $this->input->post('event_name'),
				'organize_date' => $this->input->post('organize_date'),
				'description' => $this->input->post('description'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './uploads/event/';
				$config['overwrite'] = FALSE;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '30000';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload()) {
					echo '{"error":"EE","errorDesc":"'.$this->upload->display_errors().'"}';
				} else {
					$f['f'] = $this->upload->data();
					$fileName = $f['f']['file_name'];
					$data['profile_image'] = $fileName;
				}
			}

			if($this->event_model->update($temp_id,$data)){				
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->event_model->getList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id)
	{
        $brandInfo = $this->event_model->getInfo($id);
		$data=array();
		$data['eventInfo'][] = $brandInfo;
		echo json_encode($data);		
    }


    
   

}
