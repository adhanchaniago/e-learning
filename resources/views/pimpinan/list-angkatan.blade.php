@extends('template.default')

@section('title', 'Daftar Angkatan Diklat')

@section('content')

@foreach ($angkatanDiklat as $value)
	<div class="card">
		<div class="card-body left-card-green" style="min-height: 1px;">
			<p class="category">{{ $value->nama_diklat }}</p>
			<p>Periode : <strong>{{ \Carbon\Carbon::parse($value->tanggal_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($value->tanggal_selesai)->format('d M Y') }}</strong></p>
			<p>{{ $value->keterangan }}</p>
			<a href="{{ route('getDataPesertaPage', [$value->id]) }}" target="_blank" class="btn btn-green">Data Peserta</a>&nbsp;<a href="{{ route('getDataNilaiPage', [$value->id]) }}" target="_blank" class="btn btn-green">Data Nilai</a>
		</div>
	</div>
@endforeach

@endsection

