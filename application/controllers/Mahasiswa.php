<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    // -------------------------------------------------------------------------

    public function index()
    {
        $query = $this->Mahasiswa_model->daftarMahasiswa();
        $arrDaftarMahasiswa['daftarMahasiswa'] = $query->result_array();
        $this->load->view('mahasiswa', $arrDaftarMahasiswa);
    }

    // -------------------------------------------------------------------------

    public function tambahMahasiswa()
    {
        $this->form_validation->set_rules('npm', 'NPM', 'required|numeric');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|regex_match[/^([a-z ])+$/i]');

        if ($this->form_validation->run() === TRUE) {
            $dataMahasiswa = [
                'npm'       => $this->input->post('npm'),
                'nama_mhs'  => $this->input->post('nama_mhs'),
                'smt'       => $this->input->post('smt'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->Mahasiswa_model->tambahMahasiswa($dataMahasiswa);

            if ($id) {
                echo "Data mahasiswa baru berhasil ditambahkan";
            }
            else {
                echo "Gagal menyimpan data mahasiswa baru";
            }

            redirect('/mahasiswa');
        }

        $this->load->view('tambah_mahasiswa');
    }

    // -------------------------------------------------------------------------

    public function editMahasiswa($npm)
    {
        $query = $this->Mahasiswa_model->getSingleMahasiswa('npm', $npm);
        $arrDataMahasiswa['dataMahasiswa']= $query->row_array();

        if ($this->input->post()) {
            $dataBaru = [
                'npm'       => $this->input->post('npm'),
                'nama_mhs'  => $this->input->post('nama_mhs'),
                'smt'       => $this->input->post('smt'),
                'jurusan'   => $this->input->post('jurusan')
            ];

            $id = $this->Mahasiswa_model->editMahasiswa($npm, $dataBaru);

            if ($id) {
                echo "Data mahasiswa berhasil diubah";
            } else {
                echo "Gagal memperbarui data";
            }

            redirect('/mahasiswa');
        }

        $this->load->view('edit_mahasiswa', $arrDataMahasiswa);
    }

    // -------------------------------------------------------------------------

    public function hapusMahasiswa($npm)
    {
        $this->Mahasiswa_model->hapusMahasiswa($npm);

        redirect(site_url('mahasiswa'));
    }
}
