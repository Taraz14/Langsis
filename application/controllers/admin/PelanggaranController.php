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

    public function get()
    {
        $data = $this->pelanggaran->dataPelanggar();
        $guru = [];
        $no = 1;
        foreach ($data as $value) {

            $normalisasi = $value->bobot_kriteria / 100;
            $poinTot = $value->jp_skor * $normalisasi;
            // $hasil = array_sum($poinTot);

            $temp = [];
            $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->siswa_nis, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->siswa_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->users_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("d F Y / H:i", strtotime($value->pcreate)), ENT_QUOTES, 'UTF-8');
            $temp[] = $poinTot;
            if ($value->request_hapus == 0) :
                $temp[] = '<a href="javascript:void(0)" onclick="detail(' . "'" . $value->sid . "'" . ')"  class="btn btn-success btn-sm text-white link"><i class="fa fa-eye"></i> Detail Pelanggar</a>';
            endif;
            if ($value->request_hapus == 1) :
                $temp[] = '<a href="javascript:void(0)" onclick="detail(' . "'" . $value->sid . "'" . ')"  class="btn btn-success btn-sm text-white link mb-2"><i class="fa fa-eye"></i> Detail</a> <a href="javascript:void(0)" onclick="tolak(' . "'" . $value->sid . "'" . ')" class="btn btn-warning btn-sm text-white link mb-2"><i class="fa fa-times"></i> Tolak</a> <a href="javascript:void(0)" onclick="hapus(' . "'" . $value->sid . "'" . ')" class="btn btn-danger btn-sm text-white link mb-1"><i class="fa fa-trash"></i> Hapus</a> ';
            endif;

            $guru[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->pelanggaran->countAll();
        $output['recordsFiltered'] = $this->pelanggaran->filtered();
        $output['data'] = $guru;

        echo json_encode($output);
    }

    public function delete($id)
    {
        $this->pelanggaran->deleteconfirmed(['siswa_id' => $id]);
        echo json_encode(array("status" => TRUE));
    }

    public function tolak($id)
    {
        $req = ['request_hapus' => 0];
        $this->pelanggaran->tolakconnfirmed($req, ['siswa_id' => $id]);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Pelanggaran.php */
