<?php

session_start();
//database connection
require 'db.php';

$photo = $_FILES['logo_img']['name'];
$photo_size = $_FILES['photo']['size'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO logos (logo_img, status) VALUE ('$photo', '') ";
    $insert_con = mysqli_query($db, $insert) ;
    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";
    $update = "UPDATE logos SET logo_img='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);
    move_uploaded_file($_FILES['logo_img']['tmp_name'], 'uploads/logos/'.$photo_name);

    $_SESSION['user_msg'] = "New Logo Added";
    header('location:view-logo.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:add-banner.php');
}