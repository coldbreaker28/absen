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
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $add = "INSERT INTO `pegawai` (`id_user`, `nik`, `username`, `password`, `nama_guru`, `tmp_lahir`, `tgl_lahir`, `alamat`, `jk`, `agama`, `nuptk`, `tlp`, `status_guru`, `role`) VALUES (NULL, '$nik', '$username', '$password', '$nama_guru', '$tgl_lahir', '$tmp_lahir', '$alamat', '$jk', '$agama', '$nuptk', '$tlp', '$status_guru', '0')";

  $sql2 = mysqli_query($conn, $add);
  if ($sql2) {
    echo '<script language="javascript">
          window.alert("Data Berhasil di Tambahkan!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
  } else {
    echo '<script language="javascript">
          window.alert("Data Gagal di Tambahkan!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
  }
}
