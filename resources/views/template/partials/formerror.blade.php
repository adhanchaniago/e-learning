@if ($errors->any())

	<div class="alert alert-danger animated fadeIn" role="alert">
		<div class="container">
			<ul class="list-error">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>

@endif