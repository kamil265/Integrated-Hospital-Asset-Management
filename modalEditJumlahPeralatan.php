<?php 
    include'connect.php';
    $idpas=$_GET['id'];
	$sql = "SELECT*from jumlah_inventory WHERE id=$idpas";
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
            <h3 class="modal-title">Edit Jumlah Peralatan Medis</h3>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
    <div class="modal-body">
        <form action="editJumlahPeralatan.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
            <div>                    
                <section>
                    <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">RFID UID</label>
                                    <div class="input-group mb-3">
                                         <input type="text" name="pkode_rfid" id="get_uid" value="<?php echo htmlentities($result->kode_rfid);?>" class="form-control" required>                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                            <div class="form-group">
                                    <label class="text-label">NAMA ASET</label>
                                    <input type="text" name="pnama_aset" value="<?php echo htmlentities($result->nama_aset);?>" class="form-control"  required>
                            </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">JUMLAH</label>
                                    <input type="text" name="pjumlah" value="<?php echo htmlentities($result->jumlah);?>" class="form-control"  required>
                                </div>
                            </div>
                           
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">TEMPAT</label>
                                    <input type="text" name="ptempat" value="<?php echo htmlentities($result->tempat);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">TERPAKAI</label>
                                    <input type="text" name="pterpakai" value="<?php echo htmlentities($result->terpakai);?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="text-label">TERSEDIA</label>
                                    <input type="text" name="ptersedia" value="<?php echo htmlentities($result->tersedia);?>" class="form-control" required>
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
                    <button type="submit" name="updateInventory" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>            
     </div>
</div>
<?php }} ?>
    