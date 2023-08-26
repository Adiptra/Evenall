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
    <link rel="stylesheet" href="style/users.css">
    <title>Evenall | Users</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li><a href="index-admin.php">Dashboard</a></li>
            <li class="home"><a href="users.php">Users</i></a></li>
            <li><a href="music.php">Music</i></a></li>
            <li><a href="../login/logout.php">Logout</i></a></li>
        </ul>
    </nav>
    <div class="tabel">
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $mysql = mysqli_query($koneksi, "SELECT* FROM user");
                    while($pecah = mysqli_fetch_assoc($mysql)){
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pecah['id_user']?></td>
                    <td><?php echo $pecah['username']?></td>
                    <td><?php echo $pecah['pw']?></td>
                    <td><?php echo $pecah['alamat']?></td>
                    <td><?php echo $pecah['tlp']?></td>
                    <td><?php echo $pecah['email']?></td>
                    <td>
                    <?php if($pecah['role'] == 1){
                        echo "Admin";
                    }else{
                        echo"User";
                    }
                    ?>
                    </td>
                    <td>
                        <a href="edit-user.php?kode=<?php echo $pecah['id_user']?>">Edit</a>
                        <a href="?kode=<?php echo $pecah['id_user']?>">Hapus</a>
                    </td>
                </tr>
                <?php
                    }

                    if(isset($_GET['kode'])){
                        $sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '".$_GET['kode']."'");
                        if($sql){
                            header('location: users.php');
                        }else{
                            header('location: users.php?pesan=gagal-dihapus');
                        }
                    }
                ?>
            </tbody>
            
        </table>
    </div>
    
</body>
</html>