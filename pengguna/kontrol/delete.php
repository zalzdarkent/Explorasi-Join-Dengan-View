<?php
include('../../config/config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM users WHERE id = $id";

    if(mysqli_query($conn, $deleteQuery)) {
        header("Location: ../../dashboard.php?page=semua-pengguna");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak valid atau tidak ditemukan.";
}
?>
