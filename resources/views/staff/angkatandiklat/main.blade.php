@extends('template.default')

@section('title', 'Angkatan Diklat')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola Angkatan Diklat</p><hr>
		<a href="{{ route('getAddAngkatanDiklatPage') }}" class="btn btn-green">TAMBAH ANGKATAN DIKLAT</a>
		<hr>
		<p><strong>Tabel Angkatan Diklat :</strong></p>
		<table id="tb-test" class="table table-bordered" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Diklat</th>
					<th>Mulai</th>
					<th>Selesai</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
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
				processing: true,
				serverSide: true,
				ajax: '{!! route('getDataAngkatanDiklat') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nama_diklat', name: 'nama_diklat' },
					{ data: 'tanggal_mulai', name: 'tanggal_mulai' },
					{ data: 'tanggal_selesai', name: 'tanggal_selesai' },
					{ data: 'keterangan', name: 'keterangan' },
					{ data: 'action', name: 'action' }
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Angkatan Diklat';
							}
						} ),
						renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
							tableClass: 'table'
						} )
					}
				}
			});
		});
	</script>

@endpush