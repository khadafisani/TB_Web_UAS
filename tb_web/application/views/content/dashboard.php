        <div class="c-body">
            <main class="c-main">
                <!-- Main content here -->
                <div class="container-fluid mb-4">
                    <!-- Jadwal -->
                    <div class="container bg-white rounded p-4">
                        <h4>Jadwal Hari Ini</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead class="thead-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Nama Pengajar</th>
                                    <th scope="col">Ruangan</th>
                                    <th scope="col">Jam</th>
                                </thead>
                                <tbody>
								<?php $i=1;
								foreach($jadwal_hari_ini as $row)
								{?>
                                    <tr>
                                        <th scope="row"><?php echo $i;?></th>
                                        <td><?php echo $row->nama_pelajaran;?></td>
                                        <td><?php echo $row->pengajar;?></td>
                                        <td><?php echo $row->ruangan;?></td>
                                        <td><?php echo $row->mulai.'-'.$row->selesai;?></td>
                                    </tr>
								<?php $i++;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- Tugas -->
                    <div class="container bg-white rounded p-4">
                        <h4>Tugas Belum Selesai</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless"> 
                                <thead class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Tugas</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col">Deadline</th>
                                </thead>
                                <tbody>
								<?php foreach($tugas as $num => $row)
								{?>
                                    <tr>
                                        <th scope="row"><?php echo $num+1;?></th>
                                        <td><?php echo $row->nama_tugas;?></td>
                                        <td><?php echo $row->nama_pelajaran;?></td>
                                        <td><?php echo $row->deadline.' '.$row->waktu;?></td>
                                    </tr>
								<?php } ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </main>
        </div>