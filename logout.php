<?php
session_start();

 // $_SESSION['id']='';
	// $_SESSION['username']='';
	// $_SESSION['fullname']='';
	// $_SESSION['level']='';
	
	// unset($_SESSION['id']);
	// unset($_SESSION['username']);
	// unset($_SESSION['fullname']);
	// unset($_SESSION['level']);
	
session_unset();
session_destroy();
header('location:index.php');
?>