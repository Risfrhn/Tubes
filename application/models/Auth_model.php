<?php 

class Auth_model extends CI_model
{


	public function login()
	{
		$tanggal = date("Y-m-d");
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			
			if ($user['is_active'] == 1) {
				
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];					
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					}elseif ($user['role_id'] == 4) {
						redirect('pasien');
					} 
					else {
						redirect('user');
					}
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Wrong password!
						</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					This Email has not been activated!
					</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email is not registered!
				</div>');
			redirect('auth');	
		}
	}
	
}