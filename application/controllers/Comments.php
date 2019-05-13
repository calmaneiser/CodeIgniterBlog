<?php 
    class Comments extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('comment_model');
            $this->load->model('post_model');

        }


        public function create($post_id){
            $slug = $this->input->post('slug');
            $data['post'] = $this->post_model->get_posts_by_slug($slug);
            $data['title'] = $data['post']['title'];
            $data['comments'] = null;
            $this->form_validation->set_rules('name','Name', 'required');
            $this->form_validation->set_rules('email','Email', 'required|valid_email');
            $this->form_validation->set_rules('body','Body', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header.php');
                $this->load->view('posts/view_post.php',$data);
                $this->load->view('templates/footer.php');
            }
            else{
                $this->comment_model->create_comment($post_id);
                redirect('posts/'.$slug);
            }

        }

    }
?>
