<?php

$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$hostdatabase = "lsp";
$config = mysqli_connect($hostname, $hostusername, $hostpassword, $hostdatabase);
if (!$config) {
    echo "Koneksi gagal";
}
