<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Mahasiswa extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Mahasiswa_model', 'Mahasiswa');
    }

    public function index_get()
    {
        $get = $this->get();

        if ($get === null) {
            $mahasiswa = $this->Mahasiswa->getMahasiswa();
        } else {
            $mahasiswa = $this->Mahasiswa->getMahasiswa($get);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'message' => 'Data mahasiswa ditemukan.',
                'rows' => count($mahasiswa),
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'error' => 'Data mahasiswa tidak ditemukan.',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // public function index_post()
    // {
    //     $validate = [
    //         [
    //             'field' => 'nama',
    //             'label' => 'Nama Mahasiswa',
    //             'rules' => 'required|min_length[5]|max_length[128]',
    //         ],
    //         [
    //             'field' => 'npm',
    //             'label' => 'NPM',
    //             'rules' => 'required|is_unique[mahasiswa.npm]|exact_length[10]|numeric',
    //             'errors' => [
    //                 'is_unique' => '{field} telah terdaftar.'
    //             ]
    //         ],
    //         [
    //             'field' => 'gender',
    //             'label' => 'Jenis Kelamin',
    //             'rules' => 'required|exact_length[1]|alpha',
    //         ],
    //         [
    //             'field' => 'id_prodi',
    //             'label' => 'Prodi',
    //             'rules' => 'required|min_length[1]|max_length[16]|numeric',
    //         ],
    //         [
    //             'field' => 'angkatan',
    //             'label' => 'Tahun Angkatan',
    //             'rules' => 'required|exact_length[4]|numeric'
    //         ],
    //         [
    //             'field' => 'status',
    //             'label' => 'Status',
    //             'rules' => 'required|exact_length[1]|numeric',
    //         ],
    //     ];

    //     $this->form_validation->set_data($this->post())
    //         ->set_rules($validate);

    //     if ($this->form_validation->run() == false) {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Data mahasiswa gagal ditambah.',
    //             'error' => $this->form_validation->error_array(),
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     } else {
    //         $post = [
    //             'nama' => $this->post('nama', true),
    //             'npm' => $this->post('npm', true),
    //             'gender' => $this->post('gender', true),
    //             'prodi_id' => $this->post('prodi_id', true),
    //             'angkatan' => $this->post('angkatan', true),
    //             'status' => $this->post('status', true),
    //             'created' => date('Y-m-d H:i:s'),
    //             'updated' => date('Y-m-d H:i:s')
    //         ];

    //         if ($this->Mahasiswa->postMahasiswa($post) > 0) {
    //             $mahasiswa = $this->Mahasiswa->getMahasiswa(['npm' => $post['npm']]);
    //             $this->response([
    //                 'status' => true,
    //                 'message' => 'Data mahasiswa berhasil ditambah.',
    //                 'data' => $mahasiswa
    //             ], REST_Controller::HTTP_CREATED);
    //         } else {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'Data mahasiswa gagal ditambah.',
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }

    // public function index_delete()
    // {
    //     $validate = [
    //         [
    //             'field' => 'id',
    //             'label' => 'Id Data Mahasiswa',
    //             'rules' => 'required|min_length[1]|max_length[11]|numeric',
    //         ]
    //     ];

    //     $this->form_validation->set_data($this->delete())
    //         ->set_rules($validate);

    //     if ($this->form_validation->run() == false) {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Data mahasiswa gagal dihapus.',
    //             'error' => $this->form_validation->error_array(),
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     } else {
    //         $id = $this->delete('id');

    //         $mahasiswa = $this->Mahasiswa->getMahasiswa(['id' => $id]);

    //         if ($this->Mahasiswa->deleteMahasiswa($id) > 0) {
    //             $this->response([
    //                 'status' => true,
    //                 'message' => 'Data mahasiswa berhasil dihapus.',
    //                 'data' => $mahasiswa
    //             ], REST_Controller::HTTP_OK);
    //         } else {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'Data mahasiswa tidak ditemukan.'
    //             ], REST_Controller::HTTP_NOT_FOUND);
    //         }
    //     }
    // }

    // public function index_put()
    // {
    //     $validate = [
    //         [
    //             'field' => 'id',
    //             'label' => 'Id Data Mahasiswa',
    //             'rules' => 'required|min_length[1]|max_length[11]|numeric',
    //         ],
    //         [
    //             'field' => 'nama',
    //             'label' => 'Nama Mahasiswa',
    //             'rules' => 'min_length[5]|max_length[128]',
    //         ],
    //         [
    //             'field' => 'npm',
    //             'label' => 'NPM',
    //             'rules' => 'exact_length[10]|numeric',
    //             'errors' => [
    //                 'is_unique' => '{field} telah terdaftar.'
    //             ]
    //         ],
    //         [
    //             'field' => 'gender',
    //             'label' => 'Jenis Kelamin',
    //             'rules' => 'exact_length[1]|alpha',
    //         ],
    //         [
    //             'field' => 'id_prodi',
    //             'label' => 'Prodi',
    //             'rules' => 'min_length[1]|max_length[16]|numeric',
    //         ],
    //         [
    //             'field' => 'angkatan',
    //             'label' => 'Tahun Angkatan',
    //             'rules' => 'exact_length[4]|numeric'
    //         ],
    //         [
    //             'field' => 'status',
    //             'label' => 'Status',
    //             'rules' => 'exact_length[1]|numeric',
    //         ],
    //     ];

    //     $this->form_validation->set_data($this->put())
    //         ->set_rules($validate);

    //     if ($this->form_validation->run() == false) {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'Data mahasiswa gagal diperbarui.',
    //             'error' => $this->form_validation->error_array(),
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     } else {
    //         $put = [
    //             'id' => $this->put('id', true),
    //             'nama' => $this->put('nama', true),
    //             'npm' => $this->put('npm', true),
    //             'gender' => $this->put('gender', true),
    //             'prodi_id' => $this->put('prodi_id', true),
    //             'angkatan' => $this->put('angkatan', true),
    //             'status' => $this->put('status', true),
    //             'updated' => date('Y-m-d H:i:s')
    //         ];

    //         if ($this->Mahasiswa->putMahasiswa($put) > 0) {
    //             $mahasiswa = $this->Mahasiswa->getMahasiswa(['id' => $put['id']]);
    //             $this->response([
    //                 'status' => true,
    //                 'message' => 'Data mahasiswa berhasil diperbarui.',
    //                 'data' => $mahasiswa
    //             ], REST_Controller::HTTP_OK);
    //         } else {
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'Data mahasiswa tidak ditemukan.',
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }
}
