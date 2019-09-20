<?php

session_start();
//database connection
require 'db.php';

//form data
$about_title = addslashes($_POST['about_title']);
$about_text = addslashes($_POST['about_text']);
$about_subtitle = addslashes($_POST['about_subtitle']);

$about_list = $_POST['about_list'];
$al_implode = implode('*',$about_list);
$fix_al_imp = addslashes($al_implode);


$photo = $_FILES['about_img']['name'];
$photo_size = $_FILES['photo']['size'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO abouts (about_title, about_text, about_subtitle, about_list) VALUE ('$about_title', '$about_text', '$about_subtitle','$fix_al_imp' ) ";
    $insert_con = mysqli_query($db, $insert) ;
    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";
    $update = "UPDATE abouts SET about_img='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);
    move_uploaded_file($_FILES['about_img']['tmp_name'], 'uploads/abouts/'.$photo_name);

    $_SESSION['user_msg'] = "New About Added";
    header('location:view-about.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:add-about.php');
}