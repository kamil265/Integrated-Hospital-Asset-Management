<?php
 $title="Data Pasien Dewasa";
 require_once 'connect.php';
    ?> 

<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pasien Dewasa</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div class="form-group">
                            <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                            <th style="width:80px;" ><strong>No</strong></th>
                                                <th><strong>KODE RFID</strong></th>
                                                <th><strong>Tanggal Masuk</strong></th>
                                                <th><strong>Nama</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>Tanggal Lahir</strong></th>
                                                <th><strong>Alamat</strong></th>
                                                <th><strong>Diagnosa</strong></th>
                                                <th><strong>Dokter Penanggung Jawab</strong></th>
                                                <th><strong>Status Pasien</strong></th>
                                            <th></th>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from  tb_pasien WHERE kategori_pasien='Dewasa'";
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
                                                <td><?php echo htmlentities($result->nik);?></td>
                                                <td><?php echo htmlentities($result->tanggal_lahir);?></td>
                                                <td><?php echo htmlentities($result->alamat);?></td>
                                                <td><?php echo htmlentities($result->diagnosa);?></td>
                                                <td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
                                                <td><?php echo htmlentities($result->status_pasien);?></td>
                                                <td>
										            <div class="d-flex">
                                                        <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditasset" ><i class="fa fa-pencil" ></i></a>
											            <a href="deletePasDewasa.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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