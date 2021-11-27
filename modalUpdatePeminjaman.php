<?php 
    include'connect.php';
    $id=$_GET['id'];
	$sql = "SELECT*from view_peminjaman where rid=$id";
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
                <h3 class="modal-title">Edit Data Peminjaman Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="updatePeminjaman.php?rid=<?php echo htmlentities ($result->rid);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID Aset</label>
                                    <input type="text" name="uid_pinjamaset" class="form-control" value="<?php echo htmlentities($result->kode_rfid);?>" readonly required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Nama Aset</label>
                                    <input type="text" name="nama_pinjamaset" class="form-control" value="<?php echo htmlentities($result->nama_aset);?>" readonly required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Kategori</label>
                                    <select class="form-control" name="kategori_pinjamaset" >
                                        <option value="<?php echo htmlentities($result->rid);?>"> <?php echo htmlentities($catname=$result->kategori);?></option> 
                                    </select>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Penanggungjawab</label>
                                    <input type="text" name="pj_pinjamaset" class="form-control" value="<?php echo htmlentities($result->nama_karyawan);?>" readonly required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <?php if($result->tgl_kembali==0){?>
                    <button type="submit" name="return" class="btn btn-primary">Kembalikan</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
    <?php $cnt=$cnt+1;}}}?>