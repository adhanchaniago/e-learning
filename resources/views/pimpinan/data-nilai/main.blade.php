@extends('template.default')

@section('title', 'Data Peserta')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Data Peserta</p><hr>
		<a href="{{ route('getPDFNilai', [$angkatanID]) }}" class="btn btn-green" target="_blank"><i class="fa fa-file-pdf-o"></i> Export To PDF</a><br><br>
		<table id="tb-test" class="table table-bordered display responsive nowrap" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Cabang Asal</th>
					@foreach ($mataPelajaran as $pelajaran)
						<th>{{ $pelajaran->mata_pelajaran->slug }}</th>
					@endforeach
					<th>Total</th>
					<th>Rata-Rata</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($nilaiArray as $element)
					<tr>
						<td>{{ $element['users_nik'] }}</td>
						<td>{{ $element['users_nama'] }}</td>
						<td>{{ $element['users_cabang'] }}</td>
						@foreach ($mataPelajaran as $pelajaran)
							<td class="text-center">{{ $element[$pelajaran->mata_pelajaran->slug] }}</td>
						@endforeach
						<td class="text-center">{{ $element['total'] }}</td>
						<td class="text-center">{{ $element['rata'] }}</td>
					</tr>
				@endforeach
			</tbody>
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
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Data Nilai';
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