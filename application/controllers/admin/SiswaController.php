<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('SiswaModel', 'JurusanModel', 'KelasModel'));

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
            'content' => 'pages/admin/data_siswa',
            'head' => 'Siswa',
            'jurusan' => $this->JurusanModel->get()->result(),
            'kelas' => $this->KelasModel->getKelas()->result(),
            'agama' => $this->db->get('agama')->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    public function getKelas($id)
    {
        $dataKelas = $this->KelasModel->get($id)->result();
        echo json_encode($dataKelas, TRUE);
    }

    /**
     * Create Siswa
     * String @param array
     */
    public function create()
    {
        $validation = $this->form_validation;
        $validation->set_rules('nis', 'NIS', 'required|is_unique[siswa.siswa_nis]');
        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');
        $validation->set_rules('religion', 'Agama', 'required');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($validation->run() == FALSE) {
            echo validation_errors();
            // die();
            // echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $data = array(
                'siswa_nis' => $input['nis'],
                'kelas_id' => $input['kelas'],
                'siswa_nama' => $input['nama'],
                'siswa_alamat' => $input['alamat'],
                'siswa_gender' => $input['gender'],
                'siswa_agama' => $input['religion'],
                'siswa_telepon' => $input['telepon'],
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->SiswaModel->save($data);
            echo json_encode(['status' => TRUE]);
        }
    }

    /**
     * get Siswa
     */
    public function get()
    {
        $postData = $this->input->post();
        $data = $this->SiswaModel->getSiswa($postData);
        echo json_encode($data);
    }

    public function delete($id)
    {
        $this->SiswaModel->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file SiswaController.php */
