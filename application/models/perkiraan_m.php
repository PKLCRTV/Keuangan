<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perkiraan_m extends CI_Model
{
	public $tabel = "tbl_perkiraan";
	public $kode = "id_perkiraan";

	function selectAll()
	{
		$query = $this->db->get($this->$tabel);
		return $query->result();
	}

	function selectBy($field, $isi)
	{
		$this->db->where($field, $isi);
		$query = $this->db->get($this->$tabel);
		return $query->result();
	}

	function insert($data)
	{
		$query = $this->db->insert($this->$tabel, $data);
		return $query;
	}

	function update($data, $id)
	{
		$this->db->where($this->$kode, $id);
		$query = $this->db->update($this->$tabel,$data);
		return $query;
	}

	function delete($id)
	{
		$this->db->where($this->$kode,$id);
		$query = $this->db->delete($this->$tabel);
		return $query;
	}
}