<?php 
    include'connect.php';
    $idEdit=$_GET['id'];
	$sql = "SELECT * from  tb_catinventory WHERE id=$idEdit";
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
                <h3 class="modal-title" id="myModalLabel" >Edit Kategori Aset</h3>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="editCategory.php?catid=<?php echo htmlentities ($result->id);?>" method="POST">
                <div>                    
                    <section>
                        <div class="row">
                        <div class="col-lg-12 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Kategori</label>
                                    <input type="text" name="kategori_aset"  class="form-control" value="<?php echo htmlentities($result->category_name);?>" required>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php $cnt=$cnt+1; }}?>