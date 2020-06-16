<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{
    //Dashboard Administrator
    public function index()
    {
        //tidak bisa masuk dashbaord sebelum login
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $data['title'] = 'Warma Admin | Dashboard';
        $data['jumlahseller'] = $this->db->get('seller')->num_rows();
        $data['jumlahkategori'] = $this->db->get('kategori')->num_rows();
        $this->paggingAdmin('administrator/dashboard/dashboard', $data);
    }

    //Dashboard Seller
    public function seller()
    {
        //tidak bisa masuk dashboard sebelum login
        if (!$this->session->userdata('id')) {
            redirect('auth/login_seller');
        }

        $data['title'] = 'Warma Seller | Dashboard';
        $data['jumlahproduk'] = $this->db->get_where('produk', ['id_seller' => $this->session->userdata('id')])->num_rows();
        $this->paggingSeller('seller/dashboard/dashboard', $data);
    }
}
