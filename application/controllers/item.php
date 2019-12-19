<?php

class Item extends CI_Controller {

	private $userInfo;
	
	public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		}
        
        $this->load->model('item_model');
        $this->load->model('brand_model');
        $this->load->model('item_group_model');
    }
	
	public function index()
	{
		$data['userInfo'] = $this->userInfo;
		$this->load->view('admin/header', $data);
		$this->load->view('admin/side_nav', $data);
		$this->load->view('admin/form_item', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function insertOrUpdate() 
	{
        
		$temp_id = trim($_POST["temp_id"]);				
			
		if($temp_id == "0" || empty($temp_id)){		
			
			$data = array(
				'item_name' => $this->input->post('item_name'),
				'item_code' => $this->input->post('item_code'),
				'group_id' => $this->input->post('group_id'),
				'brand_id' => ($this->input->post('brand_id')!="0") ? $this->input->post('brand_id'):null,
				'current_stock' => $this->input->post('current_stock'),
				'purchase_price' => $this->input->post('purchase_price'),
				'sales_price' => $this->input->post('sales_price'),
				'discount_price' => $this->input->post('discount_price'),
				'short_desc' => $this->input->post('short_desc'),
				'description' => $this->input->post('description'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			
			$temp_image_name = "[";
			$temp_size = "[";
			$temp_profile_image="";
			
			$SIZE = $this->input->post('size');
			
			if(!empty($SIZE)){
				for($i=0;$i<count($SIZE);$i++){				
					$temp_size .= '{"size":"' . $SIZE[$i] . '"},';
				}				
				$data['size'] = rtrim($temp_size,',')."]";
			} else {
				$data['size'] = "";
			}
				
			
			$files = $_FILES;
			$cpt = count($_FILES['userfile']['name']);
			
			$image_count=0;

			for ($i = 0; $i < $cpt; $i++) {		
			
				$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
				$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
				$_FILES['userfile']['size'] = $files['userfile']['size'][$i];
				
				$fileInfo = pathinfo($files['userfile']['name'][$i]);
				$extension = $fileInfo['extension'];

				$image_name = rand(100000,999999)."-".time().".".$extension;
				
				if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
					
					$image_count++;
					$temp_image_name .= '{"imgName":"' . $image_name . '"},';
					$data['image'] = rtrim($temp_image_name,',')."]";
					$this->upload->initialize($this->set_upload_options($image_name));
					if(!$this->upload->do_upload()){
						echo '{"error":"EE","errorDesc":"Cannot Upload Image !!!"}';die;
					}

				}			
				
				if($i==0){
					$data['profile_image'] = $image_name;
				}			
			}

			if($image_count==0){
				echo '{"msg":"NX"}';die;	
			}

			$item_id = $this->item_model->insert($data);
			
			if($item_id !=0){
				echo '{"msg":"1"}';					
			} else {
				echo '{"error":"EE","errorDesc":"Insert Error."}';
			}
			
		} else {
		
			$data = array(
				'item_name' => $this->input->post('item_name'),
				'item_code' => $this->input->post('item_code'),
				'group_id' => $this->input->post('group_id'),
				'brand_id' => ($this->input->post('brand_id')!="0") ? $this->input->post('brand_id'):null,
				'current_stock' => $this->input->post('current_stock'),
				'purchase_price' => $this->input->post('purchase_price'),
				'sales_price' => $this->input->post('sales_price'),
				'discount_price' => $this->input->post('discount_price'),
				'short_desc' => $this->input->post('short_desc'),
				'description' => $this->input->post('description'),
				'display' => $this->input->post('diplay'),
				'created_by' => $this->userInfo->username
			);
			
			
			$temp_image_name = "[";
			$temp_size = "[";
			$temp_profile_image="";
			
			$SIZE = $this->input->post('size');
			$TEMP_IMAGE = $this->input->post('hidden_image');
			
			if(!empty($SIZE)){
				for($i=0;$i<count($SIZE);$i++){				
					$temp_size .= '{"size":"' . $SIZE[$i] . '"},';
				}				
				$data['size'] = rtrim($temp_size,',')."]";
			} else {
				$data['size'] = "";
			}
			
			$image_count=0;
			$files = $_FILES;		
			$total_image = count($_FILES['userfile']['name']);
			
			for ($i = 0; $i < $total_image; $i++) {
				$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
				$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
				$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

				$image_name = $files['userfile']['name'][$i];				
				
				$temp_img="";
				$item_flag=0;
				
				if (!empty($TEMP_IMAGE)) {
					if(!empty($image_name)){
						$image_count++;
						
						$fileInfo = pathinfo($files['userfile']['name'][$i]);
						$extension = $fileInfo['extension'];						
						$temp_img = rand(100000,999999)."-".time().".".$extension;
						
						if($i==0 && !empty($image_name)){
							$data['profile_image'] = $temp_img;
						} else {
							$data['profile_image'] = $TEMP_IMAGE[0];
						}				
						
						$temp_image_name .= '{"imgName":"' . $temp_img . '"},';
						$this->upload->initialize($this->set_upload_options($temp_img));
						if(!$this->upload->do_upload()){
							echo '{"error":"EE","errorDesc":"Cannot Upload Image !!!"}';die;
						}
					} else {
						$image_count++;
						$temp_image_name .= '{"imgName":"' . $TEMP_IMAGE[$i] . '"},';
					}				
				}		
				
				$data['image'] = rtrim($temp_image_name,',')."]";			
			}
			
			if($image_count==0){
				echo '{"msg":"NX"}';die;	
			}
			
			if($this->item_model->update($temp_id,$data)){
				echo '{"msg":"2"}';					
			} else {
				echo '{"error":"EE","errorDesc":"Update Error."}';
			}
		}	
    }

    public function loadGrid() 
	{
        $result = $this->item_model->getList();
		$data=array();
		foreach ($result as $row) {
			 $data['records'][] = $row;
		}
		echo json_encode($data);
    }   

    public function getInfo($id)
	{
		$data = array();
		$data['itemInfo'][] = $this->item_model->getInfo($id);
		echo json_encode($data);		
    }
	
	public function loadFormContent() 
	{
        $result = $this->item_group_model->getItemGroupList();
		$data=array();
		foreach ($result as $row) {
			 $data['group'][] = $row;
		}
		
		$result = $this->brand_model->getList();
		foreach ($result as $row) {
			 $data['brand'][] = $row;
		}
		
		echo json_encode($data);
    }
	
	
	public function getUserItemEntry() 
	{
		$data=array();
		$data_points=array();
		$total = 0;
		
		$result = $this->item_model->getUserInsertedItems();
		foreach ($result as $row) {			
			$point = array("y" => $row['totalCount'],"label"=>$row['full_name']);        
			$total += $row['totalCount'];
			array_push($data_points, $point);
		}
		
		$data['records']   = $data_points;
		$data['totalItemCount'] = $total;		
		
		echo json_encode($data, JSON_NUMERIC_CHECK);
    }
	
	public function getItemEntryProgress() 
	{
		$data=array();
		$data_points=array();
		$total = 0;
		$year="";
		
		$result = $this->item_model->getItemEntryProgress();
		foreach ($result as $row) {			
			$point = array("y" => $row['totalCount'],"label"=>$row['monthLevel']);        
			$total += $row['totalCount'];
			array_push($data_points, $point);
			$year=$row['yearLevel'];
		}
		
		$data['records']        = $data_points;				
		$data['yearLevel']      = $year;
		$data['totalItemCount'] = $total;	
		
		echo json_encode($data, JSON_NUMERIC_CHECK);
    }
	
	public function getItemEntryEachGroup() 
	{
		$data=array();
		$data_points=array();
		$total = 0;
		
		$result = $this->item_model->getItemEntryEachGroup();
		foreach ($result as $row) {
			$point = array("y" => $row['totalCount'], "legendText" => $row['group_name'],"label"=>$row['group_name'],"total"=>$row['totalCount']);        
			$total += $row['totalCount'];
			array_push($data_points, $point);
		}
		
		$data['records']        = $data_points;
		$data['totalItemCount'] = $total;	
		
		echo json_encode($data, JSON_NUMERIC_CHECK);
    }

    public function getNewProductId() {
        $data['newProductId'] = 'NB#P'.$this->item_model->getNewItemCode();
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }


	
	private function set_upload_options($fileName) {
        $config = array();
        $config['file_name'] = $fileName;
        $config['upload_path'] = './uploads/item/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
		$config['quality'] = 50;
        $config['overwrite'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']    = 250;
		$config['height']   = 400;
        return $config;
    }


    
   

}
