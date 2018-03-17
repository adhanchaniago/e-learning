@extends('template.default')

@section('title', 'Tambah Polling')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Polling</p><hr>
		<p>Lengkapi from berikut:</p>
		<form action="" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<div class="form-group row">
				<label for="judul" class="col-sm-2 col-form-label">Judul Polling</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="judul" name="judul">
				</div>
			</div>
			<div class="form-group row">
				<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Polling</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="deskripsi" name="deskripsi">
				</div>
				<div class="col-sm-4">
					<button type="button" id="tambahOpsi" class="btn btn-green btn-sm">Tambah Opsi</button>
				</div>
			</div><hr>
			<div class="opsi-section">
				
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<button type="submit" class="btn btn-green">Tambah Polling</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@push('script')
	<script>
		$('#tambahOpsi').on('click', function() {
			console.log('asdasd');
			var dom = 	'<div class="form-group row">';
				dom +=		'<label for="opsi" class="col-sm-2 col-form-label text-center">Opsi</label>';
				dom +=		'<div class="col-sm-6">';
				dom +=			'<input type="text" class="form-control" name="opsi[]">';
				dom +=		'</div>';
				dom +=	'</div>';
			$('.opsi-section').append(dom);
		});
	</script>
@endpush