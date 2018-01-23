@extends('template.default')

@section('title', 'Hapus Mata Pelajaran')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Hapus Mata Pelajaran</p><hr>
		<p>Apakah anda yakin ingin menghapus mata pelajaran ini?</p>
		<p>Nama Pelajaran : <strong>"{{ $mataPelajaran->nama_pelajaran }}"</strong></p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="id" value="{{ $mataPelajaran->id }}">
					<br>
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-danger">Hapus Mata Pelajaran</button>
							<a href="{{ route('getMataPelajaranPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection