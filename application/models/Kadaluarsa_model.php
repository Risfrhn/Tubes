<?php 

class Kadaluarsa_model extends CI_model
{
	public function kadaluarsa()
	{
		$hsl = $this->db->query("SELECT obat.kd_obat, obat.nama_obat, stok.qty FROM obat LEFT JOIN stok ON obat.kd_obat = stok.kd_obat WHERE stok.qty >0");
		return $hsl;
	}

	public function all()
	{
		$hsl = $this->db->query("SELECT * FROM kadaluarsa");
		return $hsl;
	}

	public function simpan()
	{
		$data = [
			'kd_obat' => $this->input->post('kd_obat'),
			'tgl_keluar' => date('Y-m-d'),
			'qty' => $this->input->post('jumlah_keluar'),
		];
		$this->db->insert('kadaluarsa',$data);
	}
}