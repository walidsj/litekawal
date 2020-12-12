<?php defined('BASEPATH') or exit('No direct script access allowed');

class Katins_model extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'judul_katins',
                'label' => 'Judul Kategori instansi',
                'rules' => 'required|trim|max_length[128]'
            ]
        ];
    }
}
