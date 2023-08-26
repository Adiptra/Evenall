<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['login-admin'])){
    header('location: ../index.php?pesan=user-bukan-admin');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/music.css">
    <title>Evenall | Upload Music</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li><a href="index-admin.php">Dashboard</a></li>
            <li><a href="users.php">Users</i></a></li>
            <li class="home"><a href="music.php">Music</i></a></li>
            <li><a href="../login/logout.php">Logout</i></a></li>
        </ul>
    </nav>
    <div class="form">
        
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <h1>Upload, Edit dan Hapus Musik</h1>
                </li>
                <li>
                    <label for="">Judul Lagu</label>
                    <input type="text" name="nm_lagu" placeholder="Judul Lagu">
                </li>
                <li>
                    <label for="">Upload Audio</label>
                    <input type="file" name="audio_url" placeholder="Masukkan Audio">
                </li>
                <li>
                    <label for="">Nama Artis</label>
                    <input type="text" name="nm_artis" placeholder="Masukkan Nama Artis">
                </li>
                <li>
                    <label for="">Upload Gambar</label>
                    <input type="file" name="img_url" placeholder="Masukkan Gambar">
                </li>
                <li>
                    <input type="submit" name="save" placeholder="Submit">
                </li>
            </ul>
        </form>
    </div>
    <div class="base" id="more">
            <div class="pembungkus-base">
                <div class="lagu-base">
                    <?php 
                     $mysql = mysqli_query($koneksi, "SELECT * FROM audio");
                     for($i=1; $i <= mysqli_num_rows($mysql); $i++) :
                     $row = mysqli_fetch_assoc($mysql)
                    ?>
                            <div class="isiBase">
                                <div class="isiBase2">
                                    <img src="img-uploads/<?php echo $row['img_url'] ?>" alt="">
                                    <h5><?php echo $row['nm_lagu'] ?></h5>
                                    <p><?php echo $row['nm_artis'] ?></p>
                                    <div class="btn-href">
                                        <a href="edit-detail.php?v=<?php echo $row['id'] ?>">Edit</a>
                                        <a class="delete" href="?del=<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                    <?php endfor; 
                    ?>
                </div>
            </div>
        </div>
        <?php
            if(isset($_GET['del'])){
                $del = mysqli_query($koneksi, "DELETE FROM audio WHERE id='$_GET[del]'");
                if($del){
                    header('location: music.php?pesan=berhasil-dihapus');
                }else{
                    header('location: music.php?pesan=gagal-dihapus');
                }
            }
        ?>
</body>
</html>