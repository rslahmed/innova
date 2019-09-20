<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deshboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="des_assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="admin.php">Vali</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img width="60" height="60" class="app-sidebar__user-avatar"
                                        src="user-img/<?php if (isset($_SESSION['user_img'])){echo $_SESSION['user_img'];} ?>"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name"> <?php if (isset($_SESSION['user_name'])){echo $_SESSION['user_name']; } ?> </p>
            <p class="app-sidebar__user-designation"> <?php if (isset($_SESSION['user_role'])){
                    if ($_SESSION['user_role']==1){
                        echo 'Admin';
                    }elseif($_SESSION['user_role']==2){
                        echo 'Editor';
                    }else{
                        echo 'Modaretor';
                    }
                } ?> </p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="admin.php"><i class="app-menu__icon fa fa-dashboard"></i><span
                        class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="register.php">Add Users</a></li>
                <li><a class="treeview-item" href="users.php"> View Users</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Logo</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-logo.php"> Add logo</a></li>
                <li><a class="treeview-item" href="view-logo.php">View logos</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Banner</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-banner.php"> Add banner</a></li>
                <li><a class="treeview-item" href="view-banner.php">View Banner</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">About</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-about.php"> Add About</a></li>
                <li><a class="treeview-item" href="view-about.php">View About</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Service</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-service.php"> Add Service</a></li>
                <li><a class="treeview-item" href="view-service.php">View Service</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Testimonial</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="add-testi.php"> Add Testimonial</a></li>
                <li><a class="treeview-item" href="view-testi.php">View Testimonial</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="add-footer-icon.php"><i class="app-menu__icon fa fa-font-awesome"></i><span
                        class="app-menu__label">Footer Icons</span></a></li>
        <li><a class="app-menu__item" href="message.php"><i class="app-menu__icon fa fa-commenting-o"></i><span
                        class="app-menu__label">Messages</span></a></li>

        <li><a class="app-menu__item" href="logout-post.php"><i class="app-menu__icon fa fa-sign-out"></i><span
                        class="app-menu__label">Logout</span></a></li>
    </ul>
</aside>