<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['sign_in'] = [
    [
        'field'  => 'username',
        'label'  => 'Username',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'password',
        'label'  => 'Password',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ]
];

$config['register'] = [
    [
        'field'  => 'userName',
        'label'  => 'Nama Depan',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userLastName',
        'label'  => 'Nama Belakang',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userNisn',
        'label'  => 'NISN',
        'rules'  => 'trim|required|is_unique[user.userNisn]',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userBP',
        'label'  => 'Tempat Lahir',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong',
            'is_unique' => '* %s sudah terdaftar.'
        ]
    ],
    [
        'field'  => 'userDateB',
        'label'  => 'Tanggal Lahir',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userGender',
        'label'  => 'Jenis Kelamin',
        'rules'  => 'trim|required',
        'errors' => [
            'required'  => '* Harap Pilih %s',
        ]
    ],
    [
        'field'  => 'userAlamat',
        'label'  => 'Alamat',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userPhone',
        'label'  => 'No.HP',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
];

$config['jurusan'] = [
    [
        'field'  => 'kd_jurusan',
        'label'  => 'Kode Jurusan',
        'rules'  => 'trim|required|unique',
        'errors' => [
            'required' => '* %s tidak  boleh kosong',
            'unique' => '* %s sudah ada'
        ]
    ],
];

$config['update_profile'] = [
    [
        'field'  => 'userName',
        'label'  => 'Nama',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userUsername',
        'label'  => 'Username',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userEmail',
        'label'  => 'Email',
        'rules'  => 'trim|required|valid_email',
        'errors' => [
            'required'    => '* %s tidak boleh kosong',
            'valid_email' => '* %s tidak valid.'
        ]
    ],
    [
        'field'  => 'userAddress',
        'label'  => 'Alamat',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ]
];

$config['reset_password'] = [
    [
        'field'  => 'userPassword',
        'label'  => 'Password',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'confirmPassword',
        'label'  => 'Konfirmasi password',
        'rules'  => 'trim|required|matches[userPassword]',
        'errors' => [
            'required' => '* %s tidak boleh kosong',
            'matches'  => '* %s tidak sama.'
        ]
    ]
];

$config['email'] = [
    [
        'field'  => 'email_sekolah',
        'label'  => 'Email',
        'rules'  => 'trim|required|valid_email',
        'errors' => [
            'required'    => '* %s tidak boleh kosong',
            'valid_email' => '* %s tidak valid.'
        ]
    ],
];

$config['koran'] = [
    [
        'field'  => 'judul',
        'label'  => 'Judul berita',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'slug',
        'label'  => 'Slug',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'berita',
        'label'  => 'Isi berita',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
];
$config['galeri'] = [
    [
        'field'  => 'deskripsi',
        'label'  => 'Deskripsi',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
];
