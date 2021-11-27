<?php 
    require_once("connect.php");
    if(!empty($_POST["uid_penanggungjawab"])) 
    {
        $uidPenanggungjawab= strtoupper($_POST["uid_penanggungjawab"]);
        $sql ="SELECT nama_karyawan FROM tb_karyawan WHERE kode_rfid=:uid_penanggungjawab";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_penanggungjawab', $uidPenanggungjawab, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {

?>
            <b>Nama Karyawan :</b><?php
                    echo htmlentities($result->nama_karyawan);
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
