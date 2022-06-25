<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if ($this->admin->is_role() != "user") {
            redirect("login/");
        }
    }

    public function index()
    {
        $data['role'] = $this->admin->is_role();
        $this->load->view('vtemplates/header');
        $this->load->view('vtemplates/side', $data);
        $this->load->view('user/dashboard');
        $this->load->view('vtemplates/footer');

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
