<!-- Header -->
<?php $this->load->view('partials/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transkrip Nilai</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('/transkrip/tambahTranskrip'); ?>">
                <button class="btn btn-outline btn-primary" type="submit">Tambah Nilai Baru</button>
            </a>&nbsp;
            <button class="btn btn-outline btn-success" type="button" data-toggle="modal" data-target="#modalFilter">Download Transkrip</button>
        </div>

        <!-- Modal -->
        <div id="modalFilter" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Filter Transkrip</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('/Pdfview'); ?>" target="_blank" method="get">
                            <div class="form-group">
                                <label for="npm">Mahasiswa</label>
                                <select class="form-control" name="npm" id="npm">
                                    <option value="">Pilih..</option>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "");
                                    mysqli_select_db($conn, "kemahasiswaan");
                                    $sql = mysqli_query($conn, "SELECT npm, nama_mhs FROM mahasiswa");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?php echo $data['npm'] ?>">
                                            <?php echo $data['npm'] . " | " . $data['nama_mhs'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="smt">Transkrip Semester</label>
                                <select class="form-control" name="smt" id="smt">
                                    <option value="">Pilih</option>
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
                    </div>
                    <div class="modal-footer">
                        <!-- <a href=""> -->
                        <button type="submit" class="btn btn-outline btn-success">Proses</button>
                        <!-- </a> -->
                    </div>
                    </form>
                </div>

            </div>
        </div>
        <br><br>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftrar Transkrip
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NPM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Mata Kuliah</th>
                                    <th>Semester</th>
                                    <th>Huruf Mutu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarTranskrip as $key => $transkrip) : ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $no++; ?></td>
                                        <td class="center"><?php echo $transkrip['npm']; ?></td>
                                        <td><?php echo $transkrip['nama_mhs']; ?></td>
                                        <td class="center"><?php echo $transkrip['nama_mk']; ?></td>
                                        <td class="center"><?php echo $transkrip['smt']; ?></td>
                                        <td class="center"><?php echo $transkrip['huruf_mutu']; ?></td>
                                        <td class="center">
                                            <a href="<?php echo site_url('transkrip/editTranskrip/' . $transkrip['id_transkrip']); ?>">Edit</a> |
                                            <a href="<?php echo site_url('transkrip/hapusTranskrip/' . $transkrip['id_transkrip']); ?>" onclick="return confirm('Hapus: <?php echo $transkrip['nama_mhs'] . ' - ' .
                                                                                                                                                                            $transkrip['nama_mk']; ?>?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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