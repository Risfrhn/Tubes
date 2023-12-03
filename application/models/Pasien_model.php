<?php 

class Pasien_model extends CI_model
{

	public function kode_pasien()   
    {
      $this->db->select('RIGHT(pasien.kd_pasien,5) as kode', FALSE);
      $this->db->order_by('kd_pasien','DESC');    
      $this->db->limit(1);    
          $query = $this->db->get('pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
           //jika kode ternyata sudah ada.      
             $data = $query->row();      
             $kode = intval($data->kode) + 1;    
         }
         else {      
           //jika kode belum ada      
             $kode = 1;    
         }
          $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
          $kodejadi = "PS-".$kodemax;    // hasilnya PS-00001 dst.
          return $kodejadi;  
    }

	public function all_pasien()
	{
		$hsl = $this->db->query("SELECT * FROM pasien");
		return $hsl;
	}

  public function pasien_byId($kd_pasien)
  {
    $hsl = $this->db->query("SELECT * FROM pasien WHERE kd_pasien = '$kd_pasien'");
    return $hsl;
  }

	public function simpan()
	{
		$data = [ 
					'kd_pasien' 	=> htmlspecialchars($this->input->post('kd_pasien', true)),
					'nama_pasien'	=> htmlspecialchars($this->input->post('nama_pasien', true)),
					'alamat'		=> htmlspecialchars($this->input->post('alamat', true)),
					'no_rekam'		=> htmlspecialchars($this->input->post('no_rekam', true))
				];
		$this->db->insert('pasien',$data);
	}

  public function ubah()
  {
    $data = [
          'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien', true)),
          'alamat'    => htmlspecialchars($this->input->post('alamat', true)),
          'no_rekam'    => htmlspecialchars($this->input->post('no_rekam', true))
        ];
    $this->db->where('kd_pasien', $this->input->post('kd_pasien'));
    $this->db->update('pasien',$data);
  }

  public function hapus()
    {
      $this->db->where('kd_pasien',$this->input->post('kd_pasien'));
      $this->db->delete('obatkeluar');

      $this->db->where('kd_pasien',$this->input->post('kd_pasien'));
      $this->db->delete('pasien');
    }

}