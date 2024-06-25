<?php
session_start();
include("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];

    $del = "DELETE FROM `pegawai` WHERE id_user='$id_user'";

    $sql2 = mysqli_query($conn, $del);
    if ($sql2) {
   
     echo '<script language="javascript">
          window.alert("Data Berhasil di Hapus!");
          window.location.href="../user/index.php?page=dataguru";
        </script>';
    } else {
     echo '<script language="javascript">
     window.alert("Data Gagal di Hapus!");
     window.location.href="../user/index.php?page=dataguru";
   </script>';
    }
}
