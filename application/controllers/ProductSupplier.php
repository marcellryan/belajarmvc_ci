<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductSupplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductSupplier_model');
    }

    public function index() {
        $this->load->model('ProductSupplier_model');
        $data['product_suppliers'] = $this->ProductSupplier_model->get_all_product_suppliers();
        $data['suppliers'] = $this->ProductSupplier_model->get_all_suppliers();
        $data['products'] = $this->ProductSupplier_model->get_all_products();
        $this->load->view('productsupplier/index', $data);
    }
    

    public function store() {
        $data = array(
            'product_id' => $this->input->post('product_id'),
            'supplier_id' => $this->input->post('supplier_id'),
            'harga' => $this->input->post('harga')
        );

        $this->ProductSupplier_model->insert_product_supplier($data);
        echo json_encode(['status' => 'success']);
    }

    public function edit($id) {
        $data['product_supplier'] = $this->ProductSupplier_model->get_product_supplier($id);
        $data['suppliers'] = $this->ProductSupplier_model->get_all_suppliers();
        $data['products'] = $this->ProductSupplier_model->get_all_products();
        $this->load->view('productsupplier/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'product_id' => $this->input->post('product_id'),
            'supplier_id' => $this->input->post('supplier_id'),
            'harga' => $this->input->post('harga')
        );

        $this->ProductSupplier_model->update_product_supplier($id, $data);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->ProductSupplier_model->delete_product_supplier($id);
        echo json_encode(['status' => 'success']);
    }

    public function get_product_suppliers() {
        $data = $this->ProductSupplier_model->get_all_product_suppliers();
        echo json_encode($data);
    }
}
?>
