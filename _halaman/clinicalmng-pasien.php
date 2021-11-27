<?php
$title="Clinical Management - Pasien";
include 'connect.php';
?>

<div class="modal fade" id="modal-tambah-pemindahan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pemindahan Pasien</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addclinicalpasien.php" method="POST" class="step-form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-15">
                            <label> RFID UID </label>
                            <Input type="text" name="clcpasrfid" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-15">
                            <label> TANGGAL MASUK </label>
                            <Input type="text" name="clcpastanggal" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> NAMA PASIEN </label>
                        <Input type="text" name="clcpasnama" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-lg-15">
                            <label class="text-label">KATEGORI PASIEN</label>
                            <select class="form-control" name="clcpaskategori">
                                <option>Pilih Jenis Pasien</option>
                                <option>Dewasa</option>
                                <option>Anak</option>
                                <option>Bayi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> DOKTER </label>
                        <Input type="text" name="clcpasdokter" class="form-control">
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> DIAGNOSA </label>
                        <Input type="text" name="clcpasdiag" class="form-control">
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> STATUS </label>
                        <Input type="text" name="clcpasstatus" class="form-control">
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> ASAL RUANG </label>
                        <Input type="text" name="clcpasasal" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> RUANG PEMINDAHAN</label>
                        <Input type="text" name="clcpastujuan" class="form-control" required>
                    </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                <button type="submit" name="insertclinicalpasien" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-reservasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Reservasi Kamar</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="addclinicalkamar.php" method="post" class="step-form-horizontal">
                    <div class="form-group">
                    <div class="col-lg-15">
                        <label class="text-label"> NAMA </label>
                        <Input type="text" name="clckamnama" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> NIK </label>
                        <Input type="text" name="clckamnik" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> NOMOR TELPON </label>
                        <Input type="text" name="clckamnotelp" class="form-control">
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> ALAMAT </label>
                        <Input type="text" name="clckamalamat" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-lg-15">
                    <div class="form-group">
                        <label class="text-label"> DIAGNOSA </label>
                        <Input type="text" name="clckamdiagnosa" class="form-control">
                    </div>  
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                <button type="submit" name="insertclinicalkamar" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="modalEditClinicalPasien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div class="container-fluid">
	<div class="row">
	    <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="la la-baby"></i>
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
							<i class="la la-child"></i>
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
							<i class="la la-user"></i>
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
					<a href="" data-toggle="modal" data-target="#modal-reservasi">
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
					<a href="#" data-toggle="modal" data-target="#modal-tambah-pemindahan">
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
        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Riwayat Pemindahan Pasien</h4>
            	</div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;" ><strong>NO</strong></th>
                                                <th><strong>RFID UID</strong></th>
                                                <th><strong>TANGGAL MASUK</strong></th>
                                                <th><strong>KATEGORI PASIEN</strong></th>
                                                <th><strong>NAMA PASIEN</strong></th>                          
                                                <th><strong>DOKTER</strong></th>
                                                <th><strong>DIAGNOSA</strong></th>
                                                <th><strong>STATUS</strong></th>
                                                <th><strong>ASAL RUANG</strong></th>
                                                <th><strong>RUANG PEMINDAHAN</strong></th>
                                                <th><strong>ACTION</strong></th>
                                                <th></th>  
                                            </tr>
                                        </thead>
                                        <tbody>

                                    <?php 
									$sql = "SELECT * FROM tb_clinical_pasien WHERE 1";
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
                                                <td><?php echo htmlentities($result->tag_id);?></td>
                                                <td><?php echo htmlentities($result->tanggal_masuk);?></td>
                                                <td><?php echo htmlentities($result->jenis_pasien);?></td>
                                                <td><?php echo htmlentities($result->nama_pasien);?></td>
                                                <td><?php echo htmlentities($result->dokter);?></td>
                                                <td><?php echo htmlentities($result->diagnosa);?></td>
                                                <td><?php echo htmlentities($result->status);?></td>
                                                <td><?php echo htmlentities($result->asal_ruang);?></td>
                                                <td><?php echo htmlentities($result->ruang_pemindahan);?></td>
                                                
                                                <td>
                                                <div class="d-flex">
                                                <a href="#" id="<?php echo htmlentities($result->id);?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditclinicalpasien"><i class="fa fa-pencil"></i></a>
                                                
                                                <a href="deleteclinicpasien.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
                                                </div>	
                                                </td>
                                            </tr>

                                            <?php $cnt++;}} ?>  

                                        </tbody>
                                    </table>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>