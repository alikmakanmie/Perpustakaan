<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title', 'Perpustakaan')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('backend/dashboard/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('backend/dashboard/assets/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/dashboard/assets/css/demo.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
						
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{ asset('backend/dashboard/assets/img/profile.jpg') }}" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="{{ asset('backend/dashboard/assets/img/profile.jpg') }}" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('home') }}"><i class="fa fa-power-off"></i> Exit</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="{{ asset('backend/dashboard/assets/img/profile.jpg') }}">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
								
					<ul class="nav">
						@if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
						<li class="nav-item">
							<a href="#">
								<i class="la la-university"></i>
								<p>Dashboard</p>
							</a>
							<a href="{{ route('buku.index') }}">
								<i class="la la-book"></i>
								<p>Buku</p>
							</a>
							<li class="nav-item">
								<a href="{{ route('kategori.index') }}">
									<i class="la la-plus"></i>
									<p>Kategori</p>
								</a>
							</li>
							@endif
						<li class="nav-item">
							<a data-toggle="collapse" href="#peminjaman">
								<i class="la la-envelope"></i>
								<p>Peminjaman</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="peminjaman">
								<ul class="nav nav-collapse">
									@if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
									<li>
										<a href="{{ route('peminjaman.index') }}">
											<span class="sub-item">Daftar Peminjaman</span>
										</a>
									</li>
									@endif
									<li>
										<a href="{{ route('peminjaman.user') }}">
											<span class="sub-item">Daftar Peminjaman Saya</span>
										</a>
									</li>
									<li>
										<a href="{{ route('peminjaman.create') }}">
											<span class="sub-item">Tambah Peminjaman</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#pengembalian">
								<i class="la la-mail-reply"></i>
								<p>Pengembalian</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pengembalian">
								<ul class="nav nav-collapse">
									@if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
									<li>
										<a href="{{ route('pengembalian.index') }}">
											<span class="sub-item">Daftar Pengembalian</span>
										</a>
									</li>
									@endif
									<li>
										<a href="{{ route('pengembalian.create') }}">
											<span class="sub-item">Tambah Pengembalian</span>
										</a>
									</li>
								</ul>
							</div>
							@if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
							<li class="nav-item">
								<a data-toggle="collapse" href="#laporan">
									<i class="la la-file"></i>
									<p>Laporan</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="laporan">
									<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('laporan.peminjaman') }}">
											<span class="sub-item">Laporan Peminjaman</span>
										</a>
									</li>
									<li>
										<a href="{{ route('laporan.pengembalian') }}">
											<span class="sub-item">Laporan Pengembalian</span>
										</a>
									</li>

								</ul>
								</div>
							</li>
						@endif
						@if(Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
							<li class="nav-item">
								<a href="{{ route('peminjaman.persetujuan') }}" class="nav-link">
									<i class="la la-check-circle"></i>
									<p>Persetujuan Peminjaman</p>
								</a>
							</li>
						@endif

							<li class="nav-item">
								<a href="{{ route('koleksi.index') }}" class="nav-link">
									<i class="la la-book"></i>
									<p>Koleksi Buku</p>
								</a>
							</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				@yield('content')
			</div>
		</div>
	</div>
				
<!-- 						
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="{{ asset('backend/dashboard/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/ready.min.js') }}"></script>
<script src="{{ asset('backend/dashboard/assets/js/demo.js') }}"></script>
</html>