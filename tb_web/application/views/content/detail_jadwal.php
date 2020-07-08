        <div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4 class="ml-2">Detil Jadwal</h4>
                        <div class="table-responsive">
                            <table class="table table-borderless">
							<?php foreach($detail as $row)
							{?>
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
                                    <td class="col-2">Ruangan</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->ruangan;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Jam Mulai</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->mulai;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Jam Selesai</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->selesai;?></td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-2">Hari</td>
                                    <td class="">:</td>
                                    <td class="col-9"><?php echo $row->hari;?></td>
                                </tr>
							<?php }?>
                            </table>
                            <div class="ml-2">
                                <a class="btn btn-success" href="<?php echo site_url('jadwal');?>">Kembali Ke Halaman Sebelumnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>