<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$select = "SELECT status FROM abouts WHERE id='$id' ";
$status = mysqli_query($db, $select);

$deactive = "UPDATE abouts SET status='0' ";
$deactive_con = mysqli_query($db, $deactive);

$active = "UPDATE abouts SET status='1' WHERE id='$id'";
$active_con = mysqli_query($db, $active);

$_SESSION['active_msg'] = "About has been <strong> actived! <strong>";
header('location:view-about.php');