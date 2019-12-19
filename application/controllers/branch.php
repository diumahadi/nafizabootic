<?php

class Branch extends CI_Controller {

	private $userInfo;
	
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}

        $this->load->model('branch_manager_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_branch', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);				
			
		if($temp_id == "0" || empty($temp_id)){		
			
			$data = array(
				'manager_name' => $this->input->post('manager_name'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './uploads/manager/';
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
					$data['image_url'] = $fileName;
				}
			}

			if($this->branch_manager_model->insert($data)){
				echo '{"msg":"1"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Insert Error."}';
			}	
		} else {
		
			$data = array(
                'manager_name' => $this->input->post('manager_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'display' => $this->input->post('diplay'),
                'created_by' => $this->userInfo->username
            );
			
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './uploads/slider/';
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
					$data['branch_manager_model'] = $fileName;
				}
			}

			if($this->branch_manager_model->update($temp_id,$data)){
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->branch_manager_model->getList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id)
	{
        $brandInfo = $this->branch_manager_model->getInfo($id);
		$data=array();
		$data['managerInfo'][] = $brandInfo;
		echo json_encode($data);		
    }
}