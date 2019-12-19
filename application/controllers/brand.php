<?php

class brand extends CI_Controller {

	private $userInfo;
	
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
        $this->load->model('brand_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_brand', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);	
		$brand_name = $this->input->post('brand_name');
			
			
		if($temp_id == "0" || empty($temp_id)){		
			
			$brandInfo = $this->brand_model->getInfoByBrandName(strtolower($brand_name));
			
			if(!empty($brandInfo)){
				echo '{"msg":"EX","exists":"'.$brandInfo->brand_name.'"}';				 
			} else {
				
				$data = array(
					'brand_name' => $brand_name,
					'display' => $this->input->post('diplay'),
					'created_by' => $this->userInfo->username
				);
				
				if (!empty($_FILES['userfile']['name'])) {
					$config['upload_path'] = './uploads/brand/';
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
						$data['logo'] = $fileName;
					}
				}

				if($this->brand_model->insert($data)){				
					echo '{"msg":"1"}';	
				} else {
					echo '{"error":"EE","errorDesc":"Insert Error."}';
				}
			}	
		} else {
		
			$data = array(
				'brand_name' => $brand_name,
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			if (!empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './uploads/brand/';
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
					$data['logo'] = $fileName;
				}
			}

			if($this->brand_model->update($temp_id,$data)){				
				echo '{"msg":"2"}';	
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		
		}
		
		
    }

    public function loadGrid() 
	{
        $result = $this->brand_model->getList();
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
