<?php 

class Admin_model extends CI_model
{
	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}
	
	public function getUser()
	{
		return $this->db->get('user')->result_array();
	}

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

	public function add()
	{
		$data = [
				'name' => htmlspecialchars($this->input->post('name',true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'password' => password_hash(1234, PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0
			];
			$this->db->insert('user', $data);
	}

	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user');
	}

	public function aktif($id)
	{
		$data = [
			"is_active" => 1
		];

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function nonaktif($id)
	{
		$data = [
			"is_active" => 0
		];

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	public function notifikasi()
	{
		$hsl = $this->db->query("SELECT id_obatmasuk, obatmasuk.kd_obat, stok.qty, tgl_expired, CURRENT_DATE() AS tgl_skrg, DATEDIFF(tgl_expired, CURRENT_DATE()) AS selisih FROM obatmasuk LEFT JOIN stok ON obatmasuk.kd_obat = stok.kd_obat WHERE stok.qty > 0 GROUP BY obatmasuk.kd_obat");
		return $hsl;
	}
}