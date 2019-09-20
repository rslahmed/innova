<?php

session_start();
//database connection
require 'db.php';
$id = $_POST['id'];

$about_title = $_POST['about_title'];
$about_text = $_POST['about_text'];
$about_subtitle = $_POST['about_subtitle'];

$about_list = $_POST['about_list'];
$al_implode = implode('*',$about_list);
$fix_al_imp = addslashes($al_implode);

if ($_FILES['banner_img']['name']!= ''){
    //add new image
    $photo = $_FILES['banner_img']['name'];
    $photo_name_imp = explode('.', $photo);
    $photo_ext = end($photo_name_imp);
    $accept_ext = ['jpg', 'jpeg', 'png'];

    if (in_array($photo_ext, $accept_ext)) {
        //update banner info
        $update = "UPDATE abouts SET about_title='$about_title', about_text='$about_text', about_subtitle='$about_subtitle', about_list='$fix_al_imp' WHERE id='$id'";
        $update_con = mysqli_query($db, $update) ;

        //delete old image
        $select_img = "SELECT about_img FROM abouts WHERE id='$id'";
        $select_img_con = mysqli_query($db, $select_img);
        $single_img = mysqli_fetch_assoc($select_img_con);
        $delete_from = 'uploads/abouts/'.$single_img['about_img'];
        unlink($delete_from);

        //add banner new image
        $photo_name = "$id"."."."$photo_ext";
        $update = "UPDATE abouts SET about_img='$photo_name' WHERE id='$id'";
        $connect_update = mysqli_query($db, $update);
        move_uploaded_file($_FILES['about_img']['tmp_name'], 'uploads/abouts/'.$photo_name);

        $_SESSION['user_msg'] = "About has been <strong> Updated! <strong>";
        header('location:view-about.php');

    }elseif(!in_array($photo_ext, $accept_ext)){
        $_SESSION['img_err'] = 'This file not allowed';
        header('location:edit-about.php');
    }

}
else{
    $update = "UPDATE abouts SET about_title='$about_title', about_text='$about_text', about_subtitle='$about_subtitle', about_list='$fix_al_imp' WHERE id='$id'";
    $update_con = mysqli_query($db, $update) ;
    $_SESSION['user_msg'] = "About has been <strong> Updated! <strong>";
    header('location:view-about.php');
}