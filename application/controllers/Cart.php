<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index(){
		$data['cart'] = $this->session->userdata('cart') ?? [];
		$this->load->view('cart', $data);
	}

	public function atc() {
		$nama = $_GET['nama'];
		$id = $_GET['id'];
		$harga = $_GET['harga'];
		$action = $_GET['action'];

		$add = 1;
		if($this->session->userdata('cart')){
			$old_session = $this->session->userdata('cart');
			foreach($old_session as $index => $o_s){
				if($o_s['id'] == $id){
					if($action == 'kurangi'){
						$old_session[$index]['qty'] -= $add;
						if($old_session[$index]['qty'] <= 0){
							unset($old_session[$index]);							
						}
						$this->session->set_flashdata('msg', 'Sukses Kurangi Barang');
					} else {
						$old_session[$index]['qty'] += $add;
						$this->session->set_flashdata('msg', 'Sukses Tambah Barang');
					}			
					$this->session->set_userdata('cart', $old_session);
					//EXIT
					
					return redirect('/cart');
				}
			}
		}else{
			$old_session = [];
		}

		array_push($old_session, [
			"id" => $id,
			"nama" => $nama,
			"harga" => $harga,
			"qty" => 1
		]);

		$this->session->set_userdata('cart', $old_session);
		$this->session->set_flashdata('msg', 'Sukses Tambah ke Keranjang');
		return redirect('/cart');
	}
}
