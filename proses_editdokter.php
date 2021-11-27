<?php  
   require_once('connect.php');

   	 
   	if(!empty($_POST['create'])){
   		$rfid_uid = $_POST['rdid_uid'];   		
   		$nama_dokter = $_POST['nama_dokter'];
   		$nik_dokter = $_POST['nik_dokter'];		
   		$jenis_kelamin_dokter = $_POST['jenis_kelamin_dokter'];
        $alamat_dokter = $_POST['alamat_dokter'];
        $kontak_dokter = $_POST['kontak_dokter'];
        $spesialis = $_POST['spesialis'];
   		$id = $_POST['id'];
		
   		$data[] = $rfid_uid;
   		$data[] = $nama_dokter;
   		$data[] = $nik_dokter;
   		$data[] = $jenis_kelamin_dokter;
		$data[] = $alamat_dokter;
   		$data[] = $kontak_dokter;
        $data[] = $spesialis;
   		$data[] = $id;
	
		
   		$sql = "UPDATE `tb_dokter` SET rfid_uid=?,nama_dokter=?,nik_dokter=?,jenis_kelamin_dokter=?,alamat_dokter=?,kontak_dokter=?,spesialis=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=tenagamedis-dokter"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `tb_dokter` WHERE id= ?";
   	$row = $dbh->prepare($sql);
   	$row->execute(array($id));
   	$result = $row->fetch();
   ?>
   <!DOCTYPE HTML>
   <html>
   	<head>
   		<title>Edit - <?php echo $result['rfid_uid'];?></title>
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   	</head>
   	<body>
   		<div class="container">
   			 <br/>
   			 <h3>Edit - <?php echo $result['rfid_uid'];?></h3>
   			 <br/>
   			<div class="row">
   				 <div class="col-lg-6">
   					 <form action="" method="POST">
   						 <div class="form-group">
   							 <label>RFID UID</label>
   							 <input type="text" value="<?php echo $result['rfid_uid'];?>" class="form-control" name="kode_rfid">
   						 </div>
   						 
   						 <div class="form-group">
   							 <label>NAMA DOKTER</label>
   							 <input type="text" value="<?php echo $result['nama_dokter'];?>" class="form-control" name="nama_dokter">
   						 </div>
   						 <div class="form-group">
   							 <label>JENIS KELAMIN</label>
   							 <input type="text" value="<?php echo $result['jenis_kelamin_dokter'];?>" class="form-control" name="jenis_kelamin_dokter">
   						 </div>
   						 <div class="form-group">
   							 <label>NIK</label>
   							 <input type="date/time" value="<?php echo $result['nik_dokter'];?>" class="form-control" name="nik_dokter">
   						 </div>
   						 <div class="form-group">
   							 <label>ALAMAT</label>
   							 <input type="text" value="<?php echo $result['alamat_dokter'];?>" class="form-control" name="alamat_dokter">
   						 </div>
                         <div class="form-group">
   							 <label>KONTAK</label>
   							 <input type="text" value="<?php echo $result['kontak_dokter'];?>" class="form-control" name="kontak_dokter">
   						 </div>
                         <div class="form-group">
   							 <label>SPESIALIS</label>
   							 <input type="text" value="<?php echo $result['spesialis'];?>" class="form-control" name="spesialis">
   						 </div>
                    
                            
   						 <input type="hidden" value="<?php echo $result['id'];?>" name="id">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>