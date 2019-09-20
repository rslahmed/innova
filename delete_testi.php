<?php
session_start();
require 'db.php';
$id = $_GET['id'];

//delete image
$select_img = "SELECT testi_img FROM testis WHERE id='$id'";
$select_img_con = mysqli_query($db, $select_img);
$single_img = mysqli_fetch_assoc($select_img_con);
$delete_from = 'uploads/testis/'.$single_img['testi_img'];
unlink($delete_from);

// delete user
$delete_user = "DELETE FROM testis WHERE id='$id'";
$delete_con = mysqli_query($db, $delete_user);

//session messege
$_SESSION['user_msg'] = "Testimonial has been <strong> Deleted! <strong>";
header('location:view-testi.php');