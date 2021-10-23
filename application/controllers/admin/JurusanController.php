<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JurusanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        //load model
        $this->load->model('JurusanModel');

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
            'content' => 'pages/admin/data_jurusan',
            'head' => 'Jurusan'
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * 
     * create Jurusan
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

            $this->JurusanModel->saveJurusan($data);
            echo json_encode(["status" => TRUE]);
        }
    }

    public function get()
    {
        $data = $this->JurusanModel->dataJurusan();
        $jurusan = [];
        $no = 1;
        foreach ($data as $jval) {
            $temp = [];
            $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->jurusan_kode, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->jurusan_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("d F Y", strtotime($jval->created_at)), ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("H:i", strtotime($jval->created_at)) . ' WIT', ENT_QUOTES, 'UTF-8');
            $temp[] = '<a href="javascript:void(0)" onclick="hapus(' . "'" . $jval->jurusan_id . "'" . ')" class="btn btn-danger btn-sm text-white link"><i class="fa fa-trash"></i></a>';

            $jurusan[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->JurusanModel->countAll();
        $output['recordsFiltered'] = $this->JurusanModel->filtered();
        $output['data'] = $jurusan;

        echo json_encode($output);
    }

    public function delete($id)
    {
        $this->JurusanModel->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file JurusanController.php */
