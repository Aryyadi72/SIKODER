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
        $this->load->model('M_presensi');
        $this->load->model('M_lembur');
        $this->load->model('M_gaji');
    }

    // Method yang berfungsi sebagai function default pada class Karyawan
    // Bagian ini juga sebagai halaman default pada class Karyawan
    public function index()
    {
        $data['title'] = 'Karyawan';
        $data['active'] = 'Karyawan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('nik' => $this->input->post('nik'));
        $data['kar'] = $this->M_karyawan->data_id($where);
        $data['pres'] = $this->M_presensi->select();
        $data['lem'] = $this->M_lembur->select();
        $data['gaj'] = $this->M_gaji->select();

        $this->load->view('templates/secondary/header', $data);
        $this->load->view('templates/secondary/navbar', $data);
        $this->load->view('karyawan/v_data', $data);
        $this->load->view('templates/secondary/footer');
    }
}
