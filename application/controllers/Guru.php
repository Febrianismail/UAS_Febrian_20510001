<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('admin');
    }


    public function index()
    {
        if ($this->admin->is_role() == null) {
            redirect('login');
        }
        $data['title'] = 'Guru';
        $data['guru'] = $this->guru_model->get_data('tbl_guru')->result();
        $data['role'] = $this->admin->is_role();
        $this->load->view('vtemplates/header', $data);
        $this->load->view('vtemplates/side', $data);
        $this->load->view('guru', $data);
        $this->load->view('vtemplates/footer');
    }

    public function cetak_guru()
    {
        $data['guru'] = $this->guru_model->get_all();
        $this->load->library('pdf');
        $this->pdf->setPaper('a4','potrait');
        $this->pdf->filename = "guru";
        $this->pdf->load_view('cetak/guru',$data);
    }

    public function tambah()
    {
        if ($this->admin->is_role() == null) {
            redirect('login');
        }
        $data['title'] = 'Tambah guru';
        $data['role'] = $this->admin->is_role();

        $this->load->view('vtemplates/header', $data);
        $this->load->view('vtemplates/side', $data);
        $this->load->view('tambah_guru', $data);
        $this->load->view('vtemplates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $data = array(
                'nama_guru' => $this->input->post('nama_guru'),
                'bidang_studi' => $this->input->post('bidang_studi'),
                'walikelas' => $this->input->post('walikelas'),
                'alamat_guru' => $this->input->post('alamat_guru'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
            );

            $this->guru_model->insert_data($data, 'tbl_guru');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
            redirect('guru');
        }
    }

    public function edit($id_guru)
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array(
                'id_guru' => $id_guru,
                'nama_guru' => $this->input->post('nama_guru'),
                'bidang_studi' => $this->input->post('bidang_studi'),
                'walikelas' => $this->input->post('walikelas'),
                'alamat_guru' => $this->input->post('alamat_guru'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
            );

            $this->guru_model->update_data($data, 'tbl_guru');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
            redirect('guru');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_guru', 'Nama guru', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('bidang_studi', 'Bidang studi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('walikelas', 'walikelas', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat_guru', 'Alamat guru', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
    }

    public function delete($id)
    {
        $where = array('id_guru' => $id);

        $this->guru_model->delete($where, 'tbl_guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasi Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
        redirect('guru');
    }

}
