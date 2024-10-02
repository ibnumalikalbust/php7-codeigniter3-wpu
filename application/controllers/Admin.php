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
			$data['user'] = $this->db->get_where('user', ['email' => $userEmail])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('admin/index');
			$this->load->view('templates/footer');
		} else {
			$this->session->set_flashdata('message', 'Please Login First!');
			redirect('auth/signin');
		}
	}
}
