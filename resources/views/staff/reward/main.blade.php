@extends('template.default')

@section('title', 'Penghargaan')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola Penghargaan</p><hr>
		<a href="{{ route('getAddRewardPage') }}" class="btn btn-green">TAMBAH PENGHARGAAN</a>
		<hr>
		<p><strong>Tabel Penghargaan :</strong></p>
		<table id="tb-test" class="table table-bordered" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Keterangan</th>
					<th style="width: 15%">Aksi</th>
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
				ajax: '{!! route('getRewardData') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nama', name: 'nama' },
					{ data: 'keterangan', name: 'keterangan' },
					{ data: 'action', name: 'action' }
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Mata Pelajaran';
							}
						}),
						renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
							tableClass: 'table'
						})
					}
				}, 
				language: {
					url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
				}
			});
		});
	</script>

@endpush