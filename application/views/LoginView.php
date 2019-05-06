<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<title>Login</title>
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>
<body style="padding:0px;margin:0px;">
<br>
<div class="text-center">
	<h1 style="color:white;">oneClick</h1>
</div>

<br>
<div id="content" style="height:500px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="panel panel-default login-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                <div class="panel-body">
                <form method="POST" action="<?php echo base_url(); ?>index.php/LoginController/verifyLogin">
                    <div class="form-group">
                        <label for="txtUserName">User Name</label>
                        <input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="User Name">
                        <small class="text-danger"><?php echo form_error('txtUserName'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="selUserType">Type</label>
                            <select class="form-control" id="selUserType" name="selUserType">
                                <option value="customer">Customer</option>
								<option value="retailer">Retailer</option>
								<option value="deliveryAgent">Delivery Agent</option>
                                <option value="admin">Admin</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="txtPassword">Password</label>
                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password">
                        <small class="text-danger"><?php echo form_error('txtPassword'); ?></small>
                    </div>	  

                    <button type="submit" class="btn btn-primary center-block">Login</button>
                </form>

                </div>
            		</div>
                        <div class="panel panel-default" style=" padding: 2px;">
                            <div class="panel-body">
                                <a href="<?php echo base_url(); ?>index.php/LoginController/register">Not a User? Register Here</a>
                            </div>
                        </div>
                    </div>
                </div>
	
</body>
</html>
