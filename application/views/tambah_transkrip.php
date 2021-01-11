<!-- Header -->
<?php $this->load->view('partials/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transkrip</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Transkrip Baru
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
                                <label for="npm">Mahasiswa</label>
                                <select class="form-control" name="npm" id="npm">
                                    <option value="">Pilih..</option>
                                    <?php
                                    foreach ($dataTaranskrip as $key => $mahasiswa) {
                                        echo "<option value='" . $mahasiswa['npm'] . "'>";
                                        echo $mahasiswa['npm'] . " | " . $mahasiswa['nama_mhs'];
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="smt">Semester</label>
                                <select class="form-control" name="smt" id="smt">
                                    <option value="">Pilih..</option>
                                    <option value="1">I (satu)</option>
                                    <option value="2">II (dua)</option>
                                    <option value="3">III (tiga)</option>
                                    <option value="4">IV (empat)</option>
                                    <option value="5">V (lima)</option>
                                    <option value="6">VI (enam)</option>
                                    <option value="7">VII (tujuh)</option>
                                    <option value="8">VIII (delapan)</option>
                                    <option value="9">IX (sembilan)</option>
                                    <option value="10">X (sepuluh)</option>
                                    <option value="11">XI (sebelas)</option>
                                    <option value="12">XII (dua belas)</option>
                                    <option value="13">XIII (tiga belas)</option>
                                    <option value="14">XIV (empat belas)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_mk">Mata Kuliah</label>
                                <select class="form-control" name="kode_mk" id="kode_mk">
                                    <option value="">Pilih..</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "");
                                    mysqli_select_db($conn, "kemahasiswaan");
                                    $sql = mysqli_query($conn, "SELECT * FROM mata_kuliah");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?php echo $data['kode_mk'] ?>">
                                        <?php echo $data['kode_mk'] . " | " .$data['nama_mk'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="huruf_mutu">Nilai (Huruf Mutu)</label>
                                <select class="form-control" name="huruf_mutu" id="huruf_mutu">
                                    <option value="">Pilih..</option>
                                    <option value="A">A</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="BC">BC</option>
                                    <option value="C">C</option>
                                    <option value="CD">CD</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo site_url('/transkrip'); ?>">
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