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
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/karyawan/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman tambah karyawan
    public function add()
    {
        $data['title'] = 'Tambah Karyawan';
        $data['active'] = 'Karyawan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['jab'] = $this->M_jabatan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/karyawan/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data karyawan yang sudah di masukkan pada form tambah karyawan
    public function insert()
    {
        $id_jabatan = $this->input->post('jabatan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $nik = $this->input->post('nik');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $status_karyawan = $this->input->post('status_karyawan');

        $foto_karyawan = $_FILES['foto_karyawan']['name'];
        $tmp = $_FILES['foto_karyawan']['tmp_name'];
        move_uploaded_file($tmp, 'assets/images/karyawan/' . $foto_karyawan);

        $data = array(
            'id_jabatan' => $id_jabatan,
            'nik' => $nik,
            'kegiatan' => 0,
            'nama_karyawan' => $nama_karyawan,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'status_karyawan' => $status_karyawan,
            'foto_karyawan' => $foto_karyawan
        );

        $this->M_karyawan->insert($data, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/karyawan');
    }

    // Method ini berfungsi sebagai tempat menampilkan halaman edit karyawan
    public function edit($nik)
    {
        $data['title'] = 'Edit Karyawan';
        $data['active'] = 'Karyawan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('nik' => $nik);
        $data['kar'] = $this->M_karyawan->data_id($where);
        $data['jab'] = $this->M_jabatan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/karyawan/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }

    // Method ini berfungsi sebagai proses penyimpanan data karyawan yang sudah di masukkan dan diperbarui pada form edit karyawan
    public function update()
{
    $nik = $this->input->post('nik');
    $id_jabatan = $this->input->post('jabatan');
    $nama_karyawan = $this->input->post('nama_karyawan');
    $tempat_lahir = $this->input->post('tempat_lahir');
    $tgl_lahir = $this->input->post('tgl_lahir');
    $alamat = $this->input->post('alamat');
    $status_karyawan = $this->input->post('status_karyawan');
    $foto_karyawan_x = $_FILES['foto_karyawan']['name'];

    if ($foto_karyawan_x == '') {
        $foto_karyawan = $this->input->post('foto_karyawanx');
    } else {
        $foto_karyawan = $_FILES['foto_karyawan']['name'];
        $tmp = $_FILES['foto_karyawan']['tmp_name'];
        move_uploaded_file($tmp, 'assets/images/karyawan/' . $foto_karyawan);

        // Hapus foto sebelumnya
        $foto_karyawan_sebelumnya = $this->input->post('foto_karyawanx');
        if ($foto_karyawan_sebelumnya != '') {
            $path_foto_karyawan_sebelumnya = 'assets/images/karyawan/' . $foto_karyawan_sebelumnya;
            if (file_exists($path_foto_karyawan_sebelumnya)) {
                unlink($path_foto_karyawan_sebelumnya);
            }
        }
    }

    $data = array(
        'id_jabatan' => $id_jabatan,
        'nama_karyawan' => $nama_karyawan,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tgl_lahir,
        'alamat' => $alamat,
        'status_karyawan' => $status_karyawan,
        'foto_karyawan' => $foto_karyawan
    );

    $where = array('nik' => $nik);
    $this->M_karyawan->update($where, $data, 'karyawan');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil diperbarui</div>');
    redirect('admin/karyawan');
}

    // Method ini berfungsi sebagai proses penghapusan data karyawan yang terpilih
    public function delete($nik)
    {
        $where = array('nik' => $nik);
        $this->M_karyawan->delete($where, 'karyawan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin/karyawan');
    }
}
