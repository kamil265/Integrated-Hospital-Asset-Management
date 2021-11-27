<?php
require_once('connect.php');
$title = "Asset Tracking";
$sec = "3";
?>

<!---Buat ngambil data--->
<?php

$server_name = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'hms';
	 
$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
$dbconfig = mysqli_select_db($connection,$db_name);

?>
<?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
    $query = "SELECT `rfid_uid`, `nama`, `timestamp`
              FROM `view_tracking` 
			--   tb_scanner1_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($query_run);
?>
 <?php
    //dari database, dipilih semua (bintang = semuanya) dari tabel "tb_rfid"
       $query_2= "SELECT `rfid_uid`, `nama`, `timestamp` 
              FROM `view_tracking2`
			--   tb_scanner2_assetbayi
              ORDER BY `timestamp` DESC LIMIT 3
    "; 
    $query_run2 = mysqli_query($connection, $query_2);
	$row_2 = mysqli_fetch_assoc($query_run2);
?>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
        	<div class="card" id="jadwalDokter">
				<div class="card-header">
				<h4 class="card-intro-title">Posisi Asset</h4>
					<span>
						<button onclick="openFullscreen();" class="btn btn-primary btn-xs"><i class="fa fa-expand" aria-hidden="true"></i></button>
					</span>
				</div>
				<head>
					<meta http-equiv="refresh" content="<?php echo $sec?>; URL='<?=url('mapping')?>'">	
					<link rel="stylesheet/less" type="text/css" href="styles/plan.less">
						<img src="./assets/img/bg_3.png" class="responsive">
							<?php 
								try
								{
								$bdd = new PDO('mysql:host=localhost;dbname=hms', 'root', '');
								}
								catch (Exception $e)
								{
								die('Error : ' . $e->getMessage());
								}
								$tb_1 = $bdd->query('SELECT * FROM `tb_area_1` ORDER BY timestamp DESC LIMIT 10');
								$tb_2 = $bdd->query('SELECT * FROM `tb_area_2` ORDER BY timestamp DESC LIMIT 10');
								$tb_3 = $bdd->query('SELECT * FROM `tb_area_3` ORDER BY timestamp DESC LIMIT 10');
								$area_1 = $tb_1->fetchAll();
								$area_2 = $tb_2->fetchAll();
								$area_3 = $tb_3->fetchAll();
								$tb_1->closeCursor();
								$tb_2->closeCursor();
								$tb_3->closeCursor();		

							?>
				</head>

				<body oncontextmenu="return false;">
					<div class="stand">
						<?php
						//Get reader condition
						$ts1 = strtotime($row['timestamp']);
						$ts2 = strtotime($row_2['timestamp']); 
						$time_diff  = $ts1 - $ts2;
						$time_diff2 = $ts2 - $ts1;
						// echo $row['timestamp'];
						//echo "Selisih waktu", $time_diff, "dan", $time_diff2;
						//echo $time_diff2;
						//echo $ts2;
						$object = array (0);
						$posX =0;

						if($time_diff > -5 && $time_diff2 < 5 && $time_diff <=0 && $time_diff2 >=0){
							//Get Area Position
							if($row['rfid_uid']==$row_2['rfid_uid']){// area 2
								$object = array(2);
								$posX = 50;
								//echo "jenis area:", $object[0];
								
							}
							else{
								$object = array(1,3);
								$posX = array(78,14);
								//echo "jenis area:", $object[0], $object[1];
							
							}
							//echo $posX[0];
						}
						else if($time_diff < -5 && $time_diff2 > 5){
							$object = array(3);
							$posX = 14;
							//echo "jenis area:", $object[0];
						}
						else if($time_diff > 5 && $time_diff2 < -5){
							$object= array(1);
							$posX = 78;
							//echo "jenis area:", $object[0];
						}
						else {
							$object = array(4);
						}
						
						//echo $object[1];

						// List Object in Spesific area
						foreach($object as $j){
							//echo "area:",$j;
							if($j == 1){
								$same = 0;
								$new_Y = 0;
								//echo "kondisi:",$same;
								foreach($area_1 as $a_1){
									$id   = $row['rfid_uid'];
									$posY = $a_1['posY'];
									$nama = $row['nama'];
									if($id == $a_1['rfid_uid']){
										$new_tot = $a_1['total'] + 1;
										$new_Y = $a_1['posY'] ;
										$time = $row['timestamp'];
										$data= "UPDATE tb_area_1 SET 
												posX = '$posX',
												posY = '$posY',
												total= '$new_tot',
												nama_anak= $nama,
												timestamp = '$time'
												WHERE rfid_uid='$id'";

										$run_1= mysqli_query($connection,$data);
										$same =1;
										break;
									}
									else {
										$total = $a_1['total'];
										$new_Y = $a_1['posY'];
									}
									
								}
								//echo "area 1 con:",$same;
								if($same == 0){
									$id   = $row['rfid_uid'];
									$name = $row['nama'];;
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_1 (rfid_uid,nama_anak,total,posX,posY)
									VALUES ('$id', $name,'$new_tot','$posX' ,'$Ynew')";
									$run_1 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_1 WHERE total = '0' LIMIT 1 ";
									$del_1 = mysqli_query($connection, $delete);
								}					
							}
							if($j==2) {
								$same = 0;
								$new_Y = 0;
								
								foreach($area_2 as $a_2){
									//echo $a_2;
									$id   = $row_2['rfid_uid'];
									$posY = $a_2['posY'];
									$nama = $row_2['nama'];
									//echo $posY;
									if($id == $a_2['rfid_uid']){
										$new_tot = $a_2['total'] + 1;
										$new_Y = $a_2['posY'] ;
										$time = $row_2['timestamp'];
										$data= "UPDATE tb_area_2 SET 
												posX = '$posX',
												posY = '$posY',
												total =' $new_tot',
												nama_anak = '$nama',
												timestamp = '$time'
												WHERE rfid_uid='$id'";

										$run_2= mysqli_query($connection,$data);
										$same =1;
										break;
									}
									else{
										$total = $a_2['total'];
										$new_Y = $a_2['posY'];
									}
									
								}
								//echo "area 2 con:",$same;
								if($same == 0){
								
									$id   = $row_2 ['rfid_uid'];
									//echo $id;
									$name = $row_2['nama'];
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('$id','$name','$new_tot', '$posX' , '$Ynew')";
									$run_3 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_2 WHERE total = '0'
									LIMIT 1 ";
									$del_3 = mysqli_query($connection, $delete);
								}
								
							}
							else {
							//echo $same;
								$same = 0;
								$new_Y = 0;
								foreach($area_3 as $a_3){
									$id   = $row_2['rfid_uid'];
									$posY = $a_3['posY'];
									$nama = $row_2['nama'];
									if($id == $a_3['rfid_uid']){
										$new_tot = 10;
										$new_Y = $a_3['posY'] ;
										$time = $row_2['timestamp'];
										$data= "UPDATE tb_area_3 SET 
												posX = '$posX',
												posY = '$posY',
												total= '$new_tot',
												nama_anak='$nama',
												timestamp = '$time'
												WHERE rfid_uid='$id'";

										$run_3= mysqli_query($connection,$data);
										$same =1;
										//echo "total pembacaan area3:", $new_tot, "sebelum:", $a_3['total'];
										//break;
									}
									else{
										$total = $a_3['total'];
										$new_Y = $a_3['posY'];
									}
									
								}
								//echo "area 3 con:", $same;
								if($same == 0){
									$id   = $row_2 ['rfid_uid'];
									$name = $row_2['nama'];
									$new_tot = 1;
									$Ynew = $new_Y+ 10;
									$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,total,posX,posY)
									VALUES ('$id','$name','$new_tot','$posX','$Ynew')";
									$run_3 = mysqli_query($connection, $data);

									$delete = " DELETE FROM tb_area_3 WHERE total = '0'
									LIMIT 1 ";
									$del_3 = mysqli_query($connection, $delete);
								}
							}

							try
							{
							$bdd = new PDO('mysql:host=localhost;dbname=hms','root','');
							}
							catch (Exception $e)
							{
							die('Error : ' . $e->getMessage());
							}

							$it_1 = $bdd->query('SELECT * FROM tb_area_1 ORDER BY timestamp DESC ');
							$it_2 = $bdd->query('SELECT * FROM tb_area_2 ORDER BY timestamp DESC ');
							$it_3 = $bdd->query('SELECT * FROM tb_area_3 ORDER BY timestamp DESC ');
							$obj_1 = $it_1->fetchAll();
							$obj_2 = $it_2->fetchAll();
							$obj_3 = $it_3->fetchAll();
							$it_1->closeCursor();
							$it_2->closeCursor();
							$it_3->closeCursor();
							//$con = $result = mysql_query($connection, $it_1);
			
						//Filter Data
						//initiialization
						$t_1 = 0;
						$t_2 = 0;
						$t_3 = 0;
						$reset_all = 0;
						
						//Sum Object in All Area
						foreach ($obj_1 as $n_1){
							$t_1 = $t_1 + $n_1['total'];
						}

						foreach ($obj_2 as $n_2){
							$t_2 = $t_2 + $n_2['total'];
						}
			
						foreach ($obj_3 as $n_3){
							$t_3 = $t_3 + $n_3['total'];
						}
						
						$reset_all = $t_1 + $t_2 + $t_3;
						
						$min_v = $reset_all/3;
						//echo "jumlah reset:",$reset_all, "min:", $min_v;

						// Filter area 1
						if( $reset_all >= $min_v){
							// Area 1
								$delete_1 = "DELETE FROM tb_area_1 WHERE total <= $min_v";
								$del_1 = mysqli_query($connection, $delete_1);
								$data = "INSERT INTO tb_area_1 (rfid_uid,nama_anak,total,posX,posY)
									VALUES ('00000000000',' ',' ',' ',' ')";
							        $up_1= mysqli_query($connection,$data);
						
							// foreach($obj_1 as $x_1){
							// 	$new_r   = 0;
							// 	$id_new  = $x_1['rfid_uid'];
							// 	$data_r  = "UPDATE tb_area_1 SET total = '$new_r' WHERE total > $min_v";
							// 	$run_r   = mysqli_query($connection,$data_r);
							// }

							// Area 2
							$delete_2 = "DELETE FROM tb_area_2 WHERE total <= 10";
							$del_2 = mysqli_query($connection, $delete_2);
							$data = "INSERT INTO tb_area_2 (rfid_uid,nama_anak,total,posX, posY)
							VALUES ('00000000000',' ',' ',' ',' ')";
							$up_2= mysqli_query($connection,$data);
					
					
							// foreach($obj_2 as $x_2){
							// 	$new_r   = 0;
							// 	$id_new  = $x_2['rfid_uid'];
							// 	$data_r  = "UPDATE tb_area_2 SET total = '$new_r' WHERE total > 10";
							// 	$run_r   = mysqli_query($connection,$data_r);
							// }

							//Area 3
							$delete_3 = "DELETE FROM tb_area_3 WHERE total <= $min_v";
							$del_3 = mysqli_query($connection, $delete_3);
							$data = "INSERT INTO tb_area_3 (rfid_uid,nama_anak,total,posX, posY)
									VALUES ('00000000000',' ',' ',' ',' ')";
							$up_3= mysqli_query($connection,$data);
							
							
							// foreach($obj_3 as $x_3){
							// 	$new_r   = 0;
							// 	$id_new  = $x_3['rfid_uid'];
							// 	$data_r  = "UPDATE tb_area_3 SET total = '$new_r' WHERE total > $min_v";
							// 	$run_r   = mysqli_query($connection,$data_r);
							// }

						}

						

						//tampilan objek pada peta di setiap area
						$kotak = 10;
						$width = 5;
						$height = 5;
						
						foreach($obj_1 as $p_1){
							if($p_1['rfid_uid'] !== '00000000000' && $p_1['rfid_uid'] !== ' ' ){
								$textY = ($kotak*$p_1['posY']) + 90;
								echo '<div id="ok">';
								echo '<img id="SimbolBaby" src="./assets/img/baby.png" alt="'.$p_1['nama_anak'].'" width = 100px height= 100px style="position: absolute; top:'.$kotak*$p_1['posY'].'px;left:'.$kotak*$p_1['posX'].'px;">';
								echo '<p style="font-size:16pt;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_1['posX'].'px;">'.$p_1['nama_anak'].'</p>';
								echo '</div>';
							}
						}


						foreach($obj_2 as $p_2){
							if($p_2['rfid_uid'] !== '00000000000' && $p_2['rfid_uid'] !== ' '){
								$textY = ($kotak*$p_2['posY']) + 90;
								echo '<div id="ok">';
								echo '<img id="SimbolBaby" src="./assets/img/baby.png" alt="'.$p_2['nama_anak'].'" width = 100px height= 100px style="position: absolute; top:'.$kotak*$p_2['posY'].'px;left:'.$kotak*$p_2['posX'].'px;">';
								echo '<p style="font-size:16pt;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_2['posX'].'px;">'.$p_2['nama_anak'].'</p>';
								echo '</div>';
							}

						}

						foreach($obj_3 as $p_3){
							if($p_3['rfid_uid'] !== '00000000000' && $p_3['rfid_uid'] !== ' '){
								//echo "gambar area3:", $p_3 ['posX'];
								$textY = ($kotak*$p_3['posY']) + 90;
								echo '<div id="ok">';
								echo '<img id="SimbolBaby" src="./assets/img/baby.png" alt="'.$p_3['nama_anak'].'" width = 100px height= 100px style="position: absolute; top:'.$kotak*$p_3['posY'].'px;left:'.$kotak*$p_3['posX'].'px;">';
								echo '<p style="font-size:16pt;font-style:bold;position: absolute;top:'.$textY.'px;left:'.$kotak*$p_3['posX'].'px;">'.$p_3['nama_anak'].'</p>';
								echo '</div>';
							}

						}
						//Filter object
						//$total_all = $obj_1['tot_all'] + 1;
						
						//filter object loss
						//$tot_read = $area_1['tot_all'] +1;
						//$read_all= "INSERT INTO tb_area_1 (tot_all) VALUES ('$tot_read')";
						}
						?>
					</div>
					<script type="text/javascript" src="vendors/less-1.5.0.min.js"></script>
				</body>
    		</div>
	</div>
</div>

<script>
var elem = document.getElementById("jadwalDokter");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
</script>

<?php
include('_layouts/javascript.php');
?>