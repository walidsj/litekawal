<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		# load model
		$this->load->model('Instansi_model');
		$this->load->model('Katlap_model');
		$this->load->model('Katins_model');
		$this->load->model('Laporan_model');
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
		$data['instansiList'] = $this->Instansi_model->getAll();
		$data['katlapList'] = $this->Katlap_model->getAll();
		$data['laporanList'] = $this->Laporan_model->getAll();
		$data['katinsList'] = $this->Katins_model->getOn();

		# checking of session
		if (!empty($this->session->laporan)) {
			$alert = [
				'title' => 'Lengkapi Data',
				'text' => 'Silakan lengkapi data agar kami dapat menghubungi Kamu ketika laporan telah ditindaklanjuti',
				'type' => 'info'
			];
			$this->session->set_flashdata('alert', $alert);
			redirect('home/next-step');
		}

		# validation of link
		$url_string = $this->input->get('tipe', true);
		if ($url_string != '' && $url_string != 'pengaduan') {
			show_404();
		}

		# form validation
		$laporan = $this->Laporan_model;
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
					'text' => 'Silakan lengkapi data agar kami dapat menghubungi Kamu ketika laporan telah ditindaklanjuti',
					'type' => 'info'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect('home/next-step');
			} else {
				# save to the database
				$laporan->save_isAnonim();

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
						'text' => 'Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. (x001)',
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

	public function next_step()
	{
		# clear session to home
		if ($this->input->get('go') == 'back') {
			$alert = [
				'title' => 'Laporan Dibatalkan',
				'text' => 'Laporan Kamu berhasil dibatalkan. Isi laporan lagi jika ingin mengirim.',
				'type' => 'success'
			];
			$this->session->unset_userdata('laporan');
			$this->session->set_flashdata('alert', $alert);
			redirect('/');
		}

		# checking of session
		if (empty($this->session->laporan)) {
			redirect('/');
		}

		# define data property
		$data['title'] = 'Lengkapi Data';

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
			$this->load->view('pages/guest/next-step', $data);
		}
	}

	public function tentang_kami()
	{
		# load view
		$data['title'] = 'Tentang Kami';
		$this->load->view('pages/guest/about-us', $data);
	}

	public function daftar_instansi()
	{
		# declare data
		$data['instansiList'] = $this->Instansi_model->getAll();

		# load view
		$data['title'] = 'Daftar Instansi';
		$this->load->view('pages/guest/instansiPage', $data);
	}
}

/* List of error code =>
(x001) : Database IS NOT affected when trying to input data. (IS ANONIM)
(x002) : Email couldn't send due to error when sending email.
(x003) : Database IS NOT affected when trying to input data. (ISNOT ANONIM)
*/