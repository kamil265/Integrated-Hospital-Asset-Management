<?php
 $title="Clinical Management - Tenaga Kesehatan";
?>
<script src="<?=templates()?>js/tambah-jadwal.js"></script>


<div class="modal fade modal-tambah-jadwaldokter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Jadwal Dokter</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addJadwalDokter.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Dokter</label>
                                    <input type="text" name="uid_jadwaldok" id="uid_jadwaldok" onblur="getDokter()" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_dokter" style="font-size:16px;"></span> 
                                </div>
                            </div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Hari Praktik</label>
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
                                <label>Jam Mulai Praktik</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="jam_mulai" class="form-control" value="00:00"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
							<div class="col-lg-6 mb-4">
                                <label>Jam Selesai Praktik</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="text" name="jam_selesai" class="form-control" value="00:00"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
						</div>
                    </section>
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
        	<div class="card" id="jadwalDokter">
				<div class="card-header">
				<h4 class="card-intro-title">Jadwal Dokter Hari ini</h4>
					<span>
						<button onclick="openFullscreen();" class="btn btn-primary btn-xs"><i class="fa fa-expand" aria-hidden="true"></i></button>
					</span>
				</div>
                <div class="card-body p-4">
					<div class="table-responsive p-4 ">
                        <table class="table patient-activity">
							<?php 
								$sql = "SELECT * FROM view_jadwaldokter WHERE jadwalid!=''";
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
                                            <h5 class="mt-0 mb-1"><?php echo htmlentities($result->nama_dokter);?></h5>
											<p class="mb-0"><?php echo htmlentities($result->spesialis);?></p>
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
                    <!-- <div class="bootstrap-carousel">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img4.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img5.jpg" alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div> -->
           		</div>
        	</div>
		</div>
		<div class="col-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jadwal Dokter</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-jadwaldokter">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
                                    <th>Nama Dokter</th>
									<th>Spesialisasi</th>
                                    <th>Jam Praktik</th>       
                                    <th>Action</th>                         
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_jadwaldokter WHERE jadwalid!=''";
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
                                    <td><?php echo htmlentities($result->nama_dokter);?></td>
                                    <td><?php echo htmlentities($result->spesialis);?></td>
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

<!--**********************************
            Perawat
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
                                    <label class="text-label">UID Perawat</label>
                                    <input type="text" name="uid_jadwalprwt" id="uid_jadwalprwt" onblur="getPerawat()" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_perawat" style="font-size:16px;"></span> 
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
                    <!-- <div class="bootstrap-carousel">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img4.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img5.jpg" alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div> -->
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
											<a href="deleteJadwalperawat.php?id=<?php echo htmlentities($result->jadwalid);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
            Karyawan
    ***********************************-->

    <div class="modal fade modal-tambah-jadwalkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Jadwal Karyawan</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addJadwalKaryawan.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Karyawan</label>
                                    <input type="text" name="uid_jadwalkar" id="uid_jadwalkar" onblur="getKaryawan()" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_karyawan" style="font-size:16px;"></span> 
                                </div>
                            </div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Hari Kerja</label>
                                    <select class="form-control" id="sel2" name="hari_kerja">
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
                    <button type="submit" name="tambahJadwal" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>

		<div class="col-12">
        	<div class="card" id="jadwalKaryawan">
				<div class="card-header">
				<h4 class="card-intro-title">Jadwal Karyawan Hari ini</h4>
					<span>
						<button onclick="openFullscreen();" class="btn btn-primary btn-xs"><i class="fa fa-expand" aria-hidden="true"></i></button>
					</span>
				</div>
                <div class="card-body p-4">
					<div class="table-responsive p-4 ">
                        <table class="table patient-activity">
							<?php 
								$sql = "SELECT * FROM view_jadwalkaryawan WHERE jadwalid!=''";
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
                                            <h5 class="mt-0 mb-1"><?php echo htmlentities($result->nama_karyawan);?></h5>
											<p class="mb-0"><?php echo htmlentities($result->spesialis);?></p>
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
                    <!-- <div class="bootstrap-carousel">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img4.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./images/big/img5.jpg" alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div> -->
           		</div>
        	</div>
		</div>
        <div class="col-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jadwal Karyawan</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-jadwalkaryawan">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
                                    <th>Nama Karyawan</th>
									<th>Spesialisasi</th>
                                    <th>Jam Kerja</th>       
                                    <th>Action</th>                         
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_jadwalkaryawan WHERE jadwalid!=''";
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
                                    <td><?php echo htmlentities($result->nama_karyawan);?></td>
                                    <td><?php echo htmlentities($result->spesialis);?></td>
									<td><?php echo htmlentities($result->jam_mulai);?> - <?php echo htmlentities($result->jam_selesai);?>  </td>
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->jadwalid); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditjadwalkaryawan" ><i class="fa fa-pencil" ></i></a>
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
    


<!-- Log Data Tenaga Kesehatan -->

<div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card" id="log-data-nakes">
            <div class="card-header">
                <h4 class="card-title">Log Data Tenaga Kesehatan</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user-md mr-2"></i> Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user-nurse mr-2"></i> Perawat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-id-card-alt mr-2"></i> Karyawan</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="pt-4">
                            <div class="table-responsive">
                                            <table class="table table-responsive-md">
                                                <thead>
                                                    <tr>
                                                        <th style="width:80px;" ><strong>No</strong></th>
                                                            <th><strong>RFID UID</strong></th>                                                
                                                            <th><strong>Nama Dokter</strong></th>
                                                            <th><strong>NIK Dokter</strong></th>
                                                            <th><strong>Jenis Kelamin</strong></th>
                                                            <th><strong>Alamat</strong></th>
                                                            <th><strong>Kontak</strong></th>
                                                            <th><strong>Spesialis</strong></th>                                                 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
									                    $sql = "SELECT * from  tb_dokter";
									                    $row = $dbh -> prepare($sql);
									                    $row->execute();
									                    $results=$row->fetchAll(PDO::FETCH_OBJ);
									                    $cnt=1;
									                    if($row->rowCount() > 0)
									                    {
										                    foreach($results as $result)
									                        {               
								                    ?>

                                                        <tr>
                                                            <td><?php echo $cnt;?></td>                                                
                                                            <td><?php echo htmlentities($result->rfid_uid);?></td>                                                
                                                            <td><?php echo htmlentities($result->nama_dokter);?></td>
                                                            <td><?php echo htmlentities($result->nik_dokter);?></td>
                                                            <td><?php echo htmlentities($result->jenis_kelamin_dokter);?></td>
                                                            <td><?php echo htmlentities($result->alamat_dokter);?></td>
                                                            <td><?php echo htmlentities($result->kontak_dokter);?></td>
                                                            <td><?php echo htmlentities($result->spesialis);?></td>
                                                            <td>
										                        <div class="d-flex">
											                        <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditdokter" ><i class="fa fa-pencil" ></i></a>
											                        <a href="deleteDokter.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										                        </div>												
									                        </td>	
                                                        </tr>

                                                    <?php $cnt++;}} ?>  

                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="pt-4">
                        <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;" ><strong>No</strong></th>
                                                <th><strong>UID Perawat</strong></th>
                                                <th><strong>Nama Perawat</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>Jenis Kelamin</strong></th>
                                                <th><strong>Alamat</strong></th>
                                                <th><strong>Kontak</strong></th>
                                            <th></th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_perawat";
									$row = $dbh -> prepare($sql);
									$row->execute();
									$results=$row->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($row->rowCount() > 0)
									{
										foreach($results as $result)
									{               
								?>

                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($result->rfid_uid);?></td>
                                                <td><?php echo htmlentities($result->nama_perawat);?></td>
                                                <td><?php echo htmlentities($result->nik_perawat);?></td>
                                                <td><?php echo htmlentities($result->jenis_kelamin);?></td>
                                                <td><?php echo htmlentities($result->alamat);?></td>
                                                <td><?php echo htmlentities($result->kontak_perawat);?></td>
                                                <td>
										            <div class="d-flex">
											            <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditperawat" ><i class="fa fa-pencil" ></i></a>
											            <a href="deletePerawat.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										            </div>												
									            </td>	
                                            </tr>

                                            <?php $cnt++;}} ?>  

                                        </tbody>
                                    </table>
                                </div>     
                        </div>
                        </div>
                    <div class="tab-pane fade" id="contact">
                        <div class="pt-4">
                            <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;" ><strong>NO</strong></th>
                                                <th><strong>UID</strong></th>
                                                <th><strong>Nama Karyawan</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>Jenis Kelamin</strong></th>
                                                <th><strong>Alamat</strong></th>
                                                <th><strong>Divisi</strong></th>
                                                <th><strong>Kontak</strong></th>
                                                <th></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_karyawan";
									$row = $dbh -> prepare($sql);
									$row->execute();
									$results=$row->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($row->rowCount() > 0)
									{
										foreach($results as $result)
									{               
								?>

                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($result->kode_rfid);?></td>
                                                <td><?php echo htmlentities($result->nama_karyawan);?></td>
                                                <td><?php echo htmlentities($result->nik_karyawan);?></td>
                                                <td><?php echo htmlentities($result->jenis_kelamin_karyawan);?></td>
                                                <td><?php echo htmlentities($result->alamat_karyawan);?></td>
                                                <td><?php echo htmlentities($result->divisi_karyawan);?></td>
                                                <td><?php echo htmlentities($result->kontak_karyawan);?></td>
                                                <td>
										            <div class="d-flex">
											            <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditkaryawan" ><i class="fa fa-pencil" ></i></a>
											            <a href="deleteKaryawan.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										            </div>												
									            </td>	

                                            <?php $cnt++;}} ?>  

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script>
var elem = document.getElementById("jadwalDokter");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>
    
