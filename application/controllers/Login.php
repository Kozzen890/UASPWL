<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index(){
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
		if($this->form_validation->run() == false){
			$this->load->view('login');
		}else{
			$username = $this->input->post('name');
			$password = $this->input->post('password');

			$user = $this->db->where("username", $username)->get("user")->result();

			if(count($user) <= 0){
				$this->load->view('login');
				return;
			}

			if(!password_verify($password, $user[0]->password)){
				$this->load->view('login');
				return;
			}

			$session_data = [
				"id" => $user[0]->id,
				"username" => $user[0]->username
			];

			$this->session->set_userdata($session_data);

			return redirect('/cart');
		}
	}


	public function register(){
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

		if($this->form_validation->run() == false){
			$this->load->view('register');
		} else {
			$data = [
				'username' => $this->input->post('name'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];
			$this->db->insert('user', $data);
			redirect("login");
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect("login");
	}
}
