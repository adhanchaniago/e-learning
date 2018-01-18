<div class="card">
    <div class="card-body">
        <div class="text-center">
            <img src="{{ asset('vendor/now-ui-kit/img/default-avatar.png') }}" class="rounded-circle" height="150px">
            <br><br>
            <p class="category">NIK. {{ Auth::user()->user_profil->nik }}</p>
            <p class="profil-text">{{ Auth::user()->user_profil->nama }}</p>
            <p class="profil-text">{{ Auth::user()->hak_akses->nama }}</p>
        </div>
    </div>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola User Akun</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Angkatan Diklat</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Mata Pelajaran</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Kelas Virtual</a>
        <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>