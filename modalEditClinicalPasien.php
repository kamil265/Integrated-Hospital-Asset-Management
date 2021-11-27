<?php 
    include 'connect.php';
    $idpas = $_GET['id'];
	$sql = "SELECT * FROM tb_clinical_pasien WHERE id = $idpas";
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
                <h3 class="modal-title">Edit Data Pasien</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="updateclinicpasien.php?id=<?php echo htmlentities ($result->id);?>" method="POST" class="step-form-horizontal">
                <div>
                       <div class="row">
                        <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">RFID UID</label>
                                    <input type="text" name="clcrfid" value="<?php echo htmlentities($result->tag_id);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">TANGGAL MASUK</label>
                                    <input type="text" name="clctanggal" value="<?php echo htmlentities($result->tanggal_masuk);?>" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NAMA PASIEN</label>
                                    <input type="text" name="clcnama" value="<?php echo htmlentities($result->nama_pasien);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">KATEGORI PASIEN</label>
                                    <select class="form-control" name="clckategori" value="<?php echo htmlentities($result->jenis_pasien);?>" class="form-control" required>
                                        <option>Dewasa</option>
                                        <option>Anak</option>
                                        <option>Bayi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">ASAL RUANGAN</label>
                                    <input type="text" name="clcasalruang" value="<?php echo htmlentities($result->asal_ruang);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">RUANG PEMINDAHAN</label>
                                    <input type="text" name="clcruangutujuan" value="<?php echo htmlentities($result->ruang_pemindahan);?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">DIAGNOSA</label>
                                    <input type="text" name="clcdiagnosa" value="<?php echo htmlentities($result->diagnosa);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">STATUS</label>
                                    <input type="text" name="clcstatus" value="<?php echo htmlentities($result->status);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">DOKTER PENANGGUNG JAWAB</label>
                                    <input type="text" name="clcdokter" value="<?php echo htmlentities($result->dokter);?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="editclinicalpasien" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php }}?>