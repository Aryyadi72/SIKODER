<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_gaji');
    }

    // Method yang berfungsi sebagai function default pada class gaji
    // Bagian ini juga sebagai halaman default pada class gaji
    public function index()
    {
        $data['title'] = 'Gaji';
        $data['active'] = 'Gaji';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['gaj'] = $this->M_gaji->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/gaji/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah gaji
    public function add()
    {
        $data['title'] = 'Tambah Gaji';
        $data['active'] = 'Gaji';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['kar'] = $this->M_karyawan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/gaji/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data gaji yang sudah di masukkan pada form tambah gaji
    // public function insert()
    // {
    //     $nik = $this->input->post('karyawan');
    //     $pokok = $this->input->post('pokok');
    //     $bon = $this->input->post('bon');
    //     $persen = $this->input->post('persen');
    //     $jumlah_jam = $this->input->post('jumlah_jam');
    //     $tahun = $this->input->post('tahun');
    //     $bulan = $this->input->post('bulan');

    //     $data = array(
    //         'nik' => $nik,
    //         'pokok' => $pokok,
    //         'bon' => $bon,
    //         'persen' => $persen,
    //         'jumlah_jam' => $jumlah_jam,
    //         'tahun' => $tahun,
    //         'bulan' => $bulan,
    //     );

    //     $this->M_gaji->insert($data, 'gaji');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
    //     redirect('admin/gaji');
    // }

    public function insert()
    {
        $nik = $this->input->post('karyawan');
        $pokok = $this->input->post('pokok');
        $bon = $this->input->post('bon');
        $persen = $this->input->post('persen');
        $jumlah_jam = $this->input->post('jumlah_jam');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');

        // Memeriksa apakah data dengan NIK, bulan, dan tahun yang sama sudah ada di database
        $existingData = $this->M_gaji->get_where('gaji', array('nik' => $nik, 'bulan' => $bulan, 'tahun' => $tahun));
        if ($existingData) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data dengan NIK, bulan, dan tahun yang sama sudah ada!</div>');
            redirect('admin/gaji');
            return; // Berhenti eksekusi kode selanjutnya jika data sudah ada
        }

        $data = array(
            'nik' => $nik,
            'pokok' => $pokok,
            'bon' => $bon,
            'persen' => $persen,
            'jumlah_jam' => $jumlah_jam,
            'tahun' => $tahun,
            'bulan' => $bulan,
        );

        $this->M_gaji->insert($data, 'gaji');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil ditambahkan</div>');
        redirect('admin/gaji');
    }


    // Method ini berfungsi sebagai tempat menampilkan halaman edit gaji
    public function edit($id_gaji)
    {
        $data['title'] = 'Edit Gaji';
        $data['active'] = 'Gaji';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_gaji' => $id_gaji);
        $data['gaj'] = $this->M_gaji->data_id($where);
        $data['kar'] = $this->M_karyawan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/gaji/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data gaji yang sudah di masukkan dan diperbarui pada form edit gaji
    public function update()
    {
        $id_gaji = $this->input->post('id_gaji');
        $nik = $this->input->post('karyawan');
        $pokok = $this->input->post('pokok');
        $bon = $this->input->post('bon');
        $persen = $this->input->post('persen');
        $jumlah_jam = $this->input->post('jumlah_jam');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');

        $data = array(
            'nik' => $nik,
            'pokok' => $pokok,
            'bon' => $bon,
            'persen' => $persen,
            'jumlah_jam' => $jumlah_jam,
            'tahun' => $tahun,
            'bulan' => $bulan,
        );

        $where = array('id_gaji' => $id_gaji);
        $this->M_gaji->update($where, $data, 'gaji');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/gaji');
    }

    // Method ini berfungsi sebagai proses penghapusan data gaji yang terpilih
    public function delete($id_gaji)
    {
        $where = array('id_gaji' => $id_gaji);
        $this->M_gaji->delete($where, 'gaji');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin/gaji');
    }
}
