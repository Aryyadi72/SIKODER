<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengeluaran extends CI_Model
{
    // Method yang digunakan untuk query builder select all from table pengeluaran
    public function select()
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('akun','akun.id_akun = pengeluaran.id_akun');
        $this->db->order_by('pembaruan_pengeluaran','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    // Method yang digunakan untuk query builder select all from table pengeluaran
    public function selectx()
    {
        $this->db->select('*');
        $this->db->from('detail_pengeluaran');
        $this->db->join('pengeluaran','pengeluaran.nomor_pengeluaran = detail_pengeluaran.nomor_pengeluaran');
        $query = $this->db->get();
        return $query->result();
    }

    // Method yang digunakan untuk insert data ke tabel pengeluaran
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // Method yang digunakan untuk insert data ke tabel pengeluaran
    public function insertx($datax, $table)
    {
        $this->db->insert($table, $datax);
    }

    // Method ini digunakan untuk menghapus data menggunakan query builder
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Method yang digunakan untuk melihat khusus data yang dipilih menggunakan query builder
    public function data_id($where)
    {
        $this->db->select('*');
        $this->db->from('pengeluaran');
        $this->db->join('akun', 'akun.id_akun = pengeluaran.id_akun');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    // Method yang digunakan untuk melihat khusus data yang dipilih menggunakan query builder
    public function data_idx($where)
    {
        $this->db->select('*');
        $this->db->from('detail_pengeluaran');
        $this->db->join('pengeluaran', 'pengeluaran.nomor_pengeluaran = detail_pengeluaran.nomor_pengeluaran');
        $this->db->join('akun', 'akun.id_akun = pengeluaran.id_akun');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    // Method ini digunakan untuk memperbarui data menggunakan query builder
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
