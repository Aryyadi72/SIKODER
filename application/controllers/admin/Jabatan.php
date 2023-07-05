<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    // Method yang berfungsi sebagai penyimpanan variabel global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jabatan');
    }

    // Method yang berfungsi sebagai function default pada class Jabatan
    // Bagian ini juga sebagai halaman default pada class Jabatan
    public function index()
    {
        $data['title'] = 'Jabatan';
        $data['active'] = 'Jabatan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['jab'] = $this->M_jabatan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/jabatan/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah jabatan
    public function add()
    {
        $data['title'] = 'Tambah Jabatan';
        $data['active'] = 'Jabatan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/jabatan/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data jabatan yang sudah di masukkan pada form tambah jabatan
    // public function insert()
    // {
    //     $nama_jabatan = $this->input->post('nama_jabatan');

    //     $data = array(
    //         'nama_jabatan' => $nama_jabatan
    //     );

    //     $this->M_jabatan->insert($data, 'jabatan');
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
    //     redirect('admin/jabatan');
    // }

    public function insert()
    {
        $nama_jabatan = $this->input->post('nama_jabatan');

        // Memeriksa apakah nama jabatan sudah ada di database
        $existingJabatan = $this->M_jabatan->get_where('jabatan', array('nama_jabatan' => $nama_jabatan));
        if ($existingJabatan) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama jabatan sudah ada!</div>');
            redirect('admin/jabatan');
            return; // Berhenti eksekusi kode selanjutnya jika ada nama jabatan yang sama
        }

        $data = array(
            'nama_jabatan' => $nama_jabatan
        );

        $this->M_jabatan->insert($data, 'jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil ditambahkan</div>');
        redirect('admin/jabatan');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit jabatan
    public function edit($id_jabatan)
    {
        $data['title'] = 'Edit Jabatan';
        $data['active'] = 'Jabatan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_jabatan' => $id_jabatan);
        $data['jab'] = $this->M_jabatan->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/jabatan/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data jabatan yang sudah di masukkan dan diperbarui pada form edit jabatan
    public function update()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $nama_jabatan = $this->input->post('nama_jabatan');

        $data = array(
            'nama_jabatan' => $nama_jabatan
        );

        $where = array('id_jabatan' => $id_jabatan);
        $this->M_jabatan->update($where, $data, 'jabatan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/jabatan');
    }

    // Method ini berfungsi sebagai proses penghapusan data jabatan yang terpilih
    public function delete($id_jabatan)
    {
        $where = array('id_jabatan' => $id_jabatan);
        $id = $id_jabatan;
        if ($this->M_jabatan->restrict($id) != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"role="alert"><i class="fas fa-times"></i><i class="fas fa-times"></i> Data jabatan yang dipilih sedang digunakan di sebuah data produk. Hapus terlebih dahulu data produk tersebut atau ganti jabatan nya!!!</div>');
        } else {
            $this->M_jabatan->delete($where, 'jabatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        }
        redirect('admin/jabatan');
    }
}
