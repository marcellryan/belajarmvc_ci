<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        $data['products'] = $this->Product_model->get_all_products_desc(); // tambahkan method baru untuk mengambil data dengan urutan descending
        $this->load->view('product/index', $data);
    }
    

    public function store() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Product_model->insert_product($data);
        redirect('product');
    }

    public function edit($id) {
        $data = $this->Product_model->get_product($id);
        echo json_encode($data);
    }

    public function update() {
        $product_id = $this->input->post('product_id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'status' => $this->input->post('status')
        );
        $this->Product_model->update_product($product_id, $data);
        redirect('product');
    }

    public function delete($id) {
        $this->Product_model->delete_product($id);
        redirect('product');
    }
}
?>
