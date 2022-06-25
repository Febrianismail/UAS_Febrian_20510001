<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('vtemplates/header', $data);
        $this->load->view('vtemplates/side', $data);
        $this->load->view('dashboard');
        $this->load->view('vtemplates/footer');
    }
}
