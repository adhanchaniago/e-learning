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
						<a class="nav-link" id="anggota-tab" data-toggle="tab" href="#anggota" role="tab" aria-controls="anggota" aria-selected="false">Anggota</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="kiriman" role="tabpanel" aria-labelledby="kiriman-tab">
				<div class="post-area">
					@foreach ($posting as $value)
						<div class="card" data-postid="{{ $value->id }}">
					 		<div class="card-body" style="min-height: 50px;">
					 			<div class="media">
					 				<img class="mr-3 rounded-circle" src="{!! asset('storage/profil/'.$value->user_account->user_profil->photo) !!}" height="70px" width="70px"> 
					 				<div class="media-body">
					 					<p><a href="{{ route('getUserProfil', [$value->user_account->id]) }}" class="cv-thumbnail-title" target="_blank"><strong>{{ $value->user_account->user_profil->nama }}</strong></a><p>
										<p>{!! $value->konten !!}</p>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="text-right" style="font-size: 10pt">
					 				<span class="pull-left">{{ count($value->comment) }} Komentar</span>
									<span>{{ $value->created_at->format("d M Y H:i") }}</span>
								</div>
					 		</div>
					 		<div class="comment-area">
					 			@if (count($value->comment) > 0)
					 				@foreach ($value->comment->sortBy('created_at') as $element)
										<div class="card-footer">
											<div class="container">
									 			<div class="media">
													<img class="mr-3 rounded-circle" src="{{ asset('storage/profil/'.$element->user_account->user_profil->photo) }}" alt="Generic placeholder image" style="height: 50px; width: 50px;">
													<div class="media-body">
														<p style="font-size: 10pt;">
															<a href="{{ route('getUserProfil', [$element->user_account->id]) }}" class="cv-thumbnail-title" target="_blank"><strong>{{ $element->user_account->user_profil->nama }}</strong></a><small class="pull-right">{{ $element->created_at->format('d M Y H:i') }}</small> <br>
															{{ $element->konten }}
														</p>
													</div>
												</div>
											</div>
										</div>
					 				@endforeach
					 			@endif
					 		</div>
						</div>
					@endforeach
					{{ $posting->links() }}
				</div>
			</div>
			<div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
				<div class="tugas-area">
					@foreach ($tugas as $item)
						<div class="card" data-id="{{ $item->id }}">
							<div class="card-body" style="min-height: 50px;">
								<div class="media">
									<div class="media-body">
										<a href="" target="_blank"><h5 class="mt-0 mb-1 cv-thumbnail-title">{{ $item->judul }}</h5></a>
										<p style="font-size: 8pt;">Pada : {{ $item->created_at->format('d M Y H:i') }}</p>
										{!! $item->deskripsi !!}
									</div>
								</div>
							</div>
							<div class="card-footer">
								{{ count($item->tugas_jawaban) }} Responden 
								<span class="pull-right">{{ $item->created_at->format('d M Y H:i') }}</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="tab-pane fade" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
				<div class="card">
					<div class="card-body" style="min-height: 50px;">
						<p class="category">{{ count($anggota)+1 }} Anggota</p><hr>
						<div class="media">
							<img class="align-self-center mr-3" src="{{ asset('storage/profil/'.$kelas->users_account->user_profil->photo) }}" height="100px" width="100px">
							<div class="media-body">
								<p><a href="" class="cv-thumbnail-title"><strong>{{ $kelas->users_account->user_profil->nama }}</strong></a><p>
								Instruktur
							</div>
						</div><hr>
						@foreach ($anggota as $peserta)
							<div class="media">
								<img class="align-self-center mr-3" src="{{ asset('storage/profil/'.$peserta->user_account->user_profil->photo) }}" height="100px" width="100px">
								<div class="media-body">
									<p><a href="{{ route('getUserProfil', [$peserta->user_account->id]) }}" target="_blank" class="cv-thumbnail-title"><strong>{{ $peserta->user_account->user_profil->nama }}</strong></a><p>
									Peserta
								</div>
							</div><hr>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')

	<script src="{{ asset('vendor/tinymce/jquery.tinymce.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
	
	<script>	

		tinymce.init({
			selector: '#tugas-konten',
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

		tinymce.init({
			selector: '#post-konten',
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

			var channel = pusher.subscribe('kelas_virtual');

			channel.bind('new-post', function(data) {
				var newData = JSON.parse(data.data);
				appendPost(newData);
				location.reload();
			});

			channel.bind('new-comment', function(data) {
				var newData = JSON.parse(data.data);
				appendComment(newData);
			});

			channel.bind('new-tugas', function(data) {
				var newData = JSON.parse(data.data);
				appendTugas(newData);
			});

			function appendTugas(tugas) {
				if(typeof tugas.id == 'undefined' || tugas.id <= 0) {
					return false;
				}

				var tugasBox = 	'<div class="card" data-id="'+tugas.id+'">';
					tugasBox +=		'<div class="card-body" style="min-height: 50px;">';
					tugasBox +=			'<div class="media">';
					tugasBox +=				'<div class="media-body">';
					tugasBox +=					'<a href=""><h5 class="mt-0 mb-1 cv-thumbnail-title">'+tugas.judul+'</h5></a>';
					tugasBox +=					'<p style="font-size: 8pt;">Pada : '+tugas.waktu+'</p>';
					tugasBox +=					tugas.deskripsi;
					tugasBox +=				'</div>';
					tugasBox +=			'</div>';
					tugasBox +=		'</div>';
					tugasBox +=	'</div>';

				$('.tugas-area').hide().prepend(tugasBox).fadeIn('slow');
				return tugasBox;
			}

			function appendPost(post) {
				if(typeof post.id == 'undefined' || post.id <= 0) {
					return false;
				}

				var postBox = 	'<div class="card" id="new_add_section">';
					postBox += 		'<div class="card-body" style="min-height: 50px;">';
					postBox += 			'<div class="media">';
					postBox += 				'<img class="mr-3 rounded-circle" src="/storage/profil/'+post.photo+'" height="70px"; width="70px";>'; 
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
					postBox +=	'</div>';

				$('.post-area').hide().prepend(postBox).fadeIn('slow');
				$('#new_add_section').attr('data-postid', post.id);

				return postBox;
			}

			function appendComment(comment) {
				if(typeof comment.id == 'undefined' || comment.id <= 0) {
					return false;
				}

				var commentBox = 	'<div class="card-footer">';
					commentBox +=		'<div class="container">';
					commentBox += 			'<div class="media">';
					commentBox +=				'<img class="mr-3 rounded-circle" src="/storage/profil/'+comment.photo+'" alt="Generic placeholder image" style="height: 50px; width: 50px;">';
					commentBox +=				'<div class="media-body">';
					commentBox +=					'<p style="font-size: 10pt;">';
					commentBox +=						'<a href="" class="cv-thumbnail-title"><strong>'+comment.nama+'</strong></a>';
					commentBox +=						'<small class="pull-right">'+comment.waktu+'</small><br>';
					commentBox +=						comment.konten;
					commentBox +=					'</p>';
					commentBox +=				'</div>';
					commentBox +=			'</div>';
					commentBox +=		'</div>'
					commentBox +=	'</div>';

				$('.card[data-postid="'+comment.post_id+'"]').children('.comment-area').hide().append(commentBox).fadeIn('slow');

				return commentBox;
			}

		});

	</script>

@endpush