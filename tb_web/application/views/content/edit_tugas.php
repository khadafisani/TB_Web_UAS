<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="mb-3">Ubah Tugas</h4>
						<?php foreach($update as $row)
						{?>
                        <form action="<?php echo site_url('tugas/update').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.$row->nama_tugas;?>" method="post">
                            <div class="form-group"> 
                                <label for="kodePelajaran" class="form-check-label">Kode Pelajaran</label>
                                <input class="form-control" type="text" name="kodePelajaran" id="kodePelajaran" value="<?php echo $row->id_pelajaran;?>" readonly>
								<span class="text-danger"><?php echo form_error('kodePelajaran');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="namaPelajaran" class="form-check-label">Nama Pelajaran</label>
                                <input class="form-control" type="text" name="namaPelajaran" id="namaPelajaran" value="<?php echo $row->nama_pelajaran;?>" disabled>
                            </div>
							<div class="form-group"> 
								<label for="namaTugas" class="form-check-label">Nama Tugas</label>
								<input class="form-control" type="text" name="namaTugas" id="namaTugas" value="<?php echo $row->nama_tugas;?>">
								<span class="text-danger"><?php echo form_error('namaTugas');?><span>
                            </div>
                            <div class="form-group"> 
                                <label for="tanggal" class="form-check-label">Batas Tanggal</label>
                                <input name="tanggal" id="tanggal" value="<?php echo $row->deadline;?>">
								<span class="text-danger"><?php echo form_error('tanggal');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="waktu" class="form-check-label">Batas Waktu</label>
                                <input class="form-control" type="text" name="waktu" id="waktu" value="<?php echo $row->waktu;?>">
								<span class="text-danger"><?php echo form_error('waktu');?></span>
                            </div>
						<?php }?>
                            <div class="text-right">
                                <a class="btn btn-github" href="<?php echo site_url('tugas/index');?>">Kembali Ke Halaman Sebelumnya</a>
                                <input class="btn btn-danger" type="reset" value="Reset">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>