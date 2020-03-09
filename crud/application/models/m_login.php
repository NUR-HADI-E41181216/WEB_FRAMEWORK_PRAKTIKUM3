<?php 

class M_login extends CI_Model{	
	//mengambil data admin dari tabel admin dalam database yang telah kita konfigursi di database.php
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}