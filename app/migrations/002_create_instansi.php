<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Migration_create_instansi extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_instansi' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
         ),
         'induk_instansi' => array(
            'type' => 'VARCHAR',
            'constraint' => '8',
         ),
         'nama_instansi' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'tipe_instansi' => array(
            'type' => 'VARCHAR',
            'constraint' => '8',
         ),
         'kode_instansi' => array(
            'type' => 'VARCHAR',
            'constraint' => '8',
         )
      ));
      $this->dbforge->add_key('id_instansi', TRUE);
      $this->dbforge->create_table('instansi');
   }
   public function down()
   {
      $this->dbforge->drop_table('instansi');
   }
}
