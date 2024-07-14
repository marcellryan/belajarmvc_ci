<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

     public function get_products_by_supplier($supplier_id) {
        $this->db->where('supplier_id', $supplier_id);
        $query = $this->db->get('products');
        return $query->result();
    }

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function get_all_products_desc() {
        $this->db->order_by('created_at', 'DESC'); // urutkan berdasarkan created_at descending
        $query = $this->db->get('products');
        return $query->result();
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function get_product($product_id) {
        $query = $this->db->get_where('products', array('product_id' => $product_id));
        return $query->row();
    }

    public function update_product($product_id, $data) {
        $this->db->where('product_id', $product_id);
        return $this->db->update('products', $data);
    }
    
    public function delete_product($product_id) {
        $this->db->where('product_id', $product_id);
        return $this->db->delete('products');
    }
}
?>
