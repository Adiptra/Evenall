<?php
    session_start();
    include_once 'admin/koneksi.php';
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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Evenall</title>
</head>
<body>
    
    <nav>
        <ul class="right">
            <li class="home"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="history.php"><i class="fa-solid fa-clock-rotate-left"></i></i></a></li>
            <li><a href="profil.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>
    </nav>
    <div class="backToUp">
        <div class="btnBack">
            <a href="#logo"><i class="fa-solid fa-chevron-up"></i></a>
        </div>
    </div>
    <header>
        <div class="logo animate__animated animate__fadeInUp animate-delay-0.5s" id="logo">
            <h2>Even<span>all</span></h2>
        </div>
    </header>
    <select name="" id="">
        <option value=""></option>
        <option value="">Privacy Police</option>
        <option value="">About Me</option>
    </select>
    <div class="content animate__animated animate__fadeInUp animate-delay-1s">
        <div class="konten">
            <div class="head">
                <img src="image/tulus.jfif" alt="" srcset="">
                <div class="judul">
                    <h2>Lagu Viral <span>Tulus</span></h2>
                    <p>Udah paling bener malem malem galau dengerin lagu Tulus</p>
                    <div class="tombol">
                        <a href="play-music.php?code=<?php echo 16 ?>">Play</a>
                        <a href="#more">More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
        <h2>Good Evening</h2>
            <div class="greeting">
                <div class="mix">
                    <?php 
                    $mysqli1 = mysqli_query($koneksi, "SELECT * FROM audio");
                    for($i=1; $i <= 5; $i++) :
                    $row1 = mysqli_fetch_assoc($mysqli1);
                    ?>
                    <a href="play-music.php?code=<?php echo $row1['id'] ?>">
                        <div class="laguMix">
                            <img src="admin/img-uploads/<?php echo $row1['img_url'] ?>" alt="">
                            <h5><?= $row1['nm_artis'] ?></h5>
                        </div>
                    </a>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="base" id="more">
            <div class="pembungkus-base">
                <div class="kataBased">
                    <h2>Based On Your Recent Listening</h2>
                    <?php 
                    $q2 = mysqli_query($koneksi, "SELECT * FROM audio");
                    $cek = mysqli_num_rows($q2);

                    if($cek > 7){
                    ?>
                        <a href="see-all.php">See All</a>
                    <?php 
                    }
                    ?>
                </div>
                <div class="lagu-base">
                    <?php 
                     $mysql = mysqli_query($koneksi, "SELECT * FROM audio");
                     for($i=1; $i <= 8; $i++) :
                     $row = mysqli_fetch_assoc($mysql);
                    ?>
                            <div class="isiBase">
                                <div class="isiBase2">
                                    <img src="admin/img-uploads/<?php echo $row['img_url'] ?>" alt="">
                                    <h5><?php echo $row['nm_lagu'] ?></h5>
                                    <p><?php echo $row['nm_artis'] ?></p>
                                </div>
                                <form action="" method="post">
                                    <button type="submit" name="play"><a href="play-music.php?code=<?php echo $row['id'] ?>">Play</a></button>
                                </form>
                            </div>
                    <?php endfor; 
                    ?>
                </div>
            </div>
        </div>
    </div>    
    
    <!-- <script src="blbl.js"></script> -->
</body>
</html>