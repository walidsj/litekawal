<?php defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'induk_instansi',
                'label' => 'Induk Instansi',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[8]'
            ],
            [
                'field' => 'nama_instansi',
                'label' => 'Nama Instansi',
                'rules' => 'required|trim|min_length[8]|max_length[128]'
            ],
            [
                'field' => 'tipe_instansi',
                'label' => 'Tipe Instansi',
                'rules' => 'required|trim|numeric|min_length[1]|max_length[8]'
            ],
            [
                'field' => 'kode_instansi',
                'label' => 'Kode Instansi',
                'rules' => 'required|trim|max_length[8]'
            ]
        ];
    }
}
