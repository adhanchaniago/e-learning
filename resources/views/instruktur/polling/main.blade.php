@extends('template.default')

@section('title', 'Polling')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola Polling</p><hr>
		<a href="{{ route('getAddPollingPage') }}" class="btn btn-green">TAMBAH POLLING</a>
		<hr>
	</div>
</div>

<div class="row">
	
	@foreach ($listPolling as $value)
		
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-body" style="min-height: 1px;">
					<p class="category"><a href="{{ route('getPollingDetail', [$value->id]) }}" class="cv-thumbnail-title" target="_blank">{{ $value->judul }}</a></p><hr>
					<p>{{ $value->deskripsi }}</p>
				</div>
				<div class="card-footer">
					{{ \Carbon\Carbon::parse($value->created_at)->format('d M Y') }}
				</div>
			</div>
		</div>

	@endforeach

</div>

@endsection