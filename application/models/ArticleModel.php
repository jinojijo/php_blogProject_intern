<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class ArticleModel extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_all_articles()
        {
            $resultq=$this->db->query(
                "SELECT * FROM `articles` WHERE `status` = '1'; "
            );

            return $resultq->result_array();
        }

        public function fetch_blog($blog_id)
        {
            $resultq=$this->db->query(
                "SELECT * FROM `articles` WHERE `blogid` = '$blog_id'; "
            );

            return $resultq->result_array();
        }

        public function fetch_cmt($blog_id)
        {
            $resultq=$this->db->query(
                "SELECT * FROM `comment` WHERE `blogid` = '$blog_id'; "
            );

            return $resultq->result_array();
        }

        public function add_comment($data_array)
        {
            $this->db->insert('comment',$data_array);
            return true;
        }

        public function getUser($userId)
        {
            $result = $this->db->query("SELECT `userName` FROM backend_users WHERE `userId`= '$userId' ");
            return $result->result();
        }

        public function like($data_array)
        {
            $this->db->insert('likes',$data_array);
            return true;
        }

        public function fetch_like($blog_id)
        {
            $resultq=$this->db->query(
                "SELECT * FROM `likes` WHERE `blogid` = '$blog_id'; "
            );

            return $resultq->result_array();
        }

        public function unlike($data_array)
        {
            $this->db->where('blogId', $data_array['blogid']);
            $this->db->where('userid', $data_array['userid']);
            $this->db->delete('likes');
            return true;
        }

        public function num_like($blog_id)
        {
            $resultq=$this->db->query(
                "SELECT count(*) FROM `likes` WHERE `blogid` = '$blog_id'; "
            );

            return $resultq->result_array();
        }
    }
?>