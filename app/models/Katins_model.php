<?php defined('BASEPATH') or exit('No direct script access allowed');

class Katins_model extends CI_Model
{
    private $table = "kategori_instansi";

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

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getOn()
    {
        return $this->db->get_where($this->table, ['status_katins' => 'on'])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_katins" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->judul = $post["judul_katins"];
        return $this->db->insert($this->table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->judul = $post["judul_katins"];
        return $this->db->update($this->table, $this, array('id_katins' => $post['id_katins']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_katins" => $id));
    }
}
