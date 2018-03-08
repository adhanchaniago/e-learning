@extends('template.default')

@section('title', 'Staff Home')

@section('content')

<div class="card">
	<div class="card-body">
		<p class="category">Biodata Diri</p>
		<div class="row">
			<div class="col-md-8">
				<table width="100%">
					<tr>
						<td width="40%"><p><strong>NIK</strong></p></td>
						<td><p>{{ $profil->user_profil->nik }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Nama Lengkap</strong></p></td>
						<td><p>{{ $profil->user_profil->nama }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Tempat Lahir</strong></p></td>
						<td><p>{{ $profil->user_profil->tempat_lahir }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Tanggal Lahir</strong></p></td>
						<td><p>{{ \Carbon\Carbon::parse($profil->user_profil->tanggal_lahir)->format('d M Y') }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Jenis Kelamin</strong></p></td>
						<td><p>{{ $profil->user_profil->jenis_kelamin }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Agama</strong></p></td>
						<td><p>{{ $profil->user_profil->agama }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Alamat</strong></p></td>
						<td><p>{{ $profil->user_profil->alamat }}</p></td>
					</tr>
					<tr>
						<td><p><strong>Telepon</strong></p></td>
						<td><p>{{ $profil->user_profil->telepon }}</p></td>
					</tr>
					<tr>
						<td><p><strong>E-Mail</strong></p></td>
						<td><p>{{ $profil->user_profil->email }}</p></td>
					</tr>
				</table>	
			</div>
		</div>
		<p class="category">Cabang Asal</p>
		<div class="row">
			<div class="col-md-8">
				<table width="100%">
					<tr>
						<td width="40%"><p><strong>Nama Cabang</strong></p></td>
						<td><p>{{ $profil->user_profil->kantor_cabang->nama }}</p></td>
					</tr>
					<tr>
						<td width="40%"><p><strong>Alamat Cabang</strong></p></td>
						<td><p>{{ $profil->user_profil->kantor_cabang->alamat }}</p></td>
					</tr>
					<tr>
						<td width="40%"><p><strong>Telepon Cabang</strong></p></td>
						<td><p>{{ $profil->user_profil->kantor_cabang->telepon }}</p></td>
					</tr>
				</table>	
			</div>		
		</div>
		@if ($profil->hak_akses->slug == 'peserta')
			<p class="category">Angkatan Diklat</p>
			<div class="row">
				<div class="col-md-8">
					<table width="100%">
						<tr>
							<td width="40%"><p><strong>Nama Angkatan</strong></p></td>
							<td><p>{{ $profil->angkatan_peserta->first()->angkatan_diklat->nama_diklat }}</p></td>
						</tr>
						<tr>
							<td width="40%"><p><strong>Keterangan</strong></p></td>
							<td><p>{{ $profil->angkatan_peserta->first()->angkatan_diklat->keterangan }}</p></td>
						</tr>
						<tr>
							<td width="40%"><p><strong>Tanggal Mulai</strong></p></td>
							<td><p>{{ $profil->angkatan_peserta->first()->angkatan_diklat->tanggal_mulai  }}</p></td>
						</tr>
						<tr>
							<td width="40%"><p><strong>Tanggal Selesai</strong></p></td>
							<td><p>{{ $profil->angkatan_peserta->first()->angkatan_diklat->tanggal_selesai }}</p></td>
						</tr>
					</table>	
				</div>		
			</div>
			<p class="category">Penghargaan Dalam Kelas</p>
			<div class="row">
				<div class="col-md-12">
					<table width="100%">
						@foreach ($profil->angkatan_peserta->first()->angkatan_diklat->kelas_virtual as $element)
							<tr>
								<td width="30%"><p><strong>{{ $element->nama_kelas }}</strong></p></td>
								<td style="padding: 10px;">
									<p>
										@foreach ($element->reward_to->where('users_account_id', $profil->id) as $value2)
											<span style="margin-right: 20px;"><img height="40px" class="rounded-circle" src="{{ asset('storage/reward/'.$value2->reward_list->gambar) }}" alt=""> {{ $value2->reward_list->nama }}</span>
										@endforeach
									</p>
								</td>
							</tr>
						@endforeach
					</table>	
				</div>		
			</div>
		@endif
	</div>
</div>

@endsection

