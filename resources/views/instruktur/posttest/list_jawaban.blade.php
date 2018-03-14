@extends('template.default')

@section('title', 'List Jawaban Pre-Test')

@section('content')

@foreach ($listPeserta as $value)

	<div class="card">
		<div class="card-body left-card-green" style="min-height: 1px;">
			<p class="category">{{ $value->user_account->user_profil->nik.' - '.$value->user_account->user_profil->nama }}</p>
			<a href="{{ route('getDetailJawabanPosttest', [$kelasID, $value->user_account->id]) }}" class="btn btn-green">EVALUASI JAWABAN</a>
		</div>
	</div>

@endforeach

@endsection