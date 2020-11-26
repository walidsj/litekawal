<?php defined('BASEPATH') or exit('No direct script access allowed');

class laporan_model extends CI_Model
{
    private $table = "laporan";

    /* CRUD METHOD STANDARD for calling get */

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_lapor" => $id])->row();
    }

    public function save_isAnonim($isAnonim = true)
    {
        # define parameter
        $isRahasia = $this->input->post('rahasia_lapor', true);
        $url_string = $this->input->get('tipe', true);

        # insert parameter to data container
        $item = [
            'tipe_lapor' => ($url_string == '') ? 1 : 2,
            'tanggal_lapor' => now(),
            'rahasia_lapor' => ($isRahasia != '') ? $isRahasia : ''
        ];
        $inputPost = $this->input->post(null, true);
        $itemLapor = array_merge($item, $inputPost);

        # insert data to database (ANONIM) or session (NOT ANONIM)
        if ($isAnonim == true) {
            return $this->db->insert($this->table, $itemLapor);
        } else {
            return $this->session->set_userdata($this->table, $itemLapor);
        }
    }

    public function save()
    {
        # init data
        $item = $this->session->{$this->table};
        $inputPost = $this->input->post(null, true);
        $itemLapor = array_merge($item, $inputPost);

        # insert data to database
        return $this->db->insert($this->table, $itemLapor);
    }

    public function affected()
    {
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_lapor" => $id));
    }

    /* This below are rules for form validation.
    Hope you understand.
    Thank you */

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
                'field' => 'namapelapor_lapor',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim|min_length[4]|max_length[64]'
            ],
            [
                'field' => 'mahasiswa_lapor',
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
