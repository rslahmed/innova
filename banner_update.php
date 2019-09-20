<?php

session_start();
//database connection
require 'db.php';
$id = $_POST['id'];

$banner_title = $_POST['banner_title'];
$banner_text = $_POST['banner_text'];
$banner_btn = $_POST['banner_btn'];


if ($_FILES['banner_img']['name']!= ''){
    //add new image
    $photo = $_FILES['banner_img']['name'];
    $photo_name_imp = explode('.', $photo);
    $photo_ext = end($photo_name_imp);
    $accept_ext = ['jpg', 'jpeg', 'png'];

    if (in_array($photo_ext, $accept_ext)) {
        //update banner info
        $update = "UPDATE banners SET banner_title='$banner_title', banner_text='$banner_text', banner_btn='$banner_btn' WHERE id='$id'";
        $update_con = mysqli_query($db, $update) ;

        //delete old image
        $select_img = "SELECT banner_img FROM banners WHERE id='$id'";
        $select_img_con = mysqli_query($db, $select_img);
        $single_img = mysqli_fetch_assoc($select_img_con);
        $delete_from = 'uploads/banner/'.$single_img['banner_img'];
        unlink($delete_from);

        //add banner new image
        $photo_name = "$id"."."."$photo_ext";
        $update = "UPDATE banners SET banner_img='$photo_name' WHERE id='$id'";
        $connect_update = mysqli_query($db, $update);
        move_uploaded_file($_FILES['banner_img']['tmp_name'], 'uploads/banner/'.$photo_name);

        $_SESSION['user_msg'] = "Banner has been <strong> Updated! <strong>";
        header('location:view-banner.php');

    }elseif(!in_array($photo_ext, $accept_ext)){
        $_SESSION['img_err'] = 'This file not allowed';
        header('location:edit-banner.php');
    }

}
else{
    $update = "UPDATE banners SET banner_title='$banner_title', banner_text='$banner_text', banner_btn='$banner_btn' WHERE id='$id'";
    $update_con = mysqli_query($db, $update) ;
    $_SESSION['user_msg'] = "Banner has been <strong> Updated! <strong>";
    header('location:view-banner.php');
}