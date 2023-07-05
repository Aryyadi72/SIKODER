<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jabatan');
        $this->load->model('M_karyawan');
        $this->load->model('M_presensi');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = 'Dashboard';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('templates/main/footer');
    }
}
