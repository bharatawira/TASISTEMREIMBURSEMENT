<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index(){
        $this->load->view('dashboard');
    }

    public function listlaporan() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('listlaporan');
        $this->load->view('template/footer');
    }

    public function listkaryawan() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('listkaryawan');
        $this->load->view('template/footer');
    }

    
}