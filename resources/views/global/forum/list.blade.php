@extends('template.default')

@section('title', 'Forum Diskusi')

@section('content')

<ul class="list-unstyled">
	<div class="card">
		<div class="card-body top-card-green">
			<p class="category">DAFTAR DISKUSI <a href="{{ route('getAddForumPage') }}" class="btn btn-icon btn-round btn-sm btn-green pull-right"><i class="fa fa-plus"></i></a></p>
			<div style="margin-top: 50px;">
				<ul class="list-unstyled">
					@foreach ($posting as $value)
						<li class="media">
							<img class="mr-3 rounded" src="{{ asset('storage/profil/'.$value->user_account->user_profil->photo) }}" width="100px" height="100px">
							<div class="media-body">
								<a href="{{ route('getLihatForumPage', [$value->id]) }}"><h4 class="mt-0 mb-1 text-green">{{ $value->judul }}</h4></a>
								<p style="font-size: 10pt;">Oleh : <a href="">{{ $value->user_account->user_profil->nama }}</a> ({{ $value->user_account->hak_akses->nama }}) <span class="pull-right">Pada : {{ $value->created_at->format('d M Y H:i') }}</span></p><hr>
								{!! $value->konten !!}<hr>
								<p>
									<a href="{{ route('getLihatForumPage', [$value->id]) }}">{{ count($value->comment) }} Komentar</a>
									@if (Auth::user()->id == $value->users_account_id)
										<span class="pull-right">
											<a href="#" class="btn btn-icon btn-sm btn-round btn-green"><i class="fa fa-pencil"></i></a>
											<a href="#" class="btn btn-icon btn-sm btn-round btn-danger"><i class="fa fa-trash"></i></a>
										</span>
									@endif
								</p>
							</div>
						</li><hr>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</ul>

@endsection