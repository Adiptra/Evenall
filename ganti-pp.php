<?php 
session_start();
include 'admin/koneksi.php';

if(isset($_GET['kode'])){
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '".$_GET['kode']."' ");
    $dataEdit = mysqli_fetch_array($edit);
}

if(isset($_POST['edit']) && isset($_FILES['img_url'])){
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

            $sql = "UPDATE user SET img_url = '$new_img_name' WHERE id_user = '".$_GET['kode']."' ";
            $q1 = mysqli_query($koneksi, $sql);
            if($q1){
                header('location: profil.php?=data-berhasil-diedit');
            }else{
                echo "Gagal Memasukkan Data Pelanggan";
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evenall | Edit Profile</title>
    <link href="admin/favicon_and_logo-removebg-preview.png" rel="icon" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(19, 18, 18);">
    <div class="container">
        <div class="box" style="padding: 20px 20px;
        width: 100%;
        font-family: 'Fredoka', sans-serif;">
            <div class="row contentForm d-flex justify-content-center" style="margin: 8%" >
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2 class="text-center text-light">Edit Data Profile</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="img_url" class="form-label text-light">Upload Gambar</label>
                            <input placeholder="Masukkan Foto Anda" type="file" class="form-control" id="img_url" name="img_url">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3 text-light" name="edit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>