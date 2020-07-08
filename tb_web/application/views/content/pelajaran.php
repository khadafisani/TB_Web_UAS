		<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <div class="float-left">
                            <h4>Daftar Pelajaran</h4>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPelajaran">
                                <span class="fas fa-plus mt-1"></span>
                                <span class="font-weight-bold">Tambah Pelajaran</span> 
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambahPelajaran" tabindex="-1" role="dialog" aria-labelledby="modalTambahPelajaranTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Pelajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <?php echo form_open('pelajaran/insert');?>
                                            <div class="form-group">
                                                <div class="modal-body">
                                                    <label for="kodePelajaran">Kode Pelajaran</label>
                                                    <input class="form-control" type="text" name="kodePelajaran" id="kodePelajaran">
													<span class="text-danger"><?php echo form_error('kodePelajaran');?></span>
                                                    <label for="namaPelajaran">Nama Pelajaran</label>
                                                    <input class="form-control" type="text" name="namaPelajaran" id="namaPelajaran">
													<span class="text-danger"><?php echo form_error('namaPelajaran');?></span>
                                                    <label for="namaPengajar">Nama Pengajar</label>
                                                    <input class="form-control" type="text" name="namaPengajar" id="namaPengajar">
													<span class="text-danger"><?php echo form_error('namaPengajar');?></span>
                                                    <label for="kontakPengajar">Kontak Pengajar</label>
                                                    <input class="form-control" type="text" name="kontakPengajar" id="kontakPengajar" onkeypress="return hanyaAngka(event)">
													<span class="text-danger"><?php echo form_error('kontakPengajar');?></span>
                                                    <label for="semester">Semester</label>
                                                    <input class="form-control" type="text" name="semester" id="semester" onkeypress="return hanyaAngka(event)">
													<span class="text-danger"><?php echo form_error('semester');?></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input class="btn btn-primary" type="submit" value="Save">
                                                </div>
                                            </div>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mt-4 table table-striped table-borderless">
                                <thead class="thead-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Pelajaran</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Nama Pengajar</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Aksi</th>
                                </thead>
                                <tbody>
								<?php
									foreach($pelajaran as $i => $row)
									{?>
                                    <tr>
                                        <th scope="row"><?php echo $i+1;?></th>
                                        <td><?php echo $row->id_pelajaran;?></td>
                                        <td><?php echo $row->nama_pelajaran;?></td>
                                        <td><?php echo $row->pengajar;?></td>
                                        <td><?php echo $row->semester;?></td>
                                        <td>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('pelajaran/detail').'/'.rawurlencode($row->id_pelajaran);?>">
                                                <i class="fas fa-info font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('pelajaran/update').'/'.rawurlencode($row->id_pelajaran);?>">
                                                <i class="fas fa-edit font-lg"></i>
                                            </a>
                                            <a class="btn btn-link p-0" href="<?php echo site_url('pelajaran/deleteData').'/'.rawurlencode($row->id_pelajaran);?>" onclick="return (confirm('Apakah yakin menghapus data ?'))">
                                                <i class="fas fa-trash font-lg"></i>                                                
                                            </a>
                                        </td>
                                    </tr>
									<?php $i++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
		<?php 
		if(form_error('kodePelajaran') || form_error('namaPelajaran') || form_error('namaPengajar') || form_error('kontakPengajar') || form_error('semester'))
		{
			echo "<script> 
			$('#modalTambahPelajaran').modal('show');
			</script>";
		}?>
		<script>
            function hanyaAngka(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if((charCode < 58 && charCode > 47))
                    return true;
                return false;
            }
        </script>