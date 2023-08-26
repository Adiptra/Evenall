<?php
session_start();
include 'admin/koneksi.php';
$sukses         ="";
$err            ="";
$alert          ="";

if(isset($_GET['kode'])){
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '".$_GET['kode']."' ");
    $dataEdit = mysqli_fetch_array($edit);
}

if(isset($_POST['edit'])){
    $sql = "UPDATE user SET username = '".$_POST['username']."', pw = '".$_POST['pw']."', alamat = '".$_POST['alamat']."', tlp = '".$_POST['tlp']."', email = '".$_POST['email']."'  WHERE id_user = '".$_GET['kode']."' ";
    $q1 = mysqli_query($koneksi, $sql);
    if($q1){
        $_SESSION['username'] = $_POST['username'];
        header('location: profil.php?=data-berhasil-diedit');
    }else{
        echo "Gagal Memasukkan Data Pelanggan";
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
    <?php
        if ($err) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $err?>
        </div>
        <?php
        }
        ?>
        <?php
        if ($sukses) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
        }
    ?>
    <div class="container">
        <div class="box" style="padding: 20px 20px;
        width: 100%;
        font-family: 'Fredoka', sans-serif;">
            <div class="row contentForm d-flex justify-content-center" style="margin: 8%" >
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h2 class="text-center text-light">Edit Data Profile</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="m-3 d-flex justify-content-center">
                            <div class="detail-gambar text-center">
                                <img class="d-block rounded-circle" src="img-profil/<?= $dataEdit['img_url']?>" alt="" srcset="">
                                <a href="ganti-pp.php?kode=<?= $dataEdit['id_user']?>" class="text-white text-decoration-none">Ganti Foto Profile?</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="id_user" class="form-label text-light">ID</label>
                            <input placeholder="Masukkan ID Anda" type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $dataEdit['id_user']?>" readonly >
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label text-light">Username</label>
                            <input placeholder="Masukkan Username Anda" type="text" class="form-control" id="username" name="username" value="<?php echo $dataEdit['username']?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-light">Alamat</label>
                            <input placeholder="Masukkan alamat Anda" type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dataEdit['alamat']?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label text-light">Telepon</label>
                            <input placeholder="Masukkan Nomor Telepon Anda" type="text" class="form-control" id= "telepon" name="tlp" value="<?php echo $dataEdit['tlp']?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input placeholder="Masukkan email Anda" type="text" class="form-control" id="email" name="email" value="<?php echo $dataEdit['email']?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-light">Password</label>
                            <input placeholder="Masukkan Password Anda" type="password" class="form-control" name="pw" value="<?php echo $dataEdit['pw']?>" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" onclick="showPW()" id="show">
                            <label class="form-check-label text-light" for="show">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3 text-light" name="edit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
    
        <script>
            function showPW() {
                var x = document.getElementById("password");
                if (x.type == "password") {
                    x.type = "text" 
                }else {
                    x.type = "password"
                }

            }
        </script>
</body>
</html>