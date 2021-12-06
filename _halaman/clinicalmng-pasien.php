<?php
$title="Clinical Management - Pasien";
?>

<div class="container-fluid">
<div class="row">
<div id="modalEditClinicalPasien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
	    <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-baby"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Pasien Bayi</p>
                            <?php 
                                $sql ="SELECT id FROM tb_pasien WHERE kategori_pasien='Bayi' ";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $jumlahAset=$query->rowCount();
                            ?>
                            <h4 class="mb-0"><?php echo htmlentities($jumlahAset); ?></h4>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-child"></i>
			            </span>
                        <div class="media-body">
                            <p class="mb-1">Pasien Anak</p>
                            <?php 
                                $sql ="SELECT id FROM tb_pasien WHERE kategori_pasien='Anak'";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $jumlahKategori=$query->rowCount();
                            ?>
                            <h4 class="mb-0"><?php echo htmlentities($jumlahKategori); ?></h4>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-user"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Pasien Dewasa</p>
                                <?php 
                                $sql ="SELECT id FROM tb_pasien WHERE kategori_pasien='Dewasa'";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $terpinjam=$query->rowCount();
                                ?>
                            <h4 class="mb-0"><?php echo htmlentities($terpinjam); ?></h4>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-sm-6">
			<div class="row">
				<div class="widget-stat card bg-success mr-4 mb-2" style="width: 100%">
					<a href="" data-toggle="modal" data-target=".modal-tambah-reservasikamar">
						<div class="card-body p-3">
                    		<div class="media ai-icon">
                       			<!-- <span class="mr-3 bgl-warning text-info">
                            		<i class="fas fa-procedures"></i>
                        		</span> -->
                        		<div class="media-body text-white">
                            		<p class="mb-1">Reservasi Kamar</p>
                            		<!-- <h4 class="mb-0">250</h4> -->
                            <!-- <span class="badge badge-warning">+250</span> -->
                        		</div>
                    		</div>
                		</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="widget-stat card bg-success mr-4 mb-2" style="width: 100%;">
					<a href="#" data-toggle="modal" data-target=".modal-tambah-pemindahanpasien">
						<div class="card-body p-3 ">
                    		<div class="media ai-icon ">
                       			<!-- <span class="mr-3 bgl-warning text-info">
                            		<i class="fas fa-procedures"></i>
                        		</span> -->
                        		<div class="media-body text-white">
                            		<p class="mb-1">Pemindahan Pasien</p>
                            		<!-- <h4 class="mb-0">250</h4> -->
                            <!-- <span class="badge badge-warning">+250</span> -->
                        		</div>
                    		</div>
                		</div>
					</a>
				</div>
			</div>
		</div>
</div>
</div>


<!--**********************************
            Reservasi Kamar
    ***********************************-->

<div class="modal fade modal-tambah-reservasikamar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Reservasi Kamar</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addReservasiKamar.php" method="POST" id="formAddReservasi" onsubmit="getReservasiKamar()" >
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <label class="text-label" >UID PASIEN</label>
                                    <div class="input-group mb-3">
                                        <div class="form-control">
                                            <span class="valueUIDpasien" id="get_uidPas">
                                                Tap Kartu Kemudian Tekan Scan                                        
                                            </span>
                                        </div>
                                        <input type="hidden" name="uid_reservasikamar" id="uid_reservasikamar" class="form-control" readonly required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" name="btnGetUid" id="btnGetUid" onclick="getUID();" >Scan</button>
                                                <button class="btn btn-success dtl-pasien" type="button" name="btnGetDetailPasien" id="getDetailPasien" >Detail</button>
                                            </div>
                                    </div>
                                    <span id="showDetailPasien"></span>
                            </div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Jenis Kamar</label>
                                    <select class="form-control" id="sel2" name="jenis_kamar">
                                        <option>Jenis 1</option>
                                        <option>Jenis 2</option>
                                        <option>Jenis 3</option>
                                        <option>Jenis 4</option>
                                        <option>Jenis 5</option>
										<option>Jenis 6</option>
                                        <option>Jenis 7</option>
                                    </select>
                                </div>
							</div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Kelas Kamar</label>
                                    <select class="form-control" id="sel2" name="kelas_kamar">
                                        <option>Kelas 1</option>
                                        <option>Kelas 2</option>
                                        <option>Kelas 3</option>
                                        <option>Kelas 4</option>
                                        <option>Kelas 5</option>
										<option>Kelas 6</option>
                                        <option>Kelas 7</option>
                                    </select>
                                </div>
							</div>
							<div class="col-12">
								<div class="form-group">
                                	<label>Ruang</label>
                                    <select class="form-control" id="sel2" name="ruang">
                                        <option>Ruang 1</option>
                                        <option>Ruang 2</option>
                                        <option>Ruang 3</option>
                                        <option>Ruang 4</option>
                                        <option>Ruang 5</option>
										<option>Ruang 7</option>
                                    </select>
                                </div>
							</div>
						</div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahReservasi" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>
<div id="modalEditReservasiKamar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<div class="container-fluid">
	<div class="row">
        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Reservasi Kamar</h4>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
                                    <th>Nama Pasien</th>
									<th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Diagnosa</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jenis Kamar</th>
                                    <th>Kelas Kamar</th>
                                    <th>Ruang</th>
                                    <th>Dokter Penanggung Jawab</th>       
                                    <th>Action</th>                         
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_reservasikamar WHERE jadwalid!=''";
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
                                    <td><?php echo htmlentities($result->nama_pasien);?></td>
                                    <td><?php echo htmlentities($result->nik);?></td>
                                    <td><?php echo htmlentities($result->alamat);?></td>
                                    <td><?php echo htmlentities($result->diagnosa);?></td>
                                    <td><?php echo htmlentities($result->nomor_telepon);?></td>
                                    <td><?php echo htmlentities($result->jenis_kamar);?></td>
                                    <td><?php echo htmlentities($result->kelas_kamar);?></td>
                                    <td><?php echo htmlentities($result->ruang);?></td>
                                    <td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->jadwalid); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditreservasikamar" ><i class="fa fa-pencil" ></i></a>
											<a href="deleteReservasiKamar.php?id=<?php echo htmlentities($result->jadwalid);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
    </div>
</div>

<!--**********************************
            Pemindahan Pasien
    ***********************************-->

<script src="<?=templates()?>js/tambah-pemindahanpasien.js"></script>


<div class="modal fade modal-tambah-pemindahanpasien" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pemindahan Pasien</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addPemindahanPasien.php" method="POST" id="formAddpindah" onsubmit="uidPindah()">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <label class="text-label" >UID ASET</label>
                                    <div class="input-group mb-3">
                                        <div class="form-control">
                                            <span class="valueUIDpasien" id="get_uidPas">
                                                Tap Kartu kemudian tekan tombol scan
                                            </span>
                                        </div>
                                        <input type="hidden" name="uid_pemindahanpasien" id="uid_pemindahanpasien" class="form-control" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" name="btnGetUid" id="btnGetUid" onclick="getUID()" >Scan</button>
                                                <button class="btn btn-success dtl-pasien" type="button" name="btnGetDetailPasien" id="getDetailPasien" >Detail</button>
                                            </div>
                                    </div>
                                    <span id="showDetailPasien2"></span>
                                <!-- <div class="form-group">
                                    <label class="text-label">UID Pasien</label>
                                    <input type="text" name="uid_pemindahanpasien" id="uid_pemindahanpasien" onblur="getPemindahanPasien()" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_pemindahanpasien" style="font-size:16px;"></span> 
                                </div>
                                <div id="resultPemindahanPasien"></div>
                                <div class="form-group">
                                    <span id="get_data_pemindahanpasien"></span> 
                                </div> -->
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">ASAL RUANG</label>
                                    <input type="text" name="asal_ruang" id="sel2" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">RUANG PEMINDAHAN</label>
                                    <input type="text" name="ruang_pemindahan" id="sel2" class="form-control" required>
                                </div>
                            </div>
						</div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahPemindahanPasien" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>


<div id="modalEditReservasiKamar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditPemindahanPasien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div class="container-fluid">
	<div class="row">
        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pemindahan Pasien</h4>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>NO</th>
                                    <th>RFID UID</th>
                                    <th>TANGGAL MASUK</th>
                                    <th>KATEGORI PASIEN</th>    
                                    <th>NAMA PASIEN</th>
                                    <th>DOKTER PENANGGUNG JAWAB</th>
                                    <th>DIAGNOSA</th>
                                    <th>STATUS</th>
									<th>ASAL RUANG</th>
                                    <th>RUANG PEMINDAHAN</th>
                                    <th>ACTION</th>                     
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT * FROM view_pemindahanpasien WHERE jadwalid!=''";
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
                                    <td><?php echo htmlentities($result->kode_rfid);?></td>
                                    <td><?php echo htmlentities($result->tanggal_masuk);?></td>
                                    <td><?php echo htmlentities($result->kategori_pasien);?></td>
                                    <td><?php echo htmlentities($result->nama);?></td>                                    
                                    <td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
                                    <td><?php echo htmlentities($result->diagnosa);?></td>
                                    <td><?php echo htmlentities($result->status_pasien);?></td>
                                    <td><?php echo htmlentities($result->asal_ruang);?></td>
                                    <td><?php echo htmlentities($result->ruang_pemindahan);?></td>
                                    
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->jadwalid); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditpemindahanpasien" ><i class="fa fa-pencil" ></i></a>
											<a href="deletePemindahanPasien.php?id=<?php echo htmlentities($result->jadwalid);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
    </div>
</div>





