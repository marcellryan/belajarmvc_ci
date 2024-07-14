<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Purchase_order_model');
        $this->load->model('Supplier_model');
        $this->load->model('Product_model');
    }

    public function index() {
        $data['orders'] = $this->Purchase_order_model->get_all_orders();
        $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
        $this->load->view('purchaseorder/index', $data);

        $orders = $this->Purchase_order_model->get_all_orders();
        foreach ($orders as $order) {
            $order->supplier_name = $this->Supplier_model->get_supplier_name($order->product_supplier_id);
        }

    }

    public function get_products_by_supplier($supplier_id) {
        $products = $this->Product_model->get_products_by_supplier($supplier_id);
        echo json_encode($products);
    }

    public function create() {
        $po_data = [
            'po_number' => $this->input->post('po_number'),
            'request_number' => $this->input->post('request_number'),
            'product_supplier_id' => $this->input->post('supplier_id')
        ];

        $po_id = $this->Purchase_order_model->create_po($po_data);

        $products = $this->input->post('product_id');
        $prices = $this->input->post('price');
        $qtys = $this->input->post('qty');

        foreach ($products as $index => $product_id) {
            $detail_data = [
                'po_id' => $po_id,
                'product_id' => $product_id,
                'price' => $prices[$index],
                'qty' => $qtys[$index]
            ];
            $this->Purchase_order_model->create_po_detail($detail_data);
        }

        echo json_encode(['status' => 'success']);
    }
    
    public function get_po_detail($po_id) {
        $this->db->select('po_detail.*, products.nama as product_name');
        $this->db->from('po_detail');
        $this->db->join('products', 'po_detail.product_id = products.product_id');
            $this->db->where('po_detail.po_id', $po_id);
            $query = $this->db->get();
        echo json_encode($query->result());
    }

    public function details($po_id) {
        $details = $this->Purchase_order_model->get_order_details($po_id);
        echo json_encode($details);
    }
}
?>
