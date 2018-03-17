@extends('template.default')

@section('title', 'Detail Polling')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Detail Polling</p><hr>
		<p class="category">{{ $polling->judul }}</p>
		<p><strong>{{ $polling->deskripsi }}</strong></p>
		<p>Tabel Hasil Polling :</p>
		<table class="table">
			<tr>
				<th class="text-center">No</th>
				<th>Opsi</th>
				<th class="text-center">Hasil</th>
				<th class="text-center">Persentase</th>
			</tr>
			@foreach ($data['hasil'] as $key => $value)
				
				<tr>
					<td class="text-center">{{ $key+1 }}</td>
					<td>{{ $value['desc'] }}</td>
					<td class="text-center">{{ $value['hasil'].' / '.$data['total'] }}</td>
					<td class="text-center">{{ round(($value['hasil']/$data['total'])*100, 2) }}%</td>
				</tr>

			@endforeach
		</table>
		<hr>
		<p>Grafik Hasil Polling :</p>
		<canvas id="myChart"></canvas>
	</div>
</div>

@endsection

@push('script')

	<script src="{{ asset('vendor/chart/chart.min.js') }}" type="text/javascript"></script>
	<script>

		// var ctx = document.getElementById("myChart").getContext('2d');
		// var myChart = new Chart(ctx, {
		// 	type: 'bar',
		// 	data: {
		// 		labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
		// 		datasets: [{
		// 			label: '# of Votes',
		// 			data: [12, 19, 3, 5, 2, 3],
		// 		}]
		// 	},
		// 	options: {
		// 		scales: {
		// 			yAxes: [{
		// 				ticks: {
		// 					beginAtZero:true
		// 				}
		// 			}]
		// 		}
		// 	}
		// });

		$(function() {

			$.ajax({
				url: '{!! route('getPollingData', [$pollID]) !!}', 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					console.log(data.data['label']);
					
					var chartData = {
						labels: data.data['label'],
						datasets: []
					};

					$tambah = {
						label: 'Vote ',
						data: data.data['hasil'],
						backgroundColor: data.data['warna'],
						borderColor: data.data['border'],
						borderWidth: 1
					}

					chartData.datasets.push($tambah);

					var ctx = document.getElementById('myChart').getContext('2d');
					var chart = new Chart(ctx, {
						type: 'bar',
						data: chartData,
						options: {
							
						}
					});
				}
			});

		});

	</script>

@endpush