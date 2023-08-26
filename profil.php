<?php
    session_start();
    include 'admin/koneksi.php';
    $s = $_SESSION['username'];
    $q2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$s' ");
    $fetch = mysqli_fetch_assoc($q2);
    if(!isset($_SESSION['login-user'])){
        header('location: index.php?pesan=silahkan-login');
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/profil.css?<?php echo time() ?>">
    <title>Evenall | Profile</title>
</head>
<body>
    <nav>
        <ul class="right">
            <li><a href="home.php"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a></li>
            <li><a href="history.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>
            <li class="profil"><a href="profil.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>
    </nav>
    <div class="body">
        <div class="pro">
            <div class="profile">
                <div class="foto">
                    <img src="img-profil/<?= $fetch['img_url']?>" alt="">
                </div>
                <div class="group_detail">
                    <?php
                    if(isset($_SESSION['login-user'])){
                    ?>
                    <div class="username">
                        <h2><?php echo $_SESSION['username']?></h2>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="username">
                        <h2>Username</h2>
                    </div>
                    <?php
                    };
                    ?>
                    <div class="followers">
                        <div>
                            <h5>0</h5>
                            <p>Followers</p>
                        </div>
                        <div>
                            <h5>0</h5>
                            <p>Followed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($_SESSION['login-user'])){?>
            <div class="edit-btn">
                <a href="edit.php?kode=<?php echo $fetch['id_user']?>" style="padding: 1% 31.5%;">Edit Profile</a>
            </div>
        <?php }else{?>
            <div class="edit-btn">
            <a href="login/login-user.php" style="padding: 1% 33%;">Login</a>
        </div>
        <?php } ?>
        <div class="logout">
            <a href="login/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </div>

    
</body>
</html>