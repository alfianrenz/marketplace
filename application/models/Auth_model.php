<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    //registrasi seller
    public function registrasiSeller()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "nim" => $this->input->post('nim'),
            "email_seller" => $this->input->post('email'),
            "password_seller" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "nama_waroeng" => $this->input->post('waroeng'),
            "alamat_seller" => $this->input->post('alamat'),
            "foto_seller" => 'default.png',
            "status_aktif" => 1,
            "telepon_seller" => $this->input->post('telepon'),
            "tanggal_registrasi" => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('seller', $data);
    }

    //registrasi member
    public function registrasiMember()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            "nama_member" => $this->input->post('nama'),
            "email_member" => $this->input->post('email'),
            "password_member" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "status_aktif" => 1,
            "handphone_member" => $this->input->post('handphone'),
            "tanggal_daftar" => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('member', $data);
    }
}
