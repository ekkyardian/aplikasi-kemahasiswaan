<?php

class Transkrip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transkrip_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('MataKuliah_model');
    }

    // -------------------------------------------------------------------------

    public function index()
    {
        $query = $this->Transkrip_model->daftarTranskrip();
        $arrDaftarTranskrip['daftarTranskrip'] = $query->result_array();
        $this->load->view('transkrip', $arrDaftarTranskrip);
    }

    // -------------------------------------------------------------------------

    public function tambahTranskrip()
    {
        $query = $this->Mahasiswa_model->daftarMahasiswa();
        $arrDataTranskrip['dataTaranskrip'] = $query->result_array();

        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('kode_mk', 'Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('huruf_mutu', 'Nilai (huruf mutu)', 'required|alpha');

        if ($this->form_validation->run() === TRUE) {
            $dataTaranskrip = [
                'npm'           => $this->input->post('npm'),
                'kode_mk'       => $this->input->post('kode_mk'),
                'huruf_mutu'    => $this->input->post('huruf_mutu'),
                'smt'           => $this->input->post('smt')
            ];

            $id = $this->Transkrip_model->tambahTranskrip($dataTaranskrip);

            if ($id) {
                echo "Transkrip berhasil ditambahkan";
            } else {
                echo "Gagal menambahkan data";
            }

            redirect('/transkrip');
        }

        $this->load->view('tambah_transkrip', $arrDataTranskrip);
    }

    // -------------------------------------------------------------------------

    public function editTranskrip($id_transkrip)
    {
        $query = $this->Transkrip_model->getSingleTranskrip('transkrip.id_transkrip', $id_transkrip);
        $arrDataTranskrip['dataTaranskrip'] = $query->row_array();

        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('kode_mk', 'Mata Kuliah', 'required|alpha_numeric');
        $this->form_validation->set_rules('huruf_mutu', 'Nilai (huruf mutu)', 'required|alpha');

        if ($this->form_validation->run() === TRUE) {
            $dataBaru = [
                'npm'           => $this->input->post('npm'),
                'smt'           => $this->input->post('smt'),
                'kode_mk'       => $this->input->post('kode_mk'),
                'huruf_mutu'    => $this->input->post('huruf_mutu')
            ];

            $id = $this->Transkrip_model->editTranskrip($id_transkrip, $dataBaru);

            if ($id) {
                echo "Data transkrip berhasil diubah";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('/transkrip');
        }

        $this->load->view('edit_transkrip', $arrDataTranskrip);
    }

    // -------------------------------------------------------------------------

    public function hapusTranskrip($id_transkrip)
    {
        $this->Transkrip_model->hapusTranskrip($id_transkrip);

        redirect(site_url('transkrip'));
    }
}
