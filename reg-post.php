<?php

session_start();
//database connection
require 'db.php';

//form data
$name = $_POST['fname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$gender = $_POST['gender'];
$role = $_POST['role'];

//data session
$_SESSION['fname'] = $name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['role'] = $role;


$select = "SELECT count(*) as exist FROM users WHERE email='$email' ";
$select_con = mysqli_query($db, $select);
$single_select = mysqli_fetch_assoc($select_con);

//validation
if (empty($name)){
    $_SESSION['name_err'] = "Enter your name";
    header('location:register.php');
}elseif(empty($email)){
    $_SESSION['email_err'] = "Enter your Email";
    header('location:register.php');
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['email_err'] = "Enter a Valid Email";
    header('location:register.php');
}elseif ($single_select['exist']==1){
    $_SESSION['email_err'] = "Email already exist";
    header('location:register.php');
}elseif(empty($pass)){
    $_SESSION['pass_err'] = "Enter your Password";
    header('location:register.php');
}elseif(empty($repass)){
    $_SESSION['repass_err'] = "Enter your Password again";
    header('location:register.php');
}elseif($pass !== $repass){
    $_SESSION['repass_err'] = "Password not match";
    header('location:register.php');
}elseif(empty($gender)){
    $_SESSION['gender_err'] = "Enter your Gender";
    header('location:register.php');
}elseif(empty($role)){
    $_SESSION['role_err'] = "Enter a Role";
    header('location:register.php');
}

else{


    if ($_FILES['photo']['name']!= ''){

        require 'img-upload.php';

    }
    else{
        $insert = "INSERT INTO users (name, email, password, gender, role) VALUE ('$name', '$email', '$pass', '$gender', '$role') ";
        $insert_con = mysqli_query($db, $insert) ;
        unset($_SESSION['fname']);
        unset($_SESSION['email']);
        unset($_SESSION['gender']);
        unset($_SESSION['role']);
        $_SESSION['user_msg'] = "New User Added";
        header('location:users.php');
    }

}