<?php
defined('BASEPATH') or exit('No direct script access allowed'); 

class BarangModel extends CI_Model {
	private $table = 'barang';
	public function getById($id)
  {
    return $this->db->get_where($this->table, ["id" => $id])->row();
  }
	public function getAll()
  {
    $this->db->from($this->table);
    $this->db->order_by("id");
    $query = $this->db->get();
    return $query->result();
  }
}

?>
