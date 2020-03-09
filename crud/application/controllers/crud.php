<?php 
 
class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}

	//menampilkan data dari tabel user pada database yang telah di konfigurasi pada application/config/database.php
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
    }
    
    //menampilkan form tambah data user
    function tambah(){
		$this->load->view('v_input');
	}
	
    //mengambil data yang diinputkan dan menyimpan ke tabel user
    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    
    //menghapus data user berdasarkan id yang dipilih
    function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    
    //menampilkan form edit data user dengan membawa data user berdasarkan id yang dipilih
    function edit($id){
	$where = array('id' => $id);
	$data['user'] = $this->m_data->edit_data($where,'user')->result();
	$this->load->view('v_edit',$data);
    }

	//mengambil data yang diinputkan dan menyimpan ke tabel user
    function update(){
	$id = $this->input->post('id');
	$nama = $this->input->post('nama');
	$alamat = $this->input->post('alamat');
	$pekerjaan = $this->input->post('pekerjaan');
 
	$data = array(
		'nama' => $nama,
		'alamat' => $alamat,
		'pekerjaan' => $pekerjaan
	);
 
	$where = array(
		'id' => $id
	);
 
	$this->m_data->update_data($where,$data,'user');
	redirect('crud/index');
}

}