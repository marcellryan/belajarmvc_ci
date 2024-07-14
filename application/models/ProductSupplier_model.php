<?php
class ProductSupplier_model extends CI_Model {

    public function get_all_product_suppliers() {
        $this->db->select('product_supplier.id, product_supplier.supplier_id, product_supplier.product_id, product_supplier.harga, product_supplier.date_created, suppliers.nama_supplier, products.nama as product_name');
        $this->db->from('product_supplier');
        $this->db->join('suppliers', 'product_supplier.supplier_id = suppliers.id');
        $this->db->join('products', 'product_supplier.product_id = products.product_id');
        $query = $this->db->get();
        return $query->result();
    }    

    public function insert_product_supplier($data) {
        return $this->db->insert('product_supplier', $data);
    }

    public function get_product_supplier($id) {
        $this->db->select('*');
        $this->db->from('product_supplier');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_product_supplier($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('product_supplier', $data);
    }

    public function delete_product_supplier($id) {
        $this->db->where('id', $id);
        return $this->db->delete('product_supplier');
    }

    public function get_all_suppliers() {
        $query = $this->db->get('suppliers');
        return $query->result();
    }

    public function get_all_products() {
        $query = $this->db->get('products');
        return $query->result();
    }
}
?>
