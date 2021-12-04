<div class="deznav">
    <div class="deznav-scroll">
		<a href="<?=url('quickadd')?>">
			<button type="button" class="btn btn-quick mb-2" data-toggle="modal" data-target="#exampleModalLong">
      		+ Quick Add
    		</button>
		</a>
		<ul class="metismenu" id="menu">
            <li>
				<a href="<?=url('dashboard')?>" aria-expanded="false">
					<i class="fas fa-home"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fas fa-procedures"></i>
					<span class="nav-text">Pasien</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="<?=url('pasien')?>">Daftar Pasien</a></li>
					<li><a href="<?=url('rekam_medis')?>">Rekam Medis</a></li>
					<li><a href="<?=url('log-data-pasien')?>">Log data Pasien</a></li>
					<!-- <li><a href="">Detail Pemeriksaan</a></li> -->

				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fas fa-user-md"></i>
					<span class="nav-text">Tenaga Kesehatan</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="<?=url('daftartenagamedis')?>">Daftar Tenaga Kesehatan</a></li>								
					
					<li><a href="<?=url('log-data-tenagamedis')?>">Data Log Tenaga Medis</a></li>
				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-381-home-1"></i>
					<span class="nav-text">Inventory</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="<?=url('jumlah-peralatanmedis')?>">Jumlah Peralatan Medis</a></li>
					<li><a href="<?=url('status-peralatanmedis')?>">Status Peralatan Medis</a></li>
				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="fas fa-hospital"></i>
					<span class="nav-text">Clinical Management</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="<?=url('clinicalmng-pasien')?>">Pasien</a></li>
					<li><a href="<?=url('clinicalmng-nakes')?>">Tenaga Kesehatan</a></li>
					<li><a href="<?=url('clinicalmng-inventory')?>">Inventory</a></li>
				</ul>
            </li>
			<li>
				<a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="la la-route"></i>
					<span class="nav-text">Asset Tracking</span>
				</a>
                <ul aria-expanded="false">
					<li><a href="<?=url('mapping')?>">Pasien</a></li>
					<li><a href="<?=url('mapping_new')?>">Peralatan Medis</a></li>
				</ul>
            </li>	
		</ul>
	</div>
</div>