<?php
    include 'koneksi.php';
    if(isset($_GET['kode'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$_GET[kode]'");
        $as = mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['update'])){
        $username = $_POST['username'];
        $pw = $_POST['pw'];
        $email = $_POST['email'];
        $tlp = $_POST['tlp'];
        $alamat = $_POST['alamat'];


        $sql1 = mysqli_query($koneksi, "UPDATE user SET username='$username', pw='$pw', alamat='$alamat', tlp='$tlp', email='$email' WHERE id_user='$_GET[kode]'");
        if($sql1){
            header('location: users.php');
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
    <link rel="stylesheet" href="style/edit-user.css">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="">ID</label>
                    <input type="text" value="<?php echo $as['id_user']?>" placeholder="ID" readonly>
                </li>
                <li>
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?php echo $as['username']?>" placeholder="Masukkan Username">
                </li>
                <li>
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php echo $as['email']?>" placeholder="Masukkan Email">
                </li>
                <li>
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" value="<?= $as['alamat']?>" placeholder="Masukkan Alamat">
                </li>
                <li>
                    <label for="">No. Telepon</label>
                    <input type="text" name="tlp" value="<?php echo $as['tlp']?>" placeholder="Masukkan No. Telepon">
                </li>
                <li>
                    <label for="">Password</label>
                    <input type="text" name="pw" placeholder="Masukkan Password" value="<?= $as['pw']?>">
                </li>
                <li>
                    <input type="submit" name="update" placeholder="Edit">
                </li>
            </ul>
        </form>
    </div>
</body>
</html>