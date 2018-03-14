@extends('template.default')

@section('title', 'Daftar Post-Test')

@section('content')

<div class="row">
	@foreach ($kelasVirtual as $element)
		<div class="col-md-6">
			<div class="card">
				<div class="card-body top-card-green">
					<div class="media-body text-center">
						<p class="category">{{ $element->mata_pelajaran->nama_pelajaran }}</p>
						<p>{{ $element->users_account->user_profil->nama }}</p>
						<hr>
						@if (count($element->post_test->first()->soal->first()->jawaban->where('users_account_id', Auth::user()->id)) > 0)
							<a href="{{ route('getPosttestSoal', [$element->id]) }}" class="btn btn-green disabled">SUDAH DIKERJAKAN</a>
						@else
							<a href="{{ route('getPosttestSoal', [$element->id]) }}" class="btn btn-green">MULAI POST-TEST</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>

@endsection