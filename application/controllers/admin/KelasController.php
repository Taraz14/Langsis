<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('JurusanModel', 'KelasModel'));
    }

    public function index()
    {
        $data = [
            'content' => 'pages/admin/data_kelas',
            'head' => 'Kelas',
            'jurusan' => $this->JurusanModel->get()->result()

        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * 
     * create Kelas
     * return JSON
     */
    function create()
    {
        $validation = $this->form_validation;

        $validation->set_rules('jurusan', 'Jurusan', 'required|is_unique[jurusan.jurusan_nama]');
        $validation->set_rules('kd_jurusan', 'Kode Jurusan', 'required|is_unique[jurusan.jurusan_kode]');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $data = [
                'jurusan_kode' => $input['kd_jurusan'],
                'jurusan_nama' => $input['jurusan'],
                'created_at' => date("Y-m-d H:i:s")
            ];

            var_dump($data);
            // $this->KelasModel->saveKelas($data);
            // echo json_encode(["status" => TRUE]);
        }
    }
}

/* End of file KelasController.php */
