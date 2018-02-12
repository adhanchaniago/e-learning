@extends('template.default')

@section('title', 'Tambah Materi Pelajaran')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Materi Pelajaran</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">
						<label for="judul_materi" class="col-sm-4 col-form-label">Judul Materi</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="judul_materi" name="judul_materi">
						</div>
					</div>
					<div class="form-group row">
						<label for="mata_pelajaran_id" class="col-sm-4 col-form-label">Mata Pelajaran</label>
						<div class="col-sm-8">
							<select class="form-control" id="mata_pelajaran_id" name="mata_pelajaran_id">
								<option></option>
								@foreach ($mataPelajaran as $value)
									<option value="{{ $value->id }}">{{ $value->slug.' - '.$value->nama_pelajaran }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="materi" class="col-sm-4 col-form-label">Upload File Materi</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" id="materi" name="materi">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="keterangan" name="keterangan">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Tambah Materi Pelajaran</button>
							<a href="{{ route('getMateriPage') }}" class="btn btn-default">Batal</a>
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

		$('#mata_pelajaran_id').select2({
			placeholder: "Pilih Mata Pelajaran",
			allowClear: true
		});

		$('#jenis_file').select2({
			placeholder: "Pilih Jenis File",
			allowClear: true
		});

	});

</script>

@endpush