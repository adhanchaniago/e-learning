@extends('template.default')

@section('title', 'Forum Diskusi')

@section('content')

<ul class="list-unstyled">
	<div class="card">
		<div class="card-body top-card-green">
			<div style="margin-top: 20px;">
				<ul class="list-unstyled">
					<li class="media">
						<img class="mr-3 rounded" src="{{ asset('storage/profil/'.$post->user_account->user_profil->photo) }}" width="100px" height="100px">
						<div class="media-body">
							<a href="{{ route('getLihatForumPage', [$post->id]) }}"><h3 class="mt-0 mb-1 text-green">{{ $post->judul }}</h3></a>
							<p style="font-size: 10pt;">Oleh : <a href="">{{ $post->user_account->user_profil->nama }}</a> ({{ $post->user_account->hak_akses->nama }}) | Pada : {{ $post->created_at->format('d M Y H:i') }}</p><hr>
							{!! $post->konten !!}<hr>
							<p>
								<a href="{{ route('getLihatForumPage', [$post->id]) }}">{{ count($post->comment) }} Komentar</a>
								@if (Auth::user()->id == $post->users_account_id)
									<span class="pull-right">
										<a href="#" class="btn btn-icon btn-sm btn-round btn-green"><i class="fa fa-pencil"></i></a>
										<a href="#" class="btn btn-icon btn-sm btn-round btn-danger"><i class="fa fa-trash"></i></a>
									</span>
								@endif
							</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="comment-area">
			@foreach ($post->comment as $value)
				<div class="card-footer">
					<div class="container">
						<div class="media">
							<img class="mr-3 rounded-circle" src="{{ asset('storage/profil/'.$value->user_account->user_profil->photo) }}" width="80px" height="80px">
							<div class="media-body">
								<a href=""><h5 class="mt-0 mb-1 cv-thumbnail-title">{{ $value->user_account->user_profil->nama }}</h5></a>
								<p style="font-size: 8pt;">{{ $value->user_account->hak_akses->nama }} | Pada : {{ $value->created_at->format('d M Y H:i') }}</p>
								{!! $value->konten !!}
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="card-footer">
			<div class="container">
				<form action="" method="post" id="comment-form">
					<p>Tulis Komentar atau Tanggapan Anda Disini :</p>
					<input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
					<textarea name="konten" id="post-comment"></textarea><br>
					<button type="submit" class="pull-right btn btn-green">Tambah Komentar</button>
				</form>
				<br><br><br>
			</div>
		</div>
	</div>
</ul>

@endsection

@push('script')

	<script src="{{ asset('vendor/tinymce/jquery.tinymce.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
	
	<script>	

		tinymce.init({
			selector: '#post-comment',
			height: 150,
			theme: 'modern',
			file_browser_callback : elFinderBrowser,
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste imagetools wordcount"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		});

		function elFinderBrowser (field_name, url, type, win) {
			tinymce.activeEditor.windowManager.open({
				file: '{!! route('elfinder.tinymce4') !!}',
				title: 'File Manager',
				width: 900,
				height: 450,
				resizable: 'yes'
			}, {
				setUrl: function (url) {
					win.document.getElementById(field_name).value = url;
				}
			});
			return false;
		}

		$(function() {

			var pusher = new Pusher('6488bf9c8db71076f95c', {
				cluster: 'ap1',
				encrypted: true
			});

			var channel = pusher.subscribe('forum_diskusi');

			channel.bind('new-comment', function(data) {
				var newData = JSON.parse(data.data);
				appendComment(newData);
			});

			function appendComment(comment) {
				if(typeof comment.id == 'undefined' || comment.id <= 0) {
					return false;
				}

				var commentBox = 	'<div class="card-footer">';
					commentBox +=		'<div class="container">';
					commentBox += 			'<div class="media">';
					commentBox +=				'<img class="mr-3 rounded-circle" src="/storage/profil/'+comment.photo+'" alt="Generic placeholder image" style="height: 50px; width: 50px;">';
					commentBox +=				'<div class="media-body">';
					commentBox += 					'<a href=""><h5 class="mt-0 mb-1 cv-thumbnail-title">'+comment.nama+'</h5></a>';
					commentBox +=					'<p style="font-size: 8pt;">'+comment.hak_akses+' | Pada : '+comment.waktu+'</p>';
					commentBox +=					comment.konten;
					commentBox +=				'</div>';
					commentBox +=			'</div>';
					commentBox +=		'</div>'
					commentBox +=	'</div>';

				$('.comment-area').hide().append(commentBox).fadeIn('slow');

				return commentBox;
			}

			$('#comment-form').on('submit', function(event) {
				event.preventDefault();
				$.ajax({
					url: '{!! route('postForumComment') !!}',
					method: 'POST',
					dataType: 'json',
					beforeSend: function() {
						$('#post-comment').prop('disabled', 'disabled');
					},
					data: {
						post_id: $('#post_id').val(),
						konten: $('#post-comment').val(),
						_token: '{!! csrf_token() !!}'
					},
					success: function(data) {
						$('#post-comment').val('');
						$('#post-comment').removeAttr('disabled');
					},
					error: function(error) {
						$('#post-comment').removeAttr('disabled');
						alert('error');
					}
				});
			});

		});

	</script>

@endpush