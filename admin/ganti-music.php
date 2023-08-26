<?php
    include 'koneksi.php';
    if(isset($_GET['edit'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM audio WHERE id='$_GET[edit]'");
        $as = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['gmbr']) && isset($_FILES['audio_url'])){
        $nm_audio = $_FILES['audio_url']['name'];
        $tmp_name_audio = $_FILES['audio_url']['tmp_name'];
        $error = $_FILES['audio_url']['error'];

        if($error == 0){
            $audio_ex = pathinfo($nm_audio, PATHINFO_EXTENSION);
            $audio_ex_lc = strtolower($audio_ex);
            $allow_exs = array('3gp', 'mp3', 'm4a', 'wav', 'm3u', 'ogg');

            if(in_array($audio_ex_lc, $allow_exs)){
                $new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
                $audio_upload_path = 'uploads/'.$new_audio_name;
                move_uploaded_file($tmp_name_audio, $audio_upload_path);

                $sql = "UPDATE audio SET audio_url = '$new_audio_name' WHERE id = '".$_GET['edit']."' ";
                $q1 = mysqli_query($koneksi, $sql);
                if($q1){
                    header('location: edit-detail.php?=data-berhasil-diedit');
                }else{
                    echo "Gagal Memasukkan Data Pelanggan";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/ganti-music.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li class="gambar">
                    <audio controls>
                        <source src="uploads/<?= $as['audio_url']?>">
                    </audio>
                </li>
                <li>
                    <label for="">Upload Music</label>
                    <input type="file" name="audio_url" placeholder="Masukkan Musik">
                </li>
                <li>
                    <input type="submit" name="gmbr" placeholder="Edit">
                </li>
            </ul>
        </form>
    </div>
</body>
</html>