<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akun');
    }

    // Method yang digunakan untuk ke halaman tampil data-data akun
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['active'] = 'Akun';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['peng'] = $this->M_akun->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/akun/v_data', $data);
        } else {
            $this->load->view('other/forbiden', $data);
        }
        $this->load->view('templates/main/footer');
    }

    // Method yang digunakan untuk memproses penambahan data akun
    public function insert()
    {
        $this->form_validation->set_rules('nama_pengguna', 'nama_pengguna', 'required', [
            'required' => 'Nama pengguna tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('telepon', 'Nomor telepon', 'required|trim|min_length[11]|numeric', [
            'required' => 'Nomor telepon tidak boleh kosong',
            'numeric' => 'Masukkan nomor telepon hanya dengan nomor',
            'min_length' => 'Nomor telepon terlalu pendek',
            'trim' => 'Nomor telepon tidak boleh ada spasi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', [
            'required' => 'Email tidak boleh kosong',
            'is_unique' => 'Email ini sudah terdaftar',
            'valid_email' => 'Masukkan email dengan benar',
            'trim' => 'Email tidak boleh ada spasi'
        ]);
        $this->form_validation->set_rules('kata_sandi', 'Kata sandi', 'required|trim|min_length[3]', [
            'required' => 'Kata sandi tidak boleh kosong',
            'min_length' => 'Kata sandi terlalu pendek, minimal 3 karakter',
            'trim' => 'Kata sandi tanpa spasi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Pengguna';
            $data['active'] = 'Akun';
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();


            $this->load->view('templates/main/header', $data);
            $this->load->view('templates/main/navbar', $data);
            $this->load->view('templates/main/sidebar', $data);
            if ($this->session->userdata('level') == 'Administrator') {
                $this->load->view('admin/akun/v_add', $data);
            } else {
                $this->load->view('other/forbiden', $data);
            }
            $this->load->view('templates/main/footer');
        } else {
            // echo 'data berhasil di tambahkan';
            $data = [
                'nama_pengguna' => htmlspecialchars($this->input->post('nama_pengguna', true)),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT),
                'level' => htmlspecialchars($this->input->post('level', true)),
                'foto_profil' => 'default-foto.png'
            ];
            //insert ke database (tanpa model)
            $this->db->insert('akun', $data);
            //
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
            redirect('admin/akun/');
        }
    }

    // Method untuk menghapus data akun yang dipilih
    public function delete($id_akun)
    {
        $where = array('id_akun' => $id_akun);
        $this->M_akun->delete($where, 'akun');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        redirect('admin/akun');
    }

    // Method yang digunakan untuk ke halaman edit data akun
    public function edit($id_akun)
    {
        $data['title'] = 'Edit Pengguna';
        $data['active'] = 'Akun';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_akun' => $id_akun);
        $data['peng'] = $this->M_akun->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/akun/v_edit', $data);
        } else {
            $this->load->view('other/forbiden', $data);
        }
        $this->load->view('templates/main/footer');
    }
    // Method untuk memperbarui data akun yang dipilih
    public function update()
    {
        $id_akun = $this->input->post('id_akun');
        $nama_pengguna = $this->input->post('nama_pengguna');
        $email = $this->input->post('email');
        $kata_sandi = $this->input->post('kata_sandi');
        $telepon = $this->input->post('telepon');
        $level = $this->input->post('level');
        $foto_profil = $_FILES['foto_profil']['name'];

        if ($foto_profil != '') {
            $tmp = $_FILES['foto_profil']['tmp_name'];
            move_uploaded_file($tmp, 'assets/images/profil/' . $foto_profil);

            $data = array(
                'nama_pengguna' => $nama_pengguna,
                'email' => $email,
                'telepon' => $telepon,
                'level' => $level,
                'foto_profil' => $foto_profil
            );
        } else {
            $data = array(
                'nama_pengguna' => $nama_pengguna,
                'email' => $email,
                'telepon' => $telepon,
                'level' => $level
            );
        }

        $where = array('id_akun' => $id_akun);
        $this->M_akun->update($where, $data, 'akun');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/akun/');
    }
    // Method untuk memperbarui data sandi akun yang dipilih
    public function update_password()
    {
        $id_akun = $this->input->post('id_akun');

        $data = array(
            'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT)
        );

        $where = array('id_akun' => $id_akun);
        $this->M_akun->update($where, $data, 'akun');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/akun/');
    }

    public function file()
    {
        $data['title'] = 'Unduh File Akun';
        $data['active'] = 'Akun';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['peng'] = $this->M_akun->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/akun/v_file', $data);
        } else {
            $this->load->view('other/forbiden', $data);
        }
        $this->load->view('templates/main/footer');
    }
}
