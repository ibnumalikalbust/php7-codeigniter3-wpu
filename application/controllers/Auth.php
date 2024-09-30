<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public $form_validation;
	public $input;
	public $db;
	public $session;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

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
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[3]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/signup');
			$this->load->view('templates/footer');
		} else {
			$slug = $this->input->post('name') . $this->input->post('email');
			$slug = preg_replace('/[^a-zA-Z]/', '', $slug);
			$slug = str_pad($slug, 20, 'x');
			$slug = substr($slug, 0, 20);
			$slug = strtolower($slug);
			$post['slug'] = $slug;
			$post['name'] = $this->input->post('name');
			$post['email'] = $this->input->post('email');
			$post['image'] = 'default.jpg';
			$post['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$post['role'] = 'member';
			$post['is_active'] = 1;
			$post['created_at'] = time();
			$this->db->insert('user', $post);
			$this->session->set_flashdata('message', 'Signup Success, Please Login!');
			redirect('auth/signin');
		}
	}

	public function signuppost()
	{
		var_dump($_REQUEST);
	}
}
