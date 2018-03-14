@extends('template.default')

@section('title', 'Laporan Test')

@section('content')

	<div class="card">
		<div class="card-body left-card-green" style="min-height: 1px;">
			<p class="category">Tabel Laporan Test</p><hr>
			<p>Tabel Nilai :</p>
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th class="text-center">Pre-Test</th>
						<th class="text-center">Post-Test</th>
						<th class="text-center">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($dataNilai as $key => $element)
						<tr>
							<td class="text-center">{{ $key+1 }}</td>
							<td>{{ $element['nik'] }}</td>
							<td>{{ $element['nama'] }}</td>
							<td class="text-center">{{ $element['pre-test'] }}</td>
							<td class="text-center">{{ $element['post-test'] }}</td>
							<td class="text-center">{{ $element['keterangan'] }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<p>Grafik Nilai :</p>
			<canvas id="myChart"></canvas>
		</div>
	</div>

@endsection

@push('script')

	<script src="{{ asset('vendor/chart/chart.min.js') }}" type="text/javascript"></script>
	<script>

		$(function() {

			$.ajax({
				url: '{!! route('getTestLaporanData', [$kelasID]) !!}', 
				method: 'GET',
				dataType: 'json',
				success: function(data) {

					var chartData = {
						labels: data.data['peserta'],
						datasets: [{
							label: 'Pre-Test',
							fill: false,
							borderColor: 'blue',
							data: data.data['pre-test'],
						},{
							label: 'Post-Test',
							fill: false,
							borderColor: 'red',
							data: data.data['post-test'],
						}]
					};

					var ctx = document.getElementById('myChart').getContext('2d');
					var chart = new Chart(ctx, {
						type: 'line',
						data: chartData,
						options: {
							
						}
					});
				}
			});

		});

	</script>

@endpush