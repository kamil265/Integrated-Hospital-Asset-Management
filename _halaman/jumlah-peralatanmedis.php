<?php
    $title="Jumlah Peralatan Medis";
?>

<div id="modalEditJumlahPeralatan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div class="container-fluid">
    <div class="col-12">
		    <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Jumlah Peralatan Medis</h4>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>RFID UID</th>
                                    <th>NAMA ALAT</th>
									<th>JUMLAH</th>
                                    <th>TEMPAT</th>
                                    <th>TERPAKAI</th>
                                    <th>TERSEDIA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									$sql = "SELECT * FROM jumlah_inventory";
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
                                    <td><?php echo htmlentities($result->nama_aset);?></td>
                                    <td><?php echo htmlentities($result->jumlah);?></td>
                                    <td><?php echo htmlentities($result->tempat);?></td>
                                    <td><?php echo htmlentities($result->terpakai);?></td>
                                    <td><?php echo htmlentities($result->tersedia);?></td>	
                                    <td>
                                    <div class="d-flex">                                      
                                       
                                        <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditjumlahperalatan" ><i class="fa fa-pencil" ></i></a>
										<a href="hapus-jumlahinventory.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
									</div>                              
                            
                                  							
                                    </td>				
                                </tr>
                                <?php $cnt=$cnt+1; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
