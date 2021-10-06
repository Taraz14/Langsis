<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruController extends CI_Controller
{

    public function index()
    {
        $data = [
            'content' => 'pages/admin/data_user',
            'head' => 'Guru'
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }
}

/* End of file UserController.php */
