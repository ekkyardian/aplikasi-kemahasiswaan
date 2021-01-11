<!-- Header -->
<?php $this->load->view('partials/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mata Kuliah</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('/mataKuliah/tambahMataKuliah'); ?>">
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
                    Daftrar Mata Kuliah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Semester</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($daftarMataKuliah as $key => $mataKuliah) : ?>
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo $no++; ?></td>
                                        <td class="center"><?php echo $mataKuliah['kode_mk']; ?></td>
                                        <td><?php echo $mataKuliah['nama_mk']; ?></td>
                                        <td class="center"><?php echo $mataKuliah['smt']; ?></td>
                                        <td class="center"><?php echo $mataKuliah['jurusan']; ?></td>
                                        <td class="center">
                                            <a href="<?php echo site_url('mataKuliah/editMataKuliah/' . $mataKuliah['kode_mk']); ?>">Edit</a> |
                                            <a href="<?php echo site_url('mataKuliah/hapusMataKuliah/' . $mataKuliah['kode_mk']); ?>" onclick="return confirm('Hapus: <?php echo $mataKuliah['kode_mk'] . ' - ' . $mataKuliah['nama_mk']; ?>?')">Hapus</a>
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