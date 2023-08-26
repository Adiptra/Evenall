<?php
session_start();
include_once 'admin/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/see-all.css">
    <title>Evenall | See All</title>
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

    <div class="base" id="more">
            <div class="pembungkus-base">
                <div class="lagu-base">
                    <?php 
                     $mysql = mysqli_query($koneksi, "SELECT * FROM audio");
                     for($i=1; $i <= mysqli_num_rows($mysql); $i++) :
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
</body>
</html>