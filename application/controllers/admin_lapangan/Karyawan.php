<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_jabatan');
    }

    // Method yang berfungsi sebagai function default pada class Karyawan
    // Bagian ini juga sebagai halaman default pada class Karyawan
    public function index()
    {
        $data['title'] = 'Karyawan';
        $data['active'] = 'Karyawan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['kar'] = $this->M_karyawan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/karyawan/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }
}
