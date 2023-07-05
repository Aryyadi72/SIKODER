<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_presensi extends CI_Model
{
    // Method yang digunakan untuk query builder select all from table presensi
    public function select()
    {
        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('karyawan','karyawan.nik = presensi.nik');
        $this->db->join('jabatan','jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->order_by('pembaruan_presensi','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Method yang digunakan untuk insert data ke tabel presensi
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
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
        $this->db->from('presensi');
        $this->db->join('karyawan', 'karyawan.nik = presensi.nik');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
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
    // Method ini digunakan untuk memperbarui data menggunakan query builder
    public function update1($where, $data1, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data1);
    }
}