<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelanggaranController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelanggaranModel', 'pelanggaran');
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
            'kriteria' => $this->pelanggaran->get_kriteria()->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    public function createKriteria()
    {
        $validation = $this->form_validation;
        $validation->set_rules('kriteria', 'Kriteria', 'required|is_unique[kriteria.kriteria_nama]');
        $validation->set_rules('bobot', 'Bobot', 'required');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($validation->run() == FALSE) {
            echo validation_errors();
            // die();
            // echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $data = array(
                'kriteria_nama' => $input['kriteria'],
                'bobot_kriteria' => $input['bobot'],
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->pelanggaran->saveKriteria($data);
            echo json_encode(['status' => TRUE]);
        }
    }

    /**
     * Create Pelanggaran
     *
     */
    public function createPelanggaran()
    {
        $validation = $this->form_validation;
        $validation->set_rules('pelanggaran', 'Nama Pelanggaran', 'required|is_unique[jenis_pelanggaran.jp_nama]');
        $validation->set_rules('kp', 'Kriteria Pelanggaran', 'required');
        $validation->set_rules('point', 'Poin Pelanggaran', 'required');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($validation->run() == FALSE) {
            echo validation_errors();
            // die();
            // echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $data = array(
                'kriteria_id' => $input['kp'],
                'jp_nama' => $input['pelanggaran'],
                'jp_skor' => $input['point'],
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->pelanggaran->savePelanggaran($data);
            echo json_encode(['status' => TRUE]);
        }
    }
}

/* End of file Pelanggaran.php */
