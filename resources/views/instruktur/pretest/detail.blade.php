@extends('template.default')

@section('title', 'List Jawaban Pre-Test')

@section('content')

	<div class="card">
		<div class="card-body left-card-green" style="min-height: 1px;">
			<p class="category">{{ $user->user_profil->nik.' - '.$user->user_profil->nama }}</p>
			<p>Materi : {{ $kelas->mata_pelajaran->nama_pelajaran }}</p>
			<p>Jawaban: </p> <hr>
			<form action="" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="user_id" value="{{ $user->id }}">
				@foreach ($listSoal as $key => $value)
					@if ($value->jenis_soal == 'essay')
						<div>
							<table width="100%">
								<tr>
									<td width="5%">{{ $key+1 }}.</td>
									<td colspan="2">{{ $value->soal }}</td>
									<td rowspan="3" width="1%">
										<input type="hidden" name="soal_id[]" value="{{ $value->id }}">
										<input type="text" name="nilai_{{ $key }}" placeholder="Nilai 0-100" style="width: 100px;" value="{{ @$value->jawaban->where('users_account_id', $user->id)->first()->nilai }}">
									</td>
								</tr>
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td colspan="2">Jawaban : {{ @$value->jawaban->where('users_account_id', $user->id)->first()->jawaban }}</td>
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
									<td rowspan="5" width="1%">
										<input type="hidden" name="soal_id[]" value="{{ $value->id }}">
										<input type="text" name="nilai_{{ $key }}" placeholder="Nilai 0-100" style="width: 100px;" value="{{ @$value->jawaban->where('users_account_id', $user->id)->first()->nilai }}">
									</td>
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
								<tr>
									<td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td>Jawaban : {{ @$value->jawaban->where('users_account_id', $user->id)->first()->jawaban }}</td>
								</tr>
							</table>
						</div>
						<hr>
					@endif
				@endforeach
				<div class="text-right">
					<input type="submit" value="Submit Nilai" class="btn btn-green">
				</div>
			</form>
		</div>
	</div>

@endsection