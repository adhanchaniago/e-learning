@extends('template.default')

@section('title', 'Polling')

@section('content')

<div class="row">
	
	@foreach ($listPolling as $value)
		
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-body" style="min-height: 1px;">
					<p class="category"><a href="{{ route('getPollingVote', [$value->id]) }}" class="cv-thumbnail-title" target="_blank">{{ $value->judul }}</a></p><hr>
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