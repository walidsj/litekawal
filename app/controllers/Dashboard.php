<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userPelapor) {
			redirect('auth');
		} else {
			$this->userPelapor = $this->db->get_where('pelapor', $this->session->userPelapor)->row();
		}
	}
	public function index()
	{
		$this->load->model('Laporan_model');

		$data['title'] = 'Dasbor Pelapor';

		$data['instansiList'] = $this->db->order_by('nama_instansi', 'ASC')->get_where('instansi', ['status_instansi' => 1])->result();
		$data['instansiUserList'] = $this->db->join('instansi', 'instansi.id_instansi = laporan.instansi_lapor')->order_by('nama_instansi', 'ASC')->group_by('instansi.id_instansi')->get_where('laporan', ['status_instansi' => 1, 'idpelapor_lapor' => $this->userPelapor->id_pelapor])->result();
		$data['katlapList'] = $this->db->order_by('judul_katlap', 'ASC')->get_where('kategori_laporan', ['status_katlap' => 1])->result();
		$data['katinsList'] = $this->db->order_by('judul_katins', 'ASC')->get_where('kategori_instansi', ['status_katins' => 1])->result();

		$tipe_lapor = $this->input->post('tipe_lapor', true);

		$laporan = $this->Laporan_model;
		$validation = $this->form_validation;
		if ($tipe_lapor == 'aspirasi') {
			$validation->set_rules($laporan->rules_aspirasi());
		} elseif ($tipe_lapor == 'pengaduan') {
			$validation->set_rules($laporan->rules_pengaduan());
		}

		if ($validation->run() == true) {
			$isAnonim = $this->input->post('anonim_lapor', true);
			$isRahasia = $this->input->post('rahasia_lapor', true);

			$itemLapor = [
				'tipe_lapor' => ($tipe_lapor == 'aspirasi') ? 1 : 2,
				'kode_lapor' => strtoupper(uniqid()),
				'slug_lapor' => strlen(url_title(htmlspecialchars($this->input->post('judul_lapor', true)), 'dash', true)) > 255 ? substr(url_title(htmlspecialchars($this->input->post('judul_lapor', true)), 'dash', true), 0, 255) : url_title(htmlspecialchars($this->input->post('judul_lapor', true)), 'dash', true),
				'judul_lapor' => htmlspecialchars($this->input->post('judul_lapor', true)),
				'isi_lapor' => htmlspecialchars($this->input->post('isi_lapor', true)),
				'tanggal_lapor' => date('Y-m-d H:i:s', now()),
				'kejadian_lapor' => htmlspecialchars($this->input->post('kejadian_lapor', true)),
				'lokasi_lapor' => htmlspecialchars($this->input->post('lokasi_lapor', true)),
				'instansi_lapor' => $this->input->post('instansi_lapor', true),
				'kategori_lapor' => $this->input->post('kategori_lapor', true),
				'lampiran_lapor' => $this->input->post('lampiran_lapor', true),
				'anonim_lapor' => (!empty($isAnonim)) ? 1 : 0,
				'rahasia_lapor' => (!empty($isRahasia)) ? 1 : 0,
				'idpelapor_lapor' => $this->userPelapor->id_pelapor,
				'status_lapor' => 0
			];

			$emaildata = [
				'to' => $this->userPelapor->email_pelapor,
				'subject' => 'Laporan #' . $itemLapor['kode_lapor'] . ' Sedang Diproses',
				'message' => $this->load->view('email/trackingLaporan', $itemLapor, true)
			];

			$this->load->helper('sendmail_helper');
			$sendMail = sendmail($emaildata);

			if ($sendMail) {
				$this->db->insert('laporan', $itemLapor);
				$laporanResult = $this->db->affected_rows();

				if ($laporanResult > 0) {
					$this->session->set_flashdata('alert', 'success|Laporan berhasil dikirim, tracking bisa dilakukan via dasbor atau email.');
					redirect(current_url());
				} else {
					$this->session->set_flashdata('alert', 'error|Laporan gagal dikirim, silakan coba lagi atau hubungi administrator. (x002)');
					redirect(current_url());
				}
			} else {
				$this->session->set_flashdata('alert', 'error|Laporan gagal dikirim, silakan coba lagi atau hubungi administrator. (x001)');
				redirect(current_url());
			}
		} else {
			$data['laporanList'] = $this->db->join('instansi', 'instansi.id_instansi = laporan.instansi_lapor')->join('kategori_laporan', 'kategori_laporan.id_katlap = laporan.kategori_lapor')->where('idpelapor_lapor', $this->userPelapor->id_pelapor)->order_by('tanggal_lapor', 'DESC')->get('laporan')->result();

			$this->load->view('pages/client/dashboardPage', $data);
		}
	}
}

/* list of error
x001 email tidak terkirim
x002 data tidak masuk ke database
*/