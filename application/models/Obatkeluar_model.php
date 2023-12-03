<?php 

class Obatkeluar_model extends CI_model
{

	public function all_obatkeluar()
	{
		$hsl = $this->db->query("SELECT obatkeluar.id_obatkeluar, obatkeluar.tgl_obatkeluar, obatkeluar.qty, obatkeluar.nama_petugas, pasien.nama_pasien, obat.nama_obat
			FROM (obatkeluar LEFT JOIN pasien ON obatkeluar.kd_pasien=pasien.kd_pasien)
			LEFT JOIN obat ON obatkeluar.kd_obat=obat.kd_obat ORDER BY obatkeluar.id_obatkeluar DESC");
		return $hsl;
	}

	public function simpan()
	{
		$user = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data = [ 
			'kd_pasien' 		=> htmlspecialchars($this->input->post('kd_pasien', true)),
			'kd_obat'			=> htmlspecialchars($this->input->post('kd_obat', true)),
			'tgl_obatkeluar'	=> htmlspecialchars($this->input->post('tgl_obatkeluar', true)),
			'qty'				=> htmlspecialchars($this->input->post('qty', true)),
			'nama_petugas' => $user['name']
		];
		$this->db->insert('obatkeluar',$data);
	}

	public function hapus()
	{
		$this->db->where('id_obatkeluar',$this->input->post('id_obatkeluar'));
		$this->db->delete('obatkeluar');
	}


}