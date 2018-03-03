@extends('template.default')

@section('title', 'Lihat Tugas')

@section('content')

<div class="card top-card-green">
	<div class="card-body">
		<p class="category">{{ $tugas->judul }}</p>
		<p style="font-size: 8pt;">{{ $tugas->created_at->format('d M Y H:i') }} | {{ count($tugas->tugas_jawaban) }} Jawaban</p>
		<p>{!! $tugas->deskripsi !!}</p>
	</div>
	@foreach ($tugas->tugas_jawaban as $value)
		<div class="card-footer">
			<a href="#" target="_blank"><p class="cv-thumbnail-title"><strong>{{ $value->user_account->user_profil->nama }}</strong></p></a>
			<p style="font-size: 8pt;">{{ $tugas->created_at->format('d M Y H:i') }}</p>
			<p>{!! $value->keterangan !!}</p>
			@if (count($value->tugas_nilai) != 0)
				<p style="font-size: 12pt;"><strong>Nilai : {{ $value->tugas_nilai->get(0)['nilai'] }}/100</strong></p>
				<a href="{{ route('getFileJawabanTugas', [$value->id]) }}" class="btn btn-green">Lihat Jawaban</a> &nbsp;
				<a href="{{ route('getBeriNilaiPage', [$value->id]) }}" class="btn btn-green disabled">Beri Nilai</a>
			@else
				<p style="font-size: 12pt;"><strong>Nilai : Belum Dinilai</strong></p>
				<a href="{{ route('getFileJawabanTugas', [$value->id]) }}" class="btn btn-green">Lihat Jawaban</a> &nbsp;
				<a href="{{ route('getBeriNilaiPage', [$value->id]) }}" class="btn btn-green">Beri Nilai</a>
			@endif
			
		</div>
	@endforeach
</div>

@endsection

