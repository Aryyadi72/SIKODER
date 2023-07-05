<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_satuan');
    }
    public function index()
    {
        $data['title'] = 'Satuan Produk';
        $data['active'] = 'Satuan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $data['sat'] = $this->M_satuan->select();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/satuan/v_data', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }
    public function add()
    {
        $data['title'] = 'Tambah Satuan Produk';
        $data['active'] = 'Satuan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/satuan/v_add', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }
    public function insert()
    {
        $nama_satuan = $this->input->post('nama_satuan');

        $data = array(
            'nama_satuan' => $nama_satuan
        );

        $this->M_satuan->insert($data, 'satuan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di tambahkan</div>');
        redirect('admin/satuan');
    }
    public function edit($id_satuan)
    {
        $data['title'] = 'Edit Satuan Produk';
        $data['active'] = 'Satuan';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_satuan' => $id_satuan);
        $data['sat'] = $this->M_satuan->data_id($where);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/navbar', $data);
        $this->load->view('templates/main/sidebar', $data);
        if ($this->session->userdata('level') == 'Administrator') {
            $this->load->view('admin/satuan/v_edit', $data);
        } else {
            $this->load->view('other/forbiden');
        }
        $this->load->view('templates/main/footer');
    }
    public function update()
    {
        $id_satuan = $this->input->post('id_satuan');
        $nama_satuan = $this->input->post('nama_satuan');

        $data = array(
            'nama_satuan' => $nama_satuan
        );

        $where = array('id_satuan' => $id_satuan);
        $this->M_satuan->update($where, $data, 'satuan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di perbarui</div>');
        redirect('admin/satuan');
    }
    public function delete($id_satuan)
    {
        $where = array('id_satuan' => $id_satuan);
        $id = $id_satuan;
        if ($this->M_satuan->restrict($id) != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"role="alert"><i class="fas fa-times"></i><i class="fas fa-times"></i> Data satuan yang dipilih sedang digunakan di sebuah data produk. Hapus terlebih dahulu data produk tersebut atau ganti satuan nya!!!</div>');
        } else {
            $this->M_satuan->delete($where, 'satuan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert"><i class="fas fa-check"></i><i class="fas fa-check"></i> Berhasil di hapus</div>');
        }
        redirect('admin/satuan');
    }
}
