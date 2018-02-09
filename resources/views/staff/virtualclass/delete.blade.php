@extends('template.default')

@section('title', 'Hapus Kelas Virtual')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Hapus Kelas Virtual</p><hr>
		<p>Apakah anda yakin ingin menghapus kelas virtual akun berikut ini?</p>
		<p>Nama Kelas : <strong>{{ $virtual->nama_kelas }}</strong></p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="id" value="{{ $virtual->id }}">
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-green">Hapus Kelas Virtual</button>
							<a href="{{ route('getVirtualClassPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection