 <div class="c-body">
                <main class="c-main">
                    <!-- Main content here -->
                    <div class="container-fluid mb-4">
                        <!-- Profile -->
                        <div class="container bg-white rounded p-4">
						<?php foreach($user as $row) 
						{?>
                            <div class="d-flex justify-content-center">
                                <img class="c-avatar-img img-fluid w-25" src="<?php echo base_url();?>assets/img/<?php echo $row->foto;?>" alt="">
                            </div>
						<?php } ?>
                            <div class="pr-5 pl-5">
                                <?php echo form_open_multipart('profile/do_upload');
								foreach($user as $row)
								{?>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <!-- Tidak untuk diubah -->
                                        <input class="form-control" type="text" name="username" id="username" value="<?php echo $row->username;?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row->nama;?>">
										<span class="text-danger"><?php echo form_error('nama');?></span>
                                    </div>
									<div class="form-group">
                                        <label for="name">Tempat lahir</label>
                                        <input class="form-control" type="text" name="tempatLahir" id="tempatLahir" value = "<?php echo 
										$row->tempat_lahir;?>">
                                    </div>
									<div class="form-group">
                                        <label for="name">Tanggal lahir</label>
                                        <input class="form-control" type="text" name="tanggalLahir" id="tanggalLahir" placeholder="format yyyy-mm-dd" value = "<?php echo 
										$row->tanggal_lahir;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input class="form-control" type="email" name="Email" id="Email" value = "<?php echo 
										$row->email;?>">
										<span class="text-danger"><?php echo form_error('Email');?></span>
                                    </div>
									<div class="form-group">
                                        <label for="notifEmail">Notifikasi Email</label><br>
                                        <select class="custom-select" name="notifEmail" id="notifEmail">
                                            <option value="-">Pilih Waktu</option>
									<?php
									$x = array(
									array(60, 1, "jam", null),
									array(120, 2, "jam", null),
									array(720, 6, "jam", null)
									);
									
									for($i=0; $i<3; $i++)
									{
										if($x[$i][0] == $row->notifemail)
										{
											$x[$i][3] = "selected";
										}
										echo '<option value="'.$x[$i][0].'" '.$x[$i][3].'>'.$x[$i][1].' '.$x[$i][2].'</option>';
										$x[$i][3] = null;
									}										
									?>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label for="telegram">ID Telegram</label>
                                        <input class="form-control" type="text" name="telegram" id="telegram" onkeypress="return hanyaAngka(event)" value="<?php echo $row->telegram;?>">
										<span class="text-danger"><?php echo form_error('telegram');?></span>
                                    </div>
									<div class="form-group">
                                        <label for="notifTele">Notifikasi Telegram</label><br>
                                        <select class="custom-select" name="notifTele" id="notifTele">
                                            <option value="-">Pilih Waktu</option>
											<?php
											for($i=0; $i<4; $i++)
											{
												if($x[$i][0] == $row->notiftele)
												{
													$x[$i][3] = "selected";
												}
												echo '<option value="'.$x[$i][0].'" '.$x[$i][3].'>'.$x[$i][1].' '.$x[$i][2].'</option>';
												$x[$i][3] = null;
											}		
											?>
                                        </select>
                                    </div>
								<?php } ?>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <div class="custom-file input-group">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
										<?php if(isset($error)) {?> <span class="text-danger"><?php echo $error;}?></span>
                                    </div>
                                    <div class="text-right">
                                        <a class="btn btn-success" href="<?php echo site_url('dashboard');?>">Kembali</a>
                                        <input class="btn btn-primary" type="submit" value="Simpan">
                                    </div>
                                </form>
								<a class="btn btn-danger" href="<?php echo site_url('telegram/getUserTelegramID');?>">Get Telegram ID</a><!-- telegram bot @studymanagement2020, chat Cek-ID. untuk mendapatkan ID dari bot klik link ini, lalu masukkan pada field id telegram pada profile -->
								<a class="btn btn-warning" href="<?php echo site_url('telegram/sendTelegram60Mins');?>">Send Telegram Notification</a> <!-- telegram bot akan mengirim notifikasi ke client (link ini hanyak untuk interval waktu 60 menit!) -->
								<a class="btn btn-success" href="<?php echo site_url('email/sendMail60Mins');?>">Send Email Notification</a> <!-- akan mengirim notifikasi ke email client. (link ini hanyak untuk interval waktu 60 menit!) -->
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <script>
                function hanyaAngka(evt){
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if((charCode < 58 && charCode > 47))
                        return true;
                    return false;
                }
            </script>