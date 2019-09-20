<?php
session_start();
require 'db.php';
$id = $_GET['id'];

//delete image
$select_img = "SELECT photo FROM users WHERE id='$id'";
$select_img_con = mysqli_query($db, $select_img);
$single_img = mysqli_fetch_assoc($select_img_con);
$delete_from = 'user-img/'.$single_img['photo'];
unlink($delete_from);

// delete user
$delete_user = "DELETE FROM users WHERE id='$id'";
$delete_con = mysqli_query($db, $delete_user);

//session messege
$_SESSION['user_msg'] = "User has been <strong> Deleted! <strong>";
header('location:users.php');