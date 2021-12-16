<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('loggedin'))
		{
			redirect(base_url('Login'));
		}

	}

	public function index()
	{
		$tl = $this->session->userdata('tl');
		$info['tl'] = $this->profile_date_format($tl);

		$info['loggedin'] = $this->session->userdata('loggedin');
		$info['username'] = $this->session->userdata('username');

		$info['data_left'] = $this->data_left($info['tl']);
		$info['data_right'] = $this->data_right();
		$info['imgUrl'] = $this->session->userdata('imgUrl');

		$this->load->view('profile/profile', $info);

	}

	public function update()
	{
		$this->load->model('profile_model');

		if ($this->input->method() === 'post')
		{
			$update['email'] = $this->input->post('email');
			$update['nama'] = $this->input->post('nama');
			$update['nim'] = $this->input->post('nim');
			$update['bp'] = $this->input->post('bp');
			$update['tl'] = $this->input->post('tl');
			$update['sex'] = $this->input->post('sex');
			$update['t_angk'] = $this->input->post('t_angk');
			$update['address'] = $this->input->post('address');
			$update['jurusan'] = $this->input->post('jurusan');
			$update['kampus'] = $this->input->post('kampus');
			$update['phonenum'] = $this->input->post('phonenum');

			if ($this->profile_model->update($update)) {
				redirect(base_url('Profile'));
			}
		}
		else
		{
			$info['loggedin'] = $this->session->userdata('loggedin');
			$info['username'] = $this->session->userdata('username');

			$info['email'] = $this->session->userdata('email');
			$info['nama'] = $this->session->userdata('nama');
			$info['nim'] = $this->session->userdata('nim');
			$info['bp'] = $this->session->userdata('bp'); // Tempat Lahir (Birthplace)
			$info['tl'] = $this->session->userdata('tl'); // Tanggal Lahir
			$info['sex'] = $this->session->userdata('sex'); // Jenis-Kelamin
			$info['t_angk'] = $this->session->userdata('t_angk'); // Tahun Angkatan
			$info['address'] = $this->session->userdata('address'); // Alamat
			$info['jurusan'] = $this->session->userdata('jurusan'); // Jurusan
			$info['kampus'] = $this->session->userdata('kampus'); // Kampus
			$info['phonenum'] = $this->session->userdata('phonenum'); // Nomor Telepon
			$info['imgUrl'] = $this->session->userdata('imgUrl');
		}

		$this->load->view('profile/profile_update', $info);

	}

	// Fungsi menformat bulan angka jadi nama bulannya
	private function profile_date_format($date){
		$date_month = date('m',strtotime($date)); // Mengambil nilai bulan
		$all_month =
			array("Januari", "Februari", "Maret" ,"April" ,"Mei" ,"Juni",
				"Juli","Agustus","September","Oktober","November","Desember"); // daftar nama bulan berurutan

		$day = date('d',strtotime($date)); // Mengambil nilai hari
		$month = $all_month[$date_month - 1]; // Mengambil nama bulan berdasarkan nilai bulan - 1
		$year = date('Y',strtotime($date)); // Mengambil nilai tahun

		return $day . " " . $month . " " . $year;
	}

	private function tl_format ($date) {
		$formatted_date = date('Y-m-d',strtotime($date));
		return $formatted_date;
	}

	private function data_left ($tl) {
		return array(
			"Nama" => $this->session->userdata('nama'),
			"Tempat Tanggal Lahir" => $this->session->userdata('bp'). ", " . $tl,
			"Jenis Kelamin" => $this->session->userdata('sex'),
			"Nomor Telepon" => $this->session->userdata('phonenum'),
			"Alamat" => $this->session->userdata('address')
		);
	}

	private function data_right(){
		return array(
			"NIM" => $this->session->userdata('nim'),
			"Email" => $this->session->userdata('email'),
			"Tahun Angkatan" => $this->session->userdata('t_angk'),
			"Jurusan" => $this->session->userdata('jurusan'),
			"Kampus" => $this->session->userdata('kampus')
		);

	}

}
