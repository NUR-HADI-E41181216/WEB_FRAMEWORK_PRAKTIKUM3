<?php 

class M_data extends CI_Model{

    //menampilkan semua data user
    function tampil_data(){
		return $this->db->get('user');
    }
    
    //menambah data user
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    //menghapus data user
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //mengambil data user yang akan di edit
    function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
    }

    //mengupdate data user sesuai inputan
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
	}	

}