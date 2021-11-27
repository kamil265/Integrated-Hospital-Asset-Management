<?php
 $title="Data Pasien Anak";
 require_once 'connect.php';
?> 
<div id="modalEditPasien" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUDUL NIH</title>
    <script scr="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
   
<form id="loginform" class="form-signin" action="barcode.php" method="post">
<input type="text" value="" name="barcode">
<p></p>
</form>


<?php
$user2 = $_POST['barcode'];
include('config.php');
$sql = "SELECT * FROM barcode";
$query = $conn->query($sql) or die (mysqli_error($conn));
while($data = mysqli_fetch_array($query)){
echo "Selamat Datang, ";
echo "<br>";
echo "<td>" .$data['date']. "</td>";
}
?>

</body>
</html>





























   <!--**********************************
            Data Pasien Bayi
        ***********************************-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Pasien Anak</h4>
            </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;" ><strong>No</strong></th>
                                                <th><strong>KODE RFID</strong></th>
                                                <th><strong>Tanggal Masuk</strong></th>
                                                <th><strong>Nama</strong></th>
                                                <th><strong>Penanggung Jawab</strong></th>
                                                <th><strong>NIK</strong></th>
                                                <th><strong>Tanggal Lahir</strong></th>
                                                <th><strong>Alamat</strong></th>
                                                <th><strong>Diagnosa</strong></th>
                                                <th><strong>Dokter Penanggung Jawab</strong></th>
                                                <th><strong>Status Pasien</strong></th>
                                                <th></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
									$sql = "SELECT * from tb_pasien WHERE kategori_pasien='Anak'";
									$row = $dbh -> prepare($sql);
									$row->execute();
									$results=$row->fetchAll(PDO::FETCH_OBJ);
									$cnt=1;
									if($row->rowCount() > 0)
									{
										foreach($results as $result)
									{               
								?>

                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo htmlentities($result->kode_rfid);?></td>
                                                <td><?php echo htmlentities($result->tanggal_masuk);?></td>
                                                <td><?php echo htmlentities($result->nama);?></td>
                                                <td><?php echo htmlentities($result->penanggungjawab);?></td>
                                                <td><?php echo htmlentities($result->nik);?></td>
                                                <td><?php echo htmlentities($result->tanggal_lahir);?></td>
                                                <td><?php echo htmlentities($result->alamat);?></td>
                                                <td><?php echo htmlentities($result->diagnosa);?></td>
                                                <td><?php echo htmlentities($result->dokter_penanggungjawab);?></td>
                                                <td><?php echo htmlentities($result->status_pasien);?></td>
                                                <td>
										            <div class="d-flex">
                                                        <a href="#" id="<?php echo htmlentities ($result->id); ?>" class="btn btn-primary shadow btn-xs sharp mr-1 openmodaleditpasien" ><i class="fa fa-pencil" ></i></a>
											            <a href="deletePasAnak.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-trash"></i></a>
										            </div>												
									</td>	
                                            </tr>

                                            <?php $cnt++;}} ?>  

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


