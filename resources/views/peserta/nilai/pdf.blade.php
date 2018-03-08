<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Data nilai</title>
	<style type="text/css" media="screen">
		
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		.title {
			
		}
		.title-logo {
			height: 80px;
			float: left;
		}
		.title-text {
			margin-left: 150px;
			line-height: 25px;
			font-size: 12pt;
			font-weight: bolder;
		}
		.sub-title-text {
			font-size: 10pt;
		}
		.title-date {
			text-align: right;
			font-size: 12pt;
		}
		.line {
			border-bottom: 1px solid #000;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.content {
			padding-top: 5px;
		}
		.content table {
			width: 100%;
			border: 1px solid #000;
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid #000;
			padding: 5px;
			font-size: 12pt;
		}
		th {
			text-align: center;
		}
		.text-center {
			text-align: center;
		}
		.text-right {
			text-align: right;
		}
		.footer {
			padding-top: 20px;
			padding-left: 500px;
		}
		.tb-title {
			width: 100%;
		}
		.tb-title tr td {
			padding: 0 0 0 0;
			border: 0;
		}

	</style>
</head>
<body>
	<div class="title">
		<img src="{{ asset('img/pegadaian-logo.png') }}" class="title-logo">
		<div class="title-text">
			LAPORAN DATA NILAI PESERTA PENDIDIKAN DAN PELATIHAN <br> PT. PEGADAIAN (Persero) PADANG 
			<br> <span class="sub-title-text">{{ $angkatan->nama_diklat }}</span>
		</div>
	</div>
	<div class="line"></div><br>
	<div>
		<table class="tb-title">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>{{ $user->nik }}</td>
				<td rowspan="4" class="text-right"><img src="{{ asset('storage/profil/'.$user->photo) }}" height="150px"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>:</td>
				<td>{{ $user->nama }}</td>
			</tr>
			<tr>
				<td>TTL</td>
				<td>:</td>
				<td>{{ $user->tempat_lahir.'/'.\Carbon\Carbon::parse($user->tanggal_lahir)->format('d M Y') }}</td>
			</tr>
			<tr>
				<td>ASAL</td>
				<td>:</td>
				<td>{{ $user->kantor_cabang->nama }}</td>
			</tr>
		</table>
	</div><br>
	<div class="content">
		<p>TABEL DATA NILAI :</p>
		<table>
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Kode</th>
					<th>Nama Pelajaran</th>
					<th class="text-center">Nilai</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($listNilai as $key => $value)
				<tr>
					<td class="text-center">{{ $key+1 }}</td>
					<td class="text-center">{{ $value['slug'] }}</td>
					<td>{{ $value['pelajaran'] }}</td>
					<td class="text-center">{{ $value['nilai'] }}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3" class="text-right">TOTAL</td>
					<td class="text-center"><strong>{{ $extra['total'] }}</strong></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right">RATA-RATA</td>
					<td class="text-center"><strong>{{ $extra['rata'] }}</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="footer text-center">
		<p>Padang, {{ date('d M Y') }} <br>Asmen Operasional Diklat</p>
		<br><br>
		<p><u>{{ $pimpinan->nama }}</u> <br>NIK. {{ $pimpinan->nik }}</p>
	</div>
</body>
</html>