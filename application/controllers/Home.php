<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
	}

	public function index()
	{
		$data['title'] = 'Waroeng Mahasiswa | Home';

		//menampilkan seluruh produk
		$data['produk'] = $this->produk_model->getAllProduk();
		$this->paggingCustomer('customer/home', $data);
	}
}
