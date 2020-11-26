<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_laporan extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_lapor' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'tipe_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '8',
         ),
         'judul_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'isi_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '1024',
         ),
         'tanggal_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         ),
         'kejadian_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         ),
         'lokasi_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'instansi_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         ),
         'kategori_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         ),
         'lampiran_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'anonim_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '1',
         ),
         'rahasia_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '1',
         ),
         'mahasiswa_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         ),
         'namapelapor_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '64',
         ),
         'email_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'kontak_lapor' => array(
            'type' => 'VARCHAR',
            'constraint' => '16',
         )
      ));
      $this->dbforge->add_key('id_lapor', TRUE);
      $this->dbforge->create_table('laporan');
   }
   public function down()
   {
      $this->dbforge->drop_table('laporan');
   }
}
