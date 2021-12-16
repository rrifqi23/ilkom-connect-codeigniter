<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$info = $this->check_session();

		$this->load->view('main', $info);
	}

	private function check_session()
	{
		$info['loggedin'] = $this->session->userdata('loggedin');
		$info['username'] = $this->session->userdata('username');
		$info['nama'] = $this->session->userdata('nama');
		$info['imgUrl'] = $this->session->userdata('imgUrl');

		return $info;
	}
}
