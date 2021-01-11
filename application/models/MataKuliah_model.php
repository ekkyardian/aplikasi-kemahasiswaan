<?php

class MataKuliah_model extends CI_Model
{
    public function daftarMataKuliah()
    {
        return $this->db->get('mata_kuliah');
    }

    // -------------------------------------------------------------------------

    public function getSingleMataKuliah($field, $value)
    {
        $this->db->where($field, $value);

        return $this->db->get('mata_kuliah');
    }

    // -------------------------------------------------------------------------

    public function tambahMataKuliah($dataMataKuliah)
    {
        $this->db->insert('mata_kuliah', $dataMataKuliah);

        return $this->db->insert_id();
    }

    // -------------------------------------------------------------------------

    public function editMataKuliah($kode_mk, $dataBaru)
    {
        $this->db->where('kode_mk', $kode_mk);
        $this->db->update('mata_kuliah', $dataBaru);

        return $this->db->affected_rows();
    }

    // -------------------------------------------------------------------------

    public function hapusMataKuliah($kode_mk)
    {
        $this->db->where('kode_mk', $kode_mk);
        $this->db->delete('mata_kuliah');
    }
}
