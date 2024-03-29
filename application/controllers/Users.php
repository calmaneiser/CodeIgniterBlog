<?php
    class Users extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->model('user_model');
        }

        public function register(){
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists'); 
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('templates/footer');
            } else {
                // Encrypt Password - but hashing if real
                $enc_password = md5($this->input->post('password'));
                // Register with the encrypted password
                $this->user_model->register($enc_password);
               
                // Session message
                $this->session->set_flashdata('user_registered','You are now registered and can login');

                redirect('posts');
            }
        }
        

        public function login(){

                $data['title'] = 'CodeIgniter';

                $this->form_validation->set_rules('username','Username','required'); 
                $this->form_validation->set_rules('password','Password','required');
     
                if($this->form_validation->run() === FALSE){
                    $this->load->view('templates/header');
                    $this->load->view('users/login',$data);
                    $this->load->view('templates/footer');
                } else {
                    // Get Username
                    $username = $this->input->post('username');
                    // Get and encrpyt password
                    $password = md5($this->input->post('password'));

                    // Login User
                    $user_id = $this->user_model->login($username,$password);


                    // For display and data purposes - Neiser
                    $userinfo = $this->user_model->get_userinfo($user_id);

                    if($user_id){
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'logged_in' => true,
                            'name' => $userinfo['name'],
                            'email' => $userinfo['email'],
                        );

                        $this->session->set_userdata($user_data);

                        // Session message
                        $this->session->set_flashdata('login_success','You are now logged in');

                        // Create session 

                        
                        redirect('posts');          
            
                    } else {
                        // Session message
                        $this->session->set_flashdata('login_failed','No user found');
        
                        redirect('users/login');      
                    }

          
    
                }
        }

        // User log out
        public function logout(){
            // Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_logout','You are now logged out');

            redirect('users/login');
        }
        


        // Check if username exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','That username is already taken. Please choose a different one');

            // If true == true valid - username doesnt exist
            // If false == false valid - username does exist

            if($this->user_model->check_username_exists($username)){
                return true;
            } else {
                return false;
            }
        }

        // Check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','That email is already taken. Please choose a different one');

            // If true == true valid - email doesnt exist
            // If false == false valid - email does exist

            if($this->user_model->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
        }
    }
?>