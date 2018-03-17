@extends('template.default')

@section('title', 'Polling')

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body" style="min-height: 1px;">
				<p class="category">{{ $polling->judul }}</p>
				<p><strong>{{ $polling->deskripsi }}</strong></p>
				<form action="" method="post" accept-charset="utf-8">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="polling_id" value="{{ $polling->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					@include('template.partials.formerror')
					<div class="form-group">
						@foreach ($listDetail as $detail)
							<div class="radio">
								<input class="" type="radio" name="hasil" id="hasil{{ $detail->id }}" value="{{ $detail->id }}">
								<label for="hasil{{ $detail->id }}">
									{{ $detail->deskripsi }}
								</label>
							</div>
						@endforeach
					</div><hr>
					<div class="form-group">
						@if ($count == 0)
							<button type="submit" class="btn btn-green">VOTE Polling</button>
						@else
							<button type="button" class="btn btn-green disabled" aria-disabled="true">Anda Sudah Melakukan Voting</button>
						@endif
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection