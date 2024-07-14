<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function get_all_suppliers() {
        $query = $this->db->get('suppliers');
        return $query->result();
    }

    public function insert_supplier($data) {
        return $this->db->insert('suppliers', $data);
    }

    public function get_supplier($id) {
        return $this->db->get_where('suppliers', array('id' => $id))->row();
    }

    public function update_supplier($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('suppliers', $data);
    }

    public function delete_supplier($id) {
        $this->db->where('id', $id);
        return $this->db->delete('suppliers');
    }

    public function get_supplier_name($supplier_id) {
        $this->db->select('nama_supplier');
        $this->db->from('suppliers');
        $this->db->where('id', $supplier_id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            return $result->nama_supplier;
        } else {
            return null;
        }
    }
}
?>
