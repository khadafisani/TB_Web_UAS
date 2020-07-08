<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4>Daftar Jadwal</h4>
                        <div class="mt-3">
                            <!-- Tombol Modal -->
                            <button type="button" style="border-radius: 0" class="btn btn- btn-primary btn-block " data-toggle="modal" data-target="#modalTambahPelajaran">
                                <span class="fas fa-plus mt-1 font-lg"></span>
                                <span class="font-weight-bold font-lg">Tambah Jadwal</span> 
                            </button>
                        </div>
						<!-- Modal Form Tambah Jadwal -->
                        <!-- Modal -->
                        <div class="modal fade" id="modalTambahPelajaran" tabindex="-1" role="dialog" aria-labelledby="modalTambahPelajaranTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Jadwal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form action="<?php echo site_url('jadwal/insert');?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="kodePelajaran">Kode Pelajaran</label>
                                                <select class="custom-select" name="kodePelajaran" id="kodePelajaran">
                                                    <option value="" selected>Pilih Pelajaran</option>
													<?php
													foreach($pelajaran as $row)
													{?>
                                                    <option value="<?php echo $row->id_pelajaran;?>"><?php echo $row->nama_pelajaran.' '.$row->semester;?></option>
													<?php }?>
                                                </select>
												<span class="text-danger"><?php echo form_error('kodePelajaran');?></span>
                                                <label for="ruanganBelajar">Ruangan</label>
                                                <input class="form-control" type="text" name="ruanganBelajar" id="ruanganBelajar">
												<span class="text-danger"><?php echo form_error('ruanganBelajar');?></span>
                                                <label for="jamAwal" >Jam Mulai</label>
                                                <input id="jamMulai" name="jamMulai" placeholder="HH:MM">
												<span class="text-danger"><?php echo form_error('jamMulai');?></span>
                                                <label for="jamSelesai" >Jam Selesai</label>
                                                <input type="text" id="jamSelesai" placeholder="HH:MM" name="jamSelesai">
												<span class="text-danger"><?php echo form_error('jamSelesai');?></span>
                                                <label for="hari">Hari</label>
                                                <select class="custom-select" name="hari" id="hari">
                                                    <option value="Mon">Senin</option>
                                                    <option value="Tue">Selasa</option>
                                                    <option value="Wed">Rabu</option>
                                                    <option value="Thu">Kamis</option>
                                                    <option value="Fri">Jumat</option>
                                                    <option value="Sat">Sabtu</option>
                                                    <option value="Sun">Minggu</option>
                                                </select>
												<span class="text-danger"><?php echo form_error('hari');?></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
					if(form_error('kodePelajaran') || form_error('ruanganBelajar') || form_error('jamMulai') || form_error('jamSelesai') || form_error('hari'))
					{
						echo "<script>$('#modalTambahPelajaran').modal('show');</script>";
					}?>
					<!-- jadwal -->
					<?php
					function tableHead($x)
					{
						if(!isset($x))
						{
							$hari="Jadwal belum disetting";
						}
						else
						{
							$hari = 'hari '.$x;
						}
						?>
						<div class="container bg-white rounded p-4 mt-4">
						<div class="float-left">
                            <h4><?php echo $hari;?></h4>
                        </div>
						    <div class="table-responsive">
                            <table class="mt-4 table table-striped table-borderless">
                                <thead class="thead-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Nama Pengajar</th>
                                    <th scope="col">Ruangan</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Aksi</th>
                                </thead>
								
					<?php
					}
					function tableContent($mapel, $pengajar, $ruangan, $mulai, $selesai, $hari, $id, $x)
					{
						if(isset($mapel,$pengajar,$ruangan,$mulai,$selesai,$hari))
						{?>	
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $x;?></th>
                                        <td><?php echo $mapel;?></td>
                                        <td><?php echo $pengajar;?></td>
                                        <td><?php echo $ruangan;?></td>
                                        <td><?php echo $mulai.'-'.$selesai;?></td>
                                        <td>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('jadwal/detail'.'/'.$hari.'/'.$id.'/'.$mulai);?>">
                                                <i class="fas fa-info font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('jadwal/update'.'/'.$hari.'/'.$id.'/'.$mulai);?>">
                                                <i class="fas fa-edit font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('jadwal/deleteData'.'/'.$hari.'/'.$id.'/'.$mulai);?>" onclick="return (confirm('Apakah yakin menghapus <?php echo $mapel;?>?'))">
                                                <i class="fas fa-trash font-lg"></i>
                                            </a>
                                        </td>
                                    </tr>					
                                </tbody>
					<?php 
						}
					}
					function tableFoot()
					{
						echo "</table></div></div>";
					?>
					<?php
					}
					$x=1;
					foreach($jadwal as $i => $row)
					{						
						$mapel = $row->nama_pelajaran;
						$pengajar = $row->pengajar;
						$ruangan = $row->ruangan;
						$mulai = $row->mulai;
						$selesai = $row->selesai;
						$hari = $row->hari;
						$id = $row->id_pelajaran;
											
						if($i==0)
						{
							tableHead($hari);
							tableContent($mapel, $pengajar, $ruangan, $mulai, $selesai, $hari, $id, $x);
							$before = $hari;
						}
					
						else if ($hari == $before)
						{
							$x++;
							tableContent($mapel, $pengajar, $ruangan, $mulai, $selesai, $hari,$id,$x);
						}
						else
						{
							$x=1;
							tableFoot();
							tableHead($hari);
							tableContent($mapel, $pengajar, $ruangan, $mulai, $selesai, $hari, $id, $x);
							$before = $hari;
						}
					}
					tableFoot();
						?>
                </div>
            </main>
        </div>