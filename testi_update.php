<?php

session_start();
//database connection
require 'db.php';
$id = $_POST['id'];

$testi_title = addslashes($_POST['testi_title']);
$testi_text = addslashes($_POST['testi_text']);


if ($_FILES['testi_img']['name']!= ''){
    //add new image
    $photo = $_FILES['testi_img']['name'];
    $photo_name_imp = explode('.', $photo);
    $photo_ext = end($photo_name_imp);
    $accept_ext = ['jpg', 'jpeg', 'png'];

    if (in_array($photo_ext, $accept_ext)) {
        //update banner info
        $update = "UPDATE testis SET testi_title='$testi_title', testi_text='$testi_text' WHERE id='$id'";
        $update_con = mysqli_query($db, $update) ;

        //delete old image
        $select_img = "SELECT testi_img FROM testis WHERE id='$id'";
        $select_img_con = mysqli_query($db, $select_img);
        $single_img = mysqli_fetch_assoc($select_img_con);
        $delete_from = 'uploads/testis/'.$single_img['testi_img'];
        unlink($delete_from);

        //add banner new image
        $photo_name = "$id"."."."$photo_ext";
        $update = "UPDATE testis SET testi_img='$photo_name' WHERE id='$id'";
        $connect_update = mysqli_query($db, $update);
        move_uploaded_file($_FILES['testi_img']['tmp_name'], 'uploads/testis/'.$photo_name);

        $_SESSION['user_msg'] = "Testimonial has been <strong> Updated! <strong>";
        header('location:view-testi.php');

    }elseif(!in_array($photo_ext, $accept_ext)){
        $_SESSION['img_err'] = 'This file not allowed';
        header('location:edit-testi.php');
    }

}
else{
    $update = "UPDATE testis SET testi_title='$testi_title', testi_text='$testi_text' WHERE id='$id'";
    $update_con = mysqli_query($db, $update) ;
    $_SESSION['user_msg'] = "Testimonial has been <strong> Updated! <strong>";
    header('location:view-testi.php');
}