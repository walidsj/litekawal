<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function rules_aspirasi()
    {
        return [
            [
                'field' => 'judul_lapor',
                'label' => 'Judul Laporan',
                'rules' => 'required|trim|min_length[8]|max_length[128]'
            ],
            [
                'field' => 'isi_lapor',
                'label' => 'Isi Laporan',
                'rules' => 'required|trim|min_length[32]|max_length[1024]'
            ],
            [
                'field' => 'instansi_lapor',
                'label' => 'Instansi Tujuan',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[16]'
            ],
            [
                'field' => 'kategori_lapor',
                'label' => 'Kategori Laporan',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[16]'
            ],
            [
                'field' => 'lampiran_lapor',
                'label' => 'Lampiran Berkas',
                'rules' => 'trim|min_length[4]|max_length[128]'
            ]
        ];
    }

    public function rules_pengaduan()
    {
        return [
            [
                'field' => 'judul_lapor',
                'label' => 'Judul Laporan',
                'rules' => 'required|trim|min_length[8]|max_length[128]'
            ],
            [
                'field' => 'isi_lapor',
                'label' => 'Isi Laporan',
                'rules' => 'required|trim|min_length[32]|max_length[1024]'
            ],
            [
                'field' => 'kejadian_lapor',
                'label' => 'Tanggal Kejadian',
                'rules' => 'trim|max_length[16]'
            ],
            [
                'field' => 'lokasi_lapor',
                'label' => 'Lokasi Kejadian',
                'rules' => 'trim|min_length[8]|max_length[128]'
            ],
            [
                'field' => 'instansi_lapor',
                'label' => 'Instansi Tujuan',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[16]'
            ],
            [
                'field' => 'kategori_lapor',
                'label' => 'Kategori Laporan',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[16]'
            ],
            [
                'field' => 'lampiran_lapor',
                'label' => 'Lampiran Berkas',
                'rules' => 'trim|min_length[4]|max_length[128]'
            ]
        ];
    }

    public function rules_lengkapi()
    {
        return [
            [
                'field' => 'nama_lapor',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim|min_length[4]|max_length[64]'
            ],
            [
                'field' => 'npm_lapor',
                'label' => 'NPM',
                'rules' => 'required|numeric|trim|exact_length[10]'
            ],
            [
                'field' => 'email_lapor',
                'label' => 'Alamat Email Aktif',
                'rules' => 'required|valid_email|trim|max_length[128]'
            ],
            [
                'field' => 'kontak_lapor',
                'label' => 'No. Handphone',
                'rules' => 'required|numeric|trim|min_length[9]|max_length[16]'
            ],
            [
                'field' => 'check_lapor',
                'label' => 'Persetujuan',
                'rules' => 'required'
            ]
        ];
    }
}
