<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>

    <div style="text-align:center">
        <h2>Transkrip Nilai</h2>
    </div>

    <div style="text-align: left;">
    <?php
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "kemahasiswaan");

    $sql = mysqli_query($conn, "SELECT * FROM mahasiswa");
    $data_mahasiswa = mysqli_fetch_array($sql)
    ?>
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['nama_mhs']; ?></td>
            </tr>
            <tr>
                <td>NPM</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['npm']; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['jurusan']; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $data_mahasiswa['smt']; ?></td>
            </tr>
        </table>
    </div>
    <br>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($conn, "SELECT mahasiswa.npm, mahasiswa.nama_mhs,
                mata_kuliah.kode_mk, mata_kuliah.nama_mk, transkrip.huruf_mutu,
                transkrip.smt FROM transkrip
                INNER JOIN mahasiswa ON mahasiswa.npm = transkrip.npm
                INNER JOIN mata_kuliah ON mata_kuliah.kode_mk = transkrip.kode_mk
                WHERE transkrip.npm = '" . $_GET['npm'] . "' AND transkrip.smt = '" . $_GET['smt'] . "'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td scope="row"><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_mk']; ?></td>
                    <td><?php echo $data['nama_mk']; ?></td>
                    <td><?php echo $data['smt']; ?></td>
                    <td><?php echo $data['huruf_mutu']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>