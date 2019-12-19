<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 14-Jun-19
 * Time: 11:21 AM
 */

class Order extends CI_Controller {

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

    public function orders()
    {
        $data['userInfo'] = $this->userInfo;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/side_nav', $data);
        $this->load->view('admin/from_order_list', $data);
        $this->load->view('admin/footer', $data);
    }

    public function readyDelivery()
    {
        $orderId = trim($_POST["id"]);

        $data = array(
            'deliver_date' => $this->input->post('deliverDate'),
            'due_amount' => $this->input->post('dueAmount'),
            'order_status' => $this->input->post('orderStatus')
        );

        if($this->order_model->update($orderId,$data)){
            echo '{"msg":"1"}';
        } else {
            echo '{"error":"EE","errorDesc":"Update Error."}';
        }
    }

    public function rejectOrder()
    {
        $orderId = trim($_POST["id"]);

        $data = array(
            'order_status' => 'C'
        );

        if($this->order_model->update($orderId,$data)){
            echo '{"msg":"1"}';
        } else {
            echo '{"error":"EE","errorDesc":"Update Error."}';
        }
    }

    public function getPendingOrders()
    {
        $result = $this->order_model->findOrderDetailsByOrderStatus('P');
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