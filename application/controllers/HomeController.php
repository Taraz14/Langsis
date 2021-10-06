<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function index()
    {
        $data = [
            'content' => 'pages/home',
            'head'  => 'Dashboard'
        ];

        return $this->load->view('layouts/index', $data, FALSE);
    }
}
