<?php defined('BASEPATH') or exit('No direct script access allowed');

class Katlap_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'judul_katlap',
                'label' => 'Judul Kategori Laporan',
                'rules' => 'required|trim|max_length[128]'
            ]
        ];
    }
}
