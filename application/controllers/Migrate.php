<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->version(8) === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migrate Sukses";
        }
    }
}

/* End of file Migrate.php */