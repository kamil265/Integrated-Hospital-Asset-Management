<?php
include 'connect.php';
 $title="Log Data Tenaga Medis";
?>
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Log Data Tenaga Medis</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example5" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="checkAll" required="">
										<label class="custom-control-label" for="checkAll"></label>
									</div>
								</th>
                                <th>TANGGAL MASUK</th>
                                <th>UID</th>
                                <th>NAMA TENAGA KESEHATAN</th>
                                <th>TANGGAL LAHIR</th>
                                <th>NIK</th>
                                <th>JENIS KELAMIN</th>
                                <th>ALAMAT</th>                                                              
                                <th>DIVISI</th>                                
                                <th>KONTAK</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
								$sql = "SELECT*FROM tb_logdata_tenagamedis";
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
									<div class="custom-control custom-checkbox ml-2">
										<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
										<label class="custom-control-label" for="customCheckBox2"></label>
                                    </div>
								</td>
                                <td><?php echo htmlentities($result->tanggal_masuk);?></td>    	
                                <td><?php echo htmlentities($result->rfid_uid);?></td>                            
                                <td><?php echo htmlentities($result->nama_tenaga_kesehatan);?></td>                            
                                <td><?php echo htmlentities($result->tanggal_lahir);?></td>                         
                                <td><?php echo htmlentities($result->nik);?></td>
                                <td><?php echo htmlentities($result->jenis_kelamin);?></td>     
                                <td><?php echo htmlentities($result->alamat);?></td>                                                                        
                                <td><?php echo htmlentities($result->divisi);?></td>                                 
                                <td><?php echo htmlentities($result->kontak);?></td>                            
                        <?php
                            }}
                        ?>
                           
                            
                   
                           
								<!-- <td>
									<span class="badge light badge-danger">
										<i class="fa fa-circle text-danger mr-1"></i>
										Pasien Baru
									</span>
								</td> -->
                                <td>
					    			<div class="dropdown ml-auto text-right">
						    			<div class="btn-link" data-toggle="dropdown">
							    			<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
										</div>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#">Accept Patient</a>
												<a class="dropdown-item" href="#">Reject Order</a>
								    			<a class="dropdown-item" href="#">View Details</a>
										</div>
									</div>
								</td>												
                            </tr>                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
