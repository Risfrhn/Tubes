<?php 

class Laporan_model extends CI_model
{
	public function stok()
	{
		$hsl = $this->db->query("SELECT * FROM view_lap_persediaan");
		return $hsl;
	}

	public function persediaan()
	{
		$hsl = $this->db->query("SELECT * FROM view_lap_persediaan");
		return $hsl;
	}

	public function stokfifo()
	{
		$hsl = $this->db->query("
			SELECT
				obat.kd_obat,
				obat.nama_obat,
				satuan.nama_satuan,
				obatmasuk.qty AS qty_obatmasuk,
				SUM(obatkeluar.qty) AS qty_obatkeluar,
				stok.qty AS qty_stok
			FROM
				obat 
					LEFT JOIN satuan ON obat.satuan=satuan.id_satuan
					LEFT JOIN obatmasuk ON obatmasuk.kd_obat = obat.kd_obat
					LEFT JOIN obatkeluar ON obatkeluar.kd_obat = obat.kd_obat
					LEFT JOIN stok ON stok.kd_obat = obat.kd_obat
			WHERE
				obatmasuk.qty > 0  && stok.qty > 0
			GROUP BY obat.kd_obat
			");
		return $hsl;
	}

	public function obat()
	{
		$hsl = $this->db->query("SELECT * FROM view_lap_obat");
		return $hsl;
	}

	public function obatmasuk($tgl1, $tgl2)
	{
		$hsl = $this->db->query("
			SELECT * FROM view_lap_obatmasuk WHERE tgl_obatmasuk BETWEEN '$tgl1' AND '$tgl2' 
			");
		return $hsl;
	}
	
	public function obatkeluar($tgl1, $tgl2)
	{
		$hsl = $this->db->query("
			SELECT * FROM view_lap_obatkeluar WHERE tgl_obatkeluar BETWEEN '$tgl1' AND '$tgl2'
			");
		return $hsl;
	}

	public function pasien()
	{
		$hsl = $this->db->query("SELECT * FROM view_lap_pasien");
		return $hsl;
	}

	public function kadaluarsa($tgl1, $tgl2)
	{
		$hsl = $this->db->query("SELECT * FROM kadaluarsa WHERE tgl_keluar BETWEEN '$tgl1' AND '$tgl2'");
		return $hsl;
	}

}