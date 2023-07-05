<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = 'Dashboard';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/secondary/header', $data);
        $this->load->view('templates/secondary/navbar', $data);
        $this->load->view('other/v_dashboard', $data);
        $this->load->view('templates/secondary/footer');
    }
}
