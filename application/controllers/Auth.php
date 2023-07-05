<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// Fungsi yang digunakan untuk memanggil views untuk login
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email tidak boleh kosong',
			'valid_email' => 'Masukkan Email dengan benar',
			'trim' => 'Email tidak boleh ada spasi'
		]);
		$this->form_validation->set_rules('kata_sandi', 'Kata password', 'required|trim', [
			'required' => 'Kata Sandi tidak boleh kosong',
			'trim' => 'Kata Sandi tanpa spasi'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sign In';

			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/auth/footer');
		} else {
			$this->login_processed();
		}
	}

	// Fungsi yang digunakan untuk proses masuk sesi (login)
	public function login_processed()
	{
		// fungsi ini bersifat privasi, agar tidak bisa di akses di url, hanya di fungsi yang memanggil saja
		$email = $this->input->post('email');
		$kata_sandi = $this->input->post('kata_sandi');
		//Mencari di databse
		//fungsi row_array agar tidak semua record terpanggil, hanya record yang di tentukan saja
		$pengguna = $this->db->get_where('akun', ['email' => $email])->row_array();
		// var_dump($pengguna);
		// die;
		// Cek kata password
		if ($pengguna) {
			if (password_verify($kata_sandi, $pengguna['kata_sandi'])) {
				//jika surel benar dan dan password benar
				$data = [
					'email' => $pengguna['email'],
					'level' => $pengguna['level'],
					'nama_pengguna' => $pengguna['nama_pengguna'],
					'foto_profil' => $pengguna['foto_profil']
				];
				$this->session->set_userdata($data);
				if ($pengguna) {
					$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Berhasil Login</div>');
					redirect('admin/dashboard/');
				}  else {
					$this->session->unset_userdata('email');
					$this->session->unset_userdata('level');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun kamu belum aktif, tunggu admin mengaktifkan</div>');
					redirect('auth');
				}
			} else {
				//jika password salah, tapi alamat surel ditemukan
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, password yang kamu masukkan salah</div>');
				redirect('auth');
			}
		} else { //jika penguna tidak di temukan
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">pengguna tidak di temukan...</div>');
			redirect('auth');
		}
	}

	// Fungsi yang digunakan untuk melakukan proses registrasi
	public function register()
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
		$this->form_validation->set_rules('kata_sandi', 'Kata sandi', 'required|trim|min_length[3]|matches[ulangi_sandi]', [
			'required' => 'Kata sandi tidak boleh kosong',
			'matches' => 'Kata sandi tidak cocok',
			'min_length' => 'Kata sandi terlalu pendek, minimal 3 karakter',
			'trim' => 'Kata sandi tanpa spasi'
		]);
		$this->form_validation->set_rules('ulangi_sandi', 'Ulangi sandi', 'required|trim|matches[kata_sandi]', [
			'required' => 'Kata sandi tidak boleh kosong',
			'matches' => 'Kata sandi tidak cocok',
			'trim' => 'Kata sandi tanpa spasi'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sign Up';

			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('templates/auth/footer');
		} else {
			// echo 'data berhasil di tambahkan';
			$data = [
				'nama_pengguna' => htmlspecialchars($this->input->post('nama_pengguna', true)),
				'telepon' => htmlspecialchars($this->input->post('telepon', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT),
				'level' => 'Pelanggan',
				'foto_profil' => 'default-foto.png'
			];
			//insert ke database (tanpa model)
			$this->db->insert('akun', $data);
			//
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat... akun anda sudah terdaftar. Silahkan Masuk...</div>');
			redirect('auth/');
		}
	}

	// Fungsi yang digunakan untuk keluar sesi(log out)
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda sudah keluar</div>');
		redirect('auth');
	}

	public function search()
	{
		$this->form_validation->set_rules('nik', 'ID Karyawan', 'required|trim', [
			'required' => 'ID Karyawan tidak boleh kosong',
			'trim' => 'ID Karyawan tidak boleh ada spasi'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Search';

			$this->load->view('templates/auth/header', $data);
			$this->load->view('auth/search', $data);
			$this->load->view('templates/auth/footer');
		}
	}

}
