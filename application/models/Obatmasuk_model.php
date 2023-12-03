<?php 

class Obatmasuk_model extends CI_model
{

	public function all_obatmasuk()
	{
		$hsl = $this->db->query("
			SELECT obatmasuk.id_obatmasuk, obatmasuk.kd_obat, obat.nama_obat, stok.qty from (obatmasuk LEFT JOIN obat ON obatmasuk.kd_obat=obat.kd_obat) LEFT JOIN stok ON obatmasuk.kd_obat=stok.kd_obat WHERE stok.qty > 0 GROUP BY kd_obat
			");
		return $hsl;
	}

	public function all_dataobat()
	{
		$hsl = $this->db->query("
			SELECT obatmasuk.id_obatmasuk, obatmasuk.kd_obat, obat.nama_obat, satuan.nama_satuan, stok.qty from (obatmasuk LEFT JOIN obat ON obatmasuk.kd_obat=obat.kd_obat) LEFT JOIN stok ON obatmasuk.kd_obat=stok.kd_obat LEFT JOIN satuan ON obat.satuan=satuan.id_satuan WHERE stok.qty > 0 GROUP BY kd_obat
			");
		return $hsl;
	}

	public function obatmasuk()
	{
		$hsl = $this->db->query("SELECT * FROM obat, obatmasuk WHERE obat.kd_obat=obatmasuk.kd_obat");
		return $hsl;
	}

	public function simpan()
	{
		$user = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data = [ 
			'kd_obat' 		=> htmlspecialchars($this->input->post('kd_obat', true)),
			'tgl_obatmasuk'	=> htmlspecialchars($this->input->post('tgl_obatmasuk', true)),
			'tgl_expired'		=> htmlspecialchars($this->input->post('tgl_expired', true)),
			'qty'		=> htmlspecialchars($this->input->post('qty', true)),
			'nama_petugas' => $user['name']
		];
		$this->db->insert('obatmasuk',$data);
		
	}

	public function hapus()
	{
		$this->db->where('id_obatmasuk',$this->input->post('id_obatmasuk'));
		$this->db->delete('obatmasuk');

		$this->db->where('kd_obat',$this->input->post('kd_obat'));
		$this->db->delete('stok');

		$this->db->where('kd_obat',$this->input->post('kd_obat'));
		$this->db->delete('obatkeluar');
	}


}