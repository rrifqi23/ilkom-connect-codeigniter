<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('loggedin'))
		{
			redirect(base_url('Profile'));
		}
	}

	public function index()
	{
		$this->load->library('form_validation');

		$info['loggedin'] = $this->session->userdata('loggedin');
		$info['username'] = $this->session->userdata('username');

		if ($this->input->method() === 'post')
		{
			$this->load->model('register_model');

			$rules = $this->register_model->rules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == FALSE) {
				return $this->load->view('register', $info);
			}

			$register['username'] = $this->input->post('username');
			$register['email'] = $this->input->post('email');
			$register['nama'] = $this->input->post('nama');
			$register['password'] = $this->input->post('password');
			$register['confirmPassword'] = $this->input->post('confirmPassword');

			if ($this->register_model->register($register))
			{
				redirect(base_url());
			}
		}

		$this->load->view('register', $info);
	}
}

