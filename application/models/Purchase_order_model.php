<?php
class Purchase_order_model extends CI_Model {

    public function get_all_orders() {
        $this->db->select('purchase_order.*, suppliers.nama_supplier as supplier_name');
        $this->db->from('purchase_order');
        $this->db->join('suppliers', 'purchase_order.product_supplier_id = suppliers.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_po($data) {
        $this->db->insert('purchase_order', $data);
        return $this->db->insert_id();
    }

    public function create_po_details($data) {
        $this->db->insert('po_detail', $data);
    }

    public function get_order_details($po_id) {
        $this->db->select('purchase_order.*, suppliers.nama_supplier, po_detail.*');
        $this->db->from('purchase_order');
        $this->db->join('product_supplier', 'purchase_order.product_supplier_id = product_supplier.id');
        $this->db->join('suppliers', 'product_supplier.supplier_id = suppliers.id');
        $this->db->join('po_detail', 'purchase_order.po_id = po_detail.po_id');
        $this->db->where('purchase_order.po_id', $po_id);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
