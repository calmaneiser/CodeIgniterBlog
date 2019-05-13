<?php
    class Posts extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('post_model');
            $this->load->model('comment_model');
        }

        public function index(){
            $data['title'] = 'Code Igniter Posts';
            $data['posts'] =$this->post_model->get_posts_by_slug();

            $this->load->view('templates/header.php');
            $this->load->view('posts/index.php',$data);
            $this->load->view('templates/footer.php');
        }

        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts_by_slug($slug);

            $post_id = $data['post']['id'];

            $data['comments'] = $this->comment_model->get_comments($post_id);
            
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header.php');
            $this->load->view('posts/view_post.php',$data);
            $this->load->view('templates/footer.php');
        }

        public function create(){

            // Check if a user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = 'Create Post';
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $this->form_validation->set_rules('category_id', 'Category ID', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header.php');
                $this->load->view('posts/create_post.php',$data);
                $this->load->view('templates/footer.php');    
            } else {
                // Upload Image
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] ='5000';
                $config['max_width'] ='4000';
                $config['max_height'] ='4000';

                $this->load->library('upload', $config); //LIBRARY
                // $this->upload->do_upload() UPLOAD FUNCITON
                // $this->upload->display_errors() ERROR FUNCITON
                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = '';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name']; //File name should be USERFILE here and at name
                    
                }

                $this->post_model->create_post($post_image);

                $this->session->set_flashdata('post_created','Your post has been created');


                redirect('posts');
            }
        }

        public function delete($id){

            // Check if a user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->post_model->delete_post($id);

            $this->session->set_flashdata('post_deleted','Your post has been deleted');

            redirect('posts');
        }

        public function edit($id){

            // Check if a user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['title'] = "Edit Post";
            $data['post'] = $this->post_model->get_post_by_id($id);
            $data['categories'] = $this->post_model->get_categories();
                    
            $this->load->view('templates/header.php');
            $this->load->view('posts/edit_post.php',$data);
            $this->load->view('templates/footer.php');    
         
        }

        public function update($id){

            // Check if a user is logged in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->post_model->update_post($id);

            $this->session->set_flashdata('post_updated','Your post has been updated');

            redirect('posts');
        }

    }
?>