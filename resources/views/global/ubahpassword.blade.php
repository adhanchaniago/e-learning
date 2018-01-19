@extends('template.default')

@section('title', 'Ubah Password')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Ubah Password</p>
		<hr>
		<p>Silahkan lengkapi form berikut ini :</p>
		<div class="row">
			<div class="col-md-9 offset-md-3">
				@include('template.partials.formerror')
				<form action="" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<div class="form-group row">
						<label for="nama" class="col-sm-5 col-form-label">Password Lama</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="nama" name="nama">
						</div>
					</div>	
					<div class="form-group row">
						<label for="nama" class="col-sm-5 col-form-label">Password Baru</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="nama" name="nama">
						</div>
					</div>	
					<div class="form-group row">
						<label for="nama" class="col-sm-5 col-form-label">Konfirmasi Password Baru</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="nama" name="nama">
						</div>
					</div>	
					<br>
					<div class="form-group row">
						<div class="col-md-5"></div>
						<div class="col-sm-7">
							<button type="submit" class="btn btn-green">Ubah Password</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

