<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model("ArticleModel");
		//to restricte access from history
		if(!isset($_SESSION['user_id']))
		{
			redirect('admin/login');
		}
    }

	public function index()
	{	
		$result=$this->ArticleModel->fetch_all_articles();

		$userid= $_SESSION['user_id'];
		$userName=$this->ArticleModel->getUser($userid);
		
		$data['username']=$userName;
		$data['result']=$result;

		// echo "<pre>";
		// print_r($data);
		$this->load->view('blog_page',$data);
	}

	public function blog_details($blog_id)
	{
		$userid= $_SESSION['user_id'];
		$result=$this->ArticleModel->fetch_blog($blog_id);
		$cmt=$this->ArticleModel->fetch_cmt($blog_id);
		$like=$this->ArticleModel->fetch_like($blog_id);
		$numlike=$this->ArticleModel->num_like($blog_id);

		$data['user_id']=$userid;
		$data['result']=$result;
		$data['cmt']=$cmt;
		$data['like']=$like;
		$data['numlike']=$numlike;
		
		// echo "<pre>";
		// print_r($data);

		$this->load->view('blog_detail',$data);
	}

	public function add_comment()
	{
		$blogid= $this->input->post("blogid");
		$userid= $_SESSION['user_id'];
		$comment= $this->input->post("comment");

		$data_array= array(
			"blogid"=> $blogid,
			"userid"=> $userid,
			"comment"=> $comment
		);
		
		$response = $this->ArticleModel->add_comment($data_array);
	}

	public function like()
	{
		$blogid= $this->input->post("blogid");
		$userid= $_SESSION['user_id'];
		$liked= 1;
		
		$data_array= array(
			"blogid"=> $blogid,
			"userid"=> $userid,
			"liked"=> $liked
		);
		
		$response = $this->ArticleModel->like($data_array);
	}

	public function unlike()
	{
		$blogid= $this->input->post("blogid");
		$userid= $_SESSION['user_id'];

		$data_array= array(
			"blogid"=> $blogid,
			"userid"=> $userid
		);
		
		$response = $this->ArticleModel->unlike($data_array);
	}
}
