<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadaluarsa extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kadaluarsa_model','kadaluarsa');
	}

	public function index()
	{

		$data['title'] = 'Obat Kadaluarsa';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['expired'] = $this->kadaluarsa->kadaluarsa();
		$data['kadaluarsa'] = $this->kadaluarsa->all();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/kadaluarsa',$data);
		$this->load->view('templates/footer');

	}

	public function simpan()
	{
		$jumlah_keluar = $this->input->post('jumlah_keluar');
		$qty = $this->input->post('qty');

		if ($jumlah_keluar > $qty) {
			echo $this->session->set_flashdata('message','stok');
		} else {
			$this->kadaluarsa->simpan();
			echo $this->session->set_flashdata('message','add');
		}
		
		redirect('kadaluarsa');
	}
}