<?php
 $title="Rekam Medis";
?>
<div id="modalEditRekamBayi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditRekamAnak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditRekamDewasa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<div class="container-fluid">
<div class="row">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rekam Medis</h5>
        <i class="fas fa-times"data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <div class="col-lg-15">
                    <label> Tag ID </label>
                    <Input type="text" name="tag_id" class="form-control input-default">
                    </div>
                </div>
                <div class="form-group">
                    <label> Tanggal Masuk </label>
                    <Input type="text" name="tanggal_masuk" class="form-control input-default">
                </div>
                <div class="form-group ">
                    <div class="col-lg-15">
                        <label class="text-label">Jenis Pasien</label>
                        <select class="form-control" name="jenis_pasien">
                            <option>Pilih Jenis Pasien</option>
                            <option>Dewasa</option>
                            <option>Anak</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label> Nama Pasien </label>
                    <Input type="text" name="nama_pasien" class="form-control input-default">
                </div>
                <div class="form-group">
                    <label> Dokter </label>
                    <Input type="text" name="dokter" class="form-control input-default">
                </div>
                <div class="form-group">
                    <label> Diagnosa </label>
                    <Input type="text" name="diagnosa" class="form-control input-default">
                </div>
                <div class="form-group">
                    <label> Status </label>
                    <Input type="text" name="status" class="form-control input-default">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" value="Simpan" class="btn btn-primary" name="input">Simpan</button>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>

                     
<!------------------------------ Batas Akhir Modal ----------------------------->        

    <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
        <div class="card" id="log-data-pasien">
            <div class="card-header">
                <h4 class="card-title">Rekam Medis</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-baby mr-2"></i> Bayi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-child mr-2"></i> Anak-Anak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contact"><i class="la la-user mr-2"></i> Dewasa</a>
                        </li>
                    </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="pt-4">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>kode rfid</th>
                                            <th>Nama</th>
                                            <th>Poli</th>
                                            <th>Usia</th>
                                            <th>Diagnosa</th>
                                            <th>Gol Darah</th>
                                            <th>TB</th>
                                            <th>BB</th>
                                            <th>Hasil Diagnosa</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
								            $sql = "SELECT*FROM rekammedis WHERE kategori_pasien='Bayi'";
								            $query = $dbh  -> prepare($sql);
								            $query->execute();
								            $results=$query->fetchAll(PDO::FETCH_OBJ);
								            $cnt=1;
								            if($query->rowCount() > 0)
								            {
									            foreach($results as $result)
									        {               
						                ?>  
                                        <tr>
                                            <td><?php echo htmlentities($result->tanggal_masuk);?></td>                            
                                            <td><?php echo htmlentities($result->kode_rfid);?></td>                            
                                            <td><?php echo htmlentities($result->nama);?></td> 
                                            <td><?php echo htmlentities($result->poli);?></td>                           
                                            <td><?php echo htmlentities($result->usia);?></td> 
                                            <td><?php echo htmlentities($result->diagnosa);?></td>         
                                            <td><?php echo htmlentities($result->gol_darah);?></td> 
                                            <td><?php echo htmlentities($result->tb);?></td> 
                                            <td><?php echo htmlentities($result->bb);?></td>
                                            <td><?php echo htmlentities($result->hasil_diagnosa);?></td> 
                                            <td>
                                                <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditrekambayi" ><i class="fa fa-pencil" ></i></a>                                                
                                                <a href="deletepasienbayi_rekammedis.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
											</td>                            
                                        <?php
                                            }}
                                        ?>												
                                        </tr>                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="pt-4">
                        <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>kode rfid</th>
                                            <th>Nama</th>
                                            <th>Poli</th>
                                            <th>Usia</th>
                                            <th>Diagnosa</th>
                                            <th>Gol Darah</th>
                                            <th>TB</th>
                                            <th>BB</th>
                                            <th>Hasil Diagnosa</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
								            $sql = "SELECT*FROM rekammedis WHERE kategori_pasien='Anak'";
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
                                            <td><?php echo htmlentities($result->tanggal_masuk);?></td>                            
                                            <td><?php echo htmlentities($result->kode_rfid);?></td>                            
                                            <td><?php echo htmlentities($result->nama);?></td> 
                                            <td><?php echo htmlentities($result->poli);?></td>                           
                                            <td><?php echo htmlentities($result->usia);?></td> 
                                            <td><?php echo htmlentities($result->diagnosa);?></td>         
                                            <td><?php echo htmlentities($result->gol_darah);?></td> 
                                            <td><?php echo htmlentities($result->tb);?></td> 
                                            <td><?php echo htmlentities($result->bb);?></td>
                                            <td><?php echo htmlentities($result->hasil_diagnosa);?></td> 
                                            <td>                                                                                     
                                            <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditrekamanak" ><i class="fa fa-pencil" ></i></a>                                                
                                            <a href="deletepasienanak_rekammedis.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
											
											</td>                           
                                        <?php
                                            }}
                                        ?>												
                                        </tr>                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact">
                        <div class="pt-4">
                        <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>kode rfid</th>
                                            <th>Nama</th>
                                            <th>Poli</th>
                                            <th>Usia</th>
                                            <th>Diagnosa</th>
                                            <th>Gol Darah</th>
                                            <th>TB</th>
                                            <th>BB</th>
                                            <th>Hasil Diagnosa</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
								            $sql = "SELECT*FROM rekammedis WHERE kategori_pasien='Dewasa'";
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
                                            <td><?php echo htmlentities($result->tanggal_masuk);?></td>                            
                                            <td><?php echo htmlentities($result->kode_rfid);?></td>                            
                                            <td><?php echo htmlentities($result->nama);?></td> 
                                            <td><?php echo htmlentities($result->poli);?></td>                           
                                            <td><?php echo htmlentities($result->usia);?></td> 
                                            <td><?php echo htmlentities($result->diagnosa);?></td>         
                                            <td><?php echo htmlentities($result->gol_darah);?></td> 
                                            <td><?php echo htmlentities($result->tb);?></td> 
                                            <td><?php echo htmlentities($result->bb);?></td>
                                            <td><?php echo htmlentities($result->hasil_diagnosa);?></td> 
                                            <td>                                                                                                
                                                <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditrekamdewasa" ><i class="fa fa-pencil" ></i></a>                                                
                                                <a href="deletepasiendewasa_rekammedis.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										
                                            </td>                          
                                        <?php
                                            }}
                                        ?>												
                                        </tr>                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--**********************************
            Dropdown Button
        ***********************************-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
