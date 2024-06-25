<?php
session_start();
include("temp/header.php");

// Mendefinisikan variabel judul halaman
$page_title = "Dashboard"; // Nilai default
$id = $_SESSION['user_id'];
       $query3 = "SELECT * FROM pegawai WHERE id_user='$id'";

       $sql3 = mysqli_query($conn, $query3);
       $data = mysqli_fetch_array($sql3);
// Memeriksa apakah parameter 'page' diset
if (isset($_GET['page'])) {
    // Menyesuaikan judul halaman sesuai dengan parameter 'page'
    switch ($_GET['page']) {
        case "home":
            $page_title = "Dashboard";
            break;
        case "absen":
            $page_title = "Absen";
            break;
        case "absenku":
            $page_title = "Absenku";
            break;
        case "dataguru":
            $page_title = "Data Guru";
            break;
        case "rekapabsen":
            $page_title = "Rekap Absen";
            break;
        // Tambahkan kasus lain jika diperlukan
        default:
            // Kasus default jika 'page' tidak cocok dengan yang diharapkan
            $page_title = "Dashboard";
            break;
    }
}

?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 <!-- Navbar -->
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
     <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $page_title; ?></li>
    </ol>
    <h6 class="font-weight-bolder mb-0"><?php echo $page_title; ?></h6>
   </nav>
   <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <ul class="navbar-nav  justify-content-end">
     <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
       <div class="sidenav-toggler-inner">
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
        <i class="sidenav-toggler-line"></i>
       </div>
      </a>
     </li>
    </ul>

   </div>
   <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/img/team-2.jpg" class="rounded-circle" width="30" height="30"> <?php echo $data['username']; ?>
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                </ul>
            </div>
  </div>
 </nav>
 <!-- End Navbar -->
 <div class="container-fluid py-4">

  <?php
  // Include konten halaman sesuai dengan parameter 'page'
  if (isset($_GET['page'])) {
   switch ($_GET['page']) {
    case "home":
     include 'page/home.php';
     break;
    case "absen":
     include 'page/absen.php';
     break;
    case "absenku":
     include 'page/absenku.php';
     break;
    case "dataguru":
     include 'page/dataguru.php';
     break;
    case "rekapabsen":
     include 'page/rekapabsen.php';
     break;
    default:
     include 'page/home.php'; // Jika 'page' tidak valid, tampilkan halaman beranda
     break;
   }
  } else {
   include 'page/home.php'; // Jika 'page' tidak diset, tampilkan halaman beranda
  }
  ?>
<?php
include("temp/footer.php");
?>