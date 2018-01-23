@extends('template.default')

@section('title', 'Tambah Mata Pelajaran')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Mata Pelajaran</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">
						<label for="slug" class="col-sm-4 col-form-label">Kode Pelajaran</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="slug" name="slug">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_pelajaran" class="col-sm-4 col-form-label">Nama Pelajaran</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Tambah Mata Pelajaran</button>
							<a href="{{ route('s') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection