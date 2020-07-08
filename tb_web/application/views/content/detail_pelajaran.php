<div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="ml-2">Detil Pelajaran</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <?php 
								foreach($detail as $row)
								{
								?>
								<tr class="d-flex">
                                    <td class="col-2">Kode Pelajaran</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->id_pelajaran;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Nama Pelajaran</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->nama_pelajaran;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Nama Pengajar</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->pengajar;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Kontak Pengajar</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->kontak_pengajar;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Semester</td>
                                    <td class="">:</td>
								<td class="col-9"><?php echo $row->semester;?></td>
                                </tr>								
								<?php } ?>
                            </table>
                            <div class="ml-2">
                                <a class="btn btn-success" href="<?php echo site_url('pelajaran/index');?>">Kembali Ke Halaman Sebelumnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>