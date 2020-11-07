@extends('layout.master')
	
	@section('content')
		<div class="main">
			<div class="main-content">
				<div class="container-fluie">
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit data</h3>
								</div>
								<div class="panel-body">
									<form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="form-group">
											<label>Nama Depan</label>
											<input name="nama_depan" type="text" class="form-control" id="exampleInputtext1" placeholder="Nama Depan" aria-describedby="textHelp" value="{{ $siswa->nama_depan }}">
										</div>
										<div class="form-group">
											<label>Nama Belakang</label>
											<input name="nama_belakang" type="text" class="form-control" id="exampleInputtext1" placeholder="Nama Belakang" aria-describedby="textHelp" value="{{ $siswa->nama_belakang }}">
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Pilih Jenis kelamin</label>
											<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
											    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif >Laki-laki</option>
											    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
											</select>
										</div>
										<div class="form-group">
											<label>Agama</label>
											<input name="agama" type="text" class="form-control" id="exampleInputtext1" placeholder="Agama" aria-describedby="textHelp" value="{{ $siswa->agama }}">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<input name="alamat" type="text" class="form-control" id="exampleInputtext1" placeholder="Alamat" aria-describedby="textHelp" value="{{ $siswa->alamat }}">
										</div>
										<div class="form-group">
											<label for="exampleFormControlTextarea1"></label>
											<input type="file" name="avatar" class="form-control">
										</div>
											<button type="submit" class="btn btn-primary">Ubah</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	@stop
