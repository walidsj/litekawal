<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_kategori_laporan extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_katlap' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'judul_katlap' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         )
      ));
      $this->dbforge->add_key('id_katlap');
      $this->dbforge->create_table('kategori_laporan');
   }
   public function down()
   {
      $this->dbforge->drop_table('kategori_laporan');
   }
}
