<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('BarangModel');
	}
	public function index() {
		$data["data_barang"] = $this->BarangModel->getAll();
		$this->load->view('home', $data);
	}
	public function Login(){
		$this->load->view('login');
	}
}

