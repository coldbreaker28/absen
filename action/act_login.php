<?php
session_start();
include("../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the stored hashed password from the database
    $query = "SELECT id_user, nik, role, nama_guru, password FROM pegawai WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $row['password'])) {
            // Login berhasil
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['nik'] = $row['nik'];
            $_SESSION['nama'] = $row['nama_guru'];
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == '1') {
                header("location: ../user/index.php?page=home"); // Redirect ke halaman dashboard atau halaman yang sesuai.
            } else if ($row['role'] == '2') {
                header("location: ../admin/index.php"); // Redirect ke halaman dashboard atau halaman yang sesuai.
            } else {
                header("location: ../user/index.php?page=home"); // Redirect ke halaman dashboard atau halaman yang sesuai.
            }
        } else {
            // Password salah
            header("location: ../index.php?pesan=gagal");
        }
    } else {
        // Username tidak ditemukan
        header("location: ../index.php?pesan=gagal");
    }
}
