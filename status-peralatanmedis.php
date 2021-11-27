<?php
    $title="Status Peralatan Medis";
?>
<div class="container-fluid">
    <div class="col-12">
		    <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Status Peralatan Medis</h4>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>RFID UID</th>
                                    <th>NAMA ALAT</th>
									<th>KATEGORI</th>
                                    <th>PENANGGUNGJAWAB</th>
                                    <th>TANGGAL PEMINJAMAN</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									$sql = "SELECT * FROM view_peminjaman";
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
                                    <td><?php echo htmlentities($result->kategori);?></td>
                                    <td><?php echo htmlentities($result->nama_karyawan);?></td>
                                    <td><?php echo htmlentities($result->tgl_pinjam);?></td>
                                    <td><?php echo htmlentities($result->status);?></td>	
                                    <td>
                                    <div class="d-flex">
											<a href="proses-editstatusinventory.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditcat" ><i class="fa fa-pencil" ></i></a>
                                            <a href="hapus-statusinventory.php?id=<?php echo htmlentities($result->id);?>"  class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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