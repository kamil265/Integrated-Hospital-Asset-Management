<?php 
    include'connect.php';
    $idEdit=$_GET['id'];
	$sql = "SELECT tb_inventory.id,tb_inventory.kode_rfid,tb_inventory.nama_aset,tb_catinventory.category_name,tb_inventory.lokasi_penyimpanan,tb_catinventory.id as assetid from  tb_inventory join tb_catinventory on tb_catinventory.id=tb_inventory.kategori WHERE tb_inventory.id=$idEdit";
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
                <h3 class="modal-title">Edit Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="editAsset.php?assetid=<?php echo htmlentities ($result->id);?>" method="POST"  class="step-form-horizontal">
                <div>                    
                    <section>
                        <div class="row">
                        	<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">UID</label>
                                    <input type="text" name="uid_aset_edit" class="form-control" value="<?php echo htmlentities($result->kode_rfid);?>" required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Nama Aset</label>
                                    <input type="text" name="nama_aset_edit" class="form-control" value="<?php echo htmlentities($result->nama_aset);?>" required>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group ">
                                    <label class="text-label">Kategori</label>
                                    <select class="form-control" name="kategori_aset_edit">
                                        <option value="<?php echo htmlentities($result->assetid);?>"> <?php echo htmlentities($catname=$result->category_name);?></option>
                                        <?php 
                                            $status=1;
                                            $sql1 = "SELECT * from  tb_catinventory ";
                                            $query1 = $dbh -> prepare($sql1);
                                            $query1->execute();
                                            $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                                            if($query1->rowCount() > 0)
                                            {
                                                foreach($resultss as $row)
                                                {           
                                                    if($catname==$row->category_name)
                                                    {
                                                        continue;
                                                    }
                                                    else
                                                    {
                                        ?>  
                                                        <option value="<?php echo htmlentities($row->id);?>"><?php echo htmlentities($row->category_name);?></option>
                                        <?php }}} ?> 
                                    </select>
                                </div>
                            </div>
							<div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Lokasi Penyimpanan Aset</label>
                                    <input type="text" name="penyimpanan_aset_edit" class="form-control" value="<?php echo htmlentities($result->lokasi_penyimpanan);?>" required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="updateAset" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
    <?php $cnt=$cnt+1;}}?>