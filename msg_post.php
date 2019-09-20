<?php

session_start();
//database connection
require 'db.php';
date_default_timezone_set('Asia/Dhaka');

//form data
$msg_name = $_POST['msg_name'];
$msg_email =$_POST['msg_email'];
$message = addslashes($_POST['message']);

$tm = date('h:i:sa');
$dt = date('y-m-d');
$send_time = $dt." ".$tm;

$insert = "INSERT INTO messages (msg_name, msg_email, message, times) VALUE ('$msg_name', '$msg_email', '$message', '$send_time') ";
$insert_con = mysqli_query($db, $insert) ;


$_SESSION['msg_success'] = "Your message has been sent!";
header('location:index.php#contact');


