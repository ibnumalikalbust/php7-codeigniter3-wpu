<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function index()
	{
		redirect('auth/signin');
	}

	public function signin()
	{
		$data['title'] = 'SIGNIN';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/signin');
		$this->load->view('templates/footer');
	}

	public function signup()
	{
		$data['title'] = 'SIGNUP';
		$this->load->view('templates/header', $data);
		$this->load->view('auth/signup');
		$this->load->view('templates/footer');
	}
}
