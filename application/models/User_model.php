<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // =========================================
    //            USER ADMINISTRATOR
    // =========================================

    //Get data admin by id
    public function getAdmin_id($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(['id_admin' => $id]);
        return $this->db->get()->row_array();
    }

    //Edit profil Admin
    public function editProfil_Admin()
    {
        $id_admin = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');

        //cek jika ada gambar
        $upload_image = $_FILES['foto'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['file_name']     = $this->input->post('nama');
            $config['upload_path']   = './assets/upload/foto_user/';
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        //update nama, uesername, email dan telepon
        $this->db->set('nama_admin', $nama);
        $this->db->set('username_admin', $username);
        $this->db->set('email_admin', $email);
        $this->db->set('telepon_admin', $telepon);
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin');
    }

    //Ubah password admin
    public function ubahPassword_admin()
    {
    }



    // =========================================
    //            USER SELLER
    // =========================================

    //Get data seller by id
    public function getSeller_id($id)
    {
        $this->db->select('*');
        $this->db->from('seller');
        $this->db->join('mahasiswa', 'seller.nim = mahasiswa.nim');
        $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
        $this->db->join('fakultas', 'mahasiswa.id_fakultas = fakultas.id_fakultas');
        $this->db->where(['id_seller' => $id]);
        return $this->db->get()->row_array();
    }
}
