<?php

session_start();
//database connection
require 'db.php';

//form data
$banner_title = addslashes($_POST['banner_title']);
$banner_text = addslashes($_POST['banner_text']);
$banner_btn = addslashes($_POST['banner_btn']);


$photo = $_FILES['banner_img']['name'];
$photo_size = $_FILES['photo']['size'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO banners (banner_title, banner_text, banner_btn) VALUE ('$banner_title', '$banner_text', '$banner_btn') ";
    $insert_con = mysqli_query($db, $insert) ;
    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";
    $update = "UPDATE banners SET banner_img='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);
    move_uploaded_file($_FILES['banner_img']['tmp_name'], 'uploads/banner/'.$photo_name);

    $_SESSION['user_msg'] = "New banner Added";
    header('location:view-banner.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:add-banner.php');
}