<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../admin/koneksi.php');
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$pw = $_POST['pw'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM user where username='$username' and pw='$pw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
// login multiuser
if($cek > 0){
	$akun = mysqli_fetch_assoc($data);
	if($akun['role'] == 0){
		$_SESSION['username'] = $username;
		$_SESSION['pw'] = $pw;
		$_SESSION['id_user'] = $akun['id_user'];
		$_SESSION['login-user'] = "user";
		header("Location: ../home.php");
	}else if($akun['role'] == 1){
		$_SESSION['username'] = $username;
		$_SESSION['pw'] = $pw;
		$_SESSION['login-admin'] = "admin";
		header("Location: ../admin/index-admin.php");
	}else{
		header('location: ../index.php?pesan=gagal');
	}
}else{
	header("Location: ../index.php?pesan=gagal");
}



?>