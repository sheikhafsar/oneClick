<?php
$user_Name = $this->UserModel->getUsersByUserId($this->session->userdata('userId'))->firstName . " " . $this->UserModel->getUsersByUserId($this->session->userdata('userId'))->lastName;
$userProfile_Image = $this->UserModel->getUsersByUserId($this->session->userdata('userId'))->profile_pic;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OneClick</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="<?php echo base_url(); ?>assets/images/logo1.png"  style="width:30px; height:30px;"/>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">         
            <li><a href="<?php echo base_url(); ?>index.php/LoginController/logout" style="margin-right:10px;"> Logout</a></li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Products</a>
                    
                </li>
                <li>
                    <a href="#"> Category</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
