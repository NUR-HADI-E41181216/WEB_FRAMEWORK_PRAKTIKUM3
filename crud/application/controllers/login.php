<?php 

class Login extends CI_Controller{

	//dijalankan paling awal, menuju view login
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		//menangkap data yang di inputkan pada form login di v_login dan menyimpanya ke variabel sementara
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//menyimpan data ke array pada variabel $where
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		//mengecek ada atau tidaknya data dari tabel admin yang sesuai dengan data yang disimpan di $where
		//mencari function cek_login pada model m_login
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			
			//jika data ada maka status = login
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			
			//menuju ke controller admin
			redirect(base_url("admin"));

		}else{

			//jika data tidak ada
			echo "Username dan password salah !";
		}
	}
	
	//untuk logout maka perlu menghapus session login
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
    }
    
    
}