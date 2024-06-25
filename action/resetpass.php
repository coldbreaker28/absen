<?php
session_start();
include("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_user = $_POST['id_user'];
  $newpass = password_hash($_POST['newpass'], PASSWORD_BCRYPT);

  $update = "UPDATE pegawai SET password='$newpass' WHERE id_user='$id_user'";

  $sql2 = mysqli_query($conn, $update);
  if ($sql2) {
    echo '<script language="javascript">
          window.alert("Password Berhasil di Reset!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
  } else {
    echo '<script language="javascript">
          window.alert("Password Gagal di Reset!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
  }
}
