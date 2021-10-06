<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_users extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'users_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'users_nip' => array(
                'type' => 'VARCHAR',
                'constraint' => '18',
                'unique' => TRUE
            ),
            'users_username' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'users_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'users_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'users_nama' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'users_alamat' => array(
                'type' => 'TEXT',
            ),
            'users_gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true
            ),
            'users_agama' => array(
                'type' => 'INT',
                'constraint' => 1,
                'null' => true
            ),
            'users_telpon' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ),
            'users_role' => array(
                'type' => 'INT',
                'constraint' => 2
            ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('users_id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}

/* End of file Tb_users.php */
