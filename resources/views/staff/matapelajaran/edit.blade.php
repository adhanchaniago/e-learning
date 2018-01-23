@extends('template.default')

@section('title', 'Ubah Mata Pelajaran')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Ubah Mata Pelajaran</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $mataPelajaran->id }}">
					<div class="form-group row">
						<label for="slug" class="col-sm-4 col-form-label">Kode Pelajaran</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="slug" name="slug" value="{{ $mataPelajaran->slug }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_pelajaran" class="col-sm-4 col-form-label">Nama Pelajaran</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" value="{{ $mataPelajaran->nama_pelajaran }}">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Ubah Mata Pelajaran</button>
							<a href="{{ route('getMataPelajaranPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection