<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
		//to restricte access from history
        if(!isset($_SESSION['user_id']))
		{
			redirect('admin/login');
		}
    }
	
	public function index()
	{		
		if(isset($_SESSION['user_id']))
		{
			$this->load->view('admin/dashboard');
		}
		else 
		{
			redirect('admin/login');
		}
	}

	public function user_data()
	{
		$this->load->model("P_Model");
		$result=$this->P_Model->fetch_user();
		/* echo "<pre>";
		print_r($result);
		die(); */ 
		$this->load->view('admin/user_data',$result);
	}
}