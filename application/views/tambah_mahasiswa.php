<!-- Header -->
<?php $this->load->view('partials/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mahasiswa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Mahasiswa Baru
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <?php echo form_open(); ?>
                            <?php
                            if ($this->input->post() and $this->form_validation->run() === FALSE) {
                                echo "<div class='alert alert-warning'>";
                                echo validation_errors();
                                echo "</div>";
                            }
                            ?>
                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <?php echo form_input('npm', set_value('npm'), 'class="form-control" placeholder="Enter text" id="npm"') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_mhs">Nama Mahasiswa</label>
                                <?php echo form_input('nama_mhs', set_value('nama_mhs'), 'class="form-control" placeholder="Enter text" id="nama_mhs"') ?>
                            </div>
                            <div class="form-group">
                                <label for="smt">Semester</label>
                                <?php echo form_input('smt', set_value('smt'), 'class="form-control" placeholder="Enter text" id="smt"') ?>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <?php echo form_input('jurusan', set_value('jurusan'), 'class="form-control" placeholder="Enter text" id="jurusan"') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo site_url('/mahasiswa'); ?>">
                                    <button class="btn btn-outline btn-warning" type="button">Kembali</button>
                                </a>
                            </div>
                            <?php form_close(); ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    <!-- Footer -->
    <?php $this->load->view('partials/footer.php'); ?>