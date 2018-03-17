@extends('template.default')

@section('title', 'Materi Pelajaran')

@section('content')

<div class="row">
	
	@foreach ($listMateri as $materi)
		
		<div class="col-md-4">
			<div class="card">
				<div class="card-body top-card-green text-center">
					<p class="category" style="font-size: 12pt;">{{ $materi->judul_materi }}</p><hr>
					<p>{{ $materi->mata_pelajaran->nama_pelajaran }}</p>
					<p class="category">{{ $materi->users_account->user_profil->nama }}</p>
					<p>{{ $materi->keterangan }}</p><hr>
					@if ($materi->jenis_file == 'pdf' || $materi->jenis_file == 'ppt')
						<a href="{{ route('getDownloadPMateri', [$materi->id]) }}" class="btn btn-green btn-block">DOWNLOAD</a>
					@elseif ($materi->jenis_file == 'video')
						<a href="{{ route('getLihatMateri', [$materi->id]) }}" class="btn btn-green btn-block">WATCH</a>
					@endif
				</div>
			</div>
		</div>

	@endforeach

</div>

@endsection

@push('style')

	{{-- <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" /> --}}

@endpush


@push('script')
	
	{{-- <script src="{{ asset('vendor/datatables/datatables.min.js') }}" type="text/javascript"></script>
	<script>
		$(function(){
			$('#tb-test').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{!! route('GetDataListPMateri') !!}',
				columns: [
					{ data: 'id', name: 'id' },
					{ data: 'judul_materi', name: 'judul_materi' },
					{ data: 'mata_pelajaran_id', name: 'mata_pelajaran_id' },
					{ data: 'jenis_file', name: 'jenis_file' },
					{ data: 'users_account_id', name: 'users_account_id' },
					{ data: 'keterangan', name: 'keterangan' },
					{ data: 'action', name: 'action' }
				],
				responsive: {
					details: {
						display: $.fn.dataTable.Responsive.display.modal( {
							header: function ( row ) {
								var data = row.data();
								return 'Detail Materi Pelajaran';
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
	</script> --}}

@endpush