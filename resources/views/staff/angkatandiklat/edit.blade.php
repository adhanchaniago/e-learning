@extends('template.default')

@section('title', 'Ubah Angkatan Diklat')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Ubah Angkatan Diklat</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $angkatan->id }}">
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Nama Diklat</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" name="nama" value="{{ $angkatan->nama_diklat }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" readonly value="{{ $angkatan->tanggal_mulai }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" readonly value="{{ $angkatan->tanggal_selesai }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $angkatan->keterangan }}">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Ubah Angkatan Diklat</button>
							<a href="{{ route('getAngkatanDiklatPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('style')

<link rel="stylesheet" href="{{ asset('vendor/air-datepicker/dist/css/datepicker.min.css') }}" />

@endpush

@push('script')
	
<script src="{{ asset('vendor/air-datepicker/dist/js/datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}" type="text/javascript"></script>

<script>

	$(document).ready(function() {

		$.fn.datepicker.language['en'] = {
			days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
			daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			daysMin: ['Mi', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
			months: ['Januari','Februari','Maret','April','Mei','Juni', 'juli','Agustus','September','Oktober','November','Desember'],
			monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
		};

		$('#tanggal_mulai').datepicker({
			dateFormat: "yyyy-mm-dd",
    		autoClose: true,
    		language: 'en'
		});

		$('#tanggal_selesai').datepicker({
			dateFormat: "yyyy-mm-dd",
    		autoClose: true,
    		language: 'en'
		});


	});

</script>

@endpush