<?php

session_start();
//database connection
require 'db.php';

//form data
$service_title = addslashes($_POST['service_title']);
$service_text = addslashes($_POST['service_text']);


$photo = $_FILES['service_img']['name'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {
    $insert = "INSERT INTO services (service_title, service_text) VALUE ('$service_title', '$service_text') ";
    $insert_con = mysqli_query($db, $insert) ;
    $last_id = mysqli_insert_id($db);
    $photo_name = "$last_id"."."."$photo_ext";
    $update = "UPDATE services SET service_img='$photo_name' WHERE id='$last_id'";
    $connect_update = mysqli_query($db, $update);
    move_uploaded_file($_FILES['service_img']['tmp_name'], 'uploads/services/'.$photo_name);

    $_SESSION['user_msg'] = "New Service Added";
    header('location:view-service.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:add-service.php');
}