<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="mb-3">Ubah Jadwal</h4>
						<?php foreach($jadwal as $row)
						{?>
                        <form action="<?php echo site_url('jadwal/update').'/'.$row->hari.'/'.$row->id_pelajaran.'/'.$row->mulai;?>" method="post">
                            <div class="form-group"> 
                                <label for="kodePelajaran" class="form-check-label">Kode Pelajaran</label>
                                <input class="form-control" type="text" name="kodePelajaran" id="kodePelajaran" value="<?php echo $row->id_pelajaran;?>" disabled>
                            </div>
                            <div class="form-group"> 
                                <label for="namaPelajaran" class="form-check-label">Nama Pelajaran</label>
                                <input class="form-control" type="text" name="namaPelajaran" id="namaPelajaran" value="<?php echo $row->nama_pelajaran;?>" disabled>
                            </div>
                            <div class="form-group"> 
                                <label for="namaPengajar" class="form-check-label">Nama Pengajar</label>
                                <input class="form-control" type="text" name="namaPengajar" id="namaPengajar" value="<?php echo $row->pengajar;?>" disabled>
                            </div>
                            <div class="form-group"> 
                                <label for="Ruangan" class="form-check-label">Ruangan</label>
                                <input class="form-control" type="text" name="Ruangan" id="Ruangan" value="<?php echo $row->ruangan;?>">
								<span class="text-danger"><?php echo form_error('Ruangan');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="jmAwal" class="form-check-label">Jam Mulai</label>
                                <input class="form-control" type="text" name="jamMulai" placeholder="format=23:59" id="jamMulai" value="<?php echo $row->mulai;?>">
								<span class="text-danger"><?php echo form_error('jamMulai');?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="jmAkhir" class="form-check-label">Jam Selesai</label>
                                <input class="form-control" type="text" name="jamSelesai" placeholder="format=23:59" id="jamSelesai" value="<?php echo $row->selesai;?>">
								<span class="text-danger"><?php echo form_error('jamSelesai');?></span>
                            </div>
                            <div class="form-group"> 
								<label for="hari">Hari</label>
                                <select class="custom-select" name="hari" id="hari">
								<?php 
								$x = array (
								array("senin",null,"Mon"),
								array("selasa",null,"Tue"),
								array("rabu",null,"Wed"),
								array("kamis",null,"Thu"),
								array("jumat",null,"Fri"),
								array("sabtu",null,"Sat"),
								array("minggu",null,"Sun"),
								);
								for($i=0; $i<7;$i++)
								{
									if($row->hari == $x[$i][0])
									{
										$x[$i][1] = "selected";
									}
									?>
									<option value="<?php echo $x[$i][2];?>" <?php echo $x[$i][1];?>><?php echo $x[$i][0];?></option>
									<?php
								}
						}?>
                                 </select>
								 <span class="text-danger"><?php echo form_error('hari');?></span>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-github" href="<?php echo site_url('jadwal/index');?>">Kembali Ke Halaman Sebelumnya</a>
                                <input class="btn btn-danger" type="reset" value="Reset">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>