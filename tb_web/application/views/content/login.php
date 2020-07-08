<body class="bgLogin">
    <div class="container mt-5 p-5 rounded">
        <div class="mt-5 ">
            <div class="mt-5 shadow bg-white rounded p-5 text-center">
                <h3>Member Login</h3>                
                 <?php echo form_open('login/index');?>
                    <div class="form-group">
                        <div class="input-group mb-1">
                            <label class="input-group font-weight-bold  font-lg" for="inputUsername">Username</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-user"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="addon-icon-user">
                        </div>
						<span class="text-danger"><?php echo form_error('username');?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-1">
                            <label class="input-group font-weight-bold  font-lg" for="inputPassword">Password</label>
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-icon-pass"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" aria-label="Password" aria-describedby="addon-icon-pass">  
                        </div>
						<span class="text-danger"><?php echo form_error('password');?></span>
                    </div>
					<?php
						if (isset($msg))
						echo '<div class="p-1 text-danger mb-2">'.$msg.'</div>';
					?>
                    <button type="submit" class="btn btn-primary form-control-file rounded mb-1">Sign in</button>
                    <?php echo anchor('registrasi/index','Register','class="btn btn-flickr form-control-range rounded"');?>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>