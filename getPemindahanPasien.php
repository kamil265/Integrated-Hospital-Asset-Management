<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_pemindahanpasien"])) 
    {
        $uidPemindahanPasien= ($_POST["uid_pemindahanpasien"]);
        $sql ="SELECT kode_rfid, nama, nik, diagnosa FROM tb_pasien WHERE kode_rfid=:uid_pemindahanpasien AND status=1";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_pemindahanpasien', $uidPemindahanPasien, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <input type="text" name="uid_pemindahanpasien" class="form-control" value="<?php echo htmlentities($result->kode_rfid);?>" required>  <br>  
                    <label>Nama Pasien</label><br>
                    <input type="text" name="nama" class="form-control" value="<?php echo htmlentities($result->nama);?> " readonly required>  <br> 
                    <label>Diagnosa</label><br>
                    <input type="text" name="diagnosa" class="form-control" value="<?php echo htmlentities($result->diagnosa);?> " readonly required>  <br>   
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