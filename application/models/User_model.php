<?php 

class User_model extends CI_model
{
	public function jumlah_obat()
	{
		$hsl = $this->db->query("SELECT COUNT(*) as obat FROM obatmasuk WHERE qty > 0");
		return $hsl->row();
	}

	public function jumlah_pasien()
	{
		$hsl = $this->db->query("SELECT COUNT(*) as pasien FROM pasien");
		return $hsl->row();
	}

}