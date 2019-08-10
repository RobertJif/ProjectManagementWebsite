<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_project');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	public function index()
	{


		$this->load->view('login.php');
	}
	
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->m_project->prosesLogin($username,$password);
		$hasil = count($cek);

		if($hasil > 0){
			$select = $this->db->get_where('user', array('username' => $username, 'password' => $password))->row();

			$data = array ('logged_in' => true,
			'id' => $select->id,
			'username' => $select->username,
			'job_title' => $select->job_title,
			'name' => $select->name);
			$this->session->set_userdata($data);

	redirect('ProjectCharter/detailsystem');
		}
	else
		{
	redirect('Welcome/index');
		}
	}

	function logout(){
		$this->session->sess_destroy();
	redirect('Welcome/index');
	  }
}
