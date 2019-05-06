<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>oneClick</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>
<body>
<div class="text-center">
            <h1 style="color:white;">Click-N-Pick</h1>
<!--            <small>PreOrder Management System</small>-->
        </div>
        <!--</div>-->

        <div id="content" style="height:500px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">

                        <div class="panel panel-default login-panel" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Registration</h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="<?php echo base_url(); ?>index.php/LoginController/addNewUser">
                                    <div class="form-group">
                                        <label for="txtFirstName">First Name</label>
                                        <input type="text" class="form-control" name="txtFirstName" id="txtFirstName" required placeholder="First Name">
                                        <small class="text-danger"><?php echo form_error('txtFirstName'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtLastName">Last Name</label>
                                        <input type="text" class="form-control" name="txtLastName" id="txtLastName" required placeholder="Last Name">
                                        <small class="text-danger"><?php echo form_error('txtLastName'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtemail">Email</label>
                                        <input type="email" class="form-control" name="txt_email" id="txtemail" required placeholder="Email">
                                        <small class="text-danger"><?php echo form_error('txt_email'); ?></small>
                                    </div>
									<div class="form-group ">
                                        <label for="selUserType">Type</label>
                                        <select class="form-control" id="selUserType" name="selUserType">
                                            <option selected="selected" value="customer">Customer</option>
											<option value="retailer">Retailer</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtUserName">User Name</label>
                                        <input type="text" class="form-control" name="txtUserName" id="txtUserName" required placeholder="User Name">
                                        <small class="text-danger"><?php echo form_error('txtUserName'); ?></small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="txtPassword">Password</label>
                                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" required  placeholder="Password">
                                        <small class="text-danger"><?php echo form_error('txtPassword'); ?></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtConfirmPassword">Confirm Password</label>
                                        <input type="password" class="form-control" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Confirm Password">
                                        <small class="text-danger"><?php echo form_error('txtConfirmPassword'); ?></small>
                                    </div>

                                    <button type="submit" class="btn btn-default center-block">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel panel-default" style=" padding: 2px;">
                            <div class="panel-body">
                                <a href="<?php echo base_url(); ?>index.php/LoginController/">Already a User ? Login Here</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>		
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
