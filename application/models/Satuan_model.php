<?php 

class Satuan_model extends CI_model
{

	public function all_satuan()
	{
		$hsl = $this->db->query("SELECT * FROM satuan");
		return $hsl;
	}

	public function simpan()
	{
		$data = [ 
					'nama_satuan' 	=> htmlspecialchars($this->input->post('nama_satuan', true))
				];
		$this->db->insert('satuan',$data);
	}

	public function ubah()
	{
		$data = [ 
					'nama_satuan' 	=> htmlspecialchars($this->input->post('nama_satuan', true))
				];
		$this->db->where('id_satuan', $this->input->post('id_satuan'));
		$this->db->update('satuan',$data);
	}

	public function hapus()
    {
    	$this->db->where('satuan',$this->input->post('id_satuan'));
    	$this->db->delete('obat');

        $this->db->where('id_satuan',$this->input->post('id_satuan'));
        $this->db->delete('satuan');
    }


}