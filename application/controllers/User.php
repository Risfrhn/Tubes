<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('User_model','user');
		$this->load->model('Obat_model','obat');
		$this->load->model('Laporan_model','laporan');
		$this->load->model('Pasien_model','pasien');
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$queryobat=  $this->user->jumlah_obat();
		$data['obat']=$queryobat->obat;

		$querypasien=  $this->user->jumlah_pasien();
		$data['pasien']=$querypasien->pasien;

		$notifikasis = $this->obat->stok();
		$msg="";
		foreach($notifikasis->result_array() as $n) 	{
			$kd_obats = $n['kd_obat'];
			$qty = $n['qty'];

			if ($qty > 0 && $qty < 100)
			{
				$sc_msg[1] = '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><strong>Peringatan !!!</strong></h4>
				<p>Kode obat <strong>'.$kd_obats.'</strong> mendekati habis </p>
				</div>
				';
				foreach  ($sc_msg as $sm)
				{
					$msg .= $sm;
					$this->session->set_flashdata('stok', $msg);
				}

			}
			elseif ($qty <= 0)
			{
				$sc_msg[1] = '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><strong>Peringatan !!!</strong></h4>
				<p>Kode obat <strong>'.$kd_obats.'</strong> habis </p>
				</div>
				';
				foreach  ($sc_msg as $sm)
				{
					$msg .= $sm;
					$this->session->set_flashdata('stok', $msg);
				}
			}
		}
		

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');

	}
	
	public function changepassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('currentpassword', 'Current password', 'required|trim');
		$this->form_validation->set_rules('newpassword1', 'New password', 'required|trim|min_length[3]|matches[newpassword2]');
		$this->form_validation->set_rules('newpassword2', 'Repeat new password', 'required|trim|min_length[3]|matches[newpassword1]');

		if($this->form_validation->run() == false){

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/changepassword',$data);
			$this->load->view('templates/footer');
		} else {

			$currentpassword = $this->input->post('currentpassword');
			$newpassword = $this->input->post('newpassword1');

			if(!password_verify($currentpassword, $data['user']['password'])) {
				$this->session->set_flashdata('password', 'Wrong current password');
				redirect('user/changepassword');
			} else {
				if($currentpassword == $newpassword){
					$this->session->set_flashdata('password', 'New password cannot be the same as current password');
					redirect('user/changepassword');
				} else {
					$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', 'Password changed');
					redirect('auth/logout');
				}
			}
		}
	}

	public function lap_persediaan()
	{
		$data['title'] = 'Laporan Persediaan';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['persediaan'] = $this->laporan->persediaan();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_persediaan',$data);
		$this->load->view('templates/footer');
	}

	public function lap_obatmasuk()
	{
		$data['title'] = 'Laporan Obat Masuk';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_obatmasuk',$data);
		$this->load->view('templates/footer');
	}

	public function lap_obatmasuk_hasil()
	{
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['title'] = 'Laporan Obat Masuk';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['hasildata'] = $this->laporan->obatmasuk($tgl1,$tgl2);
		$data['date1'] = $tgl1;
		$data['date2'] = $tgl2;

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_obatmasuk_hasil',$data);
		$this->load->view('templates/footer');
	}

	public function lap_obatkeluar()
	{
		$data['title'] = 'Laporan Obat Keluar';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_obatkeluar',$data);
		$this->load->view('templates/footer');
	}

	public function lap_obatkeluar_hasil()
	{
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['title'] = 'Laporan Obat Keluar';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['hasildata'] = $this->laporan->obatkeluar($tgl1,$tgl2);
		$data['date1'] = $tgl1;
		$data['date2'] = $tgl2;

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_obatkeluar_hasil',$data);
		$this->load->view('templates/footer');
	}

	public function lap_pasien()
	{
		$data['title'] = 'Laporan Pasien';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['pasien'] = $this->pasien->all_pasien();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_pasien',$data);
		$this->load->view('templates/footer');

	}

}