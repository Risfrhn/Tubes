<?php 

class Kategori_model extends CI_model
{

	public function all_kategori()
	{
		$hsl = $this->db->query("SELECT * FROM kategori");
		return $hsl;
	}

	public function simpan()
	{
		$data = [ 
					'nama_kategori' 	=> htmlspecialchars($this->input->post('nama_kategori', true))
				];
		$this->db->insert('kategori',$data);
	}

	public function ubah()
	{
		$data = [ 
					'nama_kategori' 	=> htmlspecialchars($this->input->post('nama_kategori', true))
				];

		$this->db->where('id_kategori', $this->input->post('id_kategori'));
		$this->db->update('kategori',$data);
	}

	public function hapus()
    {
    	$this->db->where('kategori',$this->input->post('id_kategori'));
    	$this->db->delete('obat');

        $this->db->where('id_kategori',$this->input->post('id_kategori'));
        $this->db->delete('kategori');
    }

}