<?php

class Transkrip_model extends CI_Model
{
    public function daftarTranskrip()
    {
        $query_join = "SELECT mahasiswa.npm, mahasiswa.nama_mhs,
            mata_kuliah.kode_mk, mata_kuliah.nama_mk, transkrip.id_transkrip,
            transkrip.huruf_mutu, transkrip.smt FROM transkrip
            INNER JOIN mahasiswa ON mahasiswa.npm = transkrip.npm
            INNER JOIN mata_kuliah ON mata_kuliah.kode_mk = transkrip.kode_mk";
        
        return $this->db->query($query_join);
    }

    // -------------------------------------------------------------------------

    // public function mahasiswa

    // -------------------------------------------------------------------------

    public function getSingleTranskrip($field, $value)
    {
        $query_join = "SELECT mahasiswa.npm, mahasiswa.nama_mhs,
            mata_kuliah.kode_mk, mata_kuliah.nama_mk, transkrip.id_transkrip,
            transkrip.huruf_mutu, transkrip.smt FROM transkrip
            INNER JOIN mahasiswa ON mahasiswa.npm = transkrip.npm
            INNER JOIN mata_kuliah ON mata_kuliah.kode_mk = transkrip.kode_mk
            WHERE " . $field . " = " . $value;

        return $this->db->query($query_join);
    }

    // -------------------------------------------------------------------------

    public function tambahTranskrip($dataTranskrip)
    {
        $this->db->insert('transkrip', $dataTranskrip);

        return $this->db->insert_id();
    }

    // -------------------------------------------------------------------------

    public function editTranskrip($id_transkrip, $dataBaru)
    {
        $this->db->where('id_transkrip', $id_transkrip);
        $this->db->update('transkrip', $dataBaru);

        return $this->db->affected_rows();
    }

    // -------------------------------------------------------------------------

    public function hapusTranskrip($id_transkrip)
    {
        $this->db->where('id_transkrip', $id_transkrip);
        $this->db->delete('transkrip');
    }
}
