<?php
$koneksi = mysqli_connect('localhost', 'user', 'password', 'penjualan');

// Check connection
if($koneksi == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>