<?php

class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata("USER_NAME")) {
            redirect('login');
        }

        $this->load->model('material_model');
        $this->load->model('material_image_model');
        $this->load->model('material_group_model');
    }

    public function materials($view_id) {
        $this->session->set_userdata("VIEW_ID", $view_id);
        $config['base_url'] = site_url('material/materials/' . $view_id . '/');
        $config['total_rows'] = count($this->material_model->getList());
        $config['per_page'] = "5";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['materials'] = $this->material_model->getPagingList($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/header');
        $this->load->view('admin/top_nav', $data);
        $this->load->view('admin/material/material_list', $data);
        $this->load->view('admin/footer', $data);
    }

    public function add_new() {
        if (!empty(filter_input(INPUT_POST, 'material_name'))) {

            $data = array(
                'material_group' => $this->input->post('material_group'),
                'material_name' => $this->input->post('material_name'),
                'details' => $this->input->post('description'),
                'created_by' => $this->session->userdata("USER_ID"),
                'display' => 1
            );

            $material_id = $this->material_model->insert($data);

            if ($material_id != 0) {

                // Storing Image
                $imageData = array();
                $files = $_FILES;
                $cpt = count($_FILES['userfile']['name']);

                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                    $image_name = $files['userfile']['name'][$i];
                    $imageData[$i] = array(
                        'material_id' => $material_id,
                        'image_name' => $this->createThumb($image_name)
                    );
                }
                $this->material_image_model->insert($imageData);
                echo '1';
            } else {
                echo '2';
            }
            
        } else {
            $data['action'] = 'add';
            $data['material_groups'] = $this->material_group_model->getActiveList();
            $this->load->view('admin/header');
            $this->load->view('admin/top_nav', $data);
            $this->load->view('admin/material/material_form', $data);
            $this->load->view('admin/footer', $data);
        }
    }

    public function edit($id) {
        if (!empty(filter_input(INPUT_POST, 'material_name'))) {
            $data = array(
                'material_group' => $this->input->post('material_group'),
                'material_name' => $this->input->post('material_name'),
                'details' => $this->input->post('description'),
                'created_by' => $this->session->userdata("USER_ID")
            );            
            
            // Delete Image 

            if (!empty($this->input->post('deletedImage'))) {
                $deleted_image_list = explode(',', $this->input->post('deletedImage'));
                foreach ($deleted_image_list as $value) {
                    $image_info = $this->material_image_model->getInfo($value);
                    if ($this->material_image_model->delete($value)) {
                        $image_url = 'material/';
                        $this->common_model->deleteImage($image_url, $image_info->image_name);
                    }
                }
            }
            
            //update image
            if (!empty($_FILES['userfile']['name'])) {
                $files = $_FILES;
                $total_image = count($_FILES['userfile']['name']);
                $images = explode(',', $this->input->post('images'));
                $image_ids = explode(',', $this->input->post('records'));

                for ($i = 0; $i < $total_image; $i++) {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                    $image_name = $files['userfile']['name'][$i];

                    if ($images[$i] == 'Y' && $image_ids[$i] != "N") {

                        $imageData[$i] = array(
                            'id' => $image_ids[$i],
                            'material_id' => $id,
                            'image_name' => $this->createThumb($image_name)
                        );
                        $image_info = $this->material_image_model->getInfo($image_ids[$i]);
                        $this->material_image_model->update($imageData);
                        $image_url = 'material/';
                        $this->common_model->deleteImage($image_url, $image_info->image_name);
                    } else if ($images[$i] == 'Y' && $image_ids[$i] == "N") {

                        $imageData2[$i] = array(
                            'material_id' => $id,
                            'image_name' => $this->createThumb($image_name)
                        );
                        $this->material_image_model->insert($imageData2);
                    }
                }
            }
            
            if ($this->material_model->update($id, $data)) {
                echo '3';
            } else {
                echo '4';
            }           
            
        } else {
            $data['action'] = 'edit';
            $data['material_info'] = $this->material_model->getInfo($id);
            $data['images'] = $this->material_image_model->getImageList($id);
            $data['material_groups'] = $this->material_group_model->getActiveList();

            $this->load->view('admin/header');
            $this->load->view('admin/top_nav', $data);
            $this->load->view('admin/material/material_update_form', $data);
            $this->load->view('admin/footer', $data);
        }
    }

    public function block($id) {
        $data = array(
            'display' => 0
        );
        if ($this->material_model->update($id, $data)) {
            $this->materials($this->session->userdata('VIEW_ID'));
        } else {
            $this->materials($this->session->userdata('VIEW_ID'));
        }
    }

    public function active($id) {
        $data = array(
            'display' => 1
        );
        if ($this->material_model->update($id, $data)) {
            $this->materials($this->session->userdata('VIEW_ID'));
        } else {
            $this->materials($this->session->userdata('VIEW_ID'));
        }
    }

    public function createThumb($image_name) {
        $this->upload->initialize($this->set_upload_options($image_name));
        if ($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            $fileName = $upload_data['file_name'];
            $filePath = $upload_data['file_path'];
            $full_path = $upload_data['full_path'];
            $this->common_model->create_thumbnail($fileName, $filePath, $full_path);
            return $fileName;
        }
    }

    private function set_upload_options($fileName) {
        $config = array();
        $config['file_name'] = $fileName;
        $config['upload_path'] = './uploads/material/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;
        return $config;
    }

}
