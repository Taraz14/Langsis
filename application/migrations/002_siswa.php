<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_siswa extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'siswa_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'siswa_nis' => array(
                'type' => 'VARCHAR',
                'constraint' => '18',
                'unique' => TRUE
            ),
            'siswa_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'siswa_alamat' => array(
                'type' => 'TEXT',
            ),
            'siswa_gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true
            ),
            'siswa_kelas' => array(
                'type' => 'INT',
                'constraint' => 2
            ),
            'siswa_agama' => array(
                'type' => 'INT',
                'constraint' => 1,
                'null' => true
            ),
            'siswa_telpon' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));
        $this->dbforge->add_key('siswa_id', TRUE);
        $this->dbforge->create_table('siswa');
    }

    public function down()
    {
        $this->dbforge->drop_table('siswa');
    }
}

/* End of file Tb_users.php */
