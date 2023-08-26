<?php
    include 'koneksi.php';
    if(isset($_GET['v'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM audio WHERE id='$_GET[v]'");
        $as = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['name'])){
        $judul = $_POST['nm_lagu'];
        $nm_artis = $_POST['nm_artis'];

        $sql1 = mysqli_query($koneksi, "UPDATE audio SET nm_lagu='$judul', nm_artis='$nm_artis' WHERE id='$_GET[v]'");
        if($sql1){
            header('location: music.php');
        }else{
            header('location: &&pesan=gagal');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/edit-music.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li class="detail">
                    <div class="detail-gambar">
                        <img src="img-uploads/<?php echo $as['img_url']?>" alt="Gambar Album">
                    </div>
                    <p><a href="edit-gambar.php?edit=<?= $as['id'] ?>">Edit Gambar?</a> atau <a href="ganti-music.php?edit=<?= $as['id'] ?>">Edit Music?</a></p>
                </li>
                <li>
                    <label for="">Judul Lagu</label>
                    <input type="text" name="nm_lagu" value="<?php echo $as['nm_lagu']?>" placeholder="Judul Lagu">
                </li>
                <!-- <li>
                    <label for="">Upload Audio</label>
                    <input type="file" name="audio_url" placeholder="Masukkan Audio">
                </li> -->
                <li>
                    <label for="">Nama Artis</label>
                    <input type="text" name="nm_artis" value="<?php echo $as['nm_artis']?>" placeholder="Masukkan Nama Artis">
                </li>
                <!-- <li>
                    <label for="">Upload Gambar</label>
                    <input type="file" name="img_url" placeholder="Masukkan Gambar">
                </li> -->
                <li>
                    <input type="submit" name="name" placeholder="Edit">
                </li>
            </ul>
        </form>
    </div>
</body>
</html>