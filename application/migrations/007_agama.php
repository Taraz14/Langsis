<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_agama extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'agama_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'agama_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => TRUE
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),

        ));
        $this->dbforge->add_key('agama_id', TRUE);
        $this->dbforge->create_table('agama');
    }

    public function down()
    {
        $this->dbforge->drop_table('agama');
    }
}

/* End of file kelas.php */
