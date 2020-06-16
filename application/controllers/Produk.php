<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }

    //====================================
    //                SELLER
    //====================================

    public function daftar_produk()
    {
        $data['title'] = 'Warma Seller | Daftar Produk';
        $data['produk'] = $this->produk_model->getProduk();
        $this->paggingSeller('seller/produk/daftar_produk', $data);
    }

    //tambah produk
    public function tambah_produk()
    {
        $data['title'] = 'Warma Seller | Tambah Produk';
        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama produk tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric|trim', [
            'required' => 'Harga tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'required|numeric|trim', [
            'required' => 'Stok produk tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim', [
            'required' => 'Deskripsi produk tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->paggingSeller('seller/produk/tambah_produk', $data);
        } else {
            $this->produk_model->tambahProduk();
            $this->session->set_flashdata('message', '<div class="flash-data" data-flashdata="Data Berhasil di Tambahkan"></div>');
            redirect('produk/daftar_produk');
        }
    }



    //==================================
    //             CUTOMER
    //================================== 

    //view produk di halaman customer
    public function index()
    {
        $data['title'] = 'Waroeng Mahasiswa | Produk';
        $data['produk'] = $this->produk_model->getAllProduk();
        $this->paggingCustomer('customer/produk', $data);
    }

    //detail produk di customer berdasarkan apa yang dipilih
    public function detail_produk($id)
    {
        $data['title'] = 'Waroeng Mahasiwa | Detail';
        $data['produk'] = $this->produk_model->getProduk_id($id);
        $this->paggingCustomer('customer/detail_produk', $data);
    }

    //tambah_kekeranjang
    public function tambah_kekeranjang($id)
    {
        $produk = $this->produk_model->find($id);
        $data = array(
            'id_seller' => $produk->id_seller,
            'id'        => $produk->id_produk,
            'qty'       => 1,
            'price'     => $produk->harga_produk,
            'name'      => $produk->nama_produk,
            'foto'      => $produk->foto_produk
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Berhasil Di Tambahkan</div>');
        redirect('produk');
    }

    //Detail keranjang belanja
    public function keranjang_belanja()
    {
        $data['title'] = 'Waroeng Mahasiswa | Keranjang';
        $this->paggingCustomer('customer/keranjang', $data);
    }

    //hapus produk di keranjang belanja
    public function hapus_cart_produk($id)
    {
        $data = array(
            'rowid' => $id,
            'qty'   => 0
        );
        $this->cart->update($data);
        redirect('produk/keranjang_belanja');
    }

    //kosongkan keranjang belanja
    public function kosongkan_keranjang()
    {
        $this->cart->destroy();
        redirect('produk/keranjang_belanja');
    }

    //update keranjang
    public function update_keranjang()
    {
        $update = 0;

        //get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        //update item in chart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        //return response
        echo $update ? 'ok' : 'err';
    }
}
