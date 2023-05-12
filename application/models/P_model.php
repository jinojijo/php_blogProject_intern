<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class P_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function add_user($data)
        {
            $this->db->insert('backend_users',$data);
            return true;
        }
    }

?>