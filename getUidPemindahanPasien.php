<?php 
    include'connect.php';
     $sql = "SELECT * FROM tb_registrasi order by id desc LIMIT 1";
     if($stmt = $dbh->prepare($sql))
     {
         $stmt->execute();
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
         header("content-type:application/json");

     
         echo json_encode($data);

     }  
?>