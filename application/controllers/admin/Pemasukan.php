<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemasukan');
    }

    // Method yang berfungsi sebagai function default pada class pemasukan
    // Bagian ini juga sebagai halaman default pada class pemasukan
    public function index()
    {
        $data['title'] = 'Pemasukan';
        $data['active'] = 'Pemasukan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['pems'] = $this->M_pemasukan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/pemasukan/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah pemasukan
    public function add()
    {
        $data['title'] = 'Tambah Pemasukan';
        $data['active'] = 'Pemasukan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/pemasukan/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data pemasukan yang sudah di masukkan pada form tambah pemasukan
    public function insert()
    {
        $id_akun = $this->input->post('id_akun');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $asal_pemasukan = $this->input->post('asal_pemasukan');
        $jumlah_pemasukan = $this->input->post('jumlah_pemasukan');
        $tgl_pemasukan = $this->input->post('tgl_pemasukan');
        $catatan_pemasukan = $this->input->post('catatan_pemasukan');

        $data = array(
            'id_akun' => $id_akun,
            'nama_pemasukan' => $nama_pemasukan,
            'asal_pemasukan' => $asal_pemasukan,
            'jumlah_pemasukan' => $jumlah_pemasukan,
            'tgl_pemasukan' => $tgl_pemasukan,
            'catatan_pemasukan' => $catatan_pemasukan,
        );

        $this->M_pemasukan->insert($data, 'pemasukan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/pemasukan');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit pemasukan
    public function edit($id_pemasukan)
    {
        $data['title'] = 'Edit Pemasukan';
        $data['active'] = 'Pemasukan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_pemasukan' => $id_pemasukan);
        $data['pems'] = $this->M_pemasukan->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/pemasukan/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data pemasukan yang sudah di masukkan dan diperbarui pada form edit pemasukan
    public function update()
    {
        $id_pemasukan = $this->input->post('id_pemasukan');
        $id_akun = $this->input->post('id_akun');
        $nama_pemasukan = $this->input->post('nama_pemasukan');
        $asal_pemasukan = $this->input->post('asal_pemasukan');
        $jumlah_pemasukan = $this->input->post('jumlah_pemasukan');
        $tgl_pemasukan = $this->input->post('tgl_pemasukan');
        $catatan_pemasukan = $this->input->post('catatan_pemasukan');

        $data = array(
            'id_akun' => $id_akun,
            'nama_pemasukan' => $nama_pemasukan,
            'asal_pemasukan' => $asal_pemasukan,
            'jumlah_pemasukan' => $jumlah_pemasukan,
            'tgl_pemasukan' => $tgl_pemasukan,
            'catatan_pemasukan' => $catatan_pemasukan,
        );

        $where = array('id_pemasukan' => $id_pemasukan);
        $this->M_pemasukan->update($where, $data, 'pemasukan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/pemasukan');
    }

    // Method ini berfungsi sebagai proses penghapusan data pemasukan yang terpilih
    public function delete($id_pemasukan)
    {
        $where = array('id_pemasukan' => $id_pemasukan);
        $this->M_pemasukan->delete($where, 'pemasukan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin/pemasukan');
    }
}
