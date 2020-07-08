<body class="bgLogin">
    <div class="container mt-5 p-5 rounded">
        <div class="mt-5">
            <div class="mt-5 shadow bg-white rounded p-5 text-center">
                <h3>Member Register</h3>
                <?php echo form_open('registrasi/index');?>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <label class="input-group font-weight-bold  font-lg">Username</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-user"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="inputUsername" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-icon-user">
                        </div>
						<span class="text-danger"><?php echo form_error('inputUsername');?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <label class="input-group font-weight-bold  font-lg">Password</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-pass"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="inputPassword" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="addon-icon-pass">  
                        </div>
						<span class="text-danger"><?php echo form_error('inputPassword');?></span>
                    </div>
					 <?php
						if (isset($success))
						echo '<div class="p-1 mb-2 text-success">'.$success.'</div>';
					?>
                    <button type="submit" class="btn btn-flickr form-control-file rounded mb-2">Register</button>
					<?php echo anchor('login/index','Kembali ke Halaman Login');?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>