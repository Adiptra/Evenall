<?php
include_once "admin/koneksi.php";
// include_once "koneksi.php";
session_start();
if(!isset($_SESSION['login-user'])){
    header('location: index.php?pesan=silahkan-login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Evenall | Search</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li><a href="home.php"><i class="fa-solid fa-house"></i></a></li>
            <li class="search"><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="history.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
            <li><a href="profil.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>
    </nav>
    <header>
        <form action="" method="GET">
            <input type="text" name="cari" placeholder="Cari Lagu" class="animate__animated animate__fadeInLeft animate-delay-0.5s">
            <input type="submit" value="Search" class="animate__animated animate__fadeInRight animate-delay-1s">
        </form>
    </header>
    <div class="base animate__animated animate__fadeInUp animate-delay-1s">
            <div class="pembungkus-base">
                <div class="lagu-base">
                    <?php 
                    if(isset($_GET['cari'])){
                        $cari = $_GET['cari'];
                        $data = mysqli_query($koneksi, "SELECT * FROM audio WHERE nm_lagu LIKE '%".$cari."%'");				
                    }else{
                        $data = mysqli_query($koneksi, "SELECT * FROM audio");		
                    }
                     while($row = mysqli_fetch_assoc($data)){
                    ?>
                        <a href="play-music.php?code=<?php echo $row['id'] ?>">
                            <div class="isiBase">
                                <div class="isiBase2">
                                    <img src="admin/img-uploads/<?php echo $row['img_url'] ?>" alt="">
                                    <h5><?php echo $row['nm_lagu'] ?></h5>
                                    <p><?php echo $row['nm_artis'] ?></p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
</body>
</html>