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
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/signin');
			$this->load->view('templates/footer');
		} else {
			$this->_signinProcess();
		}
	}

	private function _signinProcess()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('auth_user', ['email' => $email])->row_array();
		if ($user) {
			$userActive = $user['is_active'];
			if($userActive == 1) {
				$passForm = $password;
				$passBase = $user['password'];
				$isCorrectPassword = password_verify($passForm, $passBase);
				if ($isCorrectPassword) {
					$userEmail = $user['email'];
					$userRole = $user['auth_role_slug'];
					$userData['email'] = $userEmail;
					$userData['role'] = $userRole;
					$this->session->set_userdata($userData);
					if ($userRole == 'admin') {
						redirect('admin');
					} else {
						redirect('member');
					}
				} else {
					$this->session->set_flashdata('message', 'Wrong Password!');
					redirect('auth/signin');
				}
			} else {
				$this->session->set_flashdata('message', 'Email Has Not Been Activated!');
				redirect('auth/signin');
			}
		} else {
			$this->session->set_flashdata('message', 'Email Not Registered!');
			redirect('auth/signin');
		}
	}

	public function signup()
	{
		$data['title'] = 'SIGNUP';
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[auth_user.email]');
		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[3]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('auth/signup');
			$this->load->view('templates/footer');
		} else {
			$this->_signupProcess();
		}
	}

	private function _signupProcess()
	{
		$slug = $this->input->post('name') . $this->input->post('email');
		$slug = preg_replace('/[^a-zA-Z]/', '', $slug);
		$slug = str_pad($slug, 20, 'x');
		$slug = substr($slug, 0, 20);
		$slug = strtolower($slug);
		$post['slug'] = $slug;
		$post['name'] = htmlspecialchars($this->input->post('name', true));
		$post['email'] = htmlspecialchars($this->input->post('email', true));
		$post['image'] = 'default.jpg';
		$post['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
		$post['auth_role_slug'] = 'member';
		$post['is_active'] = 1;
		$post['created_at'] = time();
		$this->db->insert('auth_user', $post);
		$this->session->set_flashdata('message', 'Signup Success, Please Login!');
		redirect('auth/signin');
	}

	public function signout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', 'You Have Been Logout');
		redirect('auth/signin');
	}
}
