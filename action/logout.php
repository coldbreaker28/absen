<?php
session_start();
session_destroy();
header("location: ../index.php"); // Redirect ke halaman login setelah logout.
?>