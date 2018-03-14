@extends('template.default')

@section('title', 'Nilai Pre-Test')

@section('content')

	<div class="card">
		<div class="card-body left-card-green" style="min-height: 1px;">
			<p class="category">Tabel Nilai Pre-Test</p><hr>
			<p>Tabel Nilai :</p>
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th>Nama</th>
						@for ($i = 0; $i < $countSoal; $i++)
							<th class="text-center">S{{ $i+1 }}</th>
						@endfor
						<th class="text-center">T</th>
						<th class="text-center">R</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($dataNilai as $key => $value)
						<tr>
							<td class="text-center">{{ $key+1 }}</td>
							<td>{{ $value['nama'] }}</td>
							@foreach ($value['nilai'] as $element)
								<td class="text-center">{{ $element }}</td>
							@endforeach
							<td class="text-center">{{ $value['total'] }}</td>
							<td class="text-center">{{ round($value['rata'], 1) }}</td>
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
				url: '{!! route('getNilaiPretestData', [$kelasID]) !!}', 
				method: 'GET',
				dataType: 'json',
				success: function(data) {

					var chartData = {
						labels: data.data['peserta'],
						datasets: []
					};

					$.each(data.data['nilai'], function(key, value){

						$tambah = {
							label: value['nama'],
							fill: false,
							borderColor: value['warna'],
							data: value['nilai'],
						}

						chartData.datasets.push($tambah);

					})

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