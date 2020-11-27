<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# load model
		$this->load->model('Instansi_model');
		$this->load->model('Katlap_model');
		$this->load->model('Laporan_model');
	}

	public function index()
	{
		# define data property
		$data['title'] = 'Login Akun';

		# form validation
		$validation = $this->form_validation;
		$laporan = $this->Laporan_model;
		$validation->set_rules($laporan->rules_lengkapi());

		if ($validation->run() == true) {
			# define for sending email
			$emaildata = [
				'to' => $this->input->post('email_lapor', true),
				'subject' => 'Laporan Sedang Diproses',
				'message' => 'Tracking laporan'
			];

			# sending email
			$this->load->helper('sendmail_helper');
			$sendMail = sendmail($emaildata);
			if ($sendMail) {
				# save data to database
				$laporan->save();

				# show alert if database affected
				if ($laporan->affected()) {
					$alert = [
						'title' => 'Berhasil Terkirim!',
						'text' => 'Laporan Kamu akan kami proses maksimal 3x24 jam.',
						'type' => 'success'
					];
				} else {
					$alert = [
						'title' => 'Gagal Terkirim!',
						'text' => 'Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. (x003)',
						'type' => 'error'
					];
				}
				$this->session->unset_userdata('laporan');
				$this->session->set_flashdata('alert', $alert);
				redirect('/');
			} else {
				$alert = [
					'title' => 'Gagal Terkirim!',
					'text' => 'Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. (x002)',
					'type' => 'error'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect(current_url());
			}
		} else {
			# load view
			$this->load->view('pages/auth/login', $data);
		}
	}

	public function daftar()
	{
		# define data property
		$data['title'] = 'Daftar Akun';

		# form validation
		$validation = $this->form_validation;
		$laporan = $this->Laporan_model;
		$validation->set_rules($laporan->rules_lengkapi());

		if ($validation->run() == true) {
			# define for sending email
			$emaildata = [
				'to' => $this->input->post('email_lapor', true),
				'subject' => 'Laporan Sedang Diproses',
				'message' => 'Tracking laporan'
			];

			# sending email
			$this->load->helper('sendmail_helper');
			$sendMail = sendmail($emaildata);
			if ($sendMail) {
				# save data to database
				$laporan->save();

				# show alert if database affected
				if ($laporan->affected()) {
					$alert = [
						'title' => 'Berhasil Terkirim!',
						'text' => 'Laporan Kamu akan kami proses maksimal 3x24 jam.',
						'type' => 'success'
					];
				} else {
					$alert = [
						'title' => 'Gagal Terkirim!',
						'text' => 'Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. (x003)',
						'type' => 'error'
					];
				}
				$this->session->unset_userdata('laporan');
				$this->session->set_flashdata('alert', $alert);
				redirect('/');
			} else {
				$alert = [
					'title' => 'Gagal Terkirim!',
					'text' => 'Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. (x002)',
					'type' => 'error'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect(current_url());
			}
		} else {
			# load view
			$this->load->view('pages/auth/register', $data);
		}
	}
}
