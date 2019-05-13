<?php 
    class Category_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function create_category(){
            $data = array(
                'name' => $this->input->post('name')
            );
            $query = $this->db->insert('categories',$data);
            return $query;
        }

        public function get_category($id){
            $query = $this->db->get_where('categories',array('id'=> $id));
            return $query->row_array();
        }

    }
?>