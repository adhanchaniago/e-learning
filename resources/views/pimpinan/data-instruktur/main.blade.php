@extends('template.default')

@section('title', 'Data Instruktur')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Data Instruktur</p><hr>
		<a href="{{ route('getPDFInstruktur') }}" class="btn btn-green" target="_blank"><i class="fa fa-file-pdf-o"></i> Export To PDF</a><br><br>
		<table id="tb-test" class="table table-bordered display responsive nowrap" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Tmp/Tgl Lahir</th>
					<th>Jekel</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Cabang Asal</th>
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
				ajax: '{!! route('getDataInstruktur') !!}',
				columns: [
					{ data: 'nik', name: 'nik' },
					{ data: 'nama', name: 'nama' },
					{ data: 'ttl', name: 'ttl' },
					{ data: 'jekel', name: 'jekel' },
					{ data: 'agama', name: 'agama' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'telepon', name: 'telepon' },
					{ data: 'cabang', name: 'cabang' },
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Data Instruktur';
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