<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{

    public function index()
    {
        $data = [
            'content' => 'pages/admin/data_siswa',
            'head' => 'Siswa'

        ];

        $this->load->view('layouts/index', $data, FALSE);
    }
}

/* End of file SiswaController.php */
