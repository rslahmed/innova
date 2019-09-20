<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$select = "SELECT status FROM logos WHERE id='$id' ";
$status = mysqli_query($db, $select);

$deactive = "UPDATE logos SET status='0' ";
$deactive_con = mysqli_query($db, $deactive);

$active = "UPDATE logos SET status='1' WHERE id='$id'";
$active_con = mysqli_query($db, $active);

$_SESSION['active_msg'] = "Logo has been <strong> actived! <strong>";
header('location:view-logo.php');