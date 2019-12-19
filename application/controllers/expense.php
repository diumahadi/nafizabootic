<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 14-Jun-19
 * Time: 3:49 AM
 */

class Expense extends CI_Controller {

    private $userInfo;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        } else {
            $this->userInfo = $this->user_model->getUserByUsername($this->session->userdata("USER_NAME"));
        }

        $this->load->model('expense_model');
        $this->load->model('expense_head_model');
    }

    public function expenseHead()
    {
        $data['userInfo'] = $this->userInfo;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/side_nav', $data);
        $this->load->view('admin/form_expense_head', $data);
        $this->load->view('admin/footer', $data);
    }


    public function expenseShow()
    {
        $data['userInfo'] = $this->userInfo;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/side_nav', $data);
        $this->load->view('admin/form_expense', $data);
        $this->load->view('admin/footer', $data);
    }

    public function insertOrUpdateExpenseHead()
    {
        $temp_id = trim($_POST["temp_id"]);
        $head_name = $this->input->post('head_name');

        if($temp_id == "0" || empty($temp_id)){

            $headInfo = $this->expense_head_model->getInfoByHeadName(strtolower($head_name));

            if(!empty($headInfo)){
                echo '{"msg":"EX","exists":"'.$headInfo->head_name.'"}';
            } else {
                $data = array(
                    'head_name' => $head_name,
                    'enabled' => $this->input->post('enabled'),
                    'created_by' => $this->userInfo->username,
                    'created_at' => $this->common_model->getCurrentTimestamp()
                );

                if($this->expense_head_model->insert($data)){
                    echo '{"msg":"1"}';
                } else {
                    echo '{"error":"EE","errorDesc":"Insert Error."}';
                }
            }
        } else {
            $data = array(
                'head_name' => $head_name,
                'enabled' => $this->input->post('enabled'),
                'created_by' => $this->userInfo->username
            );

            if($this->expense_head_model->update($temp_id,$data)){
                echo '{"msg":"2"}';
            } else {
                echo '{"error":"EE","errorDesc":"Update Error."}';
            }

        }
    }


    public function insertOrUpdateExpense()
    {
        $temp_id = trim($_POST["temp_id"]);

        if($temp_id == "0" || empty($temp_id)){
            $data = array(
                'head_id' => $this->input->post('head_id'),
                'expense_date' => $this->input->post('expense_date'),
                'expense_amount' => $this->input->post('expense_amount'),
                'notes' => $this->input->post('notes'),
                'enabled' => $this->input->post('enabled'),
                'created_by' => $this->userInfo->username,
                'created_at' => $this->common_model->getCurrentTimestamp()
            );

            if($this->expense_model->insert($data)){
                echo '{"msg":"1"}';
            } else {
                echo '{"error":"EE","errorDesc":"Insert Error."}';
            }

        } else {
            $data = array(
                'head_id' => $this->input->post('head_id'),
                'expense_date' => $this->input->post('expense_date'),
                'expense_amount' => $this->input->post('expense_amount'),
                'notes' => $this->input->post('notes'),
                'enabled' => $this->input->post('enabled'),
                'updated_by' => $this->userInfo->username,
                'updated_at' => $this->common_model->getCurrentTimestamp()
            );

            if($this->expense_model->update($temp_id,$data)){
                echo '{"msg":"2"}';
            } else {
                echo '{"error":"EE","errorDesc":"Update Error."}';
            }

        }
    }

    public function getExpenseHeadList()
    {
        $result = $this->expense_head_model->getList();
        $data=array();
        foreach ($result as $row) {
            $data['records'][] = $row;
        }
        echo json_encode($data);
    }

    public function getExpenseHeadInfo($id)
    {
        $brandInfo = $this->expense_head_model->getInfo($id);
        $data=array();
        $data['headInfo'][] = $brandInfo;
        echo json_encode($data);
    }


    public function getExpenseList()
    {
        $result = $this->expense_model->getExpenseList();
        $data=array();
        foreach ($result as $row) {
            $data['records'][] = $row;
        }
        echo json_encode($data);
    }

    public function getExpenseInfo()
    {
        $id = $this->input->get('id');
        $brandInfo = $this->expense_model->getInfo($id);
        $data=array();
        $data['expenseInfo'][] = $brandInfo;
        echo json_encode($data);
    }




}