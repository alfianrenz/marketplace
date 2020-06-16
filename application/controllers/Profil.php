<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    //==============================================
    //          PROFIL WARMA DI FRONTEND
    //==============================================

    public function index()
    {
        $data['title'] = 'Waroeng Mahasiswa | Profil';
        $this->paggingCustomer('customer/profil', $data);
    }


    //==============================================
    //          PROFIL ADMINISTRATOR START
    //==============================================

    public function profil_admin()
    {
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);
        $data['title'] = 'Warma Admin | Profil';
        $this->paggingAdmin('administrator/profil/data_profil', $data);
    }

    //edit profil admin dihalaman admin
    public function edit_profil_admin()
    {
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);
        $data['title'] = 'Warma Admin | Edit Profil';

        //form validation set rules
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'nama', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)'
        ]);
        $this->form_validation->set_rules('telepon', 'nama', 'required|numeric|trim', [
            'required' => 'Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingAdmin('administrator/profil/edit_profil', $data);
        } else {
            $this->user_model->editProfil_admin();
            $this->session->set_flashdata('message', '<div class="flash-data" data-editprofil="Profil Berhasil di Ubah"></div>');
            redirect('profil/profil_admin');
        }
    }

    //ubah password admin dihalaman admin
    public function ubah_password_admin()
    {
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getAdmin_id($id);
        $data['title'] = 'Warma Admin | Ubah Password';

        //form validasi set rules
        $this->form_validation->set_rules('password_lama', 'password_lama', 'required|trim', [
            'required' => 'Password lama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password_baru', 'password_baru', 'required|min_length[3]', [
            'required' => 'Password baru tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi_password', 'required|min_length[3]|matches[password_baru]', [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->paggingAdmin('administrator/profil/ubah_password', $data);
            //jika form validasi benar
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['admin']['password_admin'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password Lama Salah</div>');
                redirect('profil/ubah_password_admin');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('profil/ubah_password_admin');
                } else {
                    //password OK
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password_admin', $password_hash);
                    $this->db->where('id_admin', $this->session->userdata('id'));
                    $this->db->update('admin');
                    $this->session->set_flashdata('message', '<div class="flash-data" data-changepassword="Password Berhasil Diubah"></div>');
                    redirect('profil/ubah_password_admin');
                }
            }
        }
    }


    //==============================================
    //          PROFIL SELLER START
    //==============================================

    public function profil_seller()
    {
        $id = $this->session->userdata('id');
        $data['seller'] = $this->user_model->getSeller_id($id);
        $data['title'] = 'Warma Seller | Profil';
        $this->paggingSeller('seller/profil/data_profil', $data);
    }

    //ubah password seller dihalaman seler
    public function ubah_password_seller()
    {
        $id = $this->session->userdata('id');
        $data['seller'] = $this->user_model->getSeller_id($id);
        $data['title'] = 'Warma Seller | Ubah Password';

        //form validasi set rules
        $this->form_validation->set_rules('password_lama', 'password_lama', 'required|trim', [
            'required' => 'Password lama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password_baru', 'password_baru', 'required|min_length[3]', [
            'required' => 'Password baru tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi_password', 'required|min_length[3]|matches[password_baru]', [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->paggingSeller('seller/profil/ubah_password', $data);
            //jika form validasi benar
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            if (!password_verify($password_lama, $data['seller']['password_seller'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password Lama Salah</div>');
                redirect('profil/ubah_password_seller');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('profil/ubah_password_seller');
                } else {
                    //password OK
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->db->set('password_seller', $password_hash);
                    $this->db->where('id_seller', $this->session->userdata('id'));
                    $this->db->update('seller');
                    $this->session->set_flashdata('message', '<div class="flash-data" data-changepassword="Password Berhasil Diubah"></div>');
                    redirect('profil/ubah_password_seller');
                }
            }
        }
    }
}
