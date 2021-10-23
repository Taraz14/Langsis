<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('JurusanModel', 'KelasModel'));
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
        $validation->set_rules('jurusan', 'Jurusan', 'required');
        $validation->set_rules('tingkat', 'Tingkatan Kelas', 'required');
        $validation->set_rules(['tingkat', 'classcode', 'classnn'], 'Nama Kelas', 'required|is_unique[kelas.kelas_nama]');
        $validation->set_rules('classcode', 'Kode Kelas', 'required');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($this->form_validation->run() == FALSE) {
            // echo validation_errors();
            // die();
            echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $explode_jurusan = explode('|', $input['jurusan']);
            $jurusan_id = $explode_jurusan[0];
            $tingkat = strtoupper($input['tingkat']);
            $classcode = strtoupper($input['classcode']);
            $kelas_nama = $tingkat . ' ' . $classcode . ' ' . $input['classnn'];
            $data = [
                'jurusan_id' => $jurusan_id,
                'kelas_kode' => $classcode,
                'kelas_nama' => $kelas_nama,
                'created_at' => date("Y-m-d H:i:s")
            ];
            // var_dump($data);
            // die();
            $this->KelasModel->saveKelas($data);
            echo json_encode(["status" => TRUE]);
        }
    }

    public function get()
    {
        $data = $this->KelasModel->dataKelas();
        $kelas = [];
        $no = 1;
        foreach ($data as $jval) {
            $temp = [];
            $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->kelas_kode, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->kelas_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("d F Y", strtotime($jval->created_at)), ENT_QUOTES, 'UTF-8');
            // $temp[] = htmlspecialchars(date("H:i", strtotime($jval->created_at)) . ' WIT', ENT_QUOTES, 'UTF-8');
            $temp[] = '<a href="javascript:void(0)" onclick="hapus(' . "'" . $jval->kelas_id . "'" . ')" class="btn btn-danger btn-sm text-white link"><i class="fa fa-trash"></i></a>';

            $kelas[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->KelasModel->countAll();
        $output['recordsFiltered'] = $this->KelasModel->filtered();
        $output['data'] = $kelas;

        echo json_encode($output);
    }

    /**
     * Delete Kelas
     * return JSON
     */
    public function delete($id)
    {
        $this->KelasModel->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file KelasController.php */
