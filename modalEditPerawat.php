<?php 
    include'connect.php';
    $idpas=$_GET['id'];
	$sql = "SELECT*from tb_perawat WHERE id=$idpas";
	$query = $dbh -> prepare($sql);
	$query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
    if($query->rowCount() > 0)
	{
		foreach($results as $result)
	{               
?>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Data Perawat</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="editPerawat.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        <div class="col-lg-12 mb-2">
                        <!-- <div class="input-group mb-3">
                                            <input type="text" class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">Button</button>
                                            </div>
                                        </div> -->
                                <div class="form-group">
                                    <label class="text-label">UID</label>
                                    <div class="input-group mb-3">
                                    <input type="text" name="perawat_uid" id="get_uid" value="<?php echo htmlentities($result->rfid_uid);?>" class="form-control" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="getRecords">Scan</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NIK Perawat</label>
                                    <input type="text" name="perawat_nik" value="<?php echo htmlentities($result->nik_perawat);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Nama Perawat</label>
                                    <input type="text" name="perawat_nama" value="<?php echo htmlentities($result->nama_perawat);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Jenis Kelamin</label>
                                    <select class="form-control" name="perawat_jk">
                                    <option value="Pria"<?php if($result->jenis_kelamin == 'Pria') { ?> selected="selected"<?php } ?>>Pria</option>
                                        <option value="Wanita"<?php if($result->jenis_kelamin == 'Wanita') { ?> selected="selected"<?php } ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">Alamat</label>
                                    <input type="text" name="perawat_alamat" value="<?php echo htmlentities($result->alamat);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">Kontak</label>
                                    <input type="text" name="perawat_kontak" value="<?php echo htmlentities($result->kontak_perawat);?>" class="form-control" required>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12 mb-2">
                                <label>Tanggal Mulai Aktif</label>
                                <input type="text" name="dr_tanggal" class="form-control" id="mdate" required>
                            </div> -->
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Edit</button>
                    <button type="submit" name="updatePerawat" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
<?php }} ?>