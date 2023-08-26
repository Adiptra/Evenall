<?php
    include '../admin/koneksi.php';
    $username       ="";
    $password       ="";
    $id_user        ="";
    $alamat         ="";
    $sukses         ="";
    $err            ="";
    $alert          ="";
    $email          ="";
    $tlp            ="";
    $query = mysqli_query($koneksi, "SELECT max(id_user) as kodeTerbesar FROM user");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    
    $urutan = (int) substr($kodeBarang, 3, 3);
    $urutan++;

    $huruf = "P";
    $kodeBarang = $huruf . sprintf("%04s", $urutan);

    if(isset($_POST['simpan'])){
        $username = $_POST['username'];
        $password = $_POST['pw'];
        $alamat   = $_POST['alamat'];
        $id_user = $_POST['id_user'];
        $email    = $_POST['email'];
        $telepon  = $_POST['tlp'];
    
        if($id_user && $username && $alamat && $telepon && $email && $password){
            $sql1 = "INSERT INTO user (id_user, username, alamat, tlp, email, pw) values ('$id_user', '$username', '$alamat', '$telepon', '$email', '$password')";
            $q1 = mysqli_query($koneksi,$sql1);
            if($q1){    
                header('location: ../index.php?pesan=berhasil-signup');
            }else{
                $err ='Terjadi Error, Silahkan Tunggu Beberapa Saat';
            }
        }else{
            $err ="Silahkan Masukkan Semua Data";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
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
                    <h2 class="text-center text-light">Sign Up</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label for="id_user" class="form-label text-light">ID</label>
                            <input placeholder="Masukkan ID Anda" type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $kodeBarang?>" readonly >
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label text-light">Username</label>
                            <input placeholder="Masukkan Username Anda" type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?php echo $username?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-light">Alamat</label>
                            <input placeholder="Masukkan alamat Anda" type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" value="<?php echo $alamat?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label text-light">Telepon</label>
                            <input placeholder="Masukkan Nomor Telepon Anda" type="text" class="form-control" id= "telepon" name="tlp" autocomplete="off" value="<?php echo $tlp?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input placeholder="Masukkan email Anda" type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $email?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-light">Password</label>
                            <input placeholder="Masukkan Password Anda" type="password" class="form-control" name="pw" autocomplete="off" value="<?php echo $password?>" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" onclick="showPW()" id="show">
                            <label class="form-check-label text-light" for="show">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3 text-light" name="simpan">Submit</button>
                    </form>
                    <p class="text-light">Sudah Punya Akun? <a href="../index.php" style="text-decoration: none;">Login</a></p>
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