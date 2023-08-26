<?php
    include_once('admin/koneksi.php');
    $username       ="";
    $password       ="";
    $sukses         ="";
    $err            ="";
    $sukses1        ="";
    $alert          ="";
    $err1           ="";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evenall | Login</title>
    <link href="admin/favicon_and_logo-removebg-preview.png" rel="icon" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(19, 18, 18);">
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			$err = "Username and Password Invalid!";
		}else if($_GET['pesan'] == "logout"){
			$sukses = "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "berhasil-signup"){
			$sukses1 = "Yeay!!! Sign Up Berhasil Silahkan Login";
		}else if($_GET['pesan'] == "silahkan-login"){
            $err1 = "Silahkan Login atau Sign Up terlebih dahulu";
        }
	}
	?>
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
        <?php
        if($sukses1){
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses1 ?>
        </div>
        <?php
        }
        ?>
        <?php
        if($err1){
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $err1 ?>
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
                        <h2 class="text-center text-light">Even<span style="color: #FAD810;">all</span></h2>
                            <form action="login/cek_login.php" autocomplete="off" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label text-light">Username</label>
                                    <input placeholder="Masukkan Username Anda" type="text" class="form-control" id="username" name="username" value="<?php echo $username?>" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label text-light">Password</label>
                                    <input placeholder="Masukkan Password Anda" type="password" class="form-control" name="pw" value="<?php echo $password?>" id="password">
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" onclick="showPW()" id="show">
                                    <label class="form-check-label text-light" for="show">Show Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                            </form>
                        <p class="text-light">Belum Punya Akun? <a href="login/signup.php" style="text-decoration: none;">Sign Up</a></p>
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