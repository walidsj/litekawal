<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelapor_model extends CI_Model
{
    public function rulesLogin()
    {
        return [
            [
                'field' => 'email_pelapor',
                'label' => 'Alamat Email',
                'rules' => 'required|valid_email|trim|max_length[128]'
            ],
            [
                'field' => 'password_pelapor',
                'label' => 'Kata Sandi',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function rulesResetPass()
    {
        return [
            [
                'field' => 'email_pelapor',
                'label' => 'Alamat Email',
                'rules' => 'required|valid_email|trim|max_length[128]'
            ]
        ];
    }

    public function rulesNewPass()
    {
        return [
            [
                'field' => 'password_pelapor',
                'label' => 'Kata Sandi',
                'rules' => 'required|trim|min_length[5]'
            ]
        ];
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama_pelapor',
                'label' => 'Nama Lengkap',
                'rules' => 'required|trim|min_length[4]|max_length[64]'
            ],
            [
                'field' => 'npm_pelapor',
                'label' => 'NPM',
                'rules' => 'required|numeric|trim|exact_length[10]'
            ],
            [
                'field' => 'password_pelapor',
                'label' => 'Kata Sandi',
                'rules' => 'required|trim|min_length[5]'
            ],
            [
                'field' => 'email_pelapor',
                'label' => 'Alamat Email',
                'rules' => 'required|valid_email|trim|max_length[128]|is_unique[pelapor.email_pelapor]',
                'errors' => [
                    'is_unique' => 'Alamat Email telah terdaftar'
                ]
            ],
            [
                'field' => 'kontak_pelapor',
                'label' => 'No. Handphone',
                'rules' => 'required|numeric|trim|min_length[9]|max_length[16]'
            ],
            [
                'field' => 'check_pelapor',
                'label' => 'Persetujuan',
                'rules' => 'required'
            ]
        ];
    }
}
