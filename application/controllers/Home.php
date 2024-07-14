<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any required models, libraries, etc.
    }

    public function index() {
        // Define variables to pass to the views
        $data = [
            'title' => 'Home Page', // Define your page title here
            'user' => 'John Doe'    // Example user, replace with dynamic user data
        ];

        // Load the header, sidebar, topbar, main content, and footer views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
