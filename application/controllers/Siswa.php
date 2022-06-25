<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('admin');
    }


    public function index()
    {
        if ($this->admin->is_role() == null) {
            redirect('login');
        }
        $data['title'] = 'Siswa';
        $data['siswa'] = $this->siswa_model->get_data('tbl_siswa')->result();
        $data['role'] = $this->admin->is_role();
        $this->load->view('vtemplates/header', $data);
        $this->load->view('vtemplates/side', $data);
        $this->load->view('siswa', $data);
        $this->load->view('vtemplates/footer');
    }

    public function tambah()
    {
        if ($this->admin->is_role() == null) {
            redirect('login');
        }
        $data['title'] = 'Tambah siswa';
        $data['role'] = $this->admin->is_role();

        $this->load->view('vtemplates/header', $data);
        $this->load->view('vtemplates/side', $data);
        $this->load->view('tambah_siswa',$data);
        $this->load->view('vtemplates/footer');
    }

    public function cetak_siswa()
    {
        $data['siswa'] = $this->siswa_model->get_all();
        $this->load->library('pdf');
        $this->pdf->setPaper('a4','potrait');
        $this->pdf->filename = "siswa";
        $this->pdf->load_view('cetak/siswa',$data);
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $data = array(
                'nama_siswa' => $this->input->post('nama_siswa'),
                'kelas_siswa' => $this->input->post('kelas_siswa'),
                'alamat_siswa' => $this->input->post('alamat_siswa'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
            );

            $this->siswa_model->insert_data($data, 'tbl_siswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
            redirect('siswa');
        }
    }

    public function edit($id_siswa)
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array(
                'id_siswa' => $id_siswa,
                'nama_siswa' => $this->input->post('nama_siswa'),
                'kelas_siswa' => $this->input->post('kelas_siswa'),
                'alamat_siswa' => $this->input->post('alamat_siswa'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
            );

            $this->siswa_model->update_data($data, 'tbl_siswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
            redirect('siswa');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kelas_siswa', 'Kelas siswa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat_siswa', 'Alamat siswa', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
    }

    public function delete($id)
    {
        $where = array('id_siswa' => $id);

        $this->siswa_model->delete($where, 'tbl_siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasi Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>');
        redirect('siswa');
    }
}
