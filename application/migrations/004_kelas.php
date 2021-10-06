<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_kelas extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'kelas_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kelas_kode' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'unique' => TRUE
            ),
            'kelas_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '15'
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));
        $this->dbforge->add_key('kelas_id', TRUE);
        $this->dbforge->create_table('kelas');
    }

    public function down()
    {
        $this->dbforge->drop_table('kelas');
    }
}

/* End of file kelas.php */
