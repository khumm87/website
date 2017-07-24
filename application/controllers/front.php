<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('form_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$this->load->view('front_page/navbar');
	}
}
