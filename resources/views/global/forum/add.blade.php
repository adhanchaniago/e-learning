@extends('template.default')

@section('title', 'Tambah Topik Diskusi')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Tambah Topik Diskusi</p><hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-12">
				@include('template.partials.formerror')
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<div class="form-group row">
						<label for="judul" class="col-sm-2 col-form-label">Judul</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="judul" name="judul">
						</div>
					</div>
					<div class="form-group row">
						<label for="konten" class="col-sm-2 col-form-label">Konten</label>
						<div class="col-sm-10">
							<textarea name="konten" id="post-konten"></textarea>
						</div>
					</div>
					<br>
					<div class="form-group row">
						<div class="col-md-2"></div>
						<div class="col-sm-10 text-right">
							<a href="{{ route('getForumListPage') }}" class="btn btn-default">Batal</a>
							<button type="submit" class="btn btn-green">Tambah Topik Diskusi</button>
						</div>
					</div>
				</form>
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
			selector: '#post-konten',
			height: 300,
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

	</script>

@endpush