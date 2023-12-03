<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatkeluar extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_model','pasien');
		$this->load->model('Obatmasuk_model','obatmasuk');
		$this->load->model('Obatkeluar_model','obatkeluar');
		$this->load->model('Obat_model','obat');

	}

	public function index()
	{
		$stok = $this->input->post('stok');
		$qty = $this->input->post('qty');

		$data['title'] = 'Obat Keluar';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['pasien'] = $this->pasien->all_pasien();

		$qtyobatmasuk= $this->obatmasuk->all_obatmasuk();
		$data['obatmasuk'] = $qtyobatmasuk;


		$data['obatkeluar'] = $this->obatkeluar->all_obatkeluar();
		$data['obat'] = $this->obat->all_obat();

		$this->form_validation->set_rules('kd_pasien', 'Kode Pasien', 'required');
		$this->form_validation->set_rules('kd_obat', 'Kode Obat', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/obatkeluar',$data);
			$this->load->view('templates/footer');
		} elseif ($stok < $qty) {
			echo $this->session->set_flashdata('message','stok');
			redirect('obatkeluar');
		} else {
			$this->obatkeluar->simpan();
			echo $this->session->set_flashdata('message','add');
			redirect('obatkeluar');
		}

	}

	public function hapus()
	{
		$this->obatkeluar->hapus();
		echo $this->session->set_flashdata('message','delete');
		redirect('obatkeluar');
	}

}