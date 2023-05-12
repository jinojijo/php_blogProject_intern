<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function index()
	{
		// $this->load->helper('url');

		if(isset ($_SESSION['user_id']))
		{
			redirect('admin/dashboard');
		} 

		$data=[];
		if (isset($_SESSION['error'])) 
		{
			$data['error']=$_SESSION['error'];
		}
		else
		{
			$data['error']="NO_ERROR";
		}

		// new user addition successfull alert
		if (isset($_SESSION['new_user'])) 
		{
			$data['new_user']=$_SESSION['new_user'];
		}
		else
		{
			$data['new_user']="NO_ERROR";
		}

		$this->load->view('admin/login_view',$data);
	}

	public function login_post()
	{
		$uname = $_POST['username'];
		$psd = $_POST['password'];

		$result = $this->db->query("SELECT * FROM backend_users WHERE `userName`= '$uname' AND `password` = '$psd' ");
		if($result->num_rows()) 
		{
			//valid crendetials

			$session_details = $result-> result_array();
			print_r($session_details);
			$this->session->set_userdata('user_id', $session_details[0]['userId']);

			if($_SESSION['user_id']==1)
			{
				$this->load->view('admin/dashboard');
			}
			else 
			{
				redirect('home');
			}
			
		}
		else
		{
			//invalid crendetials 
			$this->session->set_flashdata('error','invalid crendetials');
			redirect('admin/login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('admin/login');
	}

	public function new_user()
	{
		$this->load->view('admin/new_user');
	}

	public function add_new_user()
	{
		$uname = $_POST['username'];
		$psd = $_POST['password'];

		$data = array(
			'userName' => $uname,
			'password' => $psd
		);

		$this->load->model("P_model");
		$result=$this->P_model->add_user($data);

		if($result)
		{
			$this->session->set_flashdata('new_user','Sign In With new Creditials');
			redirect('admin/login');
		}
		else
		{
			redirect('admin/login');
		}
	}
}
