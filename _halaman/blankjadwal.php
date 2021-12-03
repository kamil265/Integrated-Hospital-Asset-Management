<!--**********************************
    Tambah Jadwal Perawat Original
    ***********************************-->
    <div class="modal fade modal-tambah-jadwalperawat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Jadwal Perawat</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addJadwalPerawat.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label" >Nama Perawat</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_jadwalper" id="nama_jadwalper" class="form-control" onblur="getPerawat()" required>
                                </div>
                                <div id="resultNamaPerawat"></div>
                                <div class="form-group">
                                    <span id="get_data_perawat"></span> 
                                </div>
                            </div>
                            </div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Hari Kerja</label>
                                    <select class="form-control" id="sel2" name="hari_praktik">
                                        <option>Senin</option>
                                        <option>Selasa</option>
                                        <option>Rabu</option>
                                        <option>Kamis</option>
                                        <option>Jumat</option>
										<option>Sabtu</option>
                                        <option>Minggu</option>
                                    </select>
                                </div>
							</div>
							<div class="col-lg-6 mb-4">
                                <label>Jam Mulai Kerja</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="jam_mulai" class="form-control" value="00:00"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
							<div class="col-lg-6 mb-4">
                                <label>Jam Selesai Kerja</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="jam_selesai" class="form-control" value="00:00"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
						</div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahJadwalPer" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>

		<div class="col-12">
        	<div class="card" id="jadwalPerawat">
				<div class="card-header">
				<h4 class="card-intro-title">Jadwal Perawat Hari ini</h4>
					<span>
						<button onclick="openFullscreen();" class="btn btn-primary btn-xs"><i class="fa fa-expand" aria-hidden="true"></i></button>
					</span>
				</div>
                <div class="card-body p-4">
					<div class="table-responsive p-4 ">
                        <table class="table patient-activity">
							<?php 
								$sql = "SELECT * FROM view_jadwalperawat WHERE jadwalid!=''";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{               
										?>  
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1"><?php echo htmlentities($result->nama_perawat);?></h5>
											<p class="mb-0"><?php echo htmlentities($result->divisi);?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0">Mulai Kerja</p>
                                    <h5 class="my-0 text-primary"><?php echo htmlentities($result->jam_mulai);?></h5>
                                </td>
								<td>
                                    <p class="mb-0">Selesai Kerja</p>
                                    <h5 class="my-0 text-primary"><?php echo htmlentities($result->jam_selesai);?></h5>
                                </td>
                            </tr>
							<?php }}?>
                        </table>
                    </div>
           		</div>
        	</div>
		</div>
		<div class="col-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jadwal Perawat</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-jadwalperawat">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
                                    <th>Nama Perawat</th>
									<th>Divisi</th>
                                    <th>Jam Kerja</th>       
                                    <th>Action</th>                         
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_jadwalperawat WHERE jadwalid!=''";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{               
										?>  
                            	<tr>
									<td><?php echo $cnt;?></td>
                                    <td><?php echo htmlentities($result->nama_perawat);?></td>
                                    <td><?php echo htmlentities($result->divisi);?></td>
									<td><?php echo htmlentities($result->jam_mulai);?> - <?php echo htmlentities($result->jam_selesai);?>  </td>
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->jadwalid); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditjadwalperawat" ><i class="fa fa-pencil" ></i></a>
											<a href="deleteJadwal.php?id=<?php echo htmlentities($result->jadwalid);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										</div>												
									</td>
                                    								
                                </tr>
								<?php $cnt=$cnt+1;}} ?>                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

<!--**********************************
    Tambah Jadwal Perawat Modifikasi
    ***********************************-->

    <div class="modal fade modal-tambah-jadwalperawat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Jadwal Perawat</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addJadwalPerawat.php" method="POST" >
                <div>                    
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                <label class="text-label" >Nama Perawat</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="nama_jadwalper" id="nama_jadwalper" class="form-control" onblur="getPerawat()" required>
                                </div>
                                <div id="resultNamaPerawat"></div>
                                <div class="form-group">
                                    <span id="get_data_perawat"></span> 
                                </div>
                            </div>
                        </div>
						<div class="col-12">
							<div class="form-group">
                                <label>Tanggal Praktik</label>
                                <input type="date" name="tanggal_praktik" class="form-control">
                            </div>
						</div>
						<div class="col-lg-6 mb-4">
                            <label>Jam Mulai Praktik</label>
                            <div class="input-group">
                                <input type="time" name="jam_mulai" class="form-control" value="00:00"> 
                            </div>
                        </div>
						<div class="col-lg-6 mb-4">
                            <label>Jam Selesai Praktik</label>
                            <div class="input-group" >
                                <input type="time" name="jam_selesai" class="form-control" value="00:00"> 
                            </div>
                        </div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahJadwal" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>    
    </div>
</div>
</div>
<div id="modalEditJadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditJadwalPerawat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditJadwalKaryawan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditDokter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditPerawat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditKaryawan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
        	<div class="card" id="jadwalPerawat">
				<div class="card-header">
				<h4 class="card-intro-title">Jadwal Perawat Hari ini</h4>
						<!-- <button class="btn btn-primary btn-xs mr-0"></button> -->
					<span>
						<button onclick="openFullscreen();" class="btn btn-primary btn-xs"><i class="fa fa-expand" aria-hidden="true"></i></button>
					</span>

				</div>
                <div class="card-body p-4">
					<div class="table-responsive p-4 ">
                        <table class="table patient-activity">
							<?php 
								$sql = "SELECT * FROM view_jadwalperawat WHERE jadwalid!='' AND hari_praktik=CURRENT_DATE()";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{               
										?>  
                            <tr>
                                <td>
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h5 class="mt-0 mb-1"><?php echo htmlentities($result->nama_perawat);?></h5>
											<p class="mb-0"><?php echo htmlentities($result->divisi);?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0">Mulai Praktik</p>
                                    <h5 class="my-0 text-primary"><?php echo htmlentities($result->jam_mulai);?></h5>
                                </td>
								<td>
                                    <p class="mb-0">Selesai Praktik</p>
                                    <h5 class="my-0 text-primary"><?php echo htmlentities($result->jam_selesai);?></h5>
                                </td>
                            </tr>
							<?php }}?>
                        </table>
                    </div>
           		</div>
        	</div>
		</div>
		<div class="col-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jadwal Perawat</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-jadwalperawat">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
                                    <th>Nama Perawat</th>
									<th>Divisi</th>
                                    <th>Tanggal</th>       
                                    <th>Jam Praktik</th>       
                                    <th>Action</th>                         
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_jadwalperawat WHERE jadwalid!=''";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
									foreach($results as $result)
									{               
										?>  
                            	<tr>
									<td><?php echo $cnt;?></td>
                                    <td><?php echo htmlentities($result->nama_perawat);?></td>
                                    <td><?php echo htmlentities($result->divisi);?></td>
                                    <td><?php echo htmlentities($result->hari_praktik);?></td>
									<td><?php echo htmlentities($result->jam_mulai);?> - <?php echo htmlentities($result->jam_selesai);?>  </td>
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->jadwalid); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditjadwal" ><i class="fa fa-pencil" ></i></a>
											<a href="deleteJadwal.php?id=<?php echo htmlentities($result->jadwalid);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										</div>												
									</td>
                                    								
                                </tr>
								<?php $cnt=$cnt+1;}} ?>                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>