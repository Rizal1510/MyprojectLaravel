@extends('layout.master')

@section('content')
	<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{ $siswa->getAvatar() }}" width="125" height="125" class="img-circle" alt="Avatar">
										<h3 class="name">{{ $siswa->nama_depan }}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{ $siswa->mapel->count() }} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis kelamin <span>{{ $siswa->jenis_kelamin }}</span></li>
											<li>Agama <span>{{ $siswa->agama }}</span></li>
											<li>Alamat <span>{{ $siswa->alamat }}</span></li>
											
										</ul>
									</div>
									
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
									<!-- TABLE STRIPED -->
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title">Mata Pelajaran</h3>
											</div>
											<div class="panel-body">
												<table class="table table-striped">
													<thead>
														<tr>
															<th>No</th>
															<th>Kode</th>
															<th>Nama</th>
															<th>Semester</th>
															<th>Nilai</th>
														</tr>
													</thead>
													<?php $no = 0;?>
													@foreach($siswa->mapel as $mapel)
													<?php $no++ ;?>
													<tbody>
														<tr>
															<td>{{ $no }}</td>
															<td>{{ $mapel->kode }}</td>
															<td>{{ $mapel->nama }}</td>
															<td>{{ $mapel->semester }}</td>
															<td>{{ $mapel->pivot->nilai }}</td>
														</tr>
													</tbody>
													@endforeach
												</table>
											</div>
										</div>
									<!-- END TABLE STRIPED -->
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@stop