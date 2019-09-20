<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$select = "SELECT status FROM banner WHERE id='$id' ";
$status = mysqli_query($db, $select);

$deactive = "UPDATE banners SET status='0' ";
$deactive_con = mysqli_query($db, $deactive);

$active = "UPDATE banners SET status='1' WHERE id='$id'";
$active_con = mysqli_query($db, $active);

$_SESSION['active_msg'] = "Banner has been <strong> actived! <strong>";
header('location:view-banner.php');