<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	public $session;
	public $db;

	public function index()
	{
		$userEmail = $this->session->userdata('email');
		if ($userEmail) {
			$user = $this->db->get_where('user', ['email' => $userEmail])->row_array();
			$userName = $user['name'];
			echo "Selamat Datang $userName";
		} else {
			$this->session->set_flashdata('message', 'Please Login First!');
			redirect('auth/signin');
		}
	}
}
