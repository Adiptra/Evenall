<?php
include_once 'admin/koneksi.php';
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
    <link rel="stylesheet" href="style/playlist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Evenall | History</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li><a href="home.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li class="playlist"><a href="history.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
            <li><a href="profil.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>
    </nav>
    <?php
    $ambil = mysqli_query($koneksi, "SELECT * FROM audio JOIN history ON audio.id=history.id WHERE history.id_user='$_SESSION[id_user]' ");
    while($detail = $ambil->fetch_assoc()){
    ?>
    <div class="history">
        <div class="container">
            <div class="body-history">
                <div class="detail-img">
                    <img src="admin/img-uploads/<?php echo $detail['img_url']?>" alt="" srcset="">
                </div>
                <div class="detail-lagu">
                    <div class="nm_lagu">
                        <h3><?= $detail['nm_lagu'] ?></h3>
                    </div>
                    <div class="detail-body">
                        <h5><?= $detail['nm_artis'] ?></h5>
                        <p><?= $detail['timeset'] ?></p>
                    </div>
                </div>
                <a href="?id=<?php echo $detail['id_history']?>"><i class="fa-solid fa-xmark"></i></a>
            </div>
        </div>
    </div>
    <?php
        }

        if(isset($_GET['id'])){
            $delete = mysqli_query($koneksi, "DELETE FROM history WHERE id_history='$_GET[id]'");
            if($delete){
                header('location: playlist.php');
            }else{
                header('location: playlist.php?pesan=gagal');
            }
        }
    ?>
</body>
</html>