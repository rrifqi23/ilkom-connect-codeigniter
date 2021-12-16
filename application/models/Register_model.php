<?php

class Register_model extends CI_Model
{
	private $_table = "accounts";
	const SESSION_KEY = 'id';

	public function rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => "required|regex_match[/^[a-zA-Z-` ]*$/]"
			],
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => "required|regex_match[/^[0-9a-zA-Z_.]*$/]|is_unique[accounts.username]"
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => "required|valid_emails|is_unique[accounts.email]"
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => "required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/]"
			],
			[
				'field' => 'confirmPassword',
				'label' => 'Confirm Password',
				'rules' => "required|matches[password]"
			]
		];
	}

	public function register($register_data)
	{
		$data = array(
			'nama' => $register_data['nama'],
			'email' => $register_data['email'],
			'username' => $register_data['username'],
			'password' => $register_data['password']
		);

		if ($this->db->insert('accounts', $data))
		{
			$this->db->where('email', $register_data['email'])->or_where('username', $register_data['username']);
			$query = $this->db->get($this->_table);
			$account = $query->row();

			$this->session->set_userdata([self::SESSION_KEY => $account->account_id]);

			$this->session->set_userdata('loggedin', true);
			$this->session->set_userdata('id', $account->account_id);
			$this->session->set_userdata('username', $account->username);
			$this->session->set_userdata('email', $account->email);
			$this->session->set_userdata('nama', $account->nama);
			$this->session->set_userdata('nim', $account->nim);
			$this->session->set_userdata('bp', $account->tempat_lahir); // Tempat Lahir (Birthplace
			$this->session->set_userdata('tl', $account->tanggal_lahir); // Tanggal Lahir
			$this->session->set_userdata('sex', $account->jenis_kelamin); // Jenis-Kelamin
			$this->session->set_userdata('t_angk', $account->tahun_angkatan); // Tahun Angkatan
			$this->session->set_userdata('address', $account->alamat); // Alamat
			$this->session->set_userdata('jurusan', $account->jurusan); // Jurusan
			$this->session->set_userdata('kampus', $account->kampus); // Kampus
			$this->session->set_userdata('phonenum', $account->no_telpon); // Nomor Telepon
			$this->session->set_userdata('imgUrl', 'assets/images/other/blank.png') . "?=" . filemtime('assets/images/other/blank.png');

			return $this->session->has_userdata(self::SESSION_KEY);
		}
		else
		{
			$this->session->set_flashdata('message_register_error', 'register gagal dilakukan');
			return false;
		}

	}
}
