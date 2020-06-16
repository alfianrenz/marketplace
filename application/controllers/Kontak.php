<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends My_Controller
{
    public function index()
    {
        $data['title'] = 'Waroeng Mahasiswa | Kontak';
        $this->paggingCustomer('customer/kontak', $data);
    }
}
