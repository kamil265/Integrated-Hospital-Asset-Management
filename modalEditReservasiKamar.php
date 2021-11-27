<?php 
    include'connect.php';
    $idsc=$_GET['id'];
	$sql = "SELECT*from tb_reservasikamar WHERE id=$idsc";
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
                <h3 class="modal-title" id="myModalLabel" >Edit Reservasi Kamar</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <form action="editReservasiKamar.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Pasien</label>
                                    <input type="text" name="uid_reservasikamar" id="uid_reservasikamar" disabled value="<?php echo htmlentities($result->pasien_id);?>" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_reservasikamar" style="font-size:16px;"></span> 
                                </div>
                            </div>
							<!-- <div class="col-12">
								<div class="form-group">
                                	<label>Hari Praktik</label>
                                    <select class="form-control" id="sel2" name="hari_praktik">
                                        <option>Senin</option>
                                        <option>Selasa</option>
                                        <option>Rabu</option>
                                        <option>Kamis</option>
                                        <option>Jumat</option>
										<option>Sabtu</option>
                                        <option>Minggu</option>
                                    </select>
                                </div>
							</div> -->
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Jenis Kamar</label>
                                    <input type="text" name="jenis_kamar" id="jenis_kamar" disabled value="<?php echo htmlentities($result->jenis_kamar);?>" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_reservasikamar" style="font-size:16px;"></span> 
                                </div>
                            </div>
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Kelas Kamar</label>
                                    <input type="text" name="kelas_kamar" id="kelas_kamar" disabled value="<?php echo htmlentities($result->kelas_kamar);?>" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_reservasikamar" style="font-size:16px;"></span> 
                                </div>
                            </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updateReservasiKamar" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        </div>
    </div>

<?php $cnt=$cnt+1; }}?>