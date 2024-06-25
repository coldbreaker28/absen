<?php
session_start();
include("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $nama_guru = $_POST['nama_guru'];
    $nuptk = $_POST['nuptk'];
    $alamat = $_POST['alamat'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $tlp = $_POST['tlp'];
    $id_user = $_POST['id_user'];
    $status_guru = $_POST['status_guru'];

    $update = "UPDATE pegawai SET     nik='$nik',  username='$username',     nama_guru='$nama_guru',     nuptk='$nuptk',     alamat='$alamat',     tmp_lahir='$tmp_lahir',     tgl_lahir='$tgl_lahir',     jk='$jk',    agama='$agama', tlp='$tlp',    status_guru='$status_guru' WHERE id_user='$id_user'";

    $sql2 = mysqli_query($conn, $update);
    if ($sql2) {
   
     echo '<script language="javascript">
          window.alert("Data Berhasil di Update!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
    } else {
     echo '<script language="javascript">
     window.alert("Data Gagal di Update!");
     window.location.href="../user/index.php?page=dataguru";
   </script>';
    }
}
