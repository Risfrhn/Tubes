<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataobat extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Obatmasuk_model','obatmasuk');
	}

	public function index()
	{
		$data['title'] = 'Data Obat';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$qtyobatmasuk= $this->obatmasuk->all_dataobat();
		$data['obatmasuk'] = $qtyobatmasuk;

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/dataobat',$data);
		$this->load->view('templates/footer');

		
	}
}