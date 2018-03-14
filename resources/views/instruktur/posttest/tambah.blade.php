@extends('template.default')

@section('title', 'Tambah Soal Post-Test')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Soal Post-Test</p><hr>
		<div class="row">
			<div class="col-md-12">
				@include('template.partials.formerror')
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="kelas_virtual_id" value="{{ $kelasID }}">
					<div class="form-group row text-center">
						<label for="jns_soal" class="col-sm-3 col-form-label">Jenis Soal</label>
						<div class="col-sm-6">
							<select name="jns_soal" id="jns_soal" class="form-control">
								<option value="">Pilih Jenis Soal</option>
								<option value="essay">Essay</option>
								<option value="objektif">Objektif</option>
							</select>	
						</div>
						<div class="col-md-3">
							<button type="button" id="tambah_soal" class="btn btn-sm btn-green">Tambah Soal</button>
						</div>
					</div>
					<hr>
					<div id="form-soal-section">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<p class="category">Soal Post-Test</p><hr>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@foreach ($listSoal as $key => $value)
					@if ($value->jenis_soal == 'essay')
						<div>
							<table width="100%">
								<tr>
									<td width="5%">{{ $key+1 }}.</td>
									<td colspan="2">{{ $value->soal }}</td>
								</tr>
							</table>
						</div>
						<hr>
					@elseif ($value->jenis_soal == 'objektif')
						<div>
							<table width="100%">
								<tr>
									<td width="5%">{{ $key+1 }}.</td>
									<td colspan="2">{{ $value->soal }}</td>
								</tr>
								<tr>
									<td rowspan="2"></td>
									<td>A. {{ $value->opsi_a }}</td>
									<td>B. {{ $value->opsi_b }}</td>
								</tr>
								<tr>
									<td>C. {{ $value->opsi_c }}</td>
									<td>D. {{ $value->opsi_d }}</td>
								</tr>
							</table>
						</div>
						<hr>
					@endif
				@endforeach
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 text-center">
				<a href="{{ route('getListJawabanPosttest', [$kelasID]) }}" target="_blank">LIHAT JAWABAN DARI PESERTA</a>
			</div>
		</div>
	</div>
</div>

@endsection

@push('style')

<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />

@endpush

@push('script')

<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>

<script>

	$(document).ready(function() {

		$('#jenis_file').select2({
			placeholder: "Pilih Jenis File",
			allowClear: true
		});

		$('#tambah_soal').on('click', function(e){
			e.preventDefault();
			var jenis = $('#jns_soal').val();
			if (jenis == 'essay') {
				var dom = 	'<div class="form-group row">';
				 	dom +=		'<label for="soal" class="col-sm-3 col-form-label text-center">Soal</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="soal">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom +=	'<br>';
				 	dom +=	'<div class="form-group row">';
				 	dom +=		'<div class="col-md-3"></div>';
				 	dom +=		'<div class="col-sm-8">';
				 	dom +=			'<button type="submit" class="btn btn-green">Submit Soal</button>';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
			} else if (jenis == 'objektif') {
				var dom = 	'<div class="form-group row">';
				 	dom +=		'<label for="soal" class="col-sm-3 col-form-label text-center">Soal</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="soal">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom += 	'<div class="form-group row">';
				 	dom +=		'<label for="opsi_a" class="col-sm-3 col-form-label text-center">Opsi A</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="opsi_a">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom += 	'<div class="form-group row">';
				 	dom +=		'<label for="opsi_b" class="col-sm-3 col-form-label text-center">Opsi B</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="opsi_b">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom += 	'<div class="form-group row">';
				 	dom +=		'<label for="opsi_c" class="col-sm-3 col-form-label text-center">Opsi C</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="opsi_c">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom += 	'<div class="form-group row">';
				 	dom +=		'<label for="opsi_d" class="col-sm-3 col-form-label text-center">Opsi D</label>';
				 	dom +=		'<div class="col-sm-6">';
				 	dom +=			'<input type="text" class="form-control" name="opsi_d">';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
				 	dom +=	'<br>';
				 	dom +=	'<div class="form-group row">';
				 	dom +=		'<div class="col-md-3"></div>';
				 	dom +=		'<div class="col-sm-8">';
				 	dom +=			'<button type="submit" class="btn btn-green">Submit Soal</button>';
				 	dom +=		'</div>';
				 	dom +=	'</div>';
			}
			$('#form-soal-section').append(dom);
		});

	});

</script>

@endpush