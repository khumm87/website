<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class C_panel extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_panel');
		$this->load->library('form_validation');
	}

	function index(){
		$data	= array(
			'title' => '.:: Login Administrator::.',
			'error' => '',
		);
		$this->load->view('admin_view/login', $data);
	}

	function auth(){
		if ($_POST) {
			
			$username	= $this->input->post('username');
			$password	= $this->input->post('password');
			
			$auth		= $this->M_panel->login("where username = '$username' and password= '$password'")->result_array();
			if($auth != NULL)
			{
				$data = array(
					'username'		=> $auth[0]['username'],
					'email'			=> $auth[0]['email'],
				);
				$this->session->set_userdata('login',$data);
				redirect('panel/home');
			}

			else 
			{
				$data = array(
					'title'			=> '.:: Eror Login :  Login Adminisrator Koroku CMS ::.',
					'error'			=> '
					  	<div class="box-body">
				            <div class="alert alert-danger alert-dismissable">
				                <i class="fa fa-ban"></i>
				                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				                <b>Kesalahan!</b>Periksa Kembali Username / Password Anda.
				            </div>
			        	</div>
					',
				);
				$this->load->view('admin_view/login',$data);
			}
		}
		else 
		{
			echo "Page not found";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}