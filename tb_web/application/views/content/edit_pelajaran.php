        <div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="mb-3">Ubah Pelajaran</h4>
						<?php foreach($update as $row)
						{?>
                        <form action="<?php echo site_url('pelajaran/update/'.$row->id_pelajaran);?>" method="post">
                            <div class="form-group"> 
                                <label for="kodePelajaran" class="form-check-label">Kode Pelajaran</label>
                                <input class="form-control" type="text" name="kodePelajaran" id="kodePelajaran" value="<?php echo $row->id_pelajaran;?>">
								<span class="text-danger"><?php echo form_error('kodePelajaran');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="namaPelajaran" class="form-check-label">Nama Pelajaran</label>
                                <input class="form-control" type="text" name="namaPelajaran" id="namaPelajaran" value="<?php echo $row->nama_pelajaran;?>">
								<span class="text-danger"><?php echo form_error('namaPelajaran');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="namaPengajar" class="form-check-label">Nama Pengajar</label>
                                <input class="form-control" type="text" name="namaPengajar" id="namaPengajar" value="<?php echo $row->pengajar;?>">
								<span class="text-danger"><?php echo form_error('namaPengajar');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="kontakPengajar" class="form-check-label">Kontak Pengajar</label>
                                <input class="form-control" type="text" name="kontakPengajar" id="kontakPengajar" value="<?php echo $row->kontak_pengajar;?>">
                            <span class="text-danger"><?php echo form_error('kontakPengajar');?></span>
							</div>
                            <div class="form-group"> 
                                <label for="semester" class="form-check-label">Semester</label>
                                <input class="form-control" type="text" name="semester" id="semester" value="<?php echo $row->semester;?>">
								<span class="text-danger"><?php echo form_error('semester');?></span>
							</div>
						<?php } ?>
                            <div class="text-right">
                                <a class="btn btn-github" href="<?php echo site_url('pelajaran/index');?>">Kembali Ke Halaman Sebelumnya</a>
                                <input class="btn btn-danger" type="reset" value="Reset">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>