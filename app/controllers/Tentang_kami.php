<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang_kami extends CI_Controller
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
		# declare data
		$data['instansiList'] = $this->Instansi_model->getAll();
		$data['katlapList'] = $this->Katlap_model->getAll();
		$data['laporanList'] = $this->Laporan_model->getAll();

		# load view
		$data['title'] = 'Tentang Kami';
		$this->load->view('pages/guest/about-us', $data);
	}
}
