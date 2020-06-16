<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_seller extends My_Controller
{
    public function index()
    {
        $data['title'] = 'Warma Admin | Data Seller';
        $data['seller'] = $this->db->select('*')
            ->from('seller')
            ->join('mahasiswa', 'seller.nim = mahasiswa.nim')
            ->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi')
            ->where(['id_seller', $this->session->userdata('id')])
            ->get()->result_array();

        $this->paggingAdmin('administrator/seller/data_seller', $data);
    }
}
