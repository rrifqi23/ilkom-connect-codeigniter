<?php

class Profile_model extends CI_Model
{

	public function update($update_data)
	{
		$id = $this->session->userdata('id');

		$config['file_name']      = $id;
		$config['upload_path']    = './assets/images/pfp/';
		$config['allowed_types']  = 'jpeg|jpg|png';
		$config['max_size']       = 1024;
		$config['overwrite']      = true;

		$this->load->library('upload', $config);

		if (!empty($_FILES['photo']['name']))
		{
			if (!$this->upload->do_upload('photo'))
			{
				$this->session->set_flashdata('upload_error', 'foto gagal diupload');
				return false;
			}
			else
			{
				$photo_ext = $this->upload->data('file_ext');

				$uploaded_path = 'assets/images/pfp/' . $id . $photo_ext;
				$this->session->set_userdata('imgUrl', $uploaded_path . "?=" . filemtime($uploaded_path));

				$sql = 'UPDATE accounts SET nama_file_foto = ? WHERE account_id = ?;';
				$this->db->query($sql, array($uploaded_path, $id));
			}
		}

		$data = array(
			'nama' => $update_data['nama'],
			'nim' => $update_data['nim'],
			'email' => $update_data['email'],
			'tempat_lahir' => $update_data['bp'],
			'tanggal_lahir' => $update_data['tl'],
			'jenis_kelamin' => $update_data['sex'],
			'no_telpon' => $update_data['phonenum'],
			'alamat' => $update_data['address'],
			'tahun_angkatan' => $update_data['t_angk'],
			'jurusan' => $update_data['jurusan'],
			'kampus' => $update_data['kampus']
		);

		if ($this->db->where('account_id', $id) AND ($this->db->update('accounts', $data)))
		{
			$this->session->set_userdata('email', $update_data['email']);
			$this->session->set_userdata('nama', $update_data['nama']);
			$this->session->set_userdata('nim', $update_data['nim']);
			$this->session->set_userdata('bp', $update_data['bp']); // Tempat Lahir (Birthplace
			$this->session->set_userdata('tl', $update_data['tl']); // Tanggal Lahir
			$this->session->set_userdata('sex', $update_data['sex']); // Jenis-Kelamin
			$this->session->set_userdata('t_angk', $update_data['t_angk']); // Tahun Angkatan
			$this->session->set_userdata('address', $update_data['address']); // Alamat
			$this->session->set_userdata('jurusan', $update_data['jurusan']); // Jurusan
			$this->session->set_userdata('kampus', $update_data['kampus']); // Kampus
			$this->session->set_userdata('phonenum', $update_data['phonenum']); // Nomor Telepon`

			return true;
		}
		else
		{
			$this->session->set_flashdata('message_update_error', 'Update gagal dilakukan');
			return false;
		}



	}

}
