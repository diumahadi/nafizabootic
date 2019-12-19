<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();      
    }
	
	public function index()
	{
		$this->load->view('login');
	}


	
	public function verifyUser()
	{
		
		if (!empty($_POST)) {
            $user_name     = $this->input->post('user_name');
            $user_password = $this->input->post('user_password');
            $userInfo = $this->user_model->getUserByUsername(strtolower($user_name));

            if (!empty($user_name) && !empty($userInfo)) {

                $userInfo = $this->user_model->getUserByUsername($user_name);
                if ($user_name == $userInfo->username && md5($user_password) == $userInfo->password) {
                    $this->session->set_userdata("USER_NAME", $userInfo->username);
                    $this->dashboard();
                } else {
                    $data['error'] = "EE";
                    $this->load->view('login', $data);
                }
            } else {
                $data['error'] = "EE";
                $this->load->view('login', $data);
            }
        }
		
		
	}
	
	public function dashboard()
	{	
		if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$data['userInfo'] = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/side_nav', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer', $data);
		}
	}
	
	public function security()
	{	
		if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			$data['userInfo'] = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/side_nav', $data);
			$this->load->view('admin/form_change_password', $data);
			$this->load->view('admin/footer', $data);
		}
	}
	
	
	public function changePassword(){
	
		if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
			
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			
			$userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
			
			if($userInfo->password != md5($old_password)){
				echo '{"msg":"OP","errorDesc":"Old Password does not match !!!"}';				 
			} else {
			
				$data = array(	
					'password' => md5($new_password)
				);

				if($this->user_model->update($userInfo->username,$data)){				
					echo '{"msg":"2"}';	
				} else {
					echo '{"msg":"EE","errorDesc":"Password Cannot Update !!!"}';
				}
			}
		}
		
		
		
	}
	
	public function logout()
	{
		$this->session->unset_userdata('USER_NAME');
		$this->load->view('login');
	}
}
