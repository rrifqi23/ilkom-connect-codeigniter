<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_list extends CI_Controller {

	public function index()
	{
		$this->load->model('student_list_model');

		$info['loggedin'] = $this->session->userdata('loggedin');
		$info['username'] = $this->session->userdata('username');
		$info['imgUrl'] = $this->session->userdata('imgUrl');

		$info['datalist'] = $this->student_list_model->query();

		$this->load->view('student_list', $info);


	}
}
