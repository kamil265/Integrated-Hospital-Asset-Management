<?php
include 'connect.php';
 $title="Log Data Tenaga Medis";
?>
<div class="container-fluid">
        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
            <div class="card" id="log-data-nakes">
            <div class="card-header">
                <h4 class="card-title">Log Data Tenaga Medis</h4>
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
                                                            <th><strong>NAMA DOKTER</strong></th>
                                                            <th><strong>NIK DOKTER</strong></th>
                                                            <th><strong>JENIS KELAMIN</strong></th>
                                                            <th><strong>ALAMAT</strong></th>
                                                            <th><strong>KONTAK</strong></th>
                                                            <th><strong>SPESIALIS</strong></th>                                                 
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
									                    $sql = "SELECT * from  tb_dokter WHERE status=0";
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
                                                <th><strong>RFID UID</strong></th>
                                                <th><strong>NAMA PERAWAT</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>JENIS KELAMIN</strong></th>
                                                <th><strong>ALAMAT</strong></th>
                                                <th><strong>KONTAK</strong></th>
                                            <th></th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_perawat WHERE status=0";
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
                                                <th><strong>NAMA KARYAWAN</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>JENIS KELAMIN</strong></th>
                                                <th><strong>ALAMAT</strong></th>
                                                <th><strong>DIVISI</strong></th>
                                                <th><strong>KONTAK</strong></th>
                                                <th></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_karyawan WHERE status=0";
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
                                                
                                            <?php $cnt++;}} ?>  

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                </div>
            </div>
        </div>
</div>
