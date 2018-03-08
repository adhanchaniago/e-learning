@extends('template.default')

@section('title', 'Beri Penghargaan')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Beri Penghargaan</p><hr>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="kelas_virtual_id" value="{{ $kelas_virtual_id }}">
					<input type="hidden" name="users_account_id" value="{{ $user->id }}">
					<div class="form-group row">
						<label for="nik" class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nik" name="nik" value="{{ $user->user_profil->nik }}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nama" name="nama" value="{{ $user->user_profil->nama }}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="reward_list_id" class="col-sm-4 col-form-label">Penghargaan</label>
						<div class="col-sm-8">
							<select class="form-control" id="reward_list_id" name="reward_list_id">
								<option></option>
								@foreach ($reward as $value)
									<option value="{{ $value->id }}" data-gambar="{{ $value->gambar }}">{{ $value->nama }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-4"></div>
						<div class="col-sm-8">
							<button type="submit" class="btn btn-green">Beri Penghargaan</button>
							<a href="{{ route('getMainDataVirtualClassPage', [$kelas_virtual_id]) }}" class="btn btn-default">Batal</a>
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

		$('#reward_list_id').select2({
			placeholder: "Pilih Penghargaan",
			allowClear: true,
			templateResult: formatState
		});

		function formatState (state) {
			if (!state.id) { return state.text; }
			var $state = $(
				'<span ><img height="40px" sytle="display: inline-block;" src="/storage/reward/' + state.element.attributes[1].value + '" /> ' + state.text + '</span>'
				);
			return $state;
		}

	});

</script>

@endpush