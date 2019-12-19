<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('item_model');
        $this->load->model('event_model');
        $this->load->model('brand_model');
        $this->load->model('contactus_model');
        $this->load->model('slider_model');
		$this->load->model('visit_model');
        $this->load->model('item_group_model');
        $this->load->model('branch_manager_model');
		
		//echo "You are being requested to pay website fees to active your website !!!";die;
    }
	
	public function index()
	{
		
		
		
		$data['action'] = 'add';
		
		$visitInfo = $this->visit_model->getInfo(date('Y-m-d'));
		
		if(!empty($visitInfo)){		
			$data = array(
                'total_visitor' => ($visitInfo->total_visitor+1)
            );
			$this->visit_model->update($visitInfo->id,$data);
		} else {
			$data = array(
				'visit_date' => date('Y-m-d'),
                'total_visitor' => 1
            );			
			$this->visit_model->insert($data);
		}
		
		$data['slider'] = $this->slider_model->getRandomSlider();		
		$data['menFeaturedItem'] = $this->item_model->getFeaturedList("MA");		
		$data['womenFeaturedItem'] = $this->item_model->getFeaturedList("WO");		
		$data['kidsFeaturedItem'] = $this->item_model->getFeaturedList("KD");		
		$data['homeLivingItem'] = $this->item_model->getFeaturedList("HL");
		
		$this->load->view('site/header');
		$this->load->view('site/slider', $data);
		$this->load->view('site/home_content', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function category($groupTp)
	{
		
		$arrayGroup = array("MA"=>"Men's Fashion","WO"=>"Women's Fashion","KD"=>"Kid's Fashion","HL"=>"Home & Living");
		
		$data['title'] = $arrayGroup[$groupTp];
		$data['category'] = $this->item_group_model->getGroupsByGroupType($groupTp);
		$data['categoryItems'] = $this->item_model->getGroupList($groupTp);
		$data['relatedItems'] = $this->item_model->getRelatedList($groupTp);
		
		$this->load->view('site/header');
		$this->load->view('site/item_group', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function group($groupId)
	{
		
		$groupInfo = $this->item_group_model->getInfo($groupId);
		
		//var_dump($groupInfo);die;
		
		$data['title'] = $groupInfo->group_name;
		$data['category'] = $this->item_group_model->getGroupsByGroupType($groupInfo->group_tp);
		$data['categoryItems'] = $this->item_model->getItemByGroupId($groupId);
		$data['relatedItems'] = $this->item_model->getRelatedList($groupInfo->group_tp);
		
		$this->load->view('site/header');
		$this->load->view('site/item_group', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function details($item_id)
	{
		$data['itemInfo'] = $this->item_model->getInfo($item_id);
		
		$this->load->view('site/header');
		$this->load->view('site/item_details', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function events()
	{
		$data['recent'] = $this->event_model->getLatestList();
		$data['archieve'] = $this->event_model->getList();
		$data['events'] = $this->event_model->getList();
		
		$this->load->view('site/header');
		$this->load->view('site/events', $data);
		$this->load->view('site/footer', $data);
	}
	
	
	public function branch_managers()
	{
		$data['managers'] = $this->branch_manager_model->getActiveList();
		
		$this->load->view('site/header');
		$this->load->view('site/branch_manager', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function about_us()
	{
		$data['action'] = 'add';
		$this->load->view('site/header');
		$this->load->view('site/aaa', $data);
		$this->load->view('site/footer', $data);
	}
	
	public function send_contact() 
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
	
	public function contact_us()
	{
		$data['action'] = 'add';
		$this->load->view('site/header');
		$this->load->view('site/contact_us', $data);
		$this->load->view('site/footer', $data);
	}
	
	
	public function getVisitorProgress() 
	{
		$data=array();
		$data_points=array();
		$total = 0;
		$year="";
		
		$result = $this->visit_model->getVisitorProgress();
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
	
	
}
