@extends('template.default')

@section('title', 'Ubah Foto Profil')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Ubah Foto Profil</p>
		<hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-group row">
						<label for="password_lama" class="col-sm-5 col-form-label">Upload Foto Profil</label>
						<div class="col-sm-7">
							<input type="file" class="form-control" id="foto" name="foto">
						</div>
					</div>	
					<br>
					<div class="form-group row">
						<div class="col-md-5"></div>
						<div class="col-sm-7">
							<button type="submit" class="btn btn-green">Ubah Foto Profil</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

