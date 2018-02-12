@extends('template.default')

@section('title', 'Daftar Kelas Virtual')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Daftar Kelas Virtual</p><hr>
		<table id="tb-test" class="table table-bordered display responsive nowrap" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Kelas</th>
					<th>Angkatan Diklat</th>
					<th>Mata Pelajaran</th>
					<th>Status</th>
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
				ajax: '{!! route('getDataVirtualClassList') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'nama_kelas', name: 'nama_kelas' },
					{ data: 'angkatan_diklat_id', name: 'angkatan_diklat_id' },
					{ data: 'mata_pelajaran_id', name: 'mata_pelajaran_id' },
					{ data: 'status', name: 'status' },
					{ data: 'keterangan', name: 'keterangan' },
					{ data: 'action', name: 'action' },
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Kelas Virtual';
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