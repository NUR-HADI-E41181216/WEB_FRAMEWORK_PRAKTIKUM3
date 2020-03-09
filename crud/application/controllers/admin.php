<?php 

class Admin extends CI_Controller{

	//eksekusi paling awal untuk memastikan halaman ini hanya bisa di akses setelah login
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->view('v_admin');
	}
}