<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    //masukkan ke table order
    public function dataOrder()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-kbDhOYnPE-xqkkyHUaPf4kKy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $produk = $this->cart->contents();

        //data transaksi
        $transaction_details = [
            'order_id' => rand(),
            'gross_amount' => $this->cart->total()
        ];

        //produk
        $item_details = [];
        foreach ($produk as $produk) {
            $item_details[] = [
                'id' => $produk['id'],
                'price' => $produk['subtotal'],
                'quantity' => $produk['qty'],
                'name' => $produk['name']
            ];
        }

        //customer detail, billing address, shipping address
        $data = [
            'first_name'  => $this->input->post('nama'),
            'email'       => $this->input->post('email'),
            'address'     => $this->input->post('alamat'),
            'city'        => $this->input->post('kabupaten'),
            'postal_code' => $this->input->post('kodepos'),
            'phone'       => $this->input->post('handphone'),
        ];

        $customer_details = $data;
        $billing_address = $data;
        $shipping_address = $data;


        $enable_payments = [
            'credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel', 'alfamart', 'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va', 'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret', 'danamon_online', 'akulaku'
        ];

        $transaction = [
            'enabled_payments'    => $enable_payments,
            'customer_details'    => $customer_details,
            'item_details'        => $item_details,
            'transaction_details' => $transaction_details,
            'billing_address'     => $billing_address,
            'shipping_address'    => $shipping_address
        ];

        $data = [
            'kode_invoice' => $transaction_details['order_id'],
            'first_name'  => $this->input->post('nama'),
            'email'       => $this->input->post('email'),
            'address'     => $this->input->post('alamat'),
            'city'        => $this->input->post('kabupaten'),
            'postal_code' => $this->input->post('kodepos'),
            'phone'       => $this->input->post('handphone'),
            'gross_amount' => $this->cart->total()
        ];
        $this->db->insert('order', $data);

        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        return $snapToken;
    }
}
