<?php
$hostname = "localhost";
$hostusername = "root";
$password = "";
$data_base = "lsp";
$config = mysqli_connect($hostname, $hostusername, $password, $data_base);
if (!$config) {
    echo "koneksi gagal";
}