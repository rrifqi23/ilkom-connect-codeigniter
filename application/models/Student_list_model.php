<?php

class Student_list_model extends CI_Model
{
	public function query()
	{
		$this->db->select('nama, nama_file_foto, kampus, jurusan, tahun_angkatan, username');
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get('accounts');

		return $query->result_array();

	}
}
