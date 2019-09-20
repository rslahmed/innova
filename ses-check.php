<?php

session_start();
if (!isset($_SESSION['login_access'])){
    $_SESSION['login_err'] = 'Please login first';
    header('location:login.php');
}
