@extends('template.default')

@section('title', 'Data Nilai')

@section('content')

<div class="card">
	<div class="card-body">
		<div class="text-center">
			<h5>Laporan Nilai Pendidikan & Pelatihan Pegawai <br>PT. Pegadaian (Persero) Padang</h5>
			<p>{{ $angkatan->nama_diklat }}</p>
			<hr>
		</div>
		<div>
			<table width="100%">
				<tr>
					<td><p>NIK</p></td>
					<td>:</td>
					<td>{{ $user->nik }}</td>
					<td rowspan="4" class="text-right"><img src="{{ asset('storage/profil/'.$user->photo) }}" height="150px"></td>
				</tr>
				<tr>
					<td><p>NAMA</p></td>
					<td>:</td>
					<td>{{ $user->nama }}</td>
				</tr>
				<tr>
					<td><p>TTL</p></td>
					<td>:</td>
					<td>{{ $user->tempat_lahir.'/'.\Carbon\Carbon::parse($user->tanggal_lahir)->format('d M Y') }}</td>
				</tr>
				<tr>
					<td><p>ASAL</p></td>
					<td>:</td>
					<td>{{ $user->kantor_cabang->nama }}</td>
				</tr>
			</table>
		</div><hr>
		<div>
			<p>Tabel Nilai :</p>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode</th>
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
		</div><br><br>
		<div class="text-right">
			<p>Padang, {{ date('d M Y') }} <br>Asmen Operasional Diklat</p>
			<br><br>
			<p>{{ $pimpinan->user_profil->nama }} <br>NIK. {{ $pimpinan->user_profil->nik }}</p>
		</div>
		<hr>
		<div class="text-center">
			<a href="{{ route('getPDFPNilai') }}" class="btn btn-green" target="_blank"><i class="fa fa-file-pdf-o"></i> Export To PDF</a>
		</div>
	</div>
</div>

@endsection