<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isSingIn();
        $this->load->model('CountModel', 'count');
    }

    public function index()
    {
        $data = [
            'content' => 'pages/home',
            'head'  => 'Dashboard',
            'guru' => $this->count->guru_count(),
            'siswa' => $this->count->siswa_count(),
            'pelanggaran' => $this->count->pelanggaran_count(),
            'request' => $this->count->request_count(),
        ];

        return $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * Check apakah admin sudah login ?
     * 
     * @return boolean|void
     */
    private function isSingIn()
    {
        if ($this->session->isLoggon && $this->session->isAdmin || $this->session->isLoggon && $this->session->isGuru) {
            return true;
        }
        redirect('logout', 'refresh');
    }
}
