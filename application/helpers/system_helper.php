<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('direct')) {
    /**
     * direct function
     *
     * function ini untuk mendirect setelah request user
     * 
     * @param  string $message  Pesan yang ditampilkan ke users
     * @param  string $location route|lokasi redirect
     * @return void
     */
    function direct(string $message, string $location)
    {
        /**
         * CI Instansiasi
         * 
         * @var object
         */
        $flash = &get_instance();
        $flash->session->set_flashdata('message', $message);
        redirect($location, 'refresh');
    }
}
