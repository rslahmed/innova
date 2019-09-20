<?php

session_start();
//database connection
require 'db.php';

//icon
$icon_1 = $_POST['icon_1'];
$icon_2 = $_POST['icon_2'];
$icon_3 = $_POST['icon_3'];
$icon_4 = $_POST['icon_4'];

//link
$icon_link_1 = $_POST['icon_link_1'];
$icon_link_2 = $_POST['icon_link_2'];
$icon_link_3 = $_POST['icon_link_3'];
$icon_link_4 = $_POST['icon_link_4'];


//inset into database
$update = "UPDATE footer_icons SET icon_1='$icon_1', link_1='$icon_link_1', icon_2='$icon_2', link_2='$icon_link_2', icon_3='$icon_3', link_3='$icon_link_3', icon_4='$icon_4', link_4='$icon_link_4' WHERE id='1'";
$update_con = mysqli_query($db, $update) ;

$_SESSION['user_msg'] = "Icons added";
header('location:add-footer-icon.php');