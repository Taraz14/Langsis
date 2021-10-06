<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_kategori extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'kategori_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kategori_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => TRUE
            ),
            'kategori_bobot' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));
        $this->dbforge->add_key('kategori_id', TRUE);
        $this->dbforge->create_table('kategori');
    }

    public function down()
    {
        $this->dbforge->drop_table('kategori');
    }
}

/* End of file kelas.php */
