<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instalasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}

	public function migrasi()
	{
		$this->form_validation->set_rules('version', 'Versi Migrasi', 'required|numeric|trim');
		if ($this->form_validation->run() == true) {
			$version = $this->input->post('version', true);
			if (!$this->migration->current()) {
				$this->session->set_flashdata('alert', $this->migration->error_string());
			} else {
				if (!$this->migration->version($version)) {
					$this->session->set_flashdata('alert', $this->migration->error_string());
				} else {
					if ($version == $this->migration->current()) {
						$this->session->set_flashdata('alert', 'Sudah versi terbaru.');
					} else {
						$this->session->set_flashdata('alert', 'Berhasil migrasi.');
					}
				}
			}
			redirect(current_url());
		} else {
			$this->load->view('pages/instalasi/migrasi');
		}
	}
}
