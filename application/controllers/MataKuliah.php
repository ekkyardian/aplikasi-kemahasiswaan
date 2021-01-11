<?php

class MataKuliah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MataKuliah_model');
    }

    // -------------------------------------------------------------------------

    public function index()
    {
        $query = $this->MataKuliah_model->daftarMataKuliah();
        $arrDaftarMataKuliah['daftarMataKuliah'] = $query->result_array();
        $this->load->view('mata_kuliah', $arrDaftarMataKuliah);
    }

    // -------------------------------------------------------------------------

    public function tambahMataKuliah()
    {
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('nama_mk', 'Nama Mata Kuliah', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|regex_match[/^([a-z ])+$/i]');

        if ($this->form_validation->run() === TRUE) {
            $dataMataKuliah = [
                'kode_mk'   => $this->input->post('kode_mk'),
                'nama_mk'   => $this->input->post('nama_mk'),
                'smt'       => $this->input->post('smt'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->MataKuliah_model->tambahMataKuliah($dataMataKuliah);

            if ($id) {
                echo "Data mata kuliah baru berhasil ditambahkan";
            } else {
                echo "Gagal menyimpan data mata kuliah";
            }

            redirect('/mataKuliah');
        }

        $this->load->view('tambah_mata_kuliah');
    }

    // -------------------------------------------------------------------------

    public function editMataKuliah($kode_mk)
    {
        $query = $this->MataKuliah_model->getSingleMataKuliah('kode_mk', $kode_mk);
        $arrDataMataKuliah['dataMataKuliah'] = $query->row_array();

        if ($this->input->post()) {
            $dataBaru = [
                'kode_mk'   => $this->input->post('kode_mk'),
                'nama_mk'   => $this->input->post('nama_mk'),
                'smt'       => $this->input->post('smt'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->MataKuliah_model->editMataKuliah($kode_mk, $dataBaru);

            if ($id) {
                echo "Data mata kuliah berhasil diubah";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('/mataKuliah');
        }

        $this->load->view('edit_mata_kuliah', $arrDataMataKuliah);
    }

    // -------------------------------------------------------------------------

    public function hapusMataKuliah($kode_mk)
    {
        $this->MataKuliah_model->hapusMataKuliah($kode_mk);

        redirect(site_url('mataKuliah'));
    }
}
