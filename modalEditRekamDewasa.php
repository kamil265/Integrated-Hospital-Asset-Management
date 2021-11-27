<?php 
    include'connect.php';
    $idpas=$_GET['id'];
	$sql = "SELECT*from rekammedis WHERE kategori_pasien='Dewasa' AND id=$idpas";
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
            <h3 class="modal-title">Edit REKAM MEDIS - DEWASA</h3>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
    <div class="modal-body">
        <form action="editRekamDewasa.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
            <div>                    
                <section>
                    <div class="row">
                            
                            <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                    <label class="text-label">KODE RFID</label>
                                    <input type="text" name="kode_rfid" value="<?php echo htmlentities($result->kode_rfid);?>" class="form-control"  required>
                            </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">NAMA</label>
                                    <input type="text" name="nama" value="<?php echo htmlentities($result->nama);?>" class="form-control"  required>
                                </div>
                            </div>
                           
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">POLI</label>
                                    <input type="text" name="poli" value="<?php echo htmlentities($result->poli);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">USIA</label>
                                    <input type="text" name="usia" value="<?php echo htmlentities($result->usia);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">DIAGNOSA</label>
                                    <input type="text" name="diagnosa" value="<?php echo htmlentities($result->diagnosa);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">GOLONGAN DARAH</label>
                                    <input type="text" name="gol_darah" value="<?php echo htmlentities($result->gol_darah);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">TB</label>
                                    <input type="text" name="tb" value="<?php echo htmlentities($result->tb);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">BB</label>
                                    <input type="text" name="bb" value="<?php echo htmlentities($result->bb);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">HASIL DIAGNOSA</label>
                                    <input type="text" name="hasil_diagnosa" value="<?php echo htmlentities($result->hasil_diagnosa);?>" class="form-control" required>
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
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updateDewasa" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>            
     </div>
</div>
<?php }} ?>
    