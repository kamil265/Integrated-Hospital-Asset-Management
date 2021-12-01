<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_jadwalkar"])) 
    {
        $uidJadwalKaryawan= strtoupper($_POST["uid_jadwalkar"]);
        $sql ="SELECT nama_karyawan, divisi_karyawan FROM tb_karyawan WHERE kode_rfid=:uid_jadwalkar";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_jadwalkar', $uidJadwalKaryawan, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <input type="hidden" name="uid_jadwaldok" class="form-control" value="<?php echo htmlentities($result->rfid_uid);?>" required>  <br>  
                    <label>Divisi</label><br>
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
