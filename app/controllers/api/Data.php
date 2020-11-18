<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Data extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('instansi_model');
        $this->load->model('katlap_model');
        $this->load->model('laporan_model');
    }

    public function laporan_post()
    {
        $this->db->insert('laporan', $this->post());
        $data = $this->post();
        $this->set_response([
            'status' => true,
            'message' => 'Laporan berhasil dikirim.',
            'data' => $data
        ], REST_Controller::HTTP_CREATED);
    }

    public function instansi_list_get()
    {
        $get = $this->get('id_instansi');

        if ($get == null) {
            $instansiList = $this->instansi_model->getAll();
        } else {
            $instansiList = $this->instansi_model->getById($get);
        }

        if ($instansiList) {
            $this->response([
                'status' => true,
                'message' => 'Data instansi ditemukan.',
                'rows' => count($instansiList),
                'data' => $instansiList
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data instansi tidak ditemukan.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function katlap_list_get()
    {
        $get = $this->get('id_katlap');

        if ($get === null) {
            $katlap = $this->katlap_model->getAll();
        } else {
            $katlap = $this->katlap_model->getById($get);
        }

        if ($katlap) {
            $this->response([
                'status' => true,
                'message' => 'Data kategori laporan ditemukan.',
                'rows' => count($katlap),
                'data' => $katlap
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data kategori laporan tidak ditemukan.'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
