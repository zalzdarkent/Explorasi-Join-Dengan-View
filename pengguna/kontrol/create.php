<?php
include('../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_pengguna = $_POST["kode_pengguna"];
    $nama_pengguna = $_POST["pengguna"];
    $jabatan = $_POST["jabatan"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];

    if ($password !== $konfirmasi_password) {
        echo "Password dan konfirmasi password tidak cocok!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (kode_pengguna, nama, role, email, password) 
                VALUES ('$kode_pengguna', '$nama_pengguna', '$jabatan', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../../dashboard.php?page=semua-pengguna");
            $_SESSION['success_message'] = "Data berhasil disimpan!";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
