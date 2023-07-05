<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_satuan extends CI_Model
{
    // Method yang digunakan untuk query builder select all from table satuan
    public function select()
    {
        $this->db->select('*');
        $this->db->from('satuan');
        $query = $this->db->get();
        return $query->result();
    }

    // Method yang digunakan untuk insert data ke tabel satuan
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
        $this->db->from('satuan');
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

    // Method untuk mengetahui data satuan digunakan atau tidak
    public function restrict($id)
    {
        $this->db->where('id_satuan = ', $id);
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
