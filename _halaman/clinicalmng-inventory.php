<?php
 $title="Clinical Management - Inventory";
?>
<script src="<?=templates()?>js/pindah-aset.js"></script>


<div class="modal fade modal-tambah-aset" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addInventory.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">RFID UID</label>
                                    <input type="text" name="uid_aset" class="form-control" required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NAMA ASET</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">KATEGORI</label>
                                    <select class="form-control" name="kategoriaset">
                                        <option>Pilih Kategori</option>
										<?php 
											$status=1;
											$sql = "SELECT * from  tb_catinventory";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
												foreach($results as $result)
												{               
										?>  
                                        <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->category_name);?></option>
 										<?php 
												}
											} 
										?> 
                                    </select>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">LOKASI PENYIMPANAN ASET</label>
                                    <input type="text" name="penyimpanan_aset" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahAset" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>
<div class="modal fade modal-tambah-pengajuan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pengajuan Pengadaan Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addInventory.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NAMA BARANG</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">MERK</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">TIPE</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">TUJUAN PEMBELIAN</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">PENANGGUNGJAWAB</label>
                                    <input type="text" name="nama_aset" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahAset" class="btn btn-primary">Ajukan</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>
<div class="modal fade modal-tambah-kategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Kategori Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="addCategory.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Kategori</label>
                                    <input type="text" name="kategori_aset" class="form-control" required>
                                </div>
                            </div>
							<!-- <div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Status</label>
                                    <select class="form-control" name="status_kategoriaset">
                                        <option>Pilih Status</option>
                                        <option name="status" id="status" value="1" >Aktif</option>
                                        <option name="status" id="status" value="0" >Non-Aktif</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="tambahKategori" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>
<div class="modal fade modal-pindah-aset" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Peminjaman Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="peminjamanAsset.php" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID PENANGGUNGJAWAB</label>
                                    <input type="text" name="uid_penanggungjawab" id="uid_penanggungjawab" class="form-control" onBlur="getUser()" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <span id="get_user_name" style="font-size:16px; "></span> 
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">RFID UID</label>
                                    <input type="text" name="uid_pinjamaset" id="uid_pinjamaset" class="form-control" onBlur="getAsset()" required>
                                </div>
                                <div class="form-group">
                                    <span id="get_asset_name" style="font-size:16px;"></span> 
                                </div>
                            </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="pindahAset" class="btn btn-primary">Pindah Aset</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
</div>
<div id="modalEditCategory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditAsset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="modalEditPeminjaman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div class="container-fluid">
	<div class="row">
	    <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-medkit"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Jumlah Aset</p>
                            <?php 
                                $sql ="SELECT id from tb_inventory ";
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
							<i class="fas fa-cubes"></i>
			            </span>
                        <div class="media-body">
                            <p class="mb-1">Jumlah Kategori</p>
                            <?php 
                                $sql ="SELECT id from tb_catinventory ";
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
							<i class="fas fa-people-carry"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Aset Terpakai</p>
                            <?php 
                                $sql ="SELECT id from tb_pinjaminventory WHERE status_pengembalian='0' ";
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
					<a href="" data-toggle="modal" data-target=".modal-pindah-aset">
						<div class="card-body p-3">
                    		<div class="media ai-icon">
                       			<!-- <span class="mr-3 bgl-warning text-info">
                            		<i class="fas fa-procedures"></i>
                        		</span> -->
                        		<div class="media-body text-white">
                            		<p class="mb-1">Peminjaman Aset</p>
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
					<a href="" data-toggle="modal" data-target=".modal-tambah-pengajuan">
						<div class="card-body p-3 ">
                    		<div class="media ai-icon ">
                       			<!-- <span class="mr-3 bgl-warning text-info">
                            		<i class="fas fa-procedures"></i>
                        		</span> -->
                        		<div class="media-body text-white">
                            		<p class="mb-1">Pengadaan Aset</p>
                            		<!-- <h4 class="mb-0">250</h4> -->
                            <!-- <span class="badge badge-warning">+250</span> -->
                        		</div>
                    		</div>
                		</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-sm-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Aset</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-aset">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                	<th>No</th>    
									<th>TAG ID</th>
                                    <th>Nama Alat</th>
									<th>Kategori</th>
                                    <th>Lokasi</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
								$sql = "SELECT tb_inventory.id,tb_inventory.kode_rfid,tb_inventory.nama_aset,tb_catinventory.category_name,tb_inventory.lokasi_penyimpanan,tb_inventory.id as assetid from  tb_inventory join tb_catinventory on tb_catinventory.id=tb_inventory.kategori";
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
									<td><?php echo htmlentities($result->category_name);?></td>
									<td><?php echo htmlentities($result->lokasi_penyimpanan);?></td>
                                    <td>
										<div class="d-flex">
                                            <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditasset" ><i class="fa fa-pencil" ></i></a>
											<a href="deleteAsset.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
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
		<div class="col-xl-6 col-lg-6 col-sm-12">
        	<div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kategori Aset</h4>
					<span>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-tambah-kategori">Tambah</button>
					</span>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
									<th>NO</th>
                                    <th>KATEGORI</th>
                                    <th>STATUS TERAKHIR</th>
									<th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php 
									$sql = "SELECT * from  tb_catinventory";
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
                                    <td><?php echo htmlentities($result->category_name);?></td>
                                    <td><?php echo htmlentities($result->creation_date);?></td>
									<td>
										<div class="d-flex">
											<a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditcat" ><i class="fa fa-pencil" ></i></a>
											<a href="deleteCategory.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										</div>												
									</td>			
                                </tr>
								<?php $cnt=$cnt+1;}}?>                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" >
		    <div class="card" id="aset-terpakai">
                <div class="card-header">
                    <h4 class="card-title">Aset terpakai</h4>
            	</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 100px">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>RFID UID</th>
                                    <th>NAMA ALAT</th>
									<th>KATEGORI</th>
                                    <th>PENANGGUNGJAWAB</th>
                                    <th>TANGGAL PEMINJAMAN</th>
                                    <th>TANGGAL KEMBALI</th>
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
                                    <td>
                                        <?php 
                                            if($result->tgl_kembali=="")
                                            {
                                                echo htmlentities("Belum Dikembalikan");
                                            } 
                                            else 
                                            {
                                                echo htmlentities($result->tgl_kembali);
                                            }
                                        ?>
                                    </td>	
                                    <td>
                                    <div class="d-flex">
											<a href="#" id="<?php echo htmlentities ($result->rid); ?>" class="btn btn-success shadow btn-xs openmodaleditpinjam" >Edit</a>
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
</div>
