@extends('template.default')

@section('title', 'Tambah Penghargaan')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Penghargaan</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $reward->id }}">
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Nama Penghargaan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" name="nama" value="{{ $reward->nama }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $reward->keterangan }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-4 col-form-label"></label>
						<div class="col-sm-8">
							<img src="{{ asset('storage/reward/'.$reward->gambar) }}" alt="" height="100px">
						</div>
					</div>
					<div class="form-group row">
						<label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" id="gambar" name="gambar">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Ubah Penghargaan</button>
							<a href="{{ route('getRewardPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection