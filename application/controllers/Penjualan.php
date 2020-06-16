<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends My_Controller
{
    public function daftar_pesanan()
    {
        $data['title'] = 'Warma Seller | Daftar Pesanan';
        $this->paggingSeller('seller/penjualan/daftar_pesanan', $data);
    }
}
