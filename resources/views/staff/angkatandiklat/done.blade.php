@extends('template.default')

@section('title', 'Menutup Angkatan Diklat')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Menutup Angkatan Diklat</p><hr>
		<p>Apakah anda yakin ingin menutup dan memberikan status selesai angkatan diklat berikut ini ?</p>
		<p>Nama Diklat : <strong>"{{ $angkatan->nama_diklat }}"</strong></p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $angkatan->id }}">
					<br>
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-green">Tutup Angkatan Diklat</button>
							<a href="{{ route('getAngkatanDiklatPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection