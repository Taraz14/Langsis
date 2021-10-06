<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_jurusan extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'jurusan_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'jurusan_kode' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'unique' => TRUE
            ),
            'jurusan_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));
        $this->dbforge->add_key('jurusan_id', TRUE);
        $this->dbforge->create_table('jurusan');
    }

    public function down()
    {
        $this->dbforge->drop_table('jurusan');
    }
}

/* End of file Jurusan.php */
