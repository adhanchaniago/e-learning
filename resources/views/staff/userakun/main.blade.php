@extends('template.default')

@section('title', 'User Akun')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Kelola User Akun</p><hr>
		<a href="{{ route('getAddUserAkunPage') }}" class="btn btn-green">TAMBAH USER AKUN</a>
		<hr>
		<p><strong>Tabel Angkatan Diklat :</strong></p>
		<table id="tb-test" class="table table-bordered display responsive nowrap" width="100%" style="font-size: 12px;">
			<thead>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
					<th>Tmp/Tgl Lahir</th>
					<th>Jns Kelamin</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Email</th>
					<th>Status</th>
					<th>Hak Akses</th>
					<th>Cabang Asal</th>
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
				ajax: '{!! route('getDataUserAkun') !!}',
				columns: [
					{ data: 'nik', name: 'nik' },
					{ data: 'nama', name: 'nama' },
					{ data: 'ttl', name: 'ttl' },
					{ data: 'jenis_kelamin', name: 'jenis_kelamin' },
					{ data: 'agama', name: 'agama' },
					{ data: 'alamat', name: 'alamat' },
					{ data: 'telepon', name: 'telepon' },
					{ data: 'email', name: 'email' },
					{ data: 'status', name: 'status' },
					{ data: 'hak_akses', name: 'hak_akses' },
					{ data: 'kantor_cabang_id', name: 'kantor_cabang_id' },
					{ data: 'action', name: 'action' },
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
				}, 
				language: {
					url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json'
				}
			});
		});
	</script>

@endpush