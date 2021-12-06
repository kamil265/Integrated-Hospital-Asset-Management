<?php 
    require_once("connect.php");
    if(!empty($_POST["valPj"])) 
    {
        $uidPenanggungjawab= ($_POST["valPj"]);
        $sql ="SELECT nama_karyawan, divisi_karyawan FROM tb_karyawan WHERE kode_rfid=:uid_penanggungjawab";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':uid_penanggungjawab', $uidPenanggungjawab, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query -> rowCount() > 0)
        {
            foreach ($results as $result) {
                ?>
                    <label>Nama Karyawan</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->nama_karyawan);?>" readonly required>  <br>  
                    <label>Divisi</label><br>
                    <input type="text" class="form-control" value="<?php echo htmlentities($result->divisi_karyawan);?> " readonly required>  <br>   
                    <hr>            
                    
                    <?php
                    echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
        else
        {
            echo "<span style='color:red'> UID Tidak Terdaftar .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
?>
