<?php
$user_Name = $this->UserModel->getUsersByUserId($this->session->userdata('userId'))->firstName . " " . $this->UserModel->getUsersByUserId($this->session->userdata('userId'))->lastName;
//var_dump($this->session->userdata('userId'));
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            oneClick
        </title>
        <!-- styles -->
        <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

        <!-- theme stylesheet -->
        <link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
        <link rel="shortcut icon" href="favicon.png">
    </head>

    <body>
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
        <!-- *** TOPBAR ***-->
        <div id="top">
            <div class="container">
                <div class="col-md-6 pull-right" data-animate="fadeInDown">
                    <ul class="menu">
                        <li><a href="<?php echo base_url(); ?>index.php/LoginController/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        <li><a href="#contact">Contact Us</a>
                        </li>
                        <li><a href="#About">About Us</a>
                        </li>
                        <li><a href="#Find Stores"><i class="fa fa-map-marker"></i>Find Stores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- *** TOP BAR END *** -->

        <!-- *** NAVBAR *** -->

        <div class="navbar navbar-default yamm" role="navigation" id="navbar">
<!--            <div class="container">-->
                <div class="navbar-header">
                    <a class="navbar-brand home" href="<?php echo base_url(); ?>index.php/CustomerController/home">
                        <img src="<?php echo base_url(); ?>assets/images/logo1.png"  class="logo_deco"/>
                    </a>
                    <div class="navbar-buttons">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!--/.navbar-header -->

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-left">
                        <li <?php if (isset($active)) {
    if ($active == "home") {
        ?> class="active" <?php }
}
?>><a href="<?php echo base_url(); ?>index.php/CustomerController/home">Home</a>
                        </li>
                        <li ><a href="<?php echo base_url(); ?>index.php/ProductController/viewProducts">Products</a>
                        </li>
                        <li class="dropdown yamm">
                            <a href="#">Wishlist</b></a>
                        </li>

                        <li>
                            <a href="#ordered">Orders</a>
                        </li>

                        <li>
                            <a href="#FilledList">Notifications</a>
                        </li>
                    </ul>
                </div>

                <div class="navbar-buttons ">
                    <div class="navbar-collapse collapse right" id="search-not-mobile">
                        <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle search</span>
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>


                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" role="search"  method="POST" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="txtsearch"  placeholder="Search">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <!--/.nav-collapse -->

<!--            </div>-->
            <!-- /.container -->
        </div>
        <!-- /#navbar -->

        <!-- *** NAVBAR END *** -->



        <div id="all">

            <div id="content" style="min-height: 500px;">

