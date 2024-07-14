<?php
class BarangModel extends CI_Model {
    public function getAllBarang() {
        return $this->db->get('barang')->result_array();
    }
}
