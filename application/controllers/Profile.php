<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('UsersModel', 'user');
    }

    public function index()
    {
        $id = $this->session->userdata('uid');
        $data = [
            'content' => 'pages/profile',
            'head'  => 'Profile',
            'user' => $this->user->get($id)->row(),
            'agama' => $this->user->agama()->result()
        ];

        return $this->load->view('layouts/index', $data, FALSE);
    }

    private function _delete_photo($load_user)
    {
        $file_location = FCPATH . '/public/admin/img/profile/';
        // $file = glob($file_location . $this->session->userdata('avatar'));
        $file = glob($file_location . $load_user->users_avatar);
        array_map('unlink', $file);
    }

    public function upload()
    {
        $data['current_user'] = $this->session->userdata('uid');
        $id = $this->session->userdata('uid');
        $load_user = $this->user->get($id)->row();

        if ($this->input->method() === 'post') {
            $file_name                      = round(microtime(true) * 1000) . '_' . $data['current_user'] . '_ava';
            $config['upload_path']          = FCPATH . './public/admin/img/profile/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 3072; // 1MB
            // $config['max_width']            = 1080;
            // $config['max_height']           = 1080;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $upload = $this->upload->do_upload('avatar');
            if (!$upload) {
                $data['error'] = $this->upload->display_errors();
                echo $data['error'];
            } else {
                $uploaded_data = $this->upload->data();
                $input = $this->input->post();
                $id = $data['current_user'];
                $new_data = [
                    'users_username'     => $input['username'],
                    'users_password' => hash('sha512', $input['password'] . config_item('encryption_key')),
                    'users_email'   => $input['email'],
                    'users_nama'    => $input['nama'],
                    'users_alamat'  => $input['alamat'],
                    'users_agama' => $input['agama'],
                    'users_gender' => $input['gender'],
                    'users_telpon'  => $input['tlp'],
                    'users_avatar' => $uploaded_data['file_name'],
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                // simpan data baru ke database dan redirect

                if ($load_user->users_avatar != 'noimage.png') {
                    $this->_delete_photo($load_user);
                }
                if ($this->user->update($new_data, ['users_id' => $id])) {
                    $this->session->set_flashdata('message', 'Avatar updated!');
                    redirect('profile');
                }
            }
        }
    }
}

/* End of file Profile.php */
