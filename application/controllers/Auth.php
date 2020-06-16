<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('auth_model');
    }


    //===============================================
    //              LOGIN ADMINISTRATOR
    //===============================================

    public function index()
    {
        //SESSION
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }

        $data['title'] = 'Warma Admin | Login';

        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Username atau email tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/administrator/login_admin', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            // $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

            $admin = $this->db->select('*')
                ->from('admin')
                ->where('email_admin', $email)
                ->or_where('username_admin', $email)
                ->get()->row_array();

            //jika user ada
            if ($admin) {
                //cek password
                if (password_verify($password, $admin['password_admin'])) {
                    $data = [
                        'id' => $admin['id_admin'],
                        'username' => $admin['username_admin'],
                        'nama' => $admin['nama_admin'],
                        'email' => $admin['email_admin'],
                        'id_level' => $admin['id_level'],
                        'foto' => $admin['foto_admin']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Username atau Email tidak terdaftar</div>');
                redirect('auth');
            }
        }
    }

    // Logout Administrator
    public function logout_admin()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_level');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Logout Berhasil</div>');
        redirect('auth');
    }

    //lupa password
    public function lupa_password_admin()
    {
        $data['title'] = 'Warma Admin | Lupa Password';

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/administrator/lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

            if ($admin) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot_admin');
                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Terkirim! cek email untuk mereset password</div>');
                redirect('auth/lupa_password_admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Email tidak terdaftar</div>');
                redirect('auth/lupa_password_admin');
            }
        }
    }

    //konfigurasi email
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bkmcic.official@gmail.com',
            'smtp_pass' => 'bkmendas2019',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from('bkmcic.oficial@gmail.com', 'Waroeng Mahasiswa UCIC');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot_admin') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik untuk mereset password : <a href="' . base_url() . 'auth/reset_password_admin?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'forgot_seller') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik untuk mereset password : <a href="' . base_url() . 'auth/reset_password_seller?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'verify') {
            $this->email->subject('Aktivasi akun');
            $this->email->message('Klik untuk mengaktifkan akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan akun</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //reset password
    public function reset_password_admin()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

        if ($admin) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password_admin();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/lupa_password_admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Gagal mereset password</div>');
            redirect('auth/lupa_password_admin');
        }
    }

    //ubah password
    public function ubah_password_admin()
    {
        // cek session
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $data['title'] = 'Warma Admin | Ubah Password';

        //form validasi
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password di isi minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|min_length[3]|matches[password1]', [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
            'min_length' => 'Konfirmasi password minimal 3 karakter'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/administrator/ubah_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password_admin', $password);
            $this->db->where('email_admin', $email);
            $this->db->update('admin');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Password Berhasil Diubah</div>');
            redirect('auth');
        }
    }


    //===============================================
    //              LOGIN SELLER
    //===============================================

    public function login_seller()
    {
        //SESSION
        if ($this->session->userdata('id')) {
            redirect('dashboard/seller');
        }

        $data['title'] = 'Waroeng Mahasiswa | Login';

        $this->form_validation->set_rules('nim', 'nim', 'required|trim|numeric', [
            'required' => 'NIM tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/seller/login_seller', $data);
        } else {
            $nim = $this->input->post('nim');
            $password = $this->input->post('password');
            $seller = $this->db->get_where('seller', ['nim' => $nim])->row_array();

            //jika user ada
            if ($seller) {

                //cek akun aktif
                if ($seller['status_aktif'] == 1) {

                    //cek password
                    if (password_verify($password, $seller['password_seller'])) {

                        $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

                        $data = [
                            'id' => $seller['id_seller'],
                            'email' => $seller['email_seller'],
                            'foto' => $seller['foto_seller'],
                            'nama' => $mahasiswa['nama_mahasiswa']
                        ];
                        $this->session->set_userdata($data);
                        redirect('dashboard/seller');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password salah</div>');
                        redirect('auth/login_seller');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun anda tidak aktif</div>');
                    redirect('auth/login_seller');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">NIM belum terdaftar</div>');
                redirect('auth/login_seller');
            }
        }
    }

    // Logout Seller
    public function logout_seller()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Logout Berhasil</div>');
        redirect('auth/login_seller');
    }


    //registrasi seller
    public function registrasi_seller()
    {
        $data['title'] = 'Waroeng Mahasiswa | Daftar';

        //validasi set rules
        $this->form_validation->set_rules('nim', 'nim', 'required|trim|numeric|is_unique[seller.nim]', [
            'required' => 'NIM tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka',
            'is_unique' => 'NIM sudah terdaftar sebagai seller'
        ]);
        $this->form_validation->set_rules('waroeng', 'waroeng', 'required|trim', [
            'required' => 'Nama waroeng tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[seller.email_seller]', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)',
            'is_unique' => 'Email ini sudah ada'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric', [
            'required' => 'Telepon tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/seller/registrasi_seller', $data);
        } else {
            $nim = $this->input->post('nim');
            $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

            if (!$mahasiswa) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">NIM anda tidak terdaftar</div>');
                redirect('auth/registrasi_seller');
            } else {
                //input ke table seller
                $this->auth_model->registrasiSeller();

                // //siapkan token
                // $token = base64_encode(random_bytes(32));
                // $user_token = [
                //     'email' => $this->input->post('email'),
                //     'token' => $token,
                //     'date_created' => time()
                // ];
                // $this->db->insert('user_token', $user_token);

                // //kirim ke email
                // $this->_sendEmail($token, 'verify');

                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Registrasi Berhasil</div>');
                redirect('auth/login_seller');
            }
        }
    }

    //verifikasi akun
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $seller = $this->db->get_where('seller', ['email_seller' => $email])->row_array();

        if ($seller) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->db->set('status_aktif', 1);
                $this->db->where('email_seller', $email);
                $this->db->update('seller');

                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Akun berhasil di aktifkan</div>');
                redirect('auth/login_seller');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/login_seller');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Aktivasi gagal! email salah!</div>');
            redirect('auth/login_seller');
        }
    }

    //lupa password
    public function lupa_password_seller()
    {
        $data['title'] = 'Waroeng Mahasiswa | Lupa Password';

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/seller/lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $seller = $this->db->get_where('seller', ['email_seller' => $email])->row_array();

            if ($seller) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot_seller');

                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Terkirim! cek email untuk mereset password</div>');
                redirect('auth/lupa_password_seller');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Email tidak terdaftar</div>');
                redirect('auth/lupa_password_seller');
            }
        }
    }

    //reset password
    public function reset_password_seller()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $seller = $this->db->get_where('seller', ['email_seller' => $email])->row_array();

        if ($seller) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password_seller();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/lupa_password_seller');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Gagal mereset password</div>');
            redirect('auth/lupa_password_seller');
        }
    }

    //ubah password
    public function ubah_password_seller()
    {
        // cek session
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login_seller');
        }

        $data['title'] = 'Waroeng Mahasiswa | Ubah Password';

        //form validasi
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password di isi minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|min_length[3]|matches[password1]', [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
            'min_length' => 'Konfirmasi password minimal 3 karakter'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/seller/ubah_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password_seller', $password);
            $this->db->where('email_seller', $email);
            $this->db->update('seller');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Password Berhasil Diubah</div>');
            redirect('auth/login_seller');
        }
    }

    //===============================================
    //              LOGIN MEMBER
    //===============================================

    public function login_member()
    {

        $data['title'] = 'Waroeng Mahasiswa | Login';

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Username atau email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/member/login_member', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $member = $this->db->get_where('member', ['email_member' => $email])->row_array();

            // $member = $this->db->select('*')
            //     ->from('member')
            //     ->where('email_member', $email)
            //     ->or_where('username_member', $email)
            //     ->get()->row_array();

            //jika user ada
            if ($member) {
                //cek password
                if (password_verify($password, $member['password_member'])) {
                    $data = [
                        'id_member' => $member['id_member'],
                        'nama' => $member['nama_member'],
                        'email' => $member['email_member'],
                        'handphone' => $member['handphone_member'],
                        'foto' => $member['foto_member']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Password Salah</div>');
                    redirect('auth/login_member');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Username atau Email tidak terdaftar</div>');
                redirect('auth/login_member');
            }
        }
    }

    //registrasi member
    public function registrasi_member()
    {
        $data['title'] = 'Waroeng Mahasiswa | Daftar';

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[member.email_member]', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email (warma@gmail.com)',
            'is_unique' => 'Email ini sudah ada'
        ]);
        $this->form_validation->set_rules('handphone', 'handphone', 'required|trim|numeric', [
            'required' => 'No Handphone tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/member/registrasi_member', $data);
        } else {
            //input ke table seller
            $this->auth_model->registrasiMember();

            // //siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $this->input->post('email'),
            //     'token' => $token,
            //     'date_created' => time()
            // ];
            // $this->db->insert('user_token', $user_token);

            // //kirim ke email
            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Registrasi Berhasil</div>');
            redirect('auth/login_member');
        }
    }

    //logout member
    public function logout_member()
    {
        $this->session->unset_userdata('id_member');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Logout Berhasil</div>');
        redirect('home');
    }
}
