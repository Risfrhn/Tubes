<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatmasuk extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Obat_model','obat');
		$this->load->model('Satuan_model','satuan');
		$this->load->model('Kategori_model','kategori');
		$this->load->model('Obatmasuk_model','obatmasuk');

	}

	public function index()
	{

		$data['title'] = 'Obat Masuk';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['obat'] = $this->obat->all_obat();
		$data['satuan'] = $this->satuan->all_satuan();
		$data['kategori'] = $this->kategori->all_kategori();
		$data['obatmasuk'] = $this->obatmasuk->obatmasuk();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/obatmasuk',$data);
		$this->load->view('templates/footer');

	}

	public function simpan()
	{
		$this->obatmasuk->simpan();
		echo $this->session->set_flashdata('message','add');
		redirect('obatmasuk');
	}

	public function hapus()
	{
		$this->obatmasuk->hapus();
		echo $this->session->set_flashdata('message','delete');
		redirect('obatmasuk');
	}
}