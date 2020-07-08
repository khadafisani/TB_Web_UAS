<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <div class="float-left">
                            <h4>Daftar Tugas Belum Selesai</h4>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahTugas">
                                <span class="fas fa-plus mt-1"></span>
                                <span class="font-weight-bold">Tambah Tugas</span> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambahTugas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Tugas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <form action="<?php echo site_url('tugas/insert');?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-check-label" for="namaTugas">Nama Tugas</label>
                                                    <input class="form-control" type="text" name="namaTugas" id="namaTugas">
													<span class="text-danger"><?php echo form_error('namaTugas');?></span>
                                                    <label for="kodePelajaran">Nama Pelajaran</label>
                                                    <select class="custom-select" name="kodePelajaran" id="kodePelajaran">
														<option value="" selected disabled>Pilih Pelajaran</option>
													<?php foreach($pelajaran as $row)
													{?>
                                                        <option value="<?php echo $row->id_pelajaran;?>"><?php echo $row->nama_pelajaran.' '.$row->semester;?></option>
													<?php } ?>
                                                    </select>
													<span class="text-danger"><?php echo form_error('kodePelajaran');?></span>
                                                    <label class="form-check-label" for="tanggal">Batas Tanggal</label>
                                                    <input name="tanggal" id="tanggal">
													<span class="text-danger"><?php echo form_error('tanggal');?></span>
                                                    <label class="form-check-label" for="waktu">Batas Waktu</label>
                                                    <input name="waktu" id="waktu">
													<span class="text-danger"><?php echo form_error('waktu');?></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mt-4 table table-striped table-borderless">
                                <thead class="thead-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tugas</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Aksi</th>
                                </thead>
                                <tbody>
								<?php foreach($tugasB as $num => $row)
								{?>
                                    <tr>
                                        <th scope="row"><?php echo $num+1;?></th>
                                        <td><?php echo $row->nama_tugas;?></td>
                                        <td><?php echo $row->nama_pelajaran;?></td>
                                        <td><?php echo $row->deadline.' '.$row->waktu;?></td>
                                        <td>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('tugas/detail').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>">
                                                <i class="fas fa-info font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('tugas/update').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>" >
                                                <i class="fas fa-edit font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('tugas/updateStatus').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>">
                                                <i class="fas fa-check-circle font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('tugas/deleteData').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>">
                                                <i class="fas fa-trash font-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
								<?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container bg-white rounded p-4 mt-4">
                        <div class="float-left">
                            <h4>Daftar Tugas Selesai</h4>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="mt-4 table table-striped table-borderless">
                                    <thead class="thead-dark">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Tugas</th>
                                        <th scope="col">Nama Pelajaran</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Aksi</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach($tugasA as $num => $row)
									{?>
										<tr>
											<th scope="row"><?php echo $num+1;?></th>
											<td><?php echo $row->nama_tugas;?></td>
											<td><?php echo $row->nama_pelajaran;?></td>
											<td><?php echo $row->deadline.' '.$row->waktu;?></td>
                                            <td>
                                                <a class="btn btn-link p-0" href="<?php echo site_url('tugas/detail').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>">
                                                    <i class="fas fa-info font-lg"></i>
                                                </a>
                                                <a class="btn btn-link p-0" href="<?php echo site_url('tugas/deleteData').'/'.$row->id_pelajaran.'/'.$row->deadline.'/'.rawurlencode($row->nama_tugas);?>">
                                                        <i class="fas fa-trash font-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
<?php 
if(form_error('namaTugas') || form_error('kodePelajaran') || form_error('tanggal') || form_error('waktu'))
		{
			echo "<script> 
			$('#modalTambahTugas').modal('show');
			</script>";
		}?>