@extends('template.default')

@section('title', 'Materi Pelajaran')

@section('content')

<div class="card">
	<div class="card-body top-card-green">
		<p class="category">{{ $materi->judul_materi }}</p><hr>
		<p>Uploader : <strong>{{ $materi->users_account->user_profil->nama }}</strong></p>
		<p>Mata Pelajaran : <strong>{{ $materi->mata_pelajaran->nama_pelajaran }}</strong></p><hr>
		<video width="100%" controls>
			<source src="{{ asset('storage/'.$filelocation) }}" type="video/mp4">
		</video><hr>
		<p>Keterangan : {{ $materi->keterangan }}</p>
	</div>
</div>

@endsection
