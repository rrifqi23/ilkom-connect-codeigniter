<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}

}
