<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembur extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan');
        $this->load->model('M_presensi');
        $this->load->model('M_lembur');
    }

    // Method yang berfungsi sebagai function default pada class presensi
    // Bagian ini juga sebagai halaman default pada class presensi
    public function index()
    {
        $data['title'] = 'Lembur';
        $data['active'] = 'Lembur';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['lem'] = $this->M_lembur->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/lembur/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data presensi yang sudah di masukkan pada form tambah presensi
    public function in()
    {
        date_default_timezone_set('Asia/Manila');
        $id_presensi = $this->input->post('id_presensi');
        $nik = $this->input->post('nik');

        $data = array(
            'nik' => $nik,
            'id_presensi' => $id_presensi,
            'jam_mulai' => date('H:i:s'),
        );
        $this->M_lembur->insert($data, 'lembur');

        $data1 = array(
            'jam_keluar' => date('H:i:s'),
        );
        $where = array('id_presensi' => $id_presensi);
        $this->M_presensi->update1($where, $data1, 'presensi');

        $datax = array(
            'kegiatan' => 2,
        );

        $where = array('nik' => $nik);
        $this->M_karyawan->updatex($where, $datax, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin_lapangan/lembur');
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
        redirect('admin_lapangan/presensi');
    }
    public function reject()
    {
        date_default_timezone_set('Asia/Manila');
        $id_lembur = $this->input->post('id_lembur');
        $nik = $this->input->post('nik');

        $where = array('id_lembur' => $id_lembur);
        $this->M_lembur->delete($where, 'lembur');

        $datax = array(
            'kegiatan' => 0,
        );

        $where = array('nik' => $nik);
        $this->M_karyawan->updatex($where, $datax, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin_lapangan/lembur/');
    }

    public function edit($id_lembur)
    {
        $data['title'] = 'Edit Lembur';
        $data['active'] = 'Lembur';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_lembur' => $id_lembur);
        $data['lem'] = $this->M_lembur->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/lembur/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data presensi yang sudah di masukkan dan diperbarui pada form edit presensi
    public function update()
    {
        $id_lembur = $this->input->post('id_lembur');
        $nik = $this->input->post('nik');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $bayaran = $this->input->post('bayaran');
        $catatan_lembur = $this->input->post('catatan_lembur');
        $status = $this->input->post('status');

        $data = array(
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'bayaran' => $bayaran,
            'catatan_lembur' => $catatan_lembur,
        );

        $where = array('id_lembur' => $id_lembur);
        $this->M_lembur->update($where, $data, 'lembur');

        if ($status == 'Ya') {
            $datax = array(
                'kegiatan' => 0,
            );

            $where = array('nik' => $nik);
            $this->M_karyawan->updatex($where, $datax, 'karyawan');
        } else {

        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin_lapangan/lembur');
    }
    // Method ini berfungsi sebagai proses penghapusan data presensi yang terpilih
    public function delete($id_presensi)
    {
        $where = array('id_presensi' => $id_presensi);
        $this->M_presensi->delete($where, 'presensi');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin_lapangan/presensi');
    }
}