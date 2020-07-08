<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style/custom-style/css/style-custom.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style/bootstrap4/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assest/style/bootstrap4/js/bootstrap.min.js"></script>
    <!-- Core UI -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style/coreui3/css/coreui.min.css">
    <script src="<?php echo base_url();?>assets/style/coreui3/js/coreui.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?php base_url();?>assets/style/fontawesome5/css/all.min.css">
    <script src="<?php echo base_url(); ?>assets/style/fontawesome5/js/all.min.js"></script>
</head>
<body class="bgLogin">
    <div class="container mt-5 p-5 rounded">
        <div class="mt-5 ml-5 mr-5 pr-5 pl-5">
            <div class="mt-5 ml-5 mr-5 shadow bg-white rounded pt-5 pl-5 pr-5 pb-4 text-center">
                <h3>Member Register</h3>
                <?php echo form_open('control_registrasi/index');?>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <label class="input-group font-weight-bold  font-lg">Email</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-user"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="inputUsername" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-icon-user">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <label class="input-group font-weight-bold  font-lg">Password</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-pass"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="inputPassword" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-icon-pass">  
                        </div>
                    </div>
					 <?php	
						echo validation_errors();
						if (isset($success))
						echo '<p  align="center">'.$success.'</p>';
					?>
                    <button type="submit" class="btn btn-flickr form-control-file rounded mb-2">Register</button>
					<?php echo anchor('control_data/index','Kembali ke Halaman Login');?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>
</html>