<?php defined('BASEPATH') or exit('No direct script access allowed');

class laporan_model extends CI_Model
{
    private $table = "laporan";

    public $tipe;
    public $judul;
    public $isi;
    public $tanggal = '';
    public $lokasi = '';
    public $instansi;
    public $kategori;
    public $lampiran = '';
    public $anonim = 0;
    public $rahasia = 0;
    public $mahasiswa = '';
    public $namapelapor = '';
    public $kontak;

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_lapor" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tipe = $post["tipe_lapor"];
        $this->judul = $post["judul_lapor"];
        $this->isi = $post["isi_lapor"];
        $this->tanggal = $post["tanggal_lapor"];
        $this->lokasi = $post["lokasi_lapor"];
        $this->instansi = $post["instansi_lapor"];
        $this->kategori = $post["kategori_lapor"];
        $this->lampiran = $post["lampiran_lapor"];
        $this->anonim = $post["anonim_lapor"];
        $this->rahasia = $post["rahasia_lapor"];
        $this->mahasiswa = $post["mahasiswa_lapor"];
        $this->namapelapor = $post["namapelapor_lapor"];
        $this->kontak = $post["kontak_lapor"];
        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->tipe = $post["tipe_lapor"];
        $this->judul = $post["judul_lapor"];
        $this->isi = $post["isi_lapor"];
        $this->tanggal = $post["tanggal_lapor"];
        $this->lokasi = $post["lokasi_lapor"];
        $this->instansi = $post["instansi_lapor"];
        $this->kategori = $post["kategori_lapor"];
        $this->lampiran = $post["lampiran_lapor"];
        $this->anonim = $post["anonim_lapor"];
        $this->rahasia = $post["rahasia_lapor"];
        $this->mahasiswa = $post["mahasiswa_lapor"];
        $this->namapelapor = $post["namapelapor_lapor"];
        $this->kontak = $post["kontak_lapor"];
        return $this->db->update($this->table, $this, array('id_lapor' => $post['id_lapor']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_lapor" => $id));
    }

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
                'field' => 'tanggal_lapor',
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

    public function rules()
    {
        return [
            [
                'field' => 'tipe_lapor',
                'label' => 'Tipe Laporan',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[8]'
            ],
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
                'field' => 'tanggal_lapor',
                'label' => 'Tanggal Kejadian',
                'rules' => 'trim|numeric|max_length[16]'
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
            ],
            [
                'field' => 'anonim_lapor',
                'label' => 'Status Anonim',
                'rules' => 'trim|numeric|exact_length[1]'
            ],
            [
                'field' => 'rahasia_lapor',
                'label' => 'Status Rahasia',
                'rules' => 'trim|numeric|exact_length[1]'
            ],
            [
                'field' => 'mahasiswa_lapor',
                'label' => 'ID Mahasiswa',
                'rules' => 'trim|numeric|min_length[4]|max_length[16]'
            ],
            [
                'field' => 'namapelapor_lapor',
                'label' => 'Nama Pelapor',
                'rules' => 'trim|min_length[4]|max_length[64]'
            ],
            [
                'field' => 'kontak_lapor',
                'label' => 'Kontak Pelapor',
                'rules' => 'required|trim|numeric|min_length[9]|max_length[16]'
            ],
        ];
    }
}
