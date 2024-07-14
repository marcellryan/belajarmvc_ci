<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('Barang_model');
    }

    public function index() {
        // Ambil data dari model
        $data['barang'] = $this->Barang_model->get_all_barang();
        // Load view dan kirim data
        $this->load->view('barang/barang_view', $data);
        $this->load->view('templates/header', $data);
    }
}
