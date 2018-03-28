@extends('template.default')

@section('title', 'Soal Pre-Test')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body" style="min-height: 1px;">
				<h5 class="text-center category">WAKTU TEST</h5>
				<h1 class="text-center" id="hitung-mundur"></h1>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body top-card-green">
				<div class="media-body">
					<p class="category">Pre-Test {{ $kelas->mata_pelajaran->nama_pelajaran }} | <span>WAKTU 60:60</span></p>
					<hr>
					<p>Silahkan jawab beberapa pertanyaan di bawah ini :</p>
					<form  id='form-test' action="" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@foreach ($listSoal as $key => $value)
						@if ($value->jenis_soal == 'objektif')
							<div>
								<input type="hidden" name="soal_id[]" value="{{ $value->id }}">
								<table width="100%">
									<tr>
										<td width="5%">{{ $key+1 }}.</td>
										<td colspan="2">{{ $value->soal }}</td>
									</tr>
									<tr>
										<td rowspan="2"></td>
										<td>
											<input type="radio" name="jawaban_{{ $key }}" value="{{ $value->opsi_a }}"> 
											A. {{ $value->opsi_a }}
										</td>
										<td>
											<input type="radio" name="jawaban_{{ $key }}" value="{{ $value->opsi_b }}"> 
											B. {{ $value->opsi_b }}
										</td>
									</tr>
									<tr>
										<td>
											<input type="radio" name="jawaban_{{ $key }}" value="{{ $value->opsi_c }}"> 
											C. {{ $value->opsi_c }}
										</td>
										<td>
											<input type="radio" name="jawaban_{{ $key }}" value="{{ $value->opsi_d }}"> 
											D. {{ $value->opsi_d }}
										</td>
									</tr>
								</table>
								<hr>
							</div>
						@elseif ($value->jenis_soal == 'essay')
							<div>
								<input type="hidden" name="soal_id[]" value="{{ $value->id }}">
								<table width="100%">
									<tr>
										<td width="5%">{{ $key+1 }}.</td>
										<td colspan="2">{{ $value->soal }}</td>
									</tr>
									<tr>
										<td></td>
										<td width="10%">Jawaban :</td>
										<td>
											<input type="text" name="jawaban_{{ $key }}" class="form-control">
										</td>
									</tr>
								</table>
								<hr>
							</div>
						@endif
					@endforeach
						<input type="submit" value="Submit Jawaban" class="btn btn-green">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
	
	<script src="{{ asset('vendor/countdown/jquery.countdown.min.js') }}" type="text/javascript"></script>
	<script>
		
		$(function(){

			// 5400000 = 90Menit  $(this).html(event.strftime(totalHours + ' : %M : %S '));
			// 1000	= 1Detik

			var waktuLimit = new Date().getTime() + 5400000;

			$('#hitung-mundur').countdown(waktuLimit, function(e) {
				$(this).html(e.strftime('%H : %M : %S '));
			}).on('finish.countdown', function(event) {
				console.log('selesai');
				$('#form-test').trigger('submit');
			});

		});

	</script>

@endpush