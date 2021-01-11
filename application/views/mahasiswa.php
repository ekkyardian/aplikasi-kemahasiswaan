<!-- Header -->
<?php $this->load->view('partials/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mahasiswa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('/mahasiswa/tambahMahasiswa'); ?>">
                <button class="btn btn-outline btn-primary" type="submit">Tambah Data Baru</button>
            </a>
        </div>
        <br><br>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftrar Mahasiwa
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
                                    <th>Semester</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarMahasiswa as $key => $mahasiswa) : ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $no++; ?></td>
                                        <td class="center"><?php echo $mahasiswa['nama_mhs']; ?></td>
                                        <td><?php echo $mahasiswa['nama_mhs']; ?></td>
                                        <td class="center"><?php echo $mahasiswa['smt']; ?></td>
                                        <td class="center"><?php echo $mahasiswa['jurusan']; ?></td>
                                        <td class="center">
                                            <a href="<?php echo site_url('mahasiswa/editMahasiswa/' . $mahasiswa['npm']); ?>">Edit</a> |
                                            <a href="<?php echo site_url('mahasiswa/hapusMahasiswa/' . $mahasiswa['npm']); ?>"
                                            onclick="return confirm('Hapus: <?php echo $mahasiswa['npm'].' - '. $mahasiswa['nama_mhs']; ?>?')">Hapus</a>
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