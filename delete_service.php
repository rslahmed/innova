<?php
session_start();
require 'db.php';
$id = $_GET['id'];

//delete image
$select_img = "SELECT service_img FROM services WHERE id='$id'";
$select_img_con = mysqli_query($db, $select_img);
$single_img = mysqli_fetch_assoc($select_img_con);
$delete_from = 'uploads/services/'.$single_img['service_img'];
unlink($delete_from);

// delete user
$delete_user = "DELETE FROM services WHERE id='$id'";
$delete_con = mysqli_query($db, $delete_user);

//session messege
$_SESSION['user_msg'] = "Service has been <strong> Deleted! <strong>";
header('location:view-service.php');