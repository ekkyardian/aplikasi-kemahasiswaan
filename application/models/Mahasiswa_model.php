<?php

class Mahasiswa_model extends CI_Model
{
    public function daftarMahasiswa()
    {
        return $this->db->get('mahasiswa');
    }

    // -------------------------------------------------------------------------

    public function getSingleMahasiswa($field, $value)
    {
        $this->db->where($field, $value);

        return $this->db->get('mahasiswa');
    }

    // -------------------------------------------------------------------------

    public function tambahMahasiswa($dataMahaiswa)
    {
        $this->db->insert('mahasiswa', $dataMahaiswa);
        
        return $this->db->insert_id();
    }

    // -------------------------------------------------------------------------

    public function editMahasiswa($npm, $dataBaru)
    {
        $this->db->where('npm', $npm);
        $this->db->update('mahasiswa', $dataBaru);

        return $this->db->affected_rows();
    }

    // -------------------------------------------------------------------------

    public function hapusMahasiswa($npm)
    {
        $this->db->where('npm', $npm);
        $this->db->delete('mahasiswa');
    }
}
