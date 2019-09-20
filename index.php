<?php
session_start();
require 'db.php';

//Logo data
$logo_data = "SELECT * FROM logos WHERE status='1'";
$logo_con = mysqli_query($db, $logo_data);
$single_logo = mysqli_fetch_assoc($logo_con);

//banner data
$banner_data = "SELECT * FROM banners WHERE status='1'";
$banner_con = mysqli_query($db, $banner_data);
$single_banner = mysqli_fetch_assoc($banner_con);

//footer icon data
$icons_data = "SELECT * FROM footer_icons ";
$icons_con = mysqli_query($db, $icons_data);
$single_icon = mysqli_fetch_assoc($icons_con);

//aoubt data
$about_data = "SELECT * FROM abouts WHERE status='1'";
$about_con = mysqli_query($db, $about_data);
$single_about = mysqli_fetch_assoc($about_con);

//service data
$service_data = "SELECT * FROM services WHERE status='1' LIMIT 6";
$service_con = mysqli_query($db, $service_data);

//testi data
$testi_data = "SELECT * FROM testis WHERE status='1' LIMIT 6";
$testi_con = mysqli_query($db, $testi_data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INNOVA</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
        ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
        ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css" <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top";"><img src="uploads/logos/<?php echo $single_logo['logo_img'] ?>" width="100" alt=""></a>
                <div class="phone"><span>Call Today</span>320-123-4321</div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="page-scroll">About</a></li>
                    <li><a href="#services" class="page-scroll">Services</a></li>
                    <li><a href="#testimonials" class="page-scroll">Testimonials</a></li>
                    <li><a href="#contact" class="page-scroll">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    <!-- Header -->
    <header id="header" >
        <div class="intro" style="background-image: url('uploads/banner/<?php echo $single_banner['banner_img'] ?>')">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 intro-text">
                            <h1><?php echo $single_banner['banner_title'] ?></h1>
                            <p><?php echo $single_banner['banner_text'] ?></p>
                            <a href="#about" class="btn btn-custom btn-lg page-scroll"><?php echo $single_banner['banner_btn'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Get Touch Section -->
    <div id="get-touch">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-1">
                    <h3>Cost for your home renovation project</h3>
                    <p>Get started today and complete our form to request your free estimate</p>
                </div>
                <div class="col-xs-12 col-md-4 text-center"><a href="#contact"
                        class="btn btn-custom btn-lg page-scroll">Free Estimate</a></div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6"> <img src="uploads/abouts/<?php echo $single_about['about_img']  ?>" class="img-responsive" alt=""> </div>
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2><?php echo $single_about['about_title']  ?></h2>
                        <p><?php echo $single_about['about_text']  ?></p>
                        <h3><?php echo $single_about['about_subtitle']  ?></h3>
                        <div class="list-style">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <ul>
                                    <?php
                                    $ab_list = explode('*',$single_about['about_list']);
                                    foreach ($ab_list as $single_ab_list){ ?>
                                        <li><?php echo $single_ab_list ?> </li>
                                    <?php }  ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services">
        <div class="container">
            <div class="section-title">
                <h2>Services</h2>
            </div>
            <div class="row">
                <?php foreach ($service_con as $service_value){  ?>
                <div class="col-md-4">
                    <div class="service-media"> <img src="uploads/services/<?php echo $service_value['service_img']  ?>" alt=" "> </div>
                    <div class="service-desc">
                        <h3><?php echo $service_value['service_title']  ?></h3>
                        <p><?php echo $service_value['service_text']  ?></p>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Testimonials</h2>
            </div>
            <div class="row">
                <?php foreach ($testi_con as $testi_value){  ?>
                <div class="col-md-4">
                    <div class="testimonial">
                        <div class="testimonial-image"> <img src="uploads/testis/<?php echo $testi_value['testi_img']  ?>" alt=""> </div>
                        <div class="testimonial-content">
                            <p><?php echo $testi_value['testi_text']  ?></p>
                            <div class="testimonial-meta"> <?php echo $testi_value['testi_title']  ?></div>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>  
    </div>

    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="row">
                    <div class="section-title">
                        <h2>Get In Touch</h2>
                        <p>Please fill out the form below to send us an email and we will get back to you as soon as
                            possible.</p>
                    </div>
                    <form id="contactForm" action="msg_post.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="msg_name" id="name" class="form-control" placeholder="Name"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="msg_email" id="email" class="form-control" placeholder="Email"
                                        required="required">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message"
                                required></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <?php if (isset($_SESSION['msg_success'])) { ?>
                            <div id="success-alert"
                                 class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['msg_success'];
                                unset($_SESSION['msg_success']);
                                ?>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 contact-info">
                <div class="contact-item">
                    <h4>Contact Info</h4>
                    <p><span>Address</span>4321 California St,<br>
                        San Francisco, CA 12345</p>
                </div>
                <div class="contact-item">
                    <p><span>Phone</span> +1 123 456 1234</p>
                </div>
                <div class="contact-item">
                    <p><span>Email</span> info@company.com</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="social">
                        <ul>
                            <li><a href="https://<?php echo $single_icon['link_1']  ?>"><i class="<?php echo $single_icon['icon_1']  ?>"></i></a></li>
                            <li><a href="https://<?php echo $single_icon['link_2']  ?>"><i class="<?php echo $single_icon['icon_2']  ?>"></i></a></li>
                            <li><a href="https://<?php echo $single_icon['link_3']  ?>"><i class="<?php echo $single_icon['icon_3']  ?>"></i></a></li>
                            <li><a href="https://<?php echo $single_icon['link_4']  ?>"><i class="<?php echo $single_icon['icon_4']  ?>"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div id="footer">
        <div class="container text-center">
            <p>&copy; 2017 INNOVA. Design by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>