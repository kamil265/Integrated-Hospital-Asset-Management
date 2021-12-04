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
                                    <th>NAMA ALAT</th>
									<th>JUMLAH</th>
                                    <th>TERPAKAI</th>
                                    <th>TERSEDIA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									$sql = "SELECT*FROM view_jumlahAsetNew;";
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
                                    <td><?php echo htmlentities($result->nama_aset);?></td>
                                    <td><?php echo htmlentities($result->total);?></td>
                                    <td><?php echo htmlentities($result->terpakai);?></td>
                                    <td><?php echo htmlentities($result->tersedia);?></td>
                                </tr>
                                <?php $cnt=$cnt+1; }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
