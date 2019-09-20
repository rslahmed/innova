<?php

$photo = $_FILES['photo']['name'];
$photo_size = $_FILES['photo']['size'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO users (name, email, password, gender, role) VALUE ('$name', '$email', '$pass', '$gender', '$role') ";
    $insert_con = mysqli_query($db, $insert) ;
    unset($_SESSION['fname']);
    unset($_SESSION['email']);
    unset($_SESSION['gender']);
    unset($_SESSION['role']);

    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";

    $update = "UPDATE users SET photo='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);

    move_uploaded_file($_FILES['photo']['tmp_name'], 'user-img/'.$photo_name);

    $_SESSION['user_msg'] = "New User Added";
    header('location:users.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:register.php');
}
