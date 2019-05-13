<?php 
    class Categories extends CI_Controller{

        function __construct() {
            parent::__construct();
            $this->load->model('category_model');
            $this->load->model('post_model');
        }

        public function index(){
            $data['title'] = "Categories";
            $data['categories'] = $this->post_model->get_categories();

            $this->load->view('templates/header');
            $this->load->view('categories/index',$data);
            $this->load->view('templates/footer');
        }

        public function create(){
            $data['title'] = "Create category";
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('categories/create',$data);
                $this->load->view('templates/footer');
            } else {
                $this->category_model->create_category();
                $this->session->set_flashdata('category_created','Your category has been created');
                redirect('categories');
            }
        }

        public function posts($category_id){
            $data['title'] = $this->category_model->get_category($category_id)['name'];

            $data['posts'] = $this->post_model->get_post_by_category($category_id);

            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');        
        }


    }

?>