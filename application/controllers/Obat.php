<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Obat_model','obat');
		$this->load->model('Satuan_model','satuan');
		$this->load->model('Kategori_model','kategori');

	}

	public function index()
	{
		$data['title'] = 'Obat';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();


		$data['kode'] = $this->obat->kode_obat();
		$data['obat'] = $this->obat->all_obat();
		$data['satuan'] = $this->satuan->all_satuan();
		$data['kategori'] = $this->kategori->all_kategori();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/obat',$data);
		$this->load->view('templates/footer');

	}

	public function simpanobat()
	{
		// $this->obat->simpan();
		// echo $this->session->set_flashdata('message','add');
		redirect('obat');
	}

	public function simpankategori()
	{
		$this->kategori->simpan();
		echo $this->session->set_flashdata('message','add');
		redirect('obat');
	}

	public function simpansatuan()
	{
		$this->satuan->simpan();
		echo $this->session->set_flashdata('message','add');
		redirect('obat');
	}

	public function ubahobat()
	{
		// $this->obat->ubah();
		// echo $this->session->set_flashdata('message','update');
		redirect('obat');
	}

	public function ubahkategori()
	{
		$this->kategori->ubah();
		echo $this->session->set_flashdata('message','update');
		redirect('obat');
	}

	public function ubahsatuan()
	{
		$this->satuan->ubah();
		echo $this->session->set_flashdata('message','update');
		redirect('obat');
	}

	public function hapusobat()
	{
		$this->obat->hapus();
		echo $this->session->set_flashdata('message','delete');
		redirect('obat');
	}

	public function hapuskategori()
	{
		$this->kategori->hapus();
		echo $this->session->set_flashdata('message','delete');
		redirect('obat');
	}

	public function hapussatuan()
	{
		$this->satuan->hapus();
		echo $this->session->set_flashdata('message','delete');
		redirect('obat');
	}


}