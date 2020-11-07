@extends('layout.master')

	@section('content')


		<div class="main">
			<div class="main-content">
				<div class="container-fluie">
					<div class="row">
						<div class="col-md-12">
							@if(session('sukses'))<!-- 
								<div class="alert alert-success" role="alert">
								  	
								</div> -->
								<div class="alert alert-success alert-dismissible" role="alert">
									<i class="fa fa-check-circle"></i>
									{{ session('sukses') }}
								</div>
							@endif
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
										<div class="right">
										<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Depan</th>
							      				<th>Nama Belakang</th>
							      				<th>Jenis Kelamin</th>
							      				<th>Agama</th>
							      				<th>Alamat</th>
							      				<th>Aksi</th>
											</tr>
										</thead>
										<?php $no = 0;?>
										@foreach($data_siswa as $siswa)
										<?php $no++ ;?>
										<tbody>
											<tr>
												<td>{{ $no }}</td>
												<td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_depan }}</a></td> 
												<td><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_belakang }}</a></td>
												<td>{{ $siswa->jenis_kelamin }}</td>
												<td>{{ $siswa->agama }}</td>
												<td>{{ $siswa->alamat }}</td>
												<td>
													<a class="btn btn-info btn-sm" href="/siswa/{{ $siswa->id }}/edit">Ubah</a>
													<a class="btn btn-danger btn-sm" href="/siswa/{{ $siswa->id }}/delete" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
												</td>
											</tr>
										</tbody>
										@endforeach
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				    
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button>
				    <h2 class="modal-title" id="exampleModalLabel">Tambah data siswa</h2>
				</div>
				<div class="modal-body">
				    <form action="/siswa/create" method="POST">
				    	{{ csrf_field() }}
					  <div class="form-group {{ $errors->has('nama_depan') ? 'has-error' : ''}}">
					    <label>Nama Depan</label>
					    <input name="nama_depan" type="text" class="form-control" id="exampleInputtext1" placeholder="Nama Depan" aria-describedby="textHelp" value="{{ old('nama_depan') }}">
					    @if($errors->has('nama_depan'))
					    	<span class="help-block">{{ $errors->first('nama_depan') }}</span>
					    @endif
					  </div>
					  <div class="form-group">
					    <label>Nama Belakang</label>
					    <input name="nama_belakang" type="text" class="form-control" id="exampleInputtext1" placeholder="Nama Belakang" aria-describedby="textHelp" value="{{ old('nama_belakang') }}">
					  </div>
					  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
					    <label>Email</label>
					    <input name="email" type="email" class="form-control" id="exampleInputtext1" placeholder="Email" aria-describedby="textHelp">
					    @if($errors->has('email'))
					    	<span class="help-block">{{ $errors->first('email') }}</span>
					    @endif
					  </div>
					  <div class="form-group  {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
					    <label for="exampleFormControlSelect1">Pilih Jenis kelamin</label>
					    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
					      <option value="L" {{ (old('jenis_kelamin') == 'L' ) ? 'selected' : ''}}>Laki-laki</option>
					      <option value="P" {{ (old('jenis_kelamin') == 'P' ) ? 'selected' : ''}}>Perempuan</option>
					    </select>
					    @if($errors->has('jenis_kelamin'))
					    	<span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
					    @endif
					  </div>
					  <div class="form-group  {{ $errors->has('agama') ? 'has-error' : ''}}">
					    <label>Agama</label>
					    <input name="agama" type="text" class="form-control" id="exampleInputtext1" placeholder="Agama" aria-describedby="textHelp" value="{{ old('agama') }}">
					  </div>
					  @if($errors->has('agama'))
					    	<span class="help-block">{{ $errors->first('agama') }}</span>
					    @endif
					  <div class="form-group  {{ $errors->has('alamat') ? 'has-error' : ''}}">
					    <label for="exampleFormControlTextarea1">Alamat</label>
					    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{ old('alamat') }}</textarea>
					  </div>
				</div>
				<div class="modal-footer">
				    <button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	@stop