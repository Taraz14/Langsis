<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_pelanggaran extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'pelanggaran_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kategori_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'siswa_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'users_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
            ),
            'pelanggaran_kode' => array(
                'type' => 'VARCHAR',
                'constraint' => '15',
                'unique' => TRUE
            ),
            'pelanggaran_nama' => array(
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
        $this->dbforge->add_key('pelanggaran_id', TRUE);
        $this->dbforge->create_table('pelanggaran');
    }

    public function down()
    {
        $this->dbforge->drop_table('pelanggaran');
    }
}

/* End of file kelas.php */
