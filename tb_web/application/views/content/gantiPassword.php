 <div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Profile -->
                    <div class="container bg-white rounded p-4">
                        <h3>Ubah Password</h3>
                        <form action="<?php echo site_url('dashboard/ubahPassword');?>" method="POST" class="mt-3">
                            <div class="form-group">
                                <label for="passLama">Password Lama</label>
                                <input type="password" class="form-control" name="passLama" id="passLama">
								<span class="text-danger"><?php echo form_error('passLama');?></span>
                            </div>
                            <div class="form-group">
                                <label for="passBaru">Password Baru</label>
                                <input type="password" class="form-control" name="passBaru" id="passBaru">
								<span class="text-danger"><?php echo form_error('passBaru');?></span>
                            </div>
                            <div class="form-group">
                                <label for="passBaru">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="konfirmasi" id="konfirmasi">
								<span class="text-danger"><?php echo form_error('konfirmasi');?></span>
                            </div>							
                            <div class="text-right">
                                <a class="btn btn-success" href="<?echo site_url('dashboard/index');?>">Kembali</a>
                                <input class="btn btn-primary" type="submit" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>