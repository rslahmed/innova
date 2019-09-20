<?php
session_start();
require 'db.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

$select = "SELECT count(*) as access, name, role, photo FROM users WHERE email='$email' and password='$pass' ";
$select_con = mysqli_query($db, $select);
$single_select = mysqli_fetch_assoc($select_con);

if ($single_select['access']==1){
    $_SESSION['login_access'] = "logged in";
    $_SESSION['user_name']=$single_select['name'];
    $_SESSION['user_role']=$single_select['role'];
    $_SESSION['user_img']=$single_select['photo'];
    header('location:admin.php');
}else{
    $_SESSION['login_err'] = "Incorrect Email or password";
    header('location:login.php');
}