<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userPelapor) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->load->model('Laporan_model');

		$data['instansiList'] = $this->db->order_by('nama_instansi', 'ASC')->get_where('instansi', ['status_instansi' => 1])->result();
		$data['katlapList'] = $this->db->order_by('judul_katlap', 'ASC')->get_where('kategori_laporan', ['status_katlap' => 1])->result();
		$data['katinsList'] = $this->db->order_by('judul_katins', 'ASC')->get_where('kategori_instansi', ['status_katins' => 1])->result();
		$data['laporanList'] = $this->db->get('laporan')->result();

		if (!empty($this->session->laporan)) {
			$this->session->set_flashdata('alert', 'info|Silakan lengkapi data agar kami dapat menghubungi Kamu ketika laporan telah ditindaklanjuti');
			redirect('home/next-step');
		}

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
				'status_lapor' => 1
			];
			$this->session->set_userdata('laporan', $itemLapor);

			$this->session->set_flashdata('alert', 'info|Silakan lengkapi data agar kami dapat menghubungi Kamu ketika laporan telah ditindaklanjuti');
			redirect('home/next-step');
		} else {
			$this->load->view('pages/guest/home', $data);
		}
	}

	public function next_step()
	{
		$this->load->model('Pelapor_model');

		$data['title'] = 'Lengkapi Data';

		if ($this->input->get('go') == 'back') {
			$this->session->unset_userdata('laporan');
			$this->session->set_flashdata('alert', 'success|Laporan Kamu berhasil dibatalkan. Isi laporan lagi jika ingin mengirim.');
			redirect('/');
		}

		if (empty($this->session->laporan)) {
			redirect('/');
		}

		$validation = $this->form_validation;
		$pelapor = $this->Pelapor_model;
		$validation->set_rules($pelapor->rules());

		if ($validation->run() == true) {
			$email = $this->input->post('email_pelapor', true);
			$emaildata = [
				'to' => $email,
				'subject' => 'Laporan Sedang Diproses',
				'message' => 'Tracking laporan'
			];

			$this->load->helper('sendmail_helper');
			$sendMail = sendmail($emaildata);

			if ($sendMail) {
				$dataPelapor = [
					'nama_pelapor' => $this->input->post('nama_pelapor', true),
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
					$getPelapor = $this->db->get_where('pelapor', ['email_pelapor' => $email])->row();
					$dataLaporan = array_merge(['idpelapor_lapor' => $getPelapor->id_pelapor], $this->session->laporan);

					$this->db->insert('laporan', $dataLaporan);
					$laporanResult = $this->db->affected_rows();

					if ($laporanResult > 0) {
						$this->session->unset_userdata('laporan');
						$this->session->set_flashdata('alert', 'success|Laporan terkirim dan akun Kamu telah dibuat. Login dengan akun Kamu jika kirim laporan lagi.');
						redirect('/');
					} else {
						$errCode = '(x004)';
					}
				} else {
					$errCode = '(x003)';
				}
			} else {
				$errCode = '(x002)';
			}

			$this->session->set_flashdata('alert', 'error|Laporan Kamu gagal kami proses. Silakan coba lagi atau hubungi tim kami. ' . $errCode);
			redirect(current_url());
		} else {
			$this->load->view('pages/guest/next-step', $data);
		}
	}

	public function tentang_kami()
	{
		$data['title'] = 'Tentang Kami';

		$this->load->view('pages/guest/about-us', $data);
	}

	public function daftar_instansi()
	{
		$data['title'] = 'Daftar Instansi';

		$data['instansiList'] = $this->db->order_by('nama_instansi', 'ASC')->get_where('instansi', ['status_instansi' => 1])->result();
		$data['katinsList'] = $this->db->order_by('judul_katins', 'ASC')->get_where('kategori_instansi', ['status_katins' => 1])->result();

		$this->load->view('pages/guest/instansiPage', $data);
	}
}

/* List of error code =>
(x001) : Database IS NOT affected when trying to input data. (IS ANONIM)
(x002) : Email couldn't send due to error when sending email.
(x003) : Database IS NOT affected when trying to input data. (ISNOT ANONIM)
(x004) : Pelapor tidak masuk database
*/