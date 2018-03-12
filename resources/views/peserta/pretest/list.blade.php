@extends('template.default')

@section('title', 'Daftar Pre-Test')

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
						@if (count($element->pre_test->first()->soal->first()->jawaban) > 0)
							<a href="{{ route('getPretestSoal', [$element->id]) }}" class="btn btn-green disabled">SUDAH DIKERJAKAN</a>
						@else
							<a href="{{ route('getPretestSoal', [$element->id]) }}" class="btn btn-green">MULAI PRE-TEST</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>

@endsection