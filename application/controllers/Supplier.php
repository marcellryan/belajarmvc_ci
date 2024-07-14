<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supplier_model');
    }

    public function index() {
        $data['title'] = 'Supplier';
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
        $this->load->view('supplier/index', $data);
    }

    public function get_all_suppliers() {
        $suppliers = $this->Supplier_model->get_all_suppliers();
        echo json_encode($suppliers);
    }

    public function store() {
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d')
        );

        if ($this->Supplier_model->insert_supplier($data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add supplier']);
        }
    }

    public function edit($id) {
        $data = $this->Supplier_model->get_supplier($id);
        echo json_encode($data);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier'),
            'status' => $this->input->post('status')
        );

        if ($this->Supplier_model->update_supplier($id, $data)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update supplier']);
        }
    }

    public function delete($id) {
        if ($this->Supplier_model->delete_supplier($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete supplier']);
        }
    }
}
?>
