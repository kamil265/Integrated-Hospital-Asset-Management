<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_jadwaldok"])) 
    {
        $uidJadwalDokter= ($_POST["uid_jadwaldok"]);
        $sql ="SELECT rfid_uid,nama_dokter, spesialis FROM tb_dokter WHERE nama_dokter=:uid_jadwaldok";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_jadwaldok', $uidJadwalDokter, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                <h6 class="mb-0">UID Dokter:  <?php echo htmlentities($result->rfid_uid);?> </h6><br>
                <h6 class="mb-0">Spesialis : <?php echo htmlentities($result->spesialis);?> </h6><br>
                    
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<span style='color:red'> UID Tidak Valid .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
