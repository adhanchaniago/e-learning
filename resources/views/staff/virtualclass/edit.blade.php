@extends('template.default')

@section('title', 'Ubah Kelas Virtual')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Ubah Kelas Virtual</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="id" value="{{ $virtual->id }}">
					<div class="form-group row">
						<label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $virtual->nama_kelas }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $virtual->keterangan }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="angkatan_diklat_id" class="col-sm-3 col-form-label">Angkatan Diklat</label>
						<div class="col-sm-9">
							<select name="angkatan_diklat_id" id="angkatan_diklat_id" class="form-control no-down-arrow">
								<option value="{{ $virtual->angkatan_diklat->id }}">{{ $virtual->angkatan_diklat->nama_diklat }}</option>
								@foreach ($angkatandiklat as $value)
									<option value="{{ $value->id }}">{{ $value->nama_diklat }}</option>
								@endforeach
							</select>
						</div>
					</div>	
					<div class="form-group row">
						<label for="mata_pelajaran_id" class="col-sm-3 col-form-label">Mata Pelajaran</label>
						<div class="col-sm-9">
							<select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control no-down-arrow">
								<option value="{{ $virtual->mata_pelajaran->id }}">{{ $virtual->mata_pelajaran->slug.' - '.$virtual->mata_pelajaran->nama_pelajaran }}</option>
								@foreach ($matapelajaran as $value)
									<option value="{{ $value->id }}">{{ $value->slug.' - '.$value->nama_pelajaran }}</option>
								@endforeach
							</select>
						</div>
					</div>	
					<div class="form-group row">
						<label for="instruktur_id" class="col-sm-3 col-form-label">Nama Instruktur</label>
						<div class="col-sm-9">
							<select name="instruktur_id" id="instruktur_id" class="form-control no-down-arrow">
								<option value="{{ $virtual->users_account->id }}">{{ $virtual->users_account->user_profil->nik.' - '.$virtual->users_account->user_profil->nama }}</option>
								@foreach ($instruktur as $value)
									<option value="{{ $value->id }}">{{ $value->user_profil->nik.' - '.$value->user_profil->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>	
					<br>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-9">
							<button type="submit" class="btn btn-green">Ubah Kelas Virtual</button>
							<a href="{{ route('getVirtualClassPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
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

		$('#angkatan_diklat_id').select2({
			placeholder: "Pilih Angkatan Diklat",
			allowClear: true
		});

		$('#mata_pelajaran_id').select2({
			placeholder: "Pilih Mata Pelajaran",
			allowClear: true
		});

		$('#instruktur_id').select2({
			placeholder: "Pilih Mata Pelajaran",
			allowClear: true
		});

	});

</script>

@endpush