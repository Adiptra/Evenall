<?php 
session_start();
include 'koneksi.php';
if(!isset($_SESSION['login-admin'])){
    header('location: ../index.php?pesan=silahkan-login');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Evenall | Admin</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li class="home"><a href="#">Dashboard</a></li>
            <li><a href="users.php">Users</i></a></li>
            <li><a href="music.php">Music</i></a></li>
            <li><a href="../login/logout.php">Logout</i></a></li>
        </ul>
    </nav>
    <div class="card">
        <div class="konten">
            <h1>Selamat Datang di Even<span>all</span></h1>
            <p>Halo Admin !!! Selamat Bekerja !!!</p>
            <a href="users.php"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</body>
</html>