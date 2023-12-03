<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Pasien_model','pasien');

	}

	public function index()
	{

		$data['title'] = 'Pasien';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['kode'] = $this->pasien->kode_pasien();
		$data['pasien'] = $this->pasien->all_pasien();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/pasien',$data);
		$this->load->view('templates/footer');

	}

	public function simpan()
	{
		// $this->pasien->simpan();
		// echo $this->session->set_flashdata('message','add');
		redirect('pasien');
	}

	public function ubah()
	{
		// $this->pasien->ubah();
		// echo $this->session->set_flashdata('message','update');
		redirect('pasien');
	}

	public function hapus()
	{
		// $this->pasien->hapus();
		// echo $this->session->set_flashdata('message','delete');
		redirect('pasien');
	}

	public function lap_pasien_hasil($kd_pasien)
	{
		$kd_pasien = decrypt_url($kd_pasien);
		$data['title'] = 'Pasien';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['pasien_byId'] = $this->pasien->pasien_byId($kd_pasien);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_pasien_hasil',$data);
		$this->load->view('templates/footer');
	}
}