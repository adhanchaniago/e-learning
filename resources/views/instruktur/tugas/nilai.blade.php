@extends('template.default')

@section('title', 'Tambah Nilai')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Nilai Tugas</p><hr>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="jawaban_id" value="{{ $jawaban->id }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">
						<label for="nama_tugas" class="col-sm-4 col-form-label">Nama Tugas</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama_tugas" name="nama_tugas" value="{{ $jawaban->tugas_post->judul }}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_peserta" class="col-sm-4 col-form-label">Nama Peserta</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="{{ $jawaban->user_account->user_profil->nama }}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nilai" class="col-sm-4 col-form-label">Nilai</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nilai" name="nilai" value="" placeholder="Nilai Range 0-100">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Tambah Nilai</button>
							<a href="{{ route('getMateriPage') }}" class="btn btn-default">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

