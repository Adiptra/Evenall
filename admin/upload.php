<?php
    if(isset($_POST['save']) && isset($_FILES['audio_url']) && isset($_FILES['img_url'])) {
        include 'koneksi.php';

        $nm_img = $_FILES['img_url']['name'];
        $tmp_name_img = $_FILES['img_url']['tmp_name'];
        $error = $_FILES['img_url']['error'];

        $nm_lagu = $_FILES['audio_url']['name'];
        $tmp_name = $_FILES['audio_url']['tmp_name'];
        $error = $_FILES['audio_url']['error'];

        if($error == 0){
            $audio_ex = pathinfo($nm_lagu, PATHINFO_EXTENSION);
            $audio_ex_lc = strtolower($audio_ex);
            $allowed_exs = array('3gp', 'mp3', 'm4a', 'wav', 'm3u', 'ogg');

            $img_ex = pathinfo($nm_img, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allow_exs = array('jpg', 'png', 'jpeg', 'jfif');

            if(in_array($audio_ex_lc, $allowed_exs) && in_array($img_ex_lc, $allow_exs)){
                $new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
                $audio_upload_path = 'uploads/'.$new_audio_name;
                move_uploaded_file($tmp_name, $audio_upload_path);

                $new_img_name = uniqid("image-", true). '.'.$img_ex_lc;
                $img_upload_path = 'img-uploads/'.$new_img_name;
                move_uploaded_file($tmp_name_img, $img_upload_path);

                $sql = "INSERT INTO audio(nm_lagu, audio_url, nm_artis, img_url) VALUES('".$_POST['nm_lagu']."', '$new_audio_name', '".$_POST['nm_artis']."', '$new_img_name')";
                mysqli_query($koneksi, $sql);
                header('location: music.php?success');
            }else{
                $em = "You Can't upload files of this type";
                header('location: music.php?error=$em');
            }
        }
    }else{
        header('location: index-admin.php');
    }
    
?>