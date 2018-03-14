@extends('template.default')

@section('title', 'Daftar Kelas Virtual')

@section('content')

<ul class="list-unstyled">
	@foreach ($listKelas as $kelas)
		<div class="card">
			<div class="card-body left-card-green">
				<li class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-1">
							<a href="{{ route('getMainDataVirtualClassPage', $kelas->id) }}" class="cv-thumbnail-title">
								{{ $kelas->nama_kelas }} 
							</a>
						</h5>
						@if ($kelas->status == '0')
							<span class="badge badge-danger">Offline</span>
						@elseif ($kelas->status == '1')
							<span class="badge badge-success">Online</span>
						@elseif ($kelas->status == '5')
							<span class="badge badge-danger">Finished</span>
						@endif
						<span class="badge badge-default">{{ $kelas->mata_pelajaran->nama_pelajaran }}</span> 
						<br><br>
						<p>{{ $kelas->keterangan }}</p>
						<p class="cv-thumbnail-foot">
							<strong>{{ $kelas->angkatan_diklat->nama_diklat }}</strong> | 
							<a href="{{ route('getTambahPretestPage', [$kelas->id]) }}">PRE-TEST</a> <a href="{{ route('getNilaiPretest', [$kelas->id]) }}">NILAI</a> | 
							<a href="{{ route('getTambahPosttestPage', [$kelas->id]) }}">POST-TEST</a> <a href="{{ route('getNilaiPosttest', [$kelas->id]) }}">NILAI</a> |
							<a href="{{ route('getLaporanTest', [$kelas->id]) }}">LAPORAN</a>
						</p>
					</div>
				</li>
			</div>
		</div>
	@endforeach
</ul>

@endsection