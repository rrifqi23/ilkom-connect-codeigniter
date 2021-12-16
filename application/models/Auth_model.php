<?php

class Auth_model extends CI_Model
{
	private $_table = "accounts";
	const SESSION_KEY = 'id';

	public function login($username, $password)
	{
		$this->db->where('email', $username)->or_where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// Query data seluruhnya ke session
		$this->session->set_userdata([self::SESSION_KEY => $user->account_id]);

		$this->session->set_userdata('loggedin', true);
		$this->session->set_userdata('id', $user->account_id);
		$this->session->set_userdata('username', $user->username);
		$this->session->set_userdata('email', $user->email);
		$this->session->set_userdata('nama', $user->nama);
		$this->session->set_userdata('nim', $user->nim);
		$this->session->set_userdata('bp', $user->tempat_lahir); // Tempat Lahir (Birthplace
		$this->session->set_userdata('tl', $user->tanggal_lahir); // Tanggal Lahir
		$this->session->set_userdata('sex', $user->jenis_kelamin); // Jenis-Kelamin
		$this->session->set_userdata('t_angk', $user->tahun_angkatan); // Tahun Angkatan
		$this->session->set_userdata('address', $user->alamat); // Alamat
		$this->session->set_userdata('jurusan', $user->jurusan); // Jurusan
		$this->session->set_userdata('kampus', $user->kampus); // Kampus
		$this->session->set_userdata('phonenum', $user->no_telpon); // Nomor Telepon
		$this->session->set_userdata('imgUrl', $user->nama_file_foto) . "?=" . filemtime($user->nama_file_foto);

		return $this->session->has_userdata(self::SESSION_KEY);

	}

	public function logout()
	{
		$this->session->sess_destroy();
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}


