<?php
include('../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['pengguna'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];

    if (!empty($_POST['password']) && !empty($_POST['konfirmasi_password'])) {
        $password = $_POST['password']; 
        $konfirmasi_password = $_POST['konfirmasi_password']; 

        if ($password !== $konfirmasi_password) {
            echo "<script>alert('Konfirmasi password tidak cocok!');</script>";
            exit; 
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "UPDATE users SET nama='$nama', role='$jabatan', email='$email', password='$hashed_password' WHERE id='$id'";
    } else {
        $query = "UPDATE users SET nama='$nama', role='$jabatan', email='$email' WHERE id='$id'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../../dashboard.php?page=semua-pengguna');
    } else {
        echo "<script>alert('Gagal memperbarui data pengguna.');</script>";
    }
}
?>
