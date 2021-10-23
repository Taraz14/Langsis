<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isSingIn();
    }

    /**
     * Check apakah admin sudah login ?
     * 
     * @return boolean|void
     */
    private function isSingIn()
    {
        if ($this->session->isLoggon && $this->session->isAdmin) {
            return true;
        }
        redirect('logout', 'refresh');
    }

    public function index()
    {
        $data = [
            'content' => 'pages/admin/data_pelanggaran',
            'head' => 'Pelanggaran',
            // 'jurusan' => $this->JurusanModel->get()->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }
}

/* End of file Pelanggaran.php */
