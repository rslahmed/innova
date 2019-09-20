<?php
//add new image
$photo = $_FILES['photo']['name'];
$photo_size = $_FILES['photo']['size'];
$photo_name_imp = explode('.', $photo);
$photo_ext = end($photo_name_imp);
$accept_ext = ['jpg', 'jpeg', 'png'];

if (in_array($photo_ext, $accept_ext)) {

    $update = "UPDATE users SET name='$name', email='$email', password='$pass', gender='$gender', role='$role' WHERE id='$user_id'";
    $update_con = mysqli_query($db, $update) ;

    //delete old image
    $select_img = "SELECT photo FROM users WHERE id='$user_id'";
    $select_img_con = mysqli_query($db, $select_img);
    $single_img = mysqli_fetch_assoc($select_img_con);
    $delete_from = 'user-img/'.$single_img['photo'];
    unlink($delete_from);

    $photo_name = "$user_id"."."."$photo_ext";

    $update = "UPDATE users SET photo='$photo_name' WHERE id='$user_id'";
    $connect_update = mysqli_query($db, $update);

    move_uploaded_file($_FILES['photo']['tmp_name'], 'user-img/'.$photo_name);


    unset($_SESSION['fname']);
    unset($_SESSION['email']);
    unset($_SESSION['gender']);
    unset($_SESSION['role']);
    $_SESSION['user_msg'] = "User has been <strong> Updated! <strong>";
    header('location:users.php');

}elseif(!in_array($photo_ext, $accept_ext)){
    $_SESSION['img_err'] = 'This file not allowed';
    header('location:register.php');
}
