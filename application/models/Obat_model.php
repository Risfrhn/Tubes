<?php 

class Obat_model extends CI_model
{

	public function kode_obat()   
    {
      $this->db->select('RIGHT(obat.kd_obat,5) as kode', FALSE);
      $this->db->order_by('kd_obat','DESC');    
      $this->db->limit(1);    
          $query = $this->db->get('obat');      //cek dulu apakah ada sudah ada kode di tabel.    
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
          $kodejadi = "OB-".$kodemax;    // hasilnya OB-00001 dst.
          return $kodejadi;  
    }

	public function all_obat()
	{
		$hsl = $this->db->query("SELECT * FROM obat");
		return $hsl;
	}

	public function simpan()
	{
		$data = [ 
					'kd_obat' 		=> htmlspecialchars($this->input->post('kd_obat', true)),
					'nama_obat'		=> htmlspecialchars($this->input->post('nama_obat', true)),
					'kategori'		=> htmlspecialchars($this->input->post('kategori', true)),
					'satuan'		=> htmlspecialchars($this->input->post('satuan', true)),
					'kegunaan'		=> htmlspecialchars($this->input->post('kegunaan', true))
				];
		$this->db->insert('obat',$data);
	}

	public function ubah()
	{
		$data = [ 
					'nama_obat'		=> htmlspecialchars($this->input->post('nama_obat', true)),
					'kategori'		=> htmlspecialchars($this->input->post('kategori', true)),
					'satuan'		=> htmlspecialchars($this->input->post('satuan', true)),
					'kegunaan'		=> htmlspecialchars($this->input->post('kegunaan', true))
				];
		$this->db->where('kd_obat', $this->input->post('kd_obat'));
		$this->db->update('obat',$data);
	}

	public function hapus()
    {
        $this->db->where('kd_obat',$this->input->post('kd_obat'));
        $this->db->delete('obat');
    }

    public function stok()
    {
    	$hsl = $this->db->query("SELECT * FROM stok");
		return $hsl;
    }

	

}