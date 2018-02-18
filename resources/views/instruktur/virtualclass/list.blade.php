@extends('template.default')

@section('title', 'Daftar Kelas Virtual')

@section('content')

{{-- <div class="card">
	<div class="card-body">
		<p class="category">Daftar Kelas Virtual</p><hr>
		<p>Silahkan pilih Kelas Virtual :</p>
	</div>
</div> --}}

<ul class="list-unstyled">
	@foreach ($listKelas as $kelas)
		<div class="card">
			<div class="card-body top-card-green">
				<li class="media">
					{{-- <img class="mr-3" src="{{ asset('img/vc-thumbnail.png') }}" alt="Generic placeholder image"> --}}
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
						<p class="cv-thumbnail-foot"><strong>{{ $kelas->angkatan_diklat->nama_diklat }}</strong></p>
					</div>
				</li>
			</div>
		</div>
	@endforeach
</ul>

@endsection