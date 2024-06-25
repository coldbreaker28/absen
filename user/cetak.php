<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename=Rekap_Absensi.xls");

include("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl1 = $_POST['tanggal1'];
    $tgl2 = $_POST['tanggal2'];
}
?>

<style type="text/css">
    table,
    th,
    td {
        border: 1px solid;
        border-spacing: 0px;
    }

    th {
        background-color: #1cd000;
    }

    .thn {
        border: 0px solid;
        background-color: #ffffff;
    }
</style>
<h3>REKAPITULASI DAFTAR HADIR</h3>
<h3>SMK ASSALAMIYAH</h3>
<table id="myTable2" class="table table-striped dt-responsive nowrap" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Jumlah Hadir</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $query3 = "SELECT a.*, b.*, COUNT(a.id_guru) as jumlahhadir FROM absen a LEFT JOIN pegawai b ON a.id_guru = b.id_user WHERE a.tgl_absen >= '$tgl1' AND a.tgl_absen <= '$tgl2' GROUP BY a.id_guru;";

        $sql3 = mysqli_query($conn, $query3);
        // $data = mysqli_fetch_array($sql3);
        $no = 1;
        while ($data = mysqli_fetch_array($sql3)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= "'".$data['nik']  ?></td>
                <td><?= $data['nama_guru']  ?></td>
                <td><?= $data['status_guru']  ?></td>
                <td><?= $data['jumlahhadir']  ?></td>
            </tr>
        <?php
        }


        ?>
    </tbody>
</table>