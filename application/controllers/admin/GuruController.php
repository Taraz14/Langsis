<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        //Do your magic here
        $this->load->model('GuruModel');
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
            'content' => 'pages/admin/data_guru',
            'head' => 'Guru'
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * 
     * Simpan Data Guru
     * Simpan @param
     * 
     */
    public function create()
    {
        $validation = $this->form_validation;
        $validation->set_rules('nip', 'NIP', 'required|is_unique[users.users_nip]');
        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_message('is_unique', '%s sudah ada');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => FALSE, 'errot' => 'Tidak dapat menambahkan, periksa kembali']);
        } else {
            $input = $this->input->post();
            $data = array(
                'users_nip' => $input['nip'],
                'users_nama' => $input['nama'],
                'users_username' => $input['nip'],
                // 'users_password' => $input['nip'],
                'users_password' => hash('sha512', $input['nip'] . config_item('encryption_key')),
                'users_avatar' => 'noimage.png',
                'users_role' => 55,
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->GuruModel->save($data);
            echo json_encode(['status' => TRUE]);
        }
    }

    public function get()
    {
        $data = $this->GuruModel->dataGuru();
        $guru = [];
        $no = 1;
        foreach ($data as $jval) {
            $temp = [];
            $temp[] = htmlspecialchars($no++, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->users_nip, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars($jval->users_nama, ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("d F Y", strtotime($jval->created_at)), ENT_QUOTES, 'UTF-8');
            $temp[] = htmlspecialchars(date("H:i", strtotime($jval->created_at)) . ' WIT', ENT_QUOTES, 'UTF-8');
            $temp[] = '<a href="javascript:void(0)" onclick="hapus(' . "'" . $jval->users_id . "'" . ')" class="btn btn-danger btn-sm text-white link"><i class="fa fa-trash"></i></a>';

            $guru[] = $temp;
        }

        $output['draw'] = intval($this->input->get('draw'));
        $output['recordsTotal'] = $this->GuruModel->countAll();
        $output['recordsFiltered'] = $this->GuruModel->filtered();
        $output['data'] = $guru;

        echo json_encode($output);
    }

    /**
     * Delete Kelas
     * return JSON
     */
    public function delete($id)
    {
        $this->GuruModel->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file UserController.php */
