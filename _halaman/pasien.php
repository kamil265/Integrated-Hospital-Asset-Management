<?php
 $title="Daftar Pasien";
?>

<!--**********************************
            Kotak-Kotak 4
    ***********************************-->
<div class="container-fluid">
	<div class="row">
	    <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-bed"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">TOTAL PASIEN</p>
                            <?php 
                                $sql ="SELECT id from tb_pasien WHERE status=1";
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
							<i class="fas fa-baby"></i>
			            </span>
                        <div class="media-body">
                            <p class="mb-1">PASIEN BAYI</p>
                            <?php 
                                $sql ="SELECT id from tb_pasien where kategori_pasien='Bayi' AND status=1";
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
							<i class="fas fa-child"></i>
			            </span>
                        <div class="media-body">
                            <p class="mb-1">PASIEN ANAK</p>
                            <?php 
                                $sql ="SELECT id from tb_pasien where kategori_pasien='Anak' AND status=1";
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
                            <p class="mb-1">PASIEN DEWASA</p>
                            <?php 
                                $sql ="SELECT id from tb_pasien where kategori_pasien='Dewasa' AND status=1";
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
<!--**********************************
            Tabel Daftar Pasien
    ***********************************-->

<div id="modalEditPasien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>



<div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card" id="log-data-nakes">
            <div class="card-header">
                <h4 class="card-title">Daftar Pasien</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user-md mr-2"></i>BAYI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user-nurse mr-2"></i>ANAK-ANAK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-id-card-alt mr-2"></i>DEWASA</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="pt-4">
                            <div class="table-responsive">
                                            <table class="table table-responsive-md">
                                                <thead>
                                                    <tr>
                                                        <th style="width:80px;" ><strong>NO</strong></th>
                                                            <th><strong>RFID UID</strong></th>                                                
                                                            <th><strong>TANGGAL MASUK</strong></th>
                                                            <th><strong>NAMA PASIEN</strong></th>
                                                            <th><strong>JENIS KELAMIN</strong></th>
                                                            <th><strong>PENANGGUNG JAWAB</strong></th>
                                                            <th><strong>NIK</strong></th>
                                                            <th><strong>TANGGAL LAHIR</strong></th>
															<th><strong>ALAMAT</strong></th>
                                                            <th><strong>DIAGNOSA</strong></th>
															<th><strong>DOKTER PENANGGUNG JAWAB</strong></th>
															<th><strong>STATUS PASIEN</strong></th>
															<th><strong> </strong></th>                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
									                    $sql = "SELECT * from  tb_pasien WHERE kategori_pasien='Bayi'AND status=1";
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
                                                            <td><?php echo htmlentities($result->tanggal_masuk);?></td>
                                                            <td><?php echo htmlentities($result->nama);?></td>
                                                            <td><?php echo htmlentities($result->jeniskelamin_pasien);?></td>
                                                            <td><?php echo htmlentities($result->Penanggungjawab);?></td>
                                                            <td><?php echo htmlentities($result->nik);?></td>
                                                            <td><?php echo htmlentities($result->tanggal_lahir);?></td>
                                                            <td><?php echo htmlentities($result->alamat);?></td>
															<td><?php echo htmlentities($result->diagnosa);?></td>
															<td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
															<td><?php echo htmlentities($result->status_pasien);?></td>
                                                            <td>
										                        <div class="d-flex">
											                        <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditpasien" ><i class="fa fa-pencil" ></i></a>
											                        <a href="deletePasien.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
                                                <th style="width:80px;" ><strong>NO</strong></th>
												<th><strong>RFID UID</strong></th>                                                
                                                <th><strong>TANGGAL MASUK</strong></th>
                                                <th><strong>NAMA PASIEN</strong></th>
                                                <th><strong>JENIS KELAMIN</strong></th>
                                                <th><strong>PENANGGUNG JAWAB</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>TANGGAL LAHIR</strong></th>
												<th><strong>ALAMAT</strong></th>
                                                <th><strong>DIAGNOSA</strong></th>
												<th><strong>DOKTER PENANGGUNG JAWAB</strong></th>
												<th><strong>STATUS PASIEN</strong></th>
												<th><strong> </strong></th> 
                                            <th></th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_pasien WHERE kategori_pasien='Anak' AND status=1";
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
                                            <td><?php echo htmlentities($result->tanggal_masuk);?></td>
                                            <td><?php echo htmlentities($result->nama);?></td>
                                            <td><?php echo htmlentities($result->jeniskelamin_pasien);?></td>
                                            <td><?php echo htmlentities($result->Penanggungjawab);?></td>
                                            <td><?php echo htmlentities($result->nik);?></td>
                                            <td><?php echo htmlentities($result->tanggal_lahir);?></td>
                                            <td><?php echo htmlentities($result->alamat);?></td>
											<td><?php echo htmlentities($result->diagnosa);?></td>
											<td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
											<td><?php echo htmlentities($result->status_pasien);?></td>
                                            	<td>
										            <div class="d-flex">
                                                    <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditpasien" ><i class="fa fa-pencil" ></i></a>
											            <a href="deletePasien.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
												<th><strong>RFID UID</strong></th>                                                
                                                <th><strong>TANGGAL MASUK</strong></th>
                                                <th><strong>NAMA PASIEN</strong></th>
                                                <th><strong>JENIS KELAMIN</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>TANGGAL LAHIR</strong></th>
												<th><strong>ALAMAT</strong></th>
                                                <th><strong>DIAGNOSA</strong></th>
												<th><strong>DOKTER PENANGGUNG JAWAB</strong></th>
												<th><strong>STATUS PASIEN</strong></th>
												<th><strong> </strong></th> 
                                                <th></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_pasien WHERE kategori_pasien='Dewasa' AND status=1";
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
												<td><?php echo htmlentities($result->tanggal_masuk);?></td>
												<td><?php echo htmlentities($result->nama);?></td>
                                                <td><?php echo htmlentities($result->jeniskelamin_pasien);?></td>
												<td><?php echo htmlentities($result->nik);?></td>
												<td><?php echo htmlentities($result->tanggal_lahir);?></td>
												<td><?php echo htmlentities($result->alamat);?></td>
												<td><?php echo htmlentities($result->diagnosa);?></td>
												<td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
												<td><?php echo htmlentities($result->status_pasien);?></td>
                                                <td>
										            <div class="d-flex">
                                                    <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditpasien" ><i class="fa fa-pencil" ></i></a>
											            <a href="deletePasien.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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