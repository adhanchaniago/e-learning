@extends('template.default')

@section('title', 'Live Chat')

@section('content')

	<div class="card">
		<div class="card-body top-card-green">
			<p class="category">Live Chat</p>
			<div class="container">
				<div class="row">
					<div class="col-md-4 chat-left no-padding">
						<div class="chat-search">
							<form action="" method="post" id="formCariContact">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="text" name="vinCariContact" id="vinCariContact" class="form-control search-input" placeholder="Cari User">
								</div>
							</form>
						</div>
						<div class="contact-list">
							<ul class="contacts">
								@foreach ($users as $user)
									<li class="contact" data-id="{{ $user->id }}">
										<div class="wrap">
											<img class="rounded-circle foto-contact pull-left" src="{{ asset('storage/profil/'.$user->user_profil->photo) }}" width="40px;" height="40px;">
											<div class="nama-contact">{{ $user->user_profil->nama }}</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-md-8 chat-right no-padding">
						<div class="chat-head"></div>
						<div class="chat-body">
							<ul>
								{{-- <li class="sent">
									<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
									<p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
								</li>
								<li class="replies">
									<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
									<p>When you're backed against the wall, break the god damn thing down.</p>
								</li> --}}
							</ul>
						</div>
						<div class="chat-foot">
							<form action="" method="post" id="formSendChat">
								<input type="text" name="replied_message" placeholder="Tulis pesan anda disini.">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('style')

<link rel="stylesheet" href="{{ asset('css/chat.css') }}" />

@endpush

@push('script')
	
	<script>
		
		$(function(){

			$('#formCariContact').on('submit', function(e){
				e.preventDefault();
				var cari = $('#vinCariContact').val();
				$.ajax({
					url: '{!! route('gpostCariKontak') !!}',
					method: 'POST',
					dataType: 'json',
					data: {
						cari: cari,
						_token: '{!! csrf_token() !!}'
					},
					success: function(data) {
						$('.contacts').empty();
						$.each(data.data, function(i, item){
							appendCariKontak(item);
						});
					}, 
					error: function(error) {
						console.log('error');
					}
				});
			});

			function appendCariKontak(data) {
				var html = 	'<li class="contact" data-id="'+data.id+'">';
					html +=		'<div class="wrap">';
					html +=			'<img class="rounded-circle foto-contact pull-left" src="/storage/profil/'+data.photo+'" width="40px" height="40px">';
					html +=			'<div class="nama-contact">'+data.nama+'</div>';
					html +=		'</div>';
					html +=	'</li>';
				$('.contacts').hide().append(html).fadeIn('slow');
				$('.contact').bind('click', function(){
					var dataid = $(this).data('id');
					getChat(dataid);
				});
				return html;
			}

			$('.contact').on('click', function(){
				var dataid = $(this).data('id');
				getChat(dataid);
			});

			function getChat(id){
				$.ajax({
					url: '{!! route('postGetChat') !!}',
					method: 'POST',
					dataType: 'json',
					data: {
						id: id,
						_token: '{!! csrf_token() !!}'
					},
					success: function(data) {
						$('.chat-head').empty();
						getDetailChat(data.data);
					},
					error: function(error) {
						console.log('error');
					}
				});
			}

			function getDetailChat(data) {
				var html = 	'<img src="/storage/profil/'+data.targetPhoto+'" class="foto-head pull-left rounded-circle" height="40px" width="40px">';
					html +=	'<div class="nama-head">'+data.targetNama+' <br> '+data.targetAkses+'</div>';
				$('.chat-head').append(html);
				return html;
			}

		});

	</script>

@endpush