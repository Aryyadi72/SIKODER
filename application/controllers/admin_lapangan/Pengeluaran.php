<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengeluaran');
    }

    // Method yang berfungsi sebagai function default pada class pengeluaran
    // Bagian ini juga sebagai halaman default pada class pengeluaran
    public function index()
    {
        $data['title'] = 'Pengeluaran';
        $data['active'] = 'Pengeluaran';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['peng'] = $this->M_pengeluaran->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/pengeluaran/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah pengeluaran
    public function add()
    {
        $data['title'] = 'Tambah Pengeluaran';
        $data['active'] = 'Pengeluaran';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/pengeluaran/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data pengeluaran yang sudah di masukkan pada form tambah pengeluaran
    public function insert()
    {
        $id_akun = $this->input->post('id_akun');
        $nomor_pengeluaran = date('Ymdhis');
        $tgl_pengeluaran = $this->input->post('tgl_pengeluaran');
        $catatan_pengeluaran = $this->input->post('catatan_pengeluaran');
        
        $pengeluaran_untuk = $this->input->post('pengeluaran_untuk');
        $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');

        $data = array(
            'id_akun' => $id_akun,
            'nomor_pengeluaran' => $nomor_pengeluaran,
            'tgl_pengeluaran' => $tgl_pengeluaran,
            'catatan_pengeluaran' => $catatan_pengeluaran,
        );

        $this->M_pengeluaran->insert($data, 'pengeluaran');


        $total = count($pengeluaran_untuk);

        for ($i = 0; $i < $total; $i++) {
            $datax = array(
                'nomor_pengeluaran' => $nomor_pengeluaran,
                'jumlah_pengeluaran' => $jumlah_pengeluaran[$i],
                'pengeluaran_untuk' => $pengeluaran_untuk[$i]
            );

            $this->M_pengeluaran->insertx($datax, 'detail_pengeluaran');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin_lapangan/pengeluaran');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit pengeluaran
    public function edit($id_pengeluaran)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['active'] = 'Pengeluaran';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_pengeluaran' => $id_pengeluaran);
        $data['peng'] = $this->M_pengeluaran->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/pengeluaran/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data pengeluaran yang sudah di masukkan dan diperbarui pada form edit pengeluaran
    public function update()
    {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $id_akun = $this->input->post('id_akun');
        $tgl_pengeluaran = $this->input->post('tgl_pengeluaran');
        $catatan_pengeluaran = $this->input->post('catatan_pengeluaran');

        $data = array(
            'id_akun' => $id_akun,
            'tgl_pengeluaran' => $tgl_pengeluaran,
            'catatan_pengeluaran' => $catatan_pengeluaran,
        );

        $where = array('id_pengeluaran' => $id_pengeluaran);
        $this->M_pengeluaran->update($where, $data, 'pengeluaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin_lapangan/pengeluaran');
    }

    // Method ini berfungsi sebagai proses penghapusan data pengeluaran yang terpilih
    public function delete($nomor_pengeluaran)
    {
        $where = array('nomor_pengeluaran' => $nomor_pengeluaran);
        $this->M_pengeluaran->delete($where, 'detail_pengeluaran');
        $this->M_pengeluaran->delete($where, 'pengeluaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin_lapangan/pengeluaran');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit pengeluaran
    public function detail($id_pengeluaran)
    {
        $data['title'] = 'Edit Pengeluaran';
        $data['active'] = 'Pengeluaran';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_pengeluaran' => $id_pengeluaran);
        $data['peng'] = $this->M_pengeluaran->data_id($where);
        $data['pengx'] = $this->M_pengeluaran->selectx();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Admin Lapangan') {
            $this->load->view('admin_lapangan/pengeluaran/v_detail', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }
}
