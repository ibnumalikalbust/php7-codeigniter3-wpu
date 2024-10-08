<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public $session;
	public $db;

	public function index()
	{
		$userEmail = $this->session->userdata('email');
		if ($userEmail) {
			$data['title'] = 'Dashboard';
			$data['user'] = $this->db->get_where('auth_user', ['email' => $userEmail])->row_array();
			$this->load->view('dashboard/header', $data);
			$this->load->view('dashboard/sidebar');
			$this->load->view('dashboard/navbar');
			$this->load->view('dashboard/profile');
			$this->load->view('dashboard/footer');
		} else {
			$this->session->set_flashdata('message', 'Please Login First!');
			redirect('auth/signin');
		}
	}
}
