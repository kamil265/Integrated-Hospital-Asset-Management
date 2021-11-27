<?php  
   require_once('connect.php');

   	 
   	if(!empty($_POST['create'])){
   		$kode_rfid = $_POST['rfid_uid'];
   		$tanggal_masuk = $_POST['timestamp'];
   		$nama_perawat = $_POST['nama_perawat'];
   		$jenis_kelamin = $_POST['jenis_kelamin'];
		$nik = $_POST['nik_perawat'];
   		$alamat = $_POST['alamat'];
   		$id = $_POST['id'];
		
   		$data[] = $kode_rfid;
   		$data[] = $tanggal_masuk;
   		$data[] = $nama_perawat;
   		$data[] = $jenis_kelamin;
		$data[] = $nik;
   		$data[] = $alamat;
   		$data[] = $id;
	
		
   		$sql = "UPDATE `tb_perawat` SET rfid_uid=?,timestamp=?,nama_perawat=?,jenis_kelamin=?,nik_perawat=?,alamat=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=tenagamedis-perawat"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `tb_perawat` WHERE id= ?";
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
   							 <label>Kode RFID</label>
   							 <input type="text" value="<?php echo $result['rfid_uid'];?>" class="form-control" name="kode_rfid">
   						 </div>
   						 <div class="form-group">
   							 <label>Tanggal Masuk</label>
   							 <input type="text" value="<?php echo $result['timestamp'];?>" class="form-control" name="tanggal_masuk">
   						 </div>
   						 <div class="form-group">
   							 <label>Nama Perawat</label>
   							 <input type="text" value="<?php echo $result['nama_perawat'];?>" class="form-control" name="nama_perawat">
   						 </div>
   						 <div class="form-group">
   							 <label>Jenis Kelamin</label>
   							 <input type="text" value="<?php echo $result['jenis_kelamin'];?>" class="form-control" name="jenis_kelamin">
   						 </div>
   						 <div class="form-group">
   							 <label>NIK</label>
   							 <input type="date/time" value="<?php echo $result['nik_perawat'];?>" class="form-control" name="nik">
   						 </div>
   						 <div class="form-group">
   							 <label>Alamat</label>
   							 <input type="text" value="<?php echo $result['alamat'];?>" class="form-control" name="alamat">
   						 </div>
   						 <input type="hidden" value="<?php echo $result['id'];?>" name="id">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>