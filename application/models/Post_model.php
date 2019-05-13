<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts_by_slug($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories','categories.id = posts.category_id');
                $this->db->select('posts.*, name as category_name');
                $query = $this->db->get('posts');
                return $query->result_array();
            }

            $query = $this->db->get_where('posts',array('slug' => $slug));
            return $query->row_array();
            
        }

        public function get_post_by_id($id){
            $this->db->order_by('posts.id','DESC');
            $this->db->join('categories','categories.id = posts.category_id');
            $this->db->select('posts.*, name as category_name');       
            $query = $this->db->get_where('posts',array('posts.id'=> $id));
            return $query->row_array();
        }

        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'post_image' => $post_image,
                'user_id' => $this->session->userdata('user_id')
            );

            $query = $this->db->insert('posts',$data);
            return $query;
        }





        public function delete_post($id){
            $this->db->delete('posts', array('id' => $id));
        }



        public function update_post($id){
            if($this->input->post('title')){
                $slug = url_title($this->input->post('title'));
                $title = $this->input->post('title');
            } else {
                $slug = url_title('No Title'.' '.$id);
                $title = 'No Title'.' '.$id;
            }
            
            $data = array(
                'title' => $title,
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),

            );

            $this->db->where('id',$id);
            $query = $this->db->update('posts',$data);

            return $query;
        }

        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_post_by_category($category_id){
            $this->db->order_by('posts.id','DESC');
            $this->db->join('categories','categories.id = posts.category_id');
            $this->db->select('posts.*, name as category_name');       
            $query = $this->db->get_where('posts',array('posts.category_id'=> $category_id));
            return $query->result_array();
        }

    }
?>