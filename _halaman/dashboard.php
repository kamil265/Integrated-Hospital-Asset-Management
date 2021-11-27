<?php
 $title="Dashboard";
 require_once 'connect.php';
?>
<?php 
    $sql ="SELECT id from tb_pasien WHERE kategori_pasien='Bayi' ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $jumlahBayi=$query->rowCount();
?>
<?php 
    $sql ="SELECT id from tb_pasien WHERE kategori_pasien='Anak' ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $jumlahAnak=$query->rowCount();
?>
<?php 
    $sql ="SELECT id from tb_pasien WHERE kategori_pasien='Dewasa' ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $jumlahDewasa=$query->rowCount();
?>
<div class="container-fluid">
    <div class="form-head d-flex mb-2 align-items-start">
		<div class="mr-auto d-none d-lg-block">
			<h3 class="text-primary font-w600">Welcome to Integrated Hospital Asset Management</h3>
			<p class="mb-0">Quick Access</p>
		</div>
    </div>	
	<div class="row">
	    <div class="col-xl-4 col-lg-4 col-sm-4">
            <a href="<?=url('clinicalmng-pasien#log-data-pasien')?>">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-procedures"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Log Data</p>
                            <h5 class="mb-0">Pasien</h5>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
            </a>
            
        </div>
        <div class="col-xl-4 col-lg-4 col-sm-4">
            <a href="<?=url('clinicalmng-nakes#log-data-nakes')?>">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-user-md"></i>
			            </span>
                        <div class="media-body">
                            <p class="mb-1">Log Data</p>
                            <h5 class="mb-0">Tenaga Kesehatan</h5>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
		<div class="col-xl-4 col-lg-4 col-sm-4">
            <a href="<?=url('clinicalmng-inventory#aset-terpakai')?>">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-warning text-info">
							<i class="fas fa-medkit"></i>
                        </span>
                        <div class="media-body">
                            <p class="mb-1">Riwayat</p>
                            <h5 class="mb-0">Peminjaman Aset</h5>
                            <!-- <span class="badge badge-warning">+250</span> -->
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header border-0 pb-0">
					<h4 class="card-title">Statistik Pasien</h4>
				</div>
				<div class="card-body pt-2">
					<h4 class="text-dark font-w400">Total Pasien</h4>
                    <?php 
                        $sql ="SELECT id from tb_pasien";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $jumlahPasien=$query->rowCount();
                    ?>
					<h3 class="text-primary font-w600"><?php echo htmlentities($jumlahPasien); ?> Orang</h3>
					<div class="row mx-0 align-items-center">
						<div class="col-sm-8 col-md-7  px-0">
                            <canvas id="myChart" width="450" height="450"></canvas>
						</div>
                        <div class="col-sm-4 col-md-5 px-0">
							<div class="patients-chart-deta">
								<div class="col px-0">
									<span class="bg-primary"></span>	
									<div>
										<p>Bayi</p>
										<h4><?php echo htmlentities($jumlahBayi); ?> Orang</h4>
                                        <span class="badge badge-primary">
                                        <?php
                                                $presentaseBayi = ($jumlahBayi/$jumlahPasien)*100;
                                                echo number_format((float)$presentaseBayi, 2, '.', '');
                                            ?> %</span>
                                        </span>
									</div>
								</div>
								<div class="col px-0">
									<span class="bg-success"></span>	
									<div>
										<p>Anak-Anak</p>
										<h4><?php echo htmlentities($jumlahAnak); ?> Orang</h4>
                                        <span class="badge badge-success">
                                        <?php
                                                $presentaseAnak = ($jumlahAnak/$jumlahPasien)*100;
                                                echo number_format((float)$presentaseAnak, 2, '.', '');
                                            ?> %</span>
                                        </span>
									</div>
								</div>
								<div class="col px-0">
									<span class="bg-danger"></span>	
									<div>
										<p>Dewasa</p>
										<h4><?php echo htmlentities($jumlahDewasa); ?> Orang</h4>
                                        <span class="badge badge-danger">
                                            <?php
                                                $presentaseDewasa = ($jumlahDewasa/$jumlahPasien)*100;
                                                echo number_format((float)$presentaseDewasa, 2, '.', '');
                                            ?> %</span>
									</div>
								</div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
    </div>
</div>
<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Bayi', 'Anak-Anak', 'Dewasa',],
        datasets: [{
            data: [<?php echo htmlentities($jumlahBayi); ?>, <?php echo htmlentities($jumlahAnak); ?>, <?php echo htmlentities($jumlahDewasa); ?>],
            borderWidth: 3, 
				borderColor: "rgba(255,255,255,1)",
                backgroundColor: [
                    "rgba(69, 11, 90, 1)",
                    "rgba(32, 159, 132, 1)",
                    "rgba(247, 43, 80, 1)"
                ],
                hoverBackgroundColor: [
                    "rgba(69, 11, 90, 0.9)",
                    "rgba(32, 159, 132, .9)",
                    "rgba(247, 43, 80, .9)"
                ],

            borderWidth: 1
        }]
    },
    options: {
			weight: 1,	
			cutoutPercentage: 100,
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display:false
                }
            }
        }
});
</script>