<!--**********************************
    Pemindahan Pasien Muncul Detail Info
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
            <form action="addPemindahanPasien.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Pasien</label>
                                    <input type="text" name="uid_pemindahanpasien" id="uid_pemindahanpasien" onblur="getPemindahanPasien()" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_pemindahanpasien" style="font-size:16px;"></span> 
                                </div>
                                <div id="resultPemindahanPasien"></div>
                                <div class="form-group">
                                    <span id="get_data_pemindahanpasien"></span> 
                                </div>
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





<!--**********************************
Pemindahan Pasien Muncul Detail Info Versi 2
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
            <form action="addPemindahanPasien.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Pasien</label>
                                    <div class="input-group mb-3">
                                        <div class="form-control">
                                            <span class="valueUIDpasien" id="get_uidPas">
                                            Tap Kartu kemudian tekan tombol scan
                                            </span>
                                        </div>
                                    <input type="text" name="uid_pemindahanpasien" id="uid_pemindahanpasien" onblur="getPemindahanPasien()" class="form-control" required>
                                        <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" name="btnGetUid" id="btnGetUid" onclick="getUID()" >Scan</button>
                                        </div>
                                </div>
								<div class="form-group">
                                    <span id="get_data_pemindahanpasien" style="font-size:16px;"></span> 
                                </div>
                                <div id="resultPemindahanPasien"></div>
                                <div class="form-group">
                                    <span id="get_data_pemindahanpasien"></span> 
                                </div>
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