<?php defined('BASEPATH') or exit('No direct script access allowed');

class Katlap_model extends CI_Model
{
    private $table = "kategori_laporan";

    public $judul;

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

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_katlap" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->judul = $post["judul_katlap"];
        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->judul = $post["judul_katlap"];
        return $this->db->update($this->table, $this, array('id_katlap' => $post['id_katlap']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_katlap" => $id));
    }
}
