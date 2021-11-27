<?php  
   require_once('connect.php');

   	 
   	if(!empty($_POST['UID'])){
   		$UID = $_POST['UID'];
   		$NAMA = $_POST['NAMA'];
   		$DIVISI = $_POST['DIVISI'];
   		$ALAMAT = $_POST['ALAMAT'];
   		$KONTAK = $_POST['KONTAK'];
		$KONTAK = $_POST['TANGGAL_MASUK'];
   		$KETERANGAN = $_POST['KETERANGAN'];
   		$id = $_POST['ID'];
		
   		$data[] = $UID;
   		$data[] = $NAMA;
   		$data[] = $DIVISI;
   		$data[] = $ALAMAT;
   		$data[] = $KONTAK;
		$data[] = $TANGGAL_MASUK;
		$data[] = $KETERANGAN;
		$data[] = $id;
	
		
   		$sql = "UPDATE `tb_karyawan_tenagamedis` SET UID=?,NAMA=?,DIVISI=?,ALAMAT=?,KONTAK=?,TANGGAL_MASUK=?,TEMPAT=?,KETERANGAN=? WHERE id=?";
   		$row = $dbh->prepare($sql);
   		$row->execute($data);
		
   		echo '<script>alert("Berhasil Edit Data");window.location="index.php?halaman=tenagamedis-karyawan"</script>';
	   }
   
   	$id = $_GET['id'];
   	$sql = "SELECT *FROM `tb_karyawan_tenagamedis` WHERE ID= ?";
   	$row = $dbh->prepare($sql);
   	$row->execute(array($id));
   	$result = $row->fetch();
   ?>
   <!DOCTYPE HTML>
   <html>
   	<head>
   		<title>Edit - <?php echo $result['UID'];?></title>
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   	</head>
   	<body>
   		<div class="container">
   			 <br/>
   			 <h3>Edit - <?php echo $result['UID'];?></h3>
   			 <br/>
   			<div class="row">
   				 <div class="col-lg-6">
   					 <form action="" method="POST">
   						 <div class="form-group">
   							 <label>UID</label>
   							 <input type="text" value="<?php echo $result['UID'];?>" class="form-control" name="UID">
   						 </div>
   						 <div class="form-group">
   							 <label>NAMA</label>
   							 <input type="text" value="<?php echo $result['NAMA'];?>" class="form-control" name="NAMA">
   						 </div>
   						 <div class="form-group">
   							 <label>DIVISI</label>
   							 <input type="text" value="<?php echo $result['DIVISI'];?>" class="form-control" name="DIVISI">
   						 </div>
   						 <div class="form-group">
   							 <label>ALAMAT</label>
   							 <input type="text" value="<?php echo $result['ALAMAT'];?>" class="form-control" name="ALAMAT">
   						 </div>
   						 <div class="form-group">
   							 <label>KONTAK</label>
   							 <input type="text" value="<?php echo $result['KONTAK'];?>" class="form-control" name="KONTAK">
   						 </div>
							<div class="form-group">
   							 <label>TANGGAL MASUK</label>
   							 <input type="text" value="<?php echo $result['TANGGAL_MASUK'];?>" class="form-control" name="TANGGAL_MASUK">
   						 </div>
							<div class="form-group">
   							 <label>KETERANGAN</label>
   							 <input type="text" value="<?php echo $result['KETERANGAN'];?>" class="form-control" name="KETERANGAN">
   						 </div>
   						 <input type="hidden" value="<?php echo $result['ID'];?>" name="ID">
   						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
   					 </form>
   				  </div>
   			</div>
   		</div>
   	</body>
   </html>