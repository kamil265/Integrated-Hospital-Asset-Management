<?php 
    require_once("connect.php");
    if(!empty($_POST["nama_dokter"])) 
    {
        $uidJadwalDokter= ($_POST["nama_dokter"]);
        $sql ="SELECT rfid_uid, spesialis FROM tb_dokter WHERE nama_dokter=:nama_dokter";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':nama_dokter', $uidJadwalDokter, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                echo htmlentities($result->rfid_uid);
            }
        }
        // else
        // {
        //     echo "<span style='color:red'> UID Tidak Valid .</span>";
        //     echo "<script>$('#submit').prop('disabled',true);</script>";
        // }
    }
?>
