<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->model('auth_model');

		if ($this->input->method() === 'post')
		{
			$username = $this->input->post('user');
			$password = $this->input->post('password');

			if ($this->auth_model->login($username, $password)){
				redirect(site_url());
			} else {
				$this->session->set_flashdata('message_login_error', 'Username dan/atau password salah!');
			}
		}

		$this->load->view('login');

	}

}
