<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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

      $validation = $this->form_validation;
      $validation->set_rules('nama_pelapor', 'Nama Lengkap', 'required|trim|min_length[4]|max_length[64]');
      $validation->set_rules('kontak_pelapor', 'No. Handphone', 'required|numeric|trim|min_length[9]|max_length[16]');

      if ($validation->run() == false) {
         $data['title'] = 'Profil ' . $this->userPelapor->nama_pelapor;
         $this->load->view('pages/client/changeProfilePage', $data);
      } else {
         $kontak = $this->input->post('kontak_pelapor', true);
         $nama = $this->input->post('nama_pelapor', true);

         $this->db->where('id_pelapor', $this->userPelapor->id_pelapor)->update('pelapor', ['nama_pelapor' => $nama, 'kontak_pelapor' => $kontak]);

         $resultPelapor = $this->db->affected_rows();

         if ($resultPelapor > 0) {
            $this->session->set_flashdata('alert', 'success|Profil berhasil diubah.');
            redirect(current_url());
         } else {
            $this->session->set_flashdata('alert', 'error|Gagal diubah');
            redirect(current_url());
         }
      }
   }

   public function change_password()
   {

      $validation = $this->form_validation;
      $validation->set_rules('password_pelapor', 'Kata Sandi Lama', 'required|trim');
      $validation->set_rules('newpassword_pelapor', 'Kata Sandi Baru', 'required|trim|min_length[5]');
      $validation->set_rules('newpassword2_pelapor', 'Ulangi Kata Sandi Baru', 'required|trim|min_length[5]|matches[newpassword_pelapor]');

      if ($validation->run() == false) {
         $data['title'] = 'Ubah Kata Sandi';
         $this->load->view('pages/client/changePasswordPage', $data);
      } else {
         $password = $this->input->post('password_pelapor', true);
         $newpassword = $this->input->post('newpassword_pelapor', true);

         if (password_verify($password, $this->userPelapor->password_pelapor) == true) {
            $userPelapor = [
               'password_pelapor' => password_hash($newpassword, PASSWORD_DEFAULT)
            ];

            $this->db->where('id_pelapor', $this->userPelapor->id_pelapor)->update('pelapor', $userPelapor);

            $resultPelapor = $this->db->affected_rows();

            if ($resultPelapor > 0) {
               $this->session->set_flashdata('alert', 'success|Kata sandi berhasil diubah.');
               redirect(current_url());
            } else {
               $this->session->set_flashdata('alert', 'error|Gagal diubah');
               redirect(current_url());
            }
         } else {;
            $this->session->set_flashdata('alert', 'error|Kata sandi lama salah!');
            redirect(current_url());
         }
      }
   }
}
