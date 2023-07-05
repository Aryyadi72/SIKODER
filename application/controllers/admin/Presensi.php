<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_presensi');
    }

    // Method yang berfungsi sebagai function default pada class presensi
    // Bagian ini juga sebagai halaman default pada class presensi
    public function index()
    {
        $data['title'] = 'Presensi';
        $data['active'] = 'Presensi';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['kar'] = $this->M_karyawan->select();
        // $data['pres'] = $this->M_presensi->select();
        $where = array('tgl_presensi' => date('Y-m-d'));
        $data['pres'] = $this->M_presensi->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/presensi/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah presensi
    public function history()
    {
        $data['title'] = 'Presensi';
        $data['active'] = 'Presensi';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['kar'] = $this->M_karyawan->select();
        $data['pres'] = $this->M_presensi->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/presensi/v_history', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data presensi yang sudah di masukkan pada form tambah presensi
    public function in()
    {
        date_default_timezone_set('Asia/Manila');
        $nik = $this->input->post('nik');

        $data = array(
            'nik' => $nik,
            'tgl_presensi' => date('Y-m-d'),
            'jam_masuk' => date('H:i:s'),
        );
        $this->M_presensi->insert($data, 'presensi');

        $datax = array(
            'kegiatan' => 1,
        );

        $where = array('nik' => $nik);
        $this->M_karyawan->updatex($where, $datax, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/presensi');
    }
    public function out()
    {
        date_default_timezone_set('Asia/Manila');
        $nik = $this->input->post('nik');
        $id_presensi = $this->input->post('id_presensi');

        $data = array(
            'jam_keluar' => date('H:i:s'),
        );
        $where = array('id_presensi' => $id_presensi);
        $this->M_presensi->update($where, $data, 'presensi');

        $datax = array(
            'kegiatan' => 0,
        );

        $where = array('nik' => $nik);
        $this->M_karyawan->updatex($where, $datax, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/presensi');
    }
    public function reject()
    {
        date_default_timezone_set('Asia/Manila');
        $nik = $this->input->post('nik');
        $id_presensi = $this->input->post('id_presensi');

        $where = array('id_presensi' => $id_presensi);
        $this->M_presensi->delete($where, 'presensi');

        $datax = array(
            'kegiatan' => 0,
        );

        $where = array('nik' => $nik);
        $this->M_karyawan->updatex($where, $datax, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/presensi');
    }

    // Method ini berfungsi sebagai proses penghapusan data presensi yang terpilih
    public function delete($id_presensi)
    {
        $where = array('id_presensi' => $id_presensi);
        $this->M_presensi->delete($where, 'presensi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin/presensi');
    }
}
    // Method ini berfungsi sebagai proses penyimpanan data presensi yang sudah di masukkan pada form tambah presensi
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

    //     $this->M_presensi->insert($data, 'presensi');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
    //     redirect('admin/presensi');
    // }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit presensi
    // public function edit($id_presensi)
    // {
    //     $data['title'] = 'Edit Presensi';
    //     $data['active'] = 'Presensi';
    //     $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

    //     $where = array('id_presensi' => $id_presensi);
    //     $data['gaj'] = $this->M_presensi->data_id($where);
    //     $data['kar'] = $this->M_karyawan->select();

    //     $this->load->view('templates/main/header', $data);
    //     $this->load->view('templates/main/navbar', $data);
    //     $this->load->view('templates/main/sidebar', $data);
    //     if ($this->session->userdata('level') == 'Administrator') {
    //         $this->load->view('admin/presensi/v_edit', $data);
    //     } else {
    //         $this->load->view('other/forbiden');
    //     }
    //     $this->load->view('templates/main/footer');
    // }

    // Method ini berfungsi sebagai proses penyimpanan data presensi yang sudah di masukkan dan diperbarui pada form edit presensi
    // public function update()
    // {
    //     $id_presensi = $this->input->post('id_presensi');
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

    //     $where = array('id_presensi' => $id_presensi);
    //     $this->M_presensi->update($where, $data, 'presensi');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
    //     redirect('admin/presensi');
    // }
