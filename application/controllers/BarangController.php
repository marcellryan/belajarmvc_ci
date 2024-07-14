<?php
class BarangController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('BarangModel');
    }

    public function index() {
        $data['title'] = 'Request Barang';
        $data['barang'] = $this->BarangModel->getAllBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function proses($jenis_barang) {
        $data['title'] = 'Pilih Supplier';
        $this->load->model('SupplierModel');
        $data['suppliers'] = $this->SupplierModel->getSuppliersByJenisBarang($jenis_barang);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang/proses', $data);
        $this->load->view('templates/footer');
    }

    public function prosesSupplier() {
        $supplier_id = $this->input->post('supplier');
        // Lakukan sesuatu dengan $supplier_id, misalnya menyimpan ke database atau memproses lebih lanjut
        redirect('barang');
    }
}
