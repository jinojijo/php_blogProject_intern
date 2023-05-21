<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller 
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
        $result = "select * from articles";
        $binds = array();
        $q=$this->db->query($result,$binds);
        $data['result'] = $q->result_array();
        $this->load->view('admin/viewblog', $data);
    }

    public function addblog()
    {
        $this->load->view('admin/addblog');
    }

    public function addblog_post()
    {
        /* print_r($_POST);
        print_r($_FILES); */
        if($_FILES)
        {
            //got img
            $config['upload_path']          = './assets/uploads/blogImg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('blogImg'))
            {
                $error = array('error' => $this->upload->display_errors());
                die("error");
                //$this->load->view('upload_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                /* echo "<pre>";
                print_r($data);
                echo $data['upload_data']['file_name']; */

                $file_url= "assets/uploads/blogImg/".$data['upload_data']['file_name'];
                $blog_title=$_POST['blogTitle'];
                $blog_desc=$_POST['blogDesc'];

                $data_array= array(
                    "blog_title"=>$blog_title,
                    "blog_desc"=>$blog_desc,
                    "blog_img"=>$file_url,
                );

                $inserted = $this->db->insert('articles', $data_array);
                
                if ($inserted) 
                {
                    $this->session->set_flashdata('Insertion','yes');
                    //redirect('admin/blog/addblog');
                }
            }
        }
        else
        {
            //img missing
        }
    }

    public function editblog($id)
    { 
        $query = $this->db->query( "SELECT `blog_title`,`blog_desc`,`blog_img`,`status` 
                                    FROM `articles` 
                                    WHERE `blogid`='$id' " 
                                );

        $data['result'] = $query -> result_array();
        $data['blog_id'] = $id;
        $this->load->view('admin/editblog',$data);
    }

    public function editblog_post()
    {
        /* print_r($_POST);
        print_r($_FILES); */
        if($_FILES['blogImg']['name'])
        {
            //update file
            $config['upload_path']          = './assets/uploads/blogImg/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('blogImg'))
            {
                $error = array('error' => $this->upload->display_errors());
                die("error");
                //$this->load->view('upload_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
               
                $file_url= "assets/uploads/blogImg/".$data['upload_data']['file_name'];
                $blog_id=$_POST['blog_id'];
                $blog_title=$_POST['blogTitle'];
                $blog_desc=$_POST['blogDesc'];
                $publish_unpublish = $_POST['publish_unpublish'];

                $updation = $this->db->query("UPDATE `articles` 
                                              SET `blog_title`='$blog_title',
                                              `blog_desc`='$blog_desc',
                                              `blog_img`='$file_url',
                                              `status`='$publish_unpublish'
                                              WHERE 
                                              `blogid`='$blog_id' "
                                            );
                
                if ($updation) 
                {
                    $this->session->set_flashdata('Updation','yes');
                    redirect('admin/blog/');
                }
                else
                {
                    $this->session->set_flashdata('Updation','no');
                    redirect('admin/blog/');
                }
            }
        }
        else
        {
            //update without image file
            $blog_id=$_POST['blog_id'];
            $blog_title=$_POST['blogTitle'];
            $blog_desc=$_POST['blogDesc'];
            $publish_unpublish = $_POST['publish_unpublish'];

            $updation = $this->db->query(" UPDATE `articles` SET 
                                      `blog_title`='$blog_title',
                                      `blog_desc`='$blog_desc',
                                      `status`='$publish_unpublish'
                                      WHERE 
                                      `blogid`='$blog_id'
                                    ");
                
            if ($updation) 
            {
                $this->session->set_flashdata('Updation','yes');
                redirect('admin/blog/');
            }
            else
            {
                $this->session->set_flashdata('Updation','no');
                redirect('admin/blog/');
            }
        }

    }

    public function deleteblog()
    {
        $delete_id=$_POST['delete_id'];
        $del = $this->db->query("DELETE FROM `articles` WHERE `blogid`='$delete_id' " );
        $del = $this->db->query("DELETE FROM `comment` WHERE `blogid`='$delete_id' " );
		$del = $this->db->query("DELETE FROM `likes` WHERE `blogId`='$delete_id' " );

        if($del)
        {
            echo "deleted";
        }
        else
        {
            echo "Not DELETED";
        }
    }

    public function view_blog_detail($blogid)
    { 
    
        $this->load->model("ArticleModel");
		$result=$this->ArticleModel->fetch_blog($blogid);
		$cmt=$this->ArticleModel->fetch_cmt($blogid);
		$numlike=$this->ArticleModel->num_like($blogid);

		$data['result']=$result;
		$data['cmt']=$cmt;
		$data['numlike']=$numlike;
		
		// echo "<pre>";
		// print_r($data);
        

        $this->load->view('admin/blog_details',$data);
    }

    public function delete_comment()
    {
        $delete_id=$_POST['delete_id'];
        $del = $this->db->query("DELETE FROM `comment` WHERE `id`='$delete_id' " );
		
        if($del)
        {
            echo "deleted";
        }
        else
        {
            echo "Not DELETED";
        }
    }
}