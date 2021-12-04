<?php 
    require_once("connect.php");
    if(!empty($_POST["nama_aset"])) 
    {
        $uidPinjamAsset=$_POST["nama_aset"];
        $sql ="SELECT kode_rfid,id,kategori,lokasi_penyimpanan FROM tb_inventory WHERE nama_aset=:nama_aset";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':nama_aset', $uidPinjamAsset, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <!-- <label>RFID UID</label><br> -->
                    <input type="hidden" name="uid_pinjamaset" class="form-control" value="<?php echo htmlentities($result->kode_rfid);?>" required>  <br>  
                    <label>Lokasi Penyimpanan</label><br>
                    <input type="text" name="lok_aset" class="form-control" value="<?php echo htmlentities($result->lokasi_penyimpanan);?> " readonly required>  <br>   
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
