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
		
		// if account inactive
		if (isset($_SESSION['notactive'])) 
		{
			$data['notactive']=$_SESSION['notactive'];
		}
		else
		{
			$data['notactive']="NO_ERROR";
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
			if($session_details[0]['status'] == 1)
			{
				
				$this->session->set_userdata('user_id', $session_details[0]['userId']);

				if($_SESSION['user_id']==1)
				{
					redirect('admin/dashboard');
				}
				else 
				{
					redirect('home');
				}
			}
			else
			{
				$this->session->set_flashdata('notactive','Account Not Active.');
				redirect('admin/login');
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
		$data_new_user=[];
		// user validation successfull alert
		if (isset($_SESSION['user_exist'])) 
		{
			$data_new_user['user_exist']=$_SESSION['user_exist'];
		}
		else
		{
			$data_new_user['user_exist']="NO_ERROR";
		}
		
		$this->load->view('admin/new_user',$data_new_user);
	}

	public function new_user_admin()
	{
		$this->load->view('admin/admin_new_user');
	}

	public function add_new_user()
	{
		$uname = $_POST['username'];

		$this->load->model("P_model");
		$valid=$this->P_model->check_username($uname);

		if($valid)
		{
			if(isset ($_SESSION['user_id']))
			{
				$this->session->set_flashdata('Add_user',$uname);
				redirect('admin/dashboard/user_data');
			}
			else
			{
				$this->session->set_flashdata("user_exist","User Name : '$uname' already used.");
				redirect('admin/login/new_user');
			}
		}
		else 
		{
			$psd = $_POST['password'];
			$data = array(
				'userName' => $uname,
				'password' => $psd
			);
			$result=$this->P_model->add_user($data);

			if($result)
			{

				if(isset ($_SESSION['user_id']))
				{	
					$this->session->set_flashdata('Add_user','yes');
					redirect('admin/dashboard/user_data');
				}
				else
				{
					$this->session->set_flashdata('new_user','Sign In With new Creditials');
					redirect('admin/login');
				}
			}
			else
			{
				if(isset ($_SESSION['user_id']))
				{
					$this->session->set_flashdata('Add_user','no');
					redirect('admin/dashboard/user_data');
				}
				else
					redirect('admin/login');
			}	
		}
	}

	
	public function delete_user()
    {
		//to restricte access from history
		if(!isset($_SESSION['user_id']))
		{
			redirect('admin/login');
		}
        $delete_id=$_POST['delete_id'];
        $del = $this->db->query("DELETE FROM `backend_users` WHERE `userId`='$delete_id' " );
		$del = $this->db->query("DELETE FROM `comment` WHERE `userid`='$delete_id' " );
		$del = $this->db->query("DELETE FROM `likes` WHERE `userid`='$delete_id' " );

        if($del)
        {
            echo "deleted";
        }
        else
        {
            echo "Not DELETED";
        }
    }

	public function edituser($id)
    {
		//to restricte access from history
		if(!isset($_SESSION['user_id']))
		{
			redirect('admin/login');
		}
        $query = $this->db->query( "SELECT `userName`,`password`,`status` 
                                    FROM `backend_users` 
                                    WHERE `userId`='$id' " 
                                );

        $data['result'] = $query -> result_array();
        $data['userId'] = $id;

		/* echo"<pre>";
		print_r($data); */
        $this->load->view('admin/edituser',$data);
    }

	public function edituser_post()
    {
       /*  print_r($_POST);
		die(); */
        
		//to restricte access from history
		if(!isset($_SESSION['user_id']))
		{
			redirect('admin/login');
		}

		$user_id=$_POST['user_id'];
		$userName=$_POST['userName'];
		$old_user_name=$_POST['old_user_name'];
		$password=$_POST['password'];
		$active_inactive = $_POST['active_inactive'];
		$flag=0;

		if ($user_id==1) 
		{
			$active_inactive=1;
			$userName="admin";
		}

		if ($old_user_name != $userName) 
		{
			$this->load->model("P_model");
			$valid=$this->P_model->check_username($userName);

			if($valid)
			{
				$this->session->set_flashdata('Updation_user',$userName);
				redirect('admin/dashboard/user_data');
			}
			else 
				$flag=1;
		}
		else
			$flag=1;

		
		if ($flag==1) 
		{
			$updation = $this->db->query(" UPDATE `backend_users` SET 
										`userName`='$userName',
										`password`='$password',
										`status`='$active_inactive'
										WHERE 
										`userId`='$user_id'
									");
				
			if ($updation) 
			{
				$this->session->set_flashdata('Updation_user','yes');
				redirect('admin/dashboard/user_data');
			}
			else
			{
				$this->session->set_flashdata('Updation_user','no');
				redirect('admin/dashboard/user_data');
			}
		}
    }
}