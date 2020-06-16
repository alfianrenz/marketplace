<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Waroeng Mahasiswa | Checkout';
        // $data['provinsi'] = $this->db->get('provinsi')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Harus di isi dengan format email'
        ]);
        $this->form_validation->set_rules('handphone', 'handphone', 'required|numeric', [
            'required' => 'No Handphone tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required', [
            'required' => 'Kabupaten tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required', [
            'required' => 'Kecamatan tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('kodepos', 'kodepos', 'required', [
            'required' => 'Kode POS tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->paggingCustomer('customer/checkout', $data);
        } else {
            $order = $this->transaksi_model->dataOrder();
            if ($order) {
                $this->cart->destroy();
                $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Berhasil Memesan</div>');

                $data['snaptoken'] = $order;
                $this->paggingCustomer('customer/payment', $data);
            }
        }
    }

    public function callback()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-kbDhOYnPE-xqkkyHUaPf4kKy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        log_message("Order ID $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud", false);

        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'challenge
                $data = [
                    'status_bayar' => 'challenge'
                ];
                $this->db->where('kode_invoice', $notif->order_id);
                $this->db->update('order', $data);
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'success'
                $data = [
                    'status_bayar' => 'success'
                ];
                $this->db->where('kode_invoice', $notif->order_id);
                $this->db->update('order', $data);
            }
        } else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
                // TODO Set payment status in merchant's database to 'failure'
                $data = [
                    'status_bayar' => 'failure'
                ];
                $this->db->where('kode_invoice', $notif->order_id);
                $this->db->update('order', $data);
            } else if ($fraud == 'accept') {
                // TODO Set payment status in merchant's database to 'failure'
                $data = [
                    'status_bayar' => 'failure'
                ];
                $this->db->where('kode_invoice', $notif->order_id);
                $this->db->update('order', $data);
            }
        } else if ($transaction == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $data = [
                'status_bayar' => 'failure'
            ];
            $this->db->where('kode_invoice', $notif->order_id);
            $this->db->update('order', $data);
        }

        $data = [
            'status_bayar' => 'settlement'
        ];
        $this->db->where('kode_invoice', $notif->order_id);
        $this->db->update('order', $data);
    }
}
