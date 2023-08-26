<?php
    session_start();
    require_once 'admin/koneksi.php';
    if(isset($_GET['code'])){
        $mysql = mysqli_query($koneksi, "SELECT * FROM audio WHERE id = '".$_GET['code']."' ");
        $pecah = mysqli_fetch_array($mysql);

        $id_akun   = $_SESSION['id_user'];
        $id_musik   = $pecah['id'];

        //time
        date_default_timezone_set('Asia/Jakarta');
        $t    = time();
        $date = date('M j, Y', $t);  

        mysqli_query($koneksi, "INSERT INTO history (id_user, id, timeset) VALUES ('$id_akun', '$id_musik', '$date')");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Evenall | Play</title>
    <link rel="stylesheet" href="style/play-music.css">
</head>
<body>
    <nav>
        <ul class="right">
            <li class="home"><a href="home.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="history.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
            <li><a href="profil.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>
    </nav>
    <div class="player">
        <div class="player__header">
            <div class="player__img player__img--absolute slider">
                <button class="player__button player__button--absolute--nw playlist">
                    <img src="http://physical-authority.surge.sh/imgs/icon/playlist.svg" alt="playlist-icon">
                </button>
                <button class="player__button player__button--absolute--center play">
                    <img src="http://physical-authority.surge.sh/imgs/icon/play.svg" alt="play-icon">
                    <img src="http://physical-authority.surge.sh/imgs/icon/pause.svg" alt="pause-icon">
                </button>
                <div class="slider__content">
                    <img class="img slider__img" src="admin/img-uploads/<?php echo $pecah['img_url']?>" alt="cover">
                    <?php
                        $sql0 = mysqli_query($koneksi, "SELECT * FROM audio");
                        while($assoc = mysqli_fetch_assoc($sql0)){
                    ?>
                    <img class="img slider__img" src="admin/img-uploads/<?php echo $assoc['img_url']?>" alt="cover">
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="player__controls">
                <button class="player__button back">
                    <img class="img" src="http://physical-authority.surge.sh/imgs/icon/back.svg" alt="back-icon">
                </button>
                <p class="player__context slider__context">
                    <strong class="slider__name"></strong>
                    <span class="player__title slider__title"></span>
                </p>
                <button class="player__button next">
                    <img class="img" src="http://physical-authority.surge.sh/imgs/icon/next.svg" alt="next-icon">
                </button>
                <div class="progres">
                    <div class="progres__filled"></div>
                </div>
            </div>
        </div>
        <ul class="player__playlist list">
            <li class="player__song">
                <img class="player__img img" src="admin/img-uploads/<?php echo $pecah['img_url']?>" alt="cover">
                <p class="player__context">
                    <b class="player__song-name"><?php echo $pecah['nm_lagu'] ?></b>
                    <span class="flex">
                        <span class="player__title"><?php echo $pecah['nm_artis'] ?></span>
                        <span class="player__song-time"></span>
                    </span>
                </p>
                <audio class="audio" src="admin/uploads/<?php echo $pecah['audio_url']?>"></audio>
            </li>

            <?php
                $sql1 = mysqli_query($koneksi, "SELECT * FROM audio");
                while($pisah = mysqli_fetch_assoc($sql1)){
            ?>
            <a href="?code=<?= $pisah['id'] ?>">
                <li class="player__song">
                    <img class="player__img img" src="admin/img-uploads/<?php echo $pisah['img_url']?>" alt="cover">
                    <p class="player__context">
                        <b class="player__song-name"><?= $pisah['nm_lagu']?></b>
                        <span class="flex">
                            <span class="player__title"><?= $pisah['nm_artis']?></span>
                            <span class="player__song-time"></span>
                        </span>
                    </p>
                    <audio class="audio" src="admin/uploads/<?php echo $pisah['audio_url']?>"></audio>
                </li>
            </a>
            <?php 
                }
            ?>
        </ul>
    </div>
        <!-- Javascript -->
        <script src="js/app.js"></script>
</body>
</html>