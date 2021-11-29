<?php 
    include'connect.php';
    if(!empty($_POST["nama_dokter"])) 
    {
        $uidJadwalDokter= ($_POST["nama_dokter"]);
        $sql ="SELECT rfid_uid, spesialis FROM tb_dokter WHERE nama_dokter=:nama_dokter";
        if($stmt = $dbh->prepare($sql))
        {
            $stmt-> bindParam(':nama_dokter', $uidJadwalDokter, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
            header("content-type:application/json");

     
            echo json_encode($data);
            exit;

        }
    }
?>