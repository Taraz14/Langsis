<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(array('SiswaModel', 'JurusanModel', 'KelasModel', 'PelanggaranModel'));

        $this->isSingIn();
    }

    /**
     * Check apakah guru sudah login ?
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
            'content' => 'pages/guru/data_siswa',
            'head' => 'Siswa',
            'jurusan' => $this->JurusanModel->get()->result(),
            'kelas' => $this->KelasModel->getKelas()->result(),
            'agama' => $this->db->get('agama')->result(),
            'kriteria' => $this->db->get('kriteria')->result(),
            'jp'        => $this->db->get('jenis_pelanggaran')->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    public function getKelas($id)
    {
        $dataKelas = $this->KelasModel->get($id)->result();
        echo json_encode($dataKelas, TRUE);
    }

    public function get_jp($id)
    {
        $dataPelanggaran = $this->db->get_where('jenis_pelanggaran', ['kriteria_id' => $id])->result();
        echo json_encode($dataPelanggaran, TRUE);
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
