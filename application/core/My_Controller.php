<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }

    //template administrator
    public function paggingAdmin($content, $data = NULL)
    {
        //session admin
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();

        $data['header'] = $this->load->view('template/admin/header', $data, TRUE);
        $data['menu'] = $this->load->view('template/admin/menu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/admin/index', $data);
    }

    //template seller
    public function paggingSeller($content, $data = NULL)
    {
        //session seller
        $data['session'] =
            $this->db->select('*')
            ->from('seller')
            ->join('mahasiswa', 'seller.nim = mahasiswa.nim')
            ->where('id_seller', $this->session->userdata('id'))
            ->get()->row_array();

        $data['header'] = $this->load->view('template/seller/header', $data, TRUE);
        $data['menu'] = $this->load->view('template/seller/menu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $this->load->view('template/seller/index', $data);
    }

    //template frontend
    public function paggingCustomer($content, $data = NULL)
    {
        $data['kategori'] = $this->kategori_model->getKategori();
        $data['header'] = $this->load->view('template/customer/header', $data, TRUE);
        $data['menu'] = $this->load->view('template/customer/menu', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('template/customer/footer', $data, TRUE);
        $this->load->view('template/customer/index', $data);
    }
}
