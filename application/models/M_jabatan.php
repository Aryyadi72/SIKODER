<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
    // Method yang digunakan untuk query builder select all from table jabatan
    public function select()
    {
        $this->db->select('*');
        $this->db->from('jabatan');
        $query = $this->db->get();
        return $query->result();
    }

    // Method yang digunakan untuk insert data ke tabel jabatan
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
        $this->db->from('jabatan');
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

    // Method untuk mengetahui data jabatan digunakan atau tidak
    public function restrict($id)
    {
        $this->db->where('id_jabatan = ', $id);
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function get_where($table, $where)
    {
        $this->db->where($where);
        return $this->db->get($table)->row();
    }
}
