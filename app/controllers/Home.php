<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# load model
		$this->load->model('instansi_model');
		$this->load->model('katlap_model');
		$this->load->model('laporan_model');
	}

	public function index()
	{
		/* Logical Process => 
		There are two major types of Laporan, which are Aspirasi and Pengaduan.
		Aspirasi handles laporan without lokasi_lapor. Pengaduan handles laporan with
		lokasi lapor.
		After that, there are two kind of parameters. First is ANONIM. If user ENABLED it,
		data directly stored to the database without any further, If user DISABLED it,
		they have to login first or input they identity.
		Second is RAHASIA. If user ENABLED it, laporan won't show at announcement page. If
		user DISABLED it, laporan will show at announcement page.
		*/


		# declare data
		$data['instansiList'] = $this->instansi_model->getAll();
		$data['katlapList'] = $this->katlap_model->getAll();
		$data['laporanList'] = $this->laporan_model->getAll();

		# validation of link
		$url_string = $this->input->get('tipe', true);
		if ($url_string != '' && $url_string != 'pengaduan') {
			show_404();
		}

		# form validation
		$laporan = $this->laporan_model;
		$validation = $this->form_validation;
		if ($url_string == '') {
			$validation->set_rules($laporan->rules_aspirasi());
		} else {
			$validation->set_rules($laporan->rules_pengaduan());
		}

		# processing input data
		if ($validation->run() == true) {
			$isAnonim = $this->input->post('anonim_lapor');
			if (!$isAnonim) {
				# save to the session
				$laporan->save_isAnonim(false);

				# echo alert and redirect
				$alert = [
					'title' => 'Lengkapi Data',
					'desc' => 'Silakan lengkapi data agar kami dapat menghubungi ketika laporan telah ditindaklanjuti',
					'type' => 'info'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect('home/auth');
			} else {
				# save to the database
				$laporan->save_isAnonim();

				# show alert if database affected
				if ($laporan->affected()) {
					$alert = [
						'title' => 'Berhasil Terkirim!',
						'desc' => 'Laporan Kamu akan kami proses maksimal 3x24 jam.',
						'type' => 'success'
					];
				} else {
					$alert = [
						'title' => 'Gagal Terkirim!',
						'desc' => 'Laporan Kamu gagal kami proses. Silakan coba lagi. (x001)',
						'type' => 'error'
					];
				}
				$this->session->set_flashdata('alert', $alert);
				redirect(current_url());
			}
		} else {
			# load view
			$this->load->view('pages/guest/home', $data);
		}
	}

	public function auth()
	{
		# checking of session
		if (empty($this->session->laporan)) {
			show_404();
		}

		# define data property
		$data['title'] = 'Lengkapi Data';


		$validation = $this->form_validation;
		$laporan = $this->laporan_model;
		$validation->set_rules($laporan->rules_lengkapi());

		if ($validation->run() == true) {
			# define for sending email
			$emailUser = $this->input->post('email_lapor', true);

			# config email
			$this->load->library('email');
			$config = array();
			$config['protocol']       = getenv('mail.Protocol');
			$config['smtp_host']      = getenv('mail.Host');
			$config['smtp_user']      = getenv('mail.User');
			$config['smtp_pass']      = getenv('mail.Password');
			$config['smtp_port']      = getenv('mail.Port');
			$config['mailtype']       = 'html';
			$config['charset']        = 'utf-8';
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->from(getenv('mail.User'), getenv('mail.Profile'));
			$this->email->to($emailUser);
			$this->email->subject('Laporan Sedang Diproses');
			$this->email->message('Laporan kamu sedang diproses');

			# sending email function
			if ($this->email->send()) {
				$alert = [
					'title' => 'Berhasil Terkirim!',
					'desc' => 'Laporan Kamu akan kami proses maksimal 3x24 jam.',
					'type' => 'success'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect('/');
			} else {
				$alert = [
					'title' => 'Gagal Terkirim!',
					'desc' => 'Laporan Kamu gagal kami proses. Silakan coba lagi. (x002)',
					'type' => 'error'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect(current_url());
			}
		} else {
			# load view
			$this->load->view('pages/guest/home_auth', $data);
		}
	}
}

/* List of error code =>
(x001) : Database IS NOT affected or error when trying to input data to database.
(x002) : Email couldn't send due to error when sending email.
*/