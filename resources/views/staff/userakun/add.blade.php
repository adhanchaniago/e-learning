@extends('template.default')

@section('title', 'Tambah User Akun')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah User Akun</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">
						<label for="nik" class="col-sm-3 col-form-label">NIK</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="nik" name="nik">
						</div>
					</div>		
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="nama" name="nama">
						</div>
					</div>	
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="email" name="email">
						</div>
					</div>	
					<div class="form-group row">
						<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
						</div>
					</div>	
					<div class="form-group row">
						<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" readonly>
						</div>
					</div>	
					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-9">
							<select name="jenis_kelamin" id="jenis_kelamin" class="form-control no-down-arrow">
								<option></option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
						</div>
					</div>	
					<div class="form-group row">
						<label for="agama" class="col-sm-3 col-form-label">Agama</label>
						<div class="col-sm-9">
							<select name="agama" id="agama" class="form-control">
								<option></option>
								<option value="Islam">Islam</option>
								<option value="Katolik">Katolik</option>
								<option value="Protestan">Protestan</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
							</select>
						</div>
					</div>	
					<div class="form-group row">
						<label for="tanggal_lahir" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
							<textarea name="alamat" id="alamat" class="form-control darker-bottom"></textarea>
						</div>
					</div>	
					<div class="form-group row">
						<label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="telepon" name="telepon">
						</div>
					</div>
					<div class="form-group row">
						<label for="kantor_cabang_id" class="col-sm-3 col-form-label">Kantor Cabang</label>
						<div class="col-sm-9">
							<select name="kantor_cabang_id" id="kantor_cabang_id" class="form-control">
								<option></option>
								@foreach ($cabang as $value)
									<option value="{{ $value->id }}">{{ $value->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>	
					<br>
					<div class="form-group row">
						<div class="col-md-3"></div>
						<div class="col-sm-9">
							<button type="submit" class="btn btn-green">Ubah Profil</button>
							<a href="{{ route('getUserAkunPage') }}" class="btn btn-default">Batal</a>
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
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap.min.css') }}" />

@endpush

@push('script')
	
<script src="{{ asset('vendor/air-datepicker/dist/js/datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}" type="text/javascript"></script>

<script>

	$(document).ready(function() {

		$.fn.datepicker.language['en'] = {
			days: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
			daysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			daysMin: ['Mi', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
			months: ['Januari','Februari','Maret','April','Mei','Juni', 'juli','Agustus','September','Oktober','November','Desember'],
			monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
		};

		$('#tanggal_lahir').datepicker({
			dateFormat: "yyyy-mm-dd",
    		autoClose: true,
    		language: 'en'
		});

		$('#kantor_cabang_id').select2({
			placeholder: "Pilih Kantor Cabang",
			allowClear: true
		});

		$('#agama').select2({
			placeholder: "Pilih Agama",
			allowClear: true
		});

		$('#jenis_kelamin').select2({
			placeholder: "Pilih Jenis Kelamin",
			allowClear: true
		});

	});

</script>

@endpush