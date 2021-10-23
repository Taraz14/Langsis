<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Validasi Config
 *
 * Config ini digunakan untuk mengatur validasi setiap inputan dari user
 *
 * @package     Langsis
 * @subpackage  Config
 * @category    Rule Validation
 */

/*
| -------------------------------------------------------------------------
| VALIDASI LOGIN
| -------------------------------------------------------------------------
| Config untuk mengatur inputan login user.
*/
$config['login'] = [
    [
        'field'  => 'username',
        'label'  => 'Username',
        'rules'  => 'trim|required|max_length[100]|alpha_numeric_spaces',
        'errors' => [
            'required'               => '* %s tidak boleh kosong.',
            'max_length'             => '* Panjang %s tidak boleh lebih dari 100 karakter.',
            'alpha_numeric_spaces' => '* hanya boleh diisi angka, huruf, dan spasi'
        ]
    ],
    [
        'field'  => 'password',
        'label'  => 'Password',
        'rules'  => 'trim|required|max_length[255]|min_length[3]',
        'errors' => [
            'required'    => '* %s tidak boleh kosong.',
            'max_length'  => '* Panjang %s tidak boleh lebih dari 255 karakter.',
            'min_length'  => '* Panjang %s minimal 3 karakter',
        ]
    ],
];
