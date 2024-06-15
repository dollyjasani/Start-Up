<div class="main-content">	
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="page-title-box">
						<h4>Dashboard</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="card mini-stat bg-primary">
						<a href="<?=base_url('admin/startup');?>">
							<div class="card-body mini-stat-img">
								<div class="mini-stat-icon">
									<i class="mdi mdi-cube-outline float-end"></i>
								</div>
								<div class="text-white">
									<h6 class="text-uppercase mb-3 font-size-16 text-white">Startup</h6>
									<h2 class="mb-4 text-white"><?=$startup?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card mini-stat bg-primary">
						<a href="<?=base_url('admin/attendes');?>">
							<div class="card-body mini-stat-img">
								<div class="mini-stat-icon">
									<i class="mdi mdi-cube-outline float-end"></i>
								</div>
								<div class="text-white">
									<h6 class="text-uppercase mb-3 font-size-16 text-white">Attende</h6>
									<h2 class="mb-4 text-white"><?=$attende?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>