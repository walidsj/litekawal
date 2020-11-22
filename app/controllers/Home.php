<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('instansi_model');
		$this->load->model('katlap_model');
		$this->load->model('laporan_model');
	}

	public function index()
	{
		# strict user bomb with false link
		$url_string = $this->input->get('tipe', true);
		if ($url_string != '' && $url_string != 'pengaduan') {
			show_404();
		}

		# declare data
		$data['instansiList'] = $this->instansi_model->getAll();
		$data['katlapList'] = $this->katlap_model->getAll();

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
		} else {
			# load view
			$this->load->view('pages/guest/home', $data);
		}
	}
}
