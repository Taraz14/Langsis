<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
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
        if ($this->session->isLoggon && $this->session->isGuru) {
            return true;
        }
        redirect('logout', 'refresh');
    }

    public function index()
    {
        $data = [
            'content' => 'pages/guru/data_pelanggaran',
            'head' => 'Pelanggaran',
            // 'jurusan' => $this->JurusanModel->get()->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * Create Pelanggaran Siswa
     * String @param array
     */
    public function create()
    {
        $user_id = $this->session->userdata('uid');
        //validation
        $validation = $this->form_validation;
        $validation->set_rules('jp', 'Jenis Pelanggaran', 'required');
        $validation->set_rules('kp', 'Kriteria Pelanggaran', 'required');
        if ($validation->run() == FALSE) {
            echo validation_errors();
            die();
            // echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();

            //exploding bobot kriteria dan normalisasi bobot
            $bobot_kriteria = explode("|", $input['kp']);
            $bobot_kriteria = $bobot_kriteria[1] / 100;
            //exploding poin dan perhitungan poin
            $point = explode(",", $input['jp']);
            $point = $point[1] * $bobot_kriteria;

            $data = array(
                'jp_id' => $input['jp'],
                'kriteria_id' => $input['kp'],
                'siswa_id' => $input['sis-id'],
                'users_id' => $user_id,
                'deskripsi' => $input['deskripsi'],
                'bobot' => $bobot_kriteria,
                'poin' => $point,
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->pelanggaran->insertPelanggaran($data);
            echo json_encode(['status' => TRUE]);
        }
    }

    public function get()
    {
        $data = $this->pelanggaran->dataPelanggar();
        $guru = [];
        $no = 1;
        foreach ($data as $value) {
            $temp = [];
            $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->siswa_nis, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->siswa_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->kelas_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($value->kriteria_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("d F Y", strtotime($value->pcreate)), ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("H:i", strtotime($value->pcreate)) . ' WIT', ENT_QUOTES, 'UTF-8');
            if ($value->request_hapus == 0) :
                $temp[] = '<a href="javascript:void(0)" onclick="reqhapus(' . "'" . $value->sid . "'" . ')" class="btn btn-danger btn-sm text-white link"><i class="fa fa-bell"></i> Request pembatalan</a>';
            endif;
            if ($value->request_hapus == 1) :
                $temp[] = '<span class="btn btn-warning btn-sm text-white link"><i class="fa fa-bell-slash"></i> Menunggu konfirmasi</span>';
            endif;
            $guru[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->pelanggaran->countAll();
        $output['recordsFiltered'] = $this->pelanggaran->filtered();
        $output['data'] = $guru;

        echo json_encode($output);
    }

    public function delete_req($id)
    {
        $req = ['request_hapus' => 1];
        $this->pelanggaran->deletereq($req, ['siswa_id' => $id]);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Pelanggaran.php */
