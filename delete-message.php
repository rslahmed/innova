<?php
session_start();
require 'db.php';
$id = $_GET['id'];


// delete msg
$delete_user = "DELETE FROM messages WHERE id='$id'";
$delete_con = mysqli_query($db, $delete_user);

//session messege
$_SESSION['user_msg'] = "Message has been <strong> Deleted! <strong>";
header('location:message.php');