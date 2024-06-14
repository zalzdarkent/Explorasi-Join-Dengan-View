<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'uas-pemweb');

if ($koneksi->connect_error) {
    echo "Gagal Koneksi: " . $koneksi->connect_error;
}

?>