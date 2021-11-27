<!-- ------------------KARYAWAN---------------- -->

<?php 
    include'connect.php';
    $idsc=$_GET['id'];
	$sql = "SELECT*from tb_jadwalkaryawan WHERE id=$idsc";
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
                <h3 class="modal-title" id="myModalLabel" >Edit Jadwal Karyawan</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
        <form action="editJadwalKaryawan.php?id=<?php echo htmlentities($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Karyawan</label>
                                    <input type="text" name="uid_jadwalkar" id="uid_jadwalkar" disabled value="<?php echo htmlentities($result->karyawan_id);?>" class="form-control" readonly>
                                </div>
								<div class="form-group">
                                    <span id="get_data_karyawan" style="font-size:16px;"></span> 
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
							<div class="col-lg-6 mb-4">
                                <label>Jam Mulai Kerja</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="time" name="jam_mulai" class="form-control" value="<?php echo htmlentities($result->jam_mulai);?>"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
							<div class="col-lg-6 mb-4">
                                <label>Jam Selesai Kerja</label>
                                <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                    <input type="time" name="jam_selesai" class="form-control" value="<?php echo htmlentities($result->jam_selesai);?>"> <span class="input-group-append"><span class="input-group-text"><iclass="fa fa-clock-o"></i></span></span>
                                </div>
                        	</div>
						</div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updateJadwalKaryawan" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        </div>
    </div>

<?php $cnt=$cnt+1; }}?>