<?php defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_model extends CI_Model
{
    private $table = "instansi";

    public $induk;
    public $nama;
    public $tipe;
    public $kode;

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

    public function getAll()
    {
        return $this->db->order_by('nama_instansi', 'ASC')
            ->get($this->table)->result();
    }

    public function getAllforSelect2()
    {
        return $this->db->select('id_instansi AS id, nama_instansi as text')->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_instansi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->induk = $post["induk_instansi"];
        $this->nama = $post["nama_instansi"];
        $this->tipe = $post["tipe_instansi"];
        $this->kode = $post["kode_instansi"];
        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->induk = $post["induk_instansi"];
        $this->nama = $post["nama_instansi"];
        $this->tipe = $post["tipe_instansi"];
        $this->kode = $post["kode_instansi"];
        return $this->db->update($this->table, $this, array('id_instansi' => $post['id_instansi']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_instansi" => $id));
    }
}
