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
		$validation->set_rules($pelapor->rulesLogin());

		if ($validation->run() == true) {
			$npm = $this->input->post('npm_pelapor', true);
			$password = $this->input->post('password_pelapor', true);

			$dataLogin = $this->db->get_where('pelapor', ['npm_pelapor' => $npm])->row();
			if ($dataLogin) {
				if ($dataLogin->status_pelapor > 0) {
					if (password_verify($password, $dataLogin->password_pelapor) == true) {
						$userPelapor = [
							'id_pelapor' => $dataLogin->id_pelapor,
							'npm_pelapor' => $dataLogin->npm_pelapor,
							'email_pelapor' => $dataLogin->email_pelapor
						];
						$this->session->set_userdata('userPelapor', $userPelapor);
						redirect('dashboard');
					} else {
						$this->session->set_flashdata('sessionEmail', $npm);
						$this->session->set_flashdata('alert', 'error|Login gagal. Kata sandi salah!');
						redirect(current_url());
					}
				} else {
					$this->session->set_flashdata('alert', 'error|Akun belum diverifikasi email!');
					redirect(current_url());
				}
			} else {
				$this->session->set_flashdata('alert', 'error|Akun tidak terdaftar!');
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
					'nama_pelapor' => htmlspecialchars($nama),
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
						'tipe_tokpel' => 'registration',
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

		$resultToken = $this->db->get_where('token_pelapor', ['emailpelapor_tokpel' => $email, 'token_tokpel' => $token])->row();

		if ($resultToken) {
			$this->db->where('email_pelapor', $email)->update('pelapor', ['status_pelapor' => 1]);
			$resultPelapor = $this->db->affected_rows();

			if ($resultPelapor > 0) {
				$this->db->delete('token_pelapor', ['emailpelapor_tokpel' => $email]);

				$this->session->set_flashdata('alert', 'success|Email akun Kamu berhasil diverifikasi. Silakan login.');
				redirect('auth');
			} else {
				$this->session->set_flashdata('alert', 'error|Gagal');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('alert', 'error|Token dan email tidak valid!');
			redirect('auth');
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

	public function forgot_password()
	{
		$data['title'] = 'Lupa Kata Sandi';

		$validation = $this->form_validation;
		$pelapor = $this->Pelapor_model;
		$validation->set_rules($pelapor->rulesResetPass());
		if ($validation->run() == true) {
			$npm = $this->input->post('npm_pelapor', true);
			$dataPelapor = $this->db->get_where('pelapor', ['npm_pelapor' => $npm])->row();

			$email = $dataPelapor->email_pelapor;

			$dataToken = [
				'emailpelapor_tokpel' => $email,
				'token_tokpel' => base64_encode(random_bytes(32)),
				'tipe_tokpel' => 'resetpassword',
				'created_tokpel' => date('Y-m-d H:i:s', now())
			];
			$dataEmail = [
				'nama' => $dataPelapor->nama_pelapor,
				'email' => $dataPelapor->email_pelapor,
				'token' => $dataToken['token_tokpel']
			];

			if ($dataPelapor) {
				$tokenExisting = $this->db->get_where('token_pelapor', ['emailpelapor_tokpel' => $email])->row();
				if ($tokenExisting->tipe_tokpel == 'resetpassword') {
					$this->db->delete('token_pelapor', ['emailpelapor_tokpel' => $email]);
				} elseif ($tokenExisting->tipe_tokpel == 'registration') {
					$this->session->set_flashdata('alert', 'error|Alamat email belum diverifikasi.');
					redirect('auth');
				}

				$emaildata = [
					'to' => $email,
					'subject' => 'Reset Kata Sandi',
					'message' => $this->load->view('email/resetPassEmail', $dataEmail, true)
				];
				$this->load->helper('sendmail_helper');
				$sendMail = sendmail($emaildata);

				if ($sendMail) {
					$this->db->insert('token_pelapor', $dataToken);
					$resultToken = $this->db->affected_rows();

					if ($resultToken > 0) {
						$this->session->set_flashdata('alert', 'success|Email reset berhasil dikirim. Cek inbox: ' . $email);
						redirect('auth');
					} else {
						$this->session->set_flashdata('alert', 'error|Token gagal digenerasi. Hubungi administrator.');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('alert', 'error|Email gagal terkirim. Hubungi administrator.');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('alert', 'error|Email tidak valid.');
				redirect('auth');
			}
		} else {
			$this->load->view('pages/auth/forgot-password', $data);
		}
	}

	public function reset_password()
	{
		if ($this->session->userPelapor) {
			redirect('dashboard');
		}

		$data['title'] = 'Lupa Kata Sandi';

		$email = $this->input->get('e', true);
		$token = $this->input->get('t', true);

		$resultToken = $this->db->get_where('token_pelapor', ['emailpelapor_tokpel' => $email, 'token_tokpel' => $token])->row();

		if ($resultToken) {
			$validation = $this->form_validation;
			$pelapor = $this->Pelapor_model;
			$validation->set_rules($pelapor->rulesNewPass());
			if ($validation->run() == true) {
				$password = $this->input->post('password_pelapor', true);
				$newPassword = password_hash($password, PASSWORD_DEFAULT);

				$this->db->where('email_pelapor', $email)->update('pelapor', ['password_pelapor' => $newPassword]);
				$resultPelapor = $this->db->affected_rows();

				if ($resultPelapor > 0) {
					$this->db->delete('token_pelapor', ['emailpelapor_tokpel' => $email]);

					$this->session->set_flashdata('alert', 'success|Kata sandi berhasil diganti. Silakan login.');
					redirect('auth');
				}
			} else {
				$this->load->view('pages/auth/reset-password', $data);
			}
		} else {
			$this->session->set_flashdata('alert', 'error|Token dan email tidak valid.');
			redirect('auth/forgot-password');
		}
	}
}
