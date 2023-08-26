<?php
    include 'koneksi.php';
    if(isset($_GET['edit'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM audio WHERE id='$_GET[edit]'");
        $as = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['gmbr']) && isset($_FILES['img_url'])){
        $nm_img = $_FILES['img_url']['name'];
        $tmp_name_img = $_FILES['img_url']['tmp_name'];
        $error = $_FILES['img_url']['error'];

        if($error == 0){
            $img_ex = pathinfo($nm_img, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allow_exs = array('jpg', 'png', 'jpeg', 'jfif');

            if(in_array($img_ex_lc, $allow_exs)){
                $new_img_name = uniqid("image-", true). '.'.$img_ex_lc;
                $img_upload_path = 'img-profil/'.$new_img_name;
                move_uploaded_file($tmp_name_img, $img_upload_path);

                $sql = "UPDATE audio SET img_url = '$new_img_name' WHERE = '".$_GET['edit']."' ";
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
    <link rel="stylesheet" href="style/edit-gambar.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li class="gambar">
                    <img src="img-uploads/<?= $as['img_url'] ?>" alt="">
                </li>
                <li>
                    <label for="">Upload Gambar</label>
                    <input type="file" name="img_url" placeholder="Masukkan Gambar">
                </li>
                <li>
                    <input type="submit" name="gmbr" placeholder="Edit">
                </li>
            </ul>
        </form>
    </div>
</body>
</html>