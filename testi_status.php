<?php
session_start();
require 'db.php';

$id = $_GET['id'];

$select = "SELECT status FROM testis WHERE id='$id' ";
$status = mysqli_query($db, $select);
$single_status = mysqli_fetch_assoc($status);
if ($single_status['status']==1){
    $deactive = "UPDATE testis SET status='0' WHERE id='$id'";
    $deactive_con = mysqli_query($db, $deactive);
    $_SESSION['active_msg'] = "testimonial has been <strong> Deactived! <strong>";
}elseif ($single_status['status']==0){
    $active = "UPDATE testis SET status='1' WHERE id='$id'";
    $active_con = mysqli_query($db, $active);
    $_SESSION['active_msg'] = "testimonial has been <strong> actived! <strong>";
}


header('location:view-testi.php');