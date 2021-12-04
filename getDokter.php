<?php 
    require_once("connect.php");
    if(!empty($_POST["nama_jadwaldok"])) 
    {
        $uidJadwalDokter= ($_POST["nama_jadwaldok"]);
        $sql ="SELECT rfid_uid,nama_dokter, spesialis FROM tb_dokter WHERE nama_dokter=:nama_jadwaldok";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':nama_jadwaldok', $uidJadwalDokter, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <input type="hidden" name="uid_jadwaldok" class="form-control" value="<?php echo htmlentities($result->rfid_uid);?>" required>  <br>  
                    <label>Spesialisasi</label><br>
                    <input type="text" name="spes_jadwaldok" class="form-control" value="<?php echo htmlentities($result->spesialis);?> " readonly required>  <br>   
                    <hr>            
                    
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
