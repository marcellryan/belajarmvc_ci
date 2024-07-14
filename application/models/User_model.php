<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user_menu($role_id) {
        $queryMenu = "SELECT user_menu.id, menu
                      FROM user_menu 
                      JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
                      WHERE user_access_menu.role_id = $role_id
                      ORDER BY user_access_menu.menu_id ASC";
        return $this->db->query($queryMenu)->result_array();
    }

    public function get_sub_menu($menu_id) {
        $querySubMenu = "SELECT *
                         FROM user_sub_menu 
                         JOIN user_menu ON user_sub_menu.menu_id = user_menu.id
                         WHERE user_sub_menu.menu_id = $menu_id
                         AND user_sub_menu.is_active = 1";
        return $this->db->query($querySubMenu)->result_array();
    }
}
