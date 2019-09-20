<?php

session_start();
//database connection
require 'db.php';

//form data
$testi_title = addslashes($_POST['testi_title']);
$testi_text = addslashes($_POST['testi_text']);

$photo = $_FILES['testi_img']['name'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO testis (testi_title, testi_text) VALUE ('$testi_title', '$testi_text') ";
    $insert_con = mysqli_query($db, $insert) ;
    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";
    $update = "UPDATE testis SET testi_img='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);
    move_uploaded_file($_FILES['testi_img']['tmp_name'], 'uploads/testis/'.$photo_name);

    $_SESSION['user_msg'] = "New Testimonial Added";
    header('location:view-testi.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:add-testi.php');
}