<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Admin_model','admin');
		$this->load->model('Obat_model','obat');
		$this->load->model('Pasien_model','pasien');
		$this->load->model('Laporan_model','laporan');
	}

	public function index()
	{
		
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$queryobat=  $this->admin->jumlah_obat();
		$data['obat']=$queryobat->obat;

		$querypasien=  $this->admin->jumlah_pasien();
		$data['pasien']=$querypasien->pasien;


		$notifikasi = $this->admin->notifikasi();
		$msg="";
		foreach ($notifikasi->result_array() as $n)
		{
			$kd_obat = $n['kd_obat'];
			$qty = $n['qty'];
			$selisih = $n['selisih'];

			if($selisih > 0 && $selisih <30)
			{
				$sc_msg[1] = '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><strong>Peringatan !!!</strong></h4>
				<p>Kode obat <strong>'.$kd_obat.'</strong> mendekati tanggal kadaluarsa </p>
				</div>
				';
				foreach  ($sc_msg as $sm)
				{
					$msg .= $sm;
					$this->session->set_flashdata('kadaluarsa', $msg);
				}
			} elseif ($selisih <= 0) {
				$sc_msg[1] = '
				<div class="alert alert-danger alert-dismissable" id="success-alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><strong>Peringatan !!!</strong></h4>
				<p>Kode obat <strong>'.$kd_obat.'</strong> telah kadaluarsa </p>
				</div>
				';
				foreach  ($sc_msg as $sm)
				{
					$msg .= $sm;
					$this->session->set_flashdata('kadaluarsa', $msg);
				}
			} 
		}

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');

	}

	public function user()
	{
		$data['title'] = 'Config User';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$this->db->where('id !=', 1);
		$data['config'] = $this->admin->getUser();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/configuser',$data);
		$this->load->view('templates/footer');

	}

	public function addUser()
	{

		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['name'] = $this->admin->getUser();


		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);

		$this->db->where('id !=', 1);
		$data['config'] = $this->admin->getUser();

		if($this->form_validation->run()==false)
		{
			$data['title'] = 'Config User';
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/configuser',$data);
			$this->load->view('templates/footer');

		} else {
			$this->admin->add();
			$this->session->set_flashdata('message', 'add');
			redirect('admin/user');
		}
	}

	public function deleteUser($id)
	{
		$id = decrypt_url($id);
		$this->admin->delete($id);
		$this->session->set_flashdata('message', 'delete');
		redirect('admin/user');
	}

	public function aktifUser($id)
	{
		$id = decrypt_url($id);
		$this->admin->getUserById($id);
		$this->admin->aktif($id);
		$this->session->set_flashdata('message', 'useraktif');
		redirect('admin/user');
	}

	public function nonaktifUser($id)
	{
		$id = decrypt_url($id);
		$this->admin->getUserById($id);
		$this->admin->nonaktif($id);
		$this->session->set_flashdata('message', 'usernonaktif');
		redirect('admin/user');
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
			$this->load->view('admin/changepassword',$data);
			$this->load->view('templates/footer');

		} else {

			$currentpassword = $this->input->post('currentpassword');
			$newpassword = $this->input->post('newpassword1');

			if(!password_verify($currentpassword, $data['user']['password'])) {
				$this->session->set_flashdata('password', 'Wrong current password');
				redirect('admin/changepassword');
			} else {
				if($currentpassword == $newpassword){
					$this->session->set_flashdata('password', 'New password cannot be the same as current password');
					redirect('admin/changepassword');
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

	public function lap_stok()
	{
		$data['title'] = 'Laporan Stok';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['stokfifo'] = $this->laporan->stokfifo();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_stok',$data);
		$this->load->view('templates/footer');
	}

	public function lap_kadaluarsa()
	{
		$data['title'] = 'Laporan Kadaluarsa';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_kadaluarsa',$data);
		$this->load->view('templates/footer');
	}

	public function lap_kadaluarsa_hasil()
	{
		$tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');

		$data['title'] = 'Laporan Kadaluarsa';
		$data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();

		$data['hasildata'] = $this->laporan->kadaluarsa($tgl1,$tgl2);
		$data['date1'] = $tgl1;
		$data['date2'] = $tgl2;

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/lap_kadaluarsa_hasil',$data);
		$this->load->view('templates/footer');
	}
}