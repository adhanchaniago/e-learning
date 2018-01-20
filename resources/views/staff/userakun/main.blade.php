@extends('template.default')

@section('title', 'Staff Home')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola User Akun</p><hr>
		<p>
			Kelola User Akun
		</p>
		<div>
			<table id="tb-test" class="table table-bordered">
				<thead>
					<tr>
						<th>NIK</th>
						<th>Nama</th>
						<th>header</th>
						<th>header</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@push('style')

	<link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" />

@endpush


@push('script')
	
	<script src="{{ asset('vendor/datatables/datatables.min.js') }}" type="text/javascript"></script>
	<script>
		$(function(){
			$('#tb-test').DataTable({

			// 	responsive: {
			// 		details: {
			// 			display: $.fn.dataTable.Responsive.display.modal( {
			// 				header: function ( row ) {
			// 					var data = row.data();
			// 					return 'Details for '+data[0]+' '+data[1];
			// 				}
			// 			} ),
			// 			renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
			// 				tableClass: 'table table-bordered'
			// 			} )
			// 		}
			// 	}
			// });
		});
	</script>

@endpush
