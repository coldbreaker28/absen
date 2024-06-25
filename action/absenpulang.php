<?php
session_start();
include("../config/koneksi.php");
date_default_timezone_set('Asia/Jakarta');
$id = $_SESSION['user_id'];
$tgl = date('Y-m-d');
$jam = date('H:i:s');

$query = "SELECT * FROM absen WHERE id_guru='$id' AND tgl_absen = '$tgl'";

$sql = mysqli_query($conn, $query);

if (mysqli_num_rows($sql) >= 1) {

 $update = "UPDATE absen SET tgl_absen='$tgl', jam_pulang='$jam', ket='Hadir' WHERE id_guru='$id' AND tgl_absen = '$tgl'";

 $sql2 = mysqli_query($conn, $update);
 if ($sql2) {

  echo '<script language="javascript">
       window.alert("Anda berhasil melakukan Absen pulang!");
       window.location.href="../user/index.php?page=absen";
     </script>';
 } else {
  echo '<script language="javascript">
  window.alert("Anda gagal melakukan Absen pulang!");
  window.location.href="../user/index.php?page=absen";
</script>';
 }
} else {
 $add = "INSERT INTO `absen`(`idabsen`, `id_guru`, `tgl_absen`, `jam_datang`, `jam_pulang`, `ket`) VALUES (NULL,'$id','$tgl','','$jam','')";

 $sql2 = mysqli_query($conn, $add);
 if ($sql2) {

  echo '<script language="javascript">
       window.alert("Anda berhasil melakukan Absen pulang!");
       window.location.href="../user/index.php?page=absen";
     </script>';
 } else {
  echo '<script language="javascript">
  window.alert("Anda gagal melakukan Absen pulang!");
  window.location.href="../user/index.php?page=absen";
</script>';
 }
}
