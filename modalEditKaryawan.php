<?php 
    include'connect.php';
    $idpas=$_GET['id'];
	$sql = "SELECT*from tb_karyawan WHERE id=$idpas";
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
                <h3 class="modal-title">Edit Data Karyawan</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="editKaryawan.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID</label>
                                    <div class="input-group mb-3">
                                    <input type="text" name="karyawan_uid" id="get_uid" value="<?php echo htmlentities($result->kode_rfid);?>" class="form-control" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="getRecords">Scan</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Nama Karyawan</label>
                                    <input type="text" name="karyawan_nama" value="<?php echo htmlentities($result->nama_karyawan);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NIK</label>
                                    <input type="text" name="karyawan_nik" value="<?php echo htmlentities($result->nik_karyawan);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Jenis Kelamin</label>
                                    <select class="form-control" name="karyawan_jk">
                                    <option value="Pria"<?php if($result->jenis_kelamin_karyawan == 'Pria') { ?> selected="selected"<?php } ?>>Pria</option>
                                        <option value="Wanita"<?php if($result->jenis_kelamin_karyawan == 'Wanita') { ?> selected="selected"<?php } ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">Alamat</label>
                                    <input type="text" name="karyawan_alamat" value="<?php echo htmlentities($result->alamat_karyawan);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">Divisi</label>
                                    <input type="text" name="karyawan_divisi" value="<?php echo htmlentities($result->divisi_karyawan);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">Kontak</label>
                                    <input type="text" name="karyawan_kontak" value="<?php echo htmlentities($result->kontak_karyawan);?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updateKaryawan" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
<?php }} ?>