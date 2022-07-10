<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index(){
		$data['cart'] = $this->session->userdata('cart') ?? [];
		$data['province'] = $this->getProvince();
		$this->load->view('cart', $data);
	}

	public function checkout(){
		$user_id = $this->session->userdata('id');
		$alamat = $_POST['alamat'];
		$province_id = $_POST['province_id'];
		$city_id = $_POST['city_id'];
		$k = explode("|", $_POST['kurir']);
		$kurir = $k[0];
		$layanan_kurir = $k[1];
		$ongkir = $k[2];

		$data = [
			"user_id" => $user_id,
		];

		//INSERT
		$this->db->insert("pesanan", $data);
		$pesanan_id = $this->db->insert_id();

		$cart = $this->session->userdata('cart') ?? [];

		foreach($cart as $c){
			$datas = [
				"pesanan_id" => $pesanan_id,
				"barang_id" => $c['id'],
				"qty" => $c['qty'],
				"total" => $c['harga']*$c['qty']
			];

			$this->db->insert("item", $datas);

		}
		return redirect("/cart");
	}

	public function city(){
		$province_id = $_GET['province_id'];
		$city = $this->getCity($province_id);
		echo json_encode($city);
		return;
	}

	public function ongkir(){
		$city_id = $_GET['city_id'];
		$ongkir = $this->getOngkir($city_id);
		echo json_encode($ongkir);
		return;
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

	function getProvince(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ad4a60636c6cc99a5e0ed7b191618602"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return [];
		} else {
			$json = json_decode($response, true);
			return $json['rajaongkir']['results'];
		}
	}

	function getCity($province){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$province,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ad4a60636c6cc99a5e0ed7b191618602"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return [];
		} else {
			$json = json_decode($response, true);
			return $json['rajaongkir']['results'];
		}
	}

	function getOngkir($city){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=399&destination=".$city."&weight=1000&courier=jne",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: ad4a60636c6cc99a5e0ed7b191618602"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return [];
		} else {
			$json = json_decode($response, true);
			return $json['rajaongkir']['results'];
		}
	}
}
