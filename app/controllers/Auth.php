<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Instansi_model');
		$this->load->model('Katlap_model');
		$this->load->model('Laporan_model');
		$this->load->model('Pelapor_model');
	}

	public function index()
	{
		if ($this->session->userPelapor) {
			redirect('dashboard');
		}

		if ($this->input->get('go') == 'back') {
			$this->session->unset_userdata('laporan');
			$this->session->set_flashdata('alert', 'info|Silakan login dan isi laporan lagi jika ingin mengirim.');
			redirect(current_url());
		}

		$data['title'] = 'Login Akun';

		$validation = $this->form_validation;
		$pelapor = $this->Pelapor_model;
		$validation->set_rules($pelapor->rules_login());

		if ($validation->run() == true) {
			$email = $this->input->post('email_pelapor', true);
			$password = $this->input->post('password_pelapor', true);

			$dataLogin = $this->db->get_where('pelapor', ['email_pelapor' => $email])->row();
			if ($dataLogin) {
				if (password_verify($password, $dataLogin->password_pelapor) == true) {
					$userPelapor = [
						'id_pelapor' => $dataLogin->id_pelapor,
						'email_pelapor' => $dataLogin->email_pelapor
					];
					$this->session->set_userdata('userPelapor', $userPelapor);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('sessionEmail', $email);
					$this->session->set_flashdata('alert', 'error|Login gagal. Kata sandi salah!');
					redirect(current_url());
				}
			} else {
				$this->session->set_flashdata('alert', 'error|Alamat email tidak terdaftar!');
				redirect(current_url());
			}
		} else {
			$this->load->view('pages/auth/login', $data);
		}
	}

	public function daftar()
	{
		if ($this->session->userPelapor) {
			redirect('dashboard');
		}

		$data['title'] = 'Daftar Akun';

		$validation = $this->form_validation;
		$pelapor = $this->Pelapor_model;
		$validation->set_rules($pelapor->rules());

		if ($validation->run() == true) {
			$email = $this->input->post('email_pelapor', true);
			$nama = $this->input->post('nama_pelapor', true);

			$dataEmail = [
				'nama' => $nama,
				'email' => $email,
				'token' => base64_encode(random_bytes(32))
			];
			$emaildata = [
				'to' => $email,
				'subject' => 'Verifikasi Akun Kawal',
				'message' => $this->load->view('email/verifEmail', $dataEmail, true)
			];

			$this->load->helper('sendmail_helper');
			$sendMail = sendmail($emaildata);

			if ($sendMail) {
				$dataPelapor = [
					'nama_pelapor' => $nama,
					'email_pelapor' => $email,
					'password_pelapor' => password_hash($this->input->post('password_pelapor', true), PASSWORD_DEFAULT),
					'npm_pelapor' => $this->input->post('npm_pelapor', true),
					'kontak_pelapor' => $this->input->post('kontak_pelapor'),
					'created_pelapor' => date('Y-m-d H:i:s', now()),
					'updated_pelapor' => date('Y-m-d H:i:s', now()),
					'status_pelapor' => 0
				];

				$this->db->insert('pelapor', $dataPelapor);
				$resultPelapor = $this->db->affected_rows();

				if ($resultPelapor > 0) {
					$dataToken = [
						'emailpelapor_tokpel' => $email,
						'token_tokpel' => $dataEmail['token'],
						'created_tokpel' => date('Y-m-d H:i:s', now())
					];

					$this->db->insert('token_pelapor', $dataToken);
					$resultToken = $this->db->affected_rows();

					if ($resultToken > 0) {
						$this->session->set_flashdata('alert', 'success|Pendaftaran berhasil. Cek inbox Kamu untuk verifikasi email.');
						redirect('auth');
					} else {
						$errCode = '(x003)';
					}
				} else {
					$errCode = '(x002)';
				}
			} else {
				$errCode = '(x004)';
			}

			$this->session->set_flashdata('alert', 'error|Pendaftaran gagal. Coba lagi atau hubungi administrator. ' . $errCode);
			redirect(current_url());
		} else {
			$this->load->view('pages/auth/register', $data);
		}
	}

	public function email_verify()
	{
		if ($this->session->userPelapor) {
			redirect('dashboard');
		}

		$email = $this->input->get('e', true);
		$token = $this->input->get('t', true);
		if (!empty($email) && !empty($token)) {
			$resultToken = $this->db->get_where('token_pelapor', ['emailpelapor_tokpel' => $email, 'token_tokpel' => $token]);

			if ($resultToken) {
				$this->db->where('email_pelapor', $email)->update('pelapor', ['status_pelapor' => 1]);
				$resultPelapor = $this->db->affected_rows();

				if ($resultPelapor > 0) {
					$this->db->delete('token_pelapor', ['emailpelapor_tokpel' => $email]);

					$this->session->set_flashdata('alert', 'success|Email akun Kamu berhasil diverifikasi. Silakan login.');
					redirect('auth');
				} else {
					$errCode = '(x001)';
				}
			} else {
				$errCode = '(x000)';
			}

			$this->session->set_flashdata('alert', 'error|Token tidak valid! ' . $errCode);
			redirect(current_url());
		} else {
			show_404();
		}
	}

	public function logout()
	{
		$userPelapor = $this->session->userPelapor;
		if (!empty($userPelapor)) {
			$this->session->unset_userdata('userPelapor');
			$this->session->set_flashdata('alert', 'success|Logout berhasil!');
		}

		redirect('auth');
	}
}
