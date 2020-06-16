<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }

    //get seluruh data kategori
    public function index()
    {
        $data['title'] = 'Warma Admin | Kategori';
        $data['kategori'] = $this->kategori_model->getKategori();
        $this->paggingAdmin('administrator/kategori/data_kategori', $data);
    }

    //tambah kategori
    public function tambah_kategori()
    {
        $data['title'] = 'Warma Admin | Tambah Kategori';

        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim|is_unique[kategori.nama_kategori]', [
            'required' => 'Nama kategori tidak boleh kosong',
            'is_unique' => 'Kategori ini sudah ada'
        ]);

        if ($this->form_validation->run() == false) {
            $this->paggingAdmin('administrator/kategori/tambah_kategori', $data);
        } else {
            $this->kategori_model->tambahKategori();
            $this->session->set_flashdata('message', '<div class="flash-data" data-flashdata="Data Berhasil di Tambahkan"></div>');
            redirect('kategori');
        }
    }

    //edit kategori
    public function edit_kategori($id)
    {
        $data['title'] = 'Warma Admin | Edit Kategori';
        $data['kategori'] = $this->kategori_model->getKategori_id($id);

        //form validation set rules
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim', [
            'required' => 'Kolom kategori tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingAdmin('administrator/kategori/edit_kategori', $data);
        } else {
            $this->kategori_model->editKategori();
            $this->session->set_flashdata('message', '<div class="flash-data" data-flashdata="Data Berhasil di Edit"></div>');
            redirect('kategori');
        }
    }

    //hapus kategori
    public function hapus_kategori($id)
    {
        $this->kategori_model->hapusKategori($id);
        $this->session->set_flashdata('message', '<div class="flash-data" data-flashdata="Data Berhasil di Hapus"></div>');
        redirect('kategori');
    }
}
