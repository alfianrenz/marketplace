<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    //Get seluruh data produk di frontend
    public function getAllProduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        return $this->db->get()->result_array();
    }

    //Get data produk di table bagian seller
    public function getProduk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $this->db->where(['id_seller' => $this->session->userdata('id')]);
        return $this->db->get()->result_array();
    }

    //get data produk berdasarkan id
    public function getProduk_id($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('seller', 'produk.id_seller = seller.id_seller');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $this->db->where(['id_produk' => $id]);
        return $this->db->get()->row_array();
    }

    //tambah_produk dibagian seller
    public function tambahProduk()
    {
        //upload gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '6144';
            $config['file_name']     = $this->input->post('nama');
            $config['upload_path']   = './assets/upload/foto_produk/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');

                date_default_timezone_set('Asia/Jakarta');
                $data = [
                    "id_seller" => $this->session->userdata('id'),
                    "nama_produk" => $this->input->post('nama', true),
                    "id_kategori" => $this->input->post('kategori', true),
                    "kondisi_produk" => $this->input->post('kondisi', true),
                    "harga_produk" => $this->input->post('harga', true),
                    "stok_produk" => $this->input->post('stok', true),
                    "deskripsi_produk" => $this->input->post('deskripsi', true),
                    "foto_produk" => $foto,
                    "tanggal_input" => date('Y-m-d H:i:s'),
                    "status_produk" => 1,
                ];
                $this->db->insert('produk', $data);
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('produk/tambah_produk');
            }
        }
    }

    //find untuk tambah ke cart
    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('produk');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
