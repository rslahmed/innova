<?php

session_start();
//database connection
require 'db.php';
$id = $_POST['id'];

$service_title = addslashes($_POST['service_title']);
$service_text = addslashes($_POST['service_text']);


if ($_FILES['service_img']['name']!= ''){
    //add new image
    $photo = $_FILES['service_img']['name'];
    $photo_name_imp = explode('.', $photo);
    $photo_ext = end($photo_name_imp);
    $accept_ext = ['jpg', 'jpeg', 'png'];

    if (in_array($photo_ext, $accept_ext)) {
        //update banner info
        $update = "UPDATE services SET service_title='$service_title', service_text='$service_text' WHERE id='$id'";
        $update_con = mysqli_query($db, $update) ;

        //delete old image
        $select_img = "SELECT service_img FROM services WHERE id='$id'";
        $select_img_con = mysqli_query($db, $select_img);
        $single_img = mysqli_fetch_assoc($select_img_con);
        $delete_from = 'uploads/services/'.$single_img['service_img'];
        unlink($delete_from);

        //add banner new image
        $photo_name = "$id"."."."$photo_ext";
        $update = "UPDATE services SET service_img='$photo_name' WHERE id='$id'";
        $connect_update = mysqli_query($db, $update);
        move_uploaded_file($_FILES['service_img']['tmp_name'], 'uploads/services/'.$photo_name);

        $_SESSION['user_msg'] = "service has been <strong> Updated! <strong>";
        header('location:view-service.php');

    }elseif(!in_array($photo_ext, $accept_ext)){
        $_SESSION['img_err'] = 'This file not allowed';
        header('location:edit-service.php');
    }

}
else{
    $update = "UPDATE services SET service_title='$service_title', service_text='$service_text' WHERE id='$id'";
    $update_con = mysqli_query($db, $update) ;
    $_SESSION['user_msg'] = "Service has been <strong> Updated! <strong>";
    header('location:view-service.php');
}