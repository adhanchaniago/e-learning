@extends('template.default')

@section('title', 'Materi Pelajaran')

@section('content')

<div class="row">
	<div class="col-md-4">
		<div class="card top-card-green">
			<div class="card-body text-center">
				<p class="category">STATUS KELAS</p>
				@if ($kelas->status == '1')
					<img src="{{ asset('img/online.png') }}" alt="">
				@elseif ($kelas->status == '0')
					<img src="{{ asset('img/offline.png') }}" alt="">
				@else
					<img src="{{ asset('img/offline.png') }}" alt="">
				@endif
				<hr>
				<form action="{{ route('postStatusVirtualClass') }}" method="post">
					<input type="hidden" name="id" value="{{ $kelas->id }}">
					<input type="hidden" name="status" value="{{ $kelas->status }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-green btn-block">UBAH STATUS</button>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body" style="min-height: 1px;">
				<span class="category">DAFTAR KELAS</span>
			</div>
			<div class="list-group">
				@foreach ($listKelas as $value)
					<a href="#" class="list-group-item list-group-item-action">{{ $value->nama_kelas }}</a>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card top-card-green">
			<div class="card-body text-center" style="min-height: 50px;">
				<h3>{{ $kelas->nama_kelas }}</h3>
				<p class="category"><strong>{{ $kelas->users_account->user_profil->nama }} - {{ $kelas->mata_pelajaran->nama_pelajaran }}</strong></p>
				<p>{{ $kelas->angkatan_diklat->nama_diklat }}</p>
			</div>
			<div class="card-footer text-center">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="kiriman-tab" data-toggle="tab" href="#kiriman" role="tab" aria-controls="kiriman" aria-selected="true">Kiriman</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="polling-tab" data-toggle="tab" href="#polling" role="tab" aria-controls="polling" aria-selected="false">Polling</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="anggota-tab" data-toggle="tab" href="#anggota" role="tab" aria-controls="anggota" aria-selected="false">Anggota</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="kiriman" role="tabpanel" aria-labelledby="kiriman-tab">
				<div class="card">
					<div class="card-body" style="min-height: 50px;">
						<form action="" method="POST" id="post-form">
							<div class="form-group">
								<input type="hidden" id="kelas_id" name="kelas_id" value="{{ $kelas->id }}">
								<textarea name="post-konten" id="post-konten" class="form-control" placeholder="Tulis kiriman anda disini." rows="3"></textarea>
							</div>
							<div class="form-group text-right">
								<div class="pull-left">
									<a href="" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-paperclip"></i></a> 
									<a href="" class="btn btn-sm btn-green btn-icon btn-icon-mini btn-round"><i class="fa fa-file-text-o"></i></a>
								</div>
								<button type="reset" class="btn btn-sm btn-default">Reset</button>
								<button type="submit" class="btn btn-green" id="post-submit">Kirim</button>
							</div>
						</form>
					</div>
				</div>
				<div class="post-area">
					@foreach ($posting as $value)
						<div class="card" data-postid="{{ $value->id }}">
					 		<div class="card-body" style="min-height: 50px;">
					 			<div class="media">
					 				<img class="mr-3" src="{!! asset('vendor/now-ui-kit/img/default-avatar.png') !!}" height="70px" width="70px"> 
					 				<div class="media-body">
					 					<p><a href="" class="cv-thumbnail-title"><strong>{{ $value->user_account->user_profil->nama }}</strong></a><p>
										<p>{{ $value->konten }}</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="text-right" style="font-size: 10pt">
					 				<span class="pull-left">Komentar</span>
									<span>{{ $value->created_at->format("d M Y H:i") }}</span>
								</div>
					 		</div>
							<div class="card-footer">
								<form action="" method="POST" id="comment-form">
									<input type="hidden" id="post_id" value="{{ $value->id }}">
					 				<input type="text" id="comment_konten" class="form-control" placeholder="Tulis komentar disini.">
								</form>
					 		</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
				<div class="card">
					<div class="card-body" style="min-height: 50px;">
						INI HALAMAN TUGAS
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="polling" role="tabpanel" aria-labelledby="polling-tab">
				<div class="card">
					<div class="card-body" style="min-height: 50px;">
						INI HALAMAN POLLING
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
				<div class="card">
					<div class="card-body" style="min-height: 50px;">
						INI HALAMAN LIST ANGGOTA
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
	
	<script>	

		$(function() {

			var pusher = new Pusher('6488bf9c8db71076f95c', {
				cluster: 'ap1',
				encrypted: true
			});

			var channel = pusher.subscribe('kelas_virtual');

			channel.bind('new-post', function(data) {
				var newData = JSON.parse(data.data);
				appendPost(newData);
			});

			channel.bind('new-comment', function(data) {
				var newData = JSON.parse(data.data);
				console.log(newData);
			})

			function appendPost(post) {
				if(typeof post.id == 'undefined' || post.id <= 0) {
					return false;
				}

				var postBox = 	'<div class="card">';
					postBox += 		'<div class="card-body" style="min-height: 50px;">';
					postBox += 			'<div class="media">';
					postBox += 				'<img class="mr-3" src="{!! asset('vendor/now-ui-kit/img/default-avatar.png') !!}" height="70px" width="70px">'; 
					postBox += 				'<div class="media-body">';
					postBox += 					'<p><a href="" class="cv-thumbnail-title"><strong>'+post.nama+'</strong></a><p>';
					postBox +=					'<p>'+post.konten+'</p>';
					postBox +=				'</div>';
					postBox +=			'</div>';
					postBox +=		'</div>';
					postBox +=		'<div class="card-footer">';
					postBox +=			'<div class="text-right" style="font-size: 10pt;">';
					postBox += 				'<span class="pull-left">'+post.c_komen+' Komentar</span>';
					postBox +=				'<span>'+post.waktu+'</span>';
					postBox +=			'</div>';
					postBox += 		'</div>';
					postBox +=		'<div class="card-footer">';
					postBox +=			'<form action="" method="POST">';
					postBox += 				'<input type="text" name="" class="form-control" placeholder="Tulis komentar disini.">';
					postBox +=			'</form>';
					postBox += 		'</div>';
					postBox +=	'</div>';

				$('.post-area').hide().prepend(postBox).fadeIn('slow');

				return postBox;
			}

			function appendComment(comment) {

			}

			$('form#post-form').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url: '{!! route('postKelasPost') !!}',
					method: 'POST',
					dataType: 'json',
					beforeSend: function() {
						$('#post-submit').prop('disabled', 'disabled');
					},
					data: {
						kelas_id: $('#kelas_id').val(),
						konten: $('#post-konten').val(),
						_token: '{!! csrf_token() !!}'
					},
					success: function(data) {
						$('#post-konten').val('');
						$('#post-submit').removeAttr('disabled');
					},
					error: function(error) {
						$('#post-submit').removeAttr('disabled');
						alert('error');
					}
				});
			});

			$('form#comment-form').on('submit', function(event) {
				event.preventDefault();
				// console.log($(this).children('#comment_konten').val());
				$.ajax({
					url: '{!! route('postKelasComment') !!}',
					method: 'POST',
					dataType: 'json',
					beforeSend: function() {
						$('#comment_konten').prop('disabled', 'disabled');
					},
					data: {
						post_id: $(this).children('#post_id').val(),
						konten: $(this).children('#comment_konten').val(),
						_token: '{!! csrf_token() !!}'
					},
					success: function(data) {
						$('#comment_konten').val('');
						$('#comment_konten').removeAttr('disabled');
					},
					error: function(error) {
						$('#comment_konten').removeAttr('disabled');
						alert('error');
					}
				});
			});

		});

	</script>

@endpush