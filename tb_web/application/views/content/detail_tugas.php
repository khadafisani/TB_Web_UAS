<div class="c-body">
            <main class="c-main">
 <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="ml-2">Detil Tugas</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless">
							<?php foreach($detail as $row)
							{?>
                                <tr class="d-flex">
                                    <td class="col-2">Nama Tugas</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->nama_tugas;?></td>
                                </tr>
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
                                    <td class="col-2">Batas Tanggal</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->deadline;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Batas Waktu</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->waktu;?></td>
                                </tr>
								<tr class="d-flex">
                                    <td class="col-2">Status</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->status;?></td>
                                </tr>
							<?php } ?>
                            </table>
                            <div class="ml-2">
                                <a class="btn btn-success" href="<?php echo site_url('tugas');?>">Kembali Ke Halaman Sebelumnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>