@extends('template.default')

@section('title', 'Daftar Angkatan Diklat')

@section('content')

<ul class="list-unstyled">
	@foreach ($listAngkatan as $angkatan)
		<div class="card">
			<div class="card-body left-card-green" style="min-height: 1px;">
				<li class="media">
					<div class="media-body">
						<h5 class="mt-0 mb-1">
							<a href="{{ route('getListKelas', [$angkatan->id]) }}" class="cv-thumbnail-title">
								{{ $angkatan->nama_diklat }} 
							</a>
						</h5>
						<p>{{ $angkatan->keterangan }}</p>
						<p class="category">
							Periode : {{ \Carbon\Carbon::parse($angkatan->tanggal_mulai)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($angkatan->tanggal_selesai)->format('d M Y') }}
						</p>
					</div>
				</li>
			</div>
		</div>
	@endforeach
</ul>

@endsection