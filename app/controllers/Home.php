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
			if (!$isAnonim) { // when input IS NOT anonim
				# save to the session
				$laporan->save_isAnonim(false);

				# echo alert and redirect
				$alert = [
					'title' => 'Lengkapi Data',
					'desc' => 'Silakan lengkapi data sebelum melanjutkan',
					'type' => 'info'
				];
				$this->session->set_flashdata('alert', $alert);
				redirect('home/auth');
			} else { // when input IS anonim
				# save to the database
				$laporan->save_isAnonim();

				# show alert if database affected
				if ($laporan->affected()) { // when database IS affected
					$alert = [
						'title' => 'Berhasil Terkirim!',
						'desc' => 'Laporan Kamu akan kami proses maksimal 3x24 jam.',
						'type' => 'success'
					];
				} else { // when database IS NOT affected
					$alert = [
						'title' => 'Gagal Terkirim!',
						'desc' => 'Laporan Kamu gagal kami proses. Silakan coba lagi. (x001)',
						'type' => 'error'
					];
				}
				# echo alert and redirect
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
		# define data property
		$data['title'] = 'Lengkapi Data';

		# load view
		$this->load->view('pages/guest/home', $data);
	}
}

/* List of error code =>
(x001) : Database IS NOT affected or error when trying to input data to database
*/