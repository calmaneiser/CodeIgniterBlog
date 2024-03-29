<?php 
    class Pages extends CI_Controller{
        public function index ($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404(); // CI function to load a 404 error
            }

            $data['title'] = ucfirst($page);

            $this->load->view('templates/header.php');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer.php');

        }
    }
?>