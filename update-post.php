<?php

session_start();
//database connection
require 'db.php';

//form data
$user_id = $_POST['id'];
$name = $_POST['fname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$gender = $_POST['gender'];
$role = $_POST['role'];

//data session
$_SESSION['fname'] = $name;
$_SESSION['email'] = $email;
$_SESSION['pass'] = $pass;
$_SESSION['repass'] = $repass;
$_SESSION['gender'] = $gender;
$_SESSION['role'] = $role;

$select_data = "SELECT * FROM users WHERE id='$user_id'";
$select_con = mysqli_query($db, $select_data);
$single_data = mysqli_fetch_assoc($select_con);

$select_email = "SELECT count(*) as exist FROM users WHERE email='$email' ";
$select_email_con = mysqli_query($db, $select_email);
$single_email = mysqli_fetch_assoc($select_email_con);

//validation
if (empty($name)){
    $_SESSION['name_err'] = "Enter your name";
    header('location:update-user.php?id='.$user_id);
}elseif(empty($email)){
    $_SESSION['email_err'] = "Enter your Email";
    header('location:update-user.php?id='.$user_id);
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_err'] = "Enter a Valid Email";
    header('location:update-user.php?id='.$user_id);
}elseif ($email !== $single_data['email'] ){
    if($single_email['exist'] != 0){
        $_SESSION['email_err'] = "Email already exist";
        header('location:update-user.php?id='.$user_id);
    }
}elseif(empty($pass)){
    $_SESSION['pass_err'] = "Enter your Password";
    header('location:update-user.php?id='.$user_id);
}elseif(empty($repass)){
    $_SESSION['repass_err'] = "Enter your Password again";
    header('location:update-user.php?id='.$user_id);
}elseif($pass !== $repass){
    $_SESSION['repass_err'] = "Password not match";
    header('location:update-user.php?id='.$user_id);
}elseif(empty($role)){
    $_SESSION['role_err'] = "Enter a Role";
    header('location:update-user.php?id='.$user_id);
}

else{
    if ($_FILES['photo']['name']!= ''){
        require 'update-img.php';
    }
    else{
        $update = "UPDATE users SET name='$name', email='$email', password='$pass', gender='$gender', role='$role' WHERE id='$user_id'";
        $update_con = mysqli_query($db, $update) ;
        $_SESSION['user_msg'] = "User has been <strong> Updated! <strong>";
        unset($_SESSION['fname']);
        unset($_SESSION['email']);
        unset($_SESSION['gender']);
        unset($_SESSION['role']);
        header('location:users.php');
    }
}