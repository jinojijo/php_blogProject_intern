<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class P_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function fetch_user()
        {
            $result = "select * from backend_users";
            $binds = array();
            $q=$this->db->query($result,$binds);
            $data['result'] = $q->result_array();
            return $data;
        }

        public function check_username($uname)
        {
            $this->db->where('userName', $uname);
            $this->db->from('backend_users');
            $query = $this->db->get();
            return ($query->num_rows() > 0); // Return true if entry exists, false otherwise
        }
  
        
        public function add_user($data)
        {
            $this->db->insert('backend_users',$data);
            return true;
        }
    }

?>