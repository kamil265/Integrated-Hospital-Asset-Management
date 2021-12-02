<?php 
    include'connect.php';
    $idsc=$_GET['id'];
	$sql = "SELECT*from tb_pemindahanpasien WHERE id=$idsc";
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
                <h3 class="modal-title" id="myModalLabel" >Edit Pemindahan Pasien</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <form action="editPemindahanPasien.php?id=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID PASIEN</label>
                                    <input type="text" name="uid_pemindahanpasien" id="uid_pemindahanpasien" disabled value="<?php echo htmlentities($result->pasien_id);?>" class="form-control" required>
                                </div>
								<div class="form-group">
                                    <span id="get_data_pemindahanpasien" style="font-size:16px;"></span> 
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
                                <div class="form-group ">
                                    <label class="text-label">ASAL RUANG</label>
                                    <select class="form-control" name="asal_ruang" id="asal_ruang" value="<?php echo htmlentities($result->asal_ruang);?>" class="form-control" required>
                                        <option>Jenis 1</option>
                                        <option>Jenis 2</option>
                                        <option>Jenis 3</option>
                                        <option>Jenis 4</option>
                                        <option>Jenis 5</option>
										<option>Jenis 6</option>
                                        <option>Jenis 7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">RUANG PEMINDAHAN</label>
                                    <select class="form-control" name="ruang_pemindahan" id="ruang_pemindahan" value="<?php echo htmlentities($result->ruang_pemindahan);?>" class="form-control" required>
                                        <option>Kelas 1</option>
                                        <option>Kelas 2</option>
                                        <option>Kelas 3</option>
                                        <option>Kelas 4</option>
                                        <option>Kelas 5</option>
										<option>Kelas 6</option>
                                        <option>Kelas 7</option>
                                    </select>
                                </div>
                            </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updatePemindahanPasien" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        </div>
    </div>

<?php $cnt=$cnt+1; }}?>