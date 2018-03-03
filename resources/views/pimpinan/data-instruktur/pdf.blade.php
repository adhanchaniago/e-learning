<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Data Instruktur</title>
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
			line-height: 30px;
			font-size: 14pt;
			font-weight: bolder;
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
			font-size: 10pt;
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
			padding-left: 800px;
		}

	</style>
</head>
<body>
	<div class="title">
		<img src="{{ asset('img/pegadaian-logo.png') }}" class="title-logo">
		<div class="title-text">
			LAPORAN DATA INSTRUKTUR PENDIDIKAN DAN PELATIHAN <br> PT. PEGADAIAN (Persero) PADANG
		</div>
		<div class="title-date">Tanggal : {{ date('d M Y') }}</div>
	</div>
	<div class="line"></div>
	<div class="content">
		<p>Tabel Data Instruktur :</p>
		<table >
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama Lengkap</th>
					<th>Tmp / Tgl Lahir</th>
					<th>Jekel</th>
					<th>Agama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Cabang Asal</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($dataInstruktur as $key => $value)
					<tr>
						<td class="text-center">{{ $key+1 }}</td>
						<td>{{ $value->user_profil->nik }}</td>
						<td>{{ $value->user_profil->nama }}</td>
						<td>{{ $value->user_profil->tempat_lahir.' / '.\CArbon\Carbon::parse($value->user_profil->tanggal_lahir)->format('d M Y') }}</td>
						<td class="text-center">{{ $value->user_profil->jenis_kelamin }}</td>
						<td class="text-center">{{ $value->user_profil->agama }}</td>
						<td>{{ $value->user_profil->alamat }}</td>
						<td class="text-center">{{ $value->user_profil->telepon }}</td>
						<td>{{ $value->user_profil->kantor_cabang->nama }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="footer text-center">
		<p>Padang, {{ date('d M Y') }} <br>Asmen Operasional Diklat</p>
		<br><br>
		<p><u>{{ Auth::user()->user_profil->nama }}</u> <br>NIK. {{ Auth::user()->user_profil->nik }}</p>
	</div>
</body>
</html>