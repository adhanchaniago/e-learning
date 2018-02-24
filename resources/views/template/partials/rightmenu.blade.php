<div class="card top-card-green">
    <div class="card-body">
        <div class="text-center">
            <img src="{{ asset('storage/profil/'.Auth::user()->user_profil->photo) }}" class="rounded-circle" height="150px">
            <br><br>
            <p class="category">NIK. {{ Auth::user()->user_profil->nik }}</p>
            <p class="profil-text">{{ Auth::user()->user_profil->nama }}</p>
            <p class="profil-text">{{ Auth::user()->hak_akses->nama }}</p>
        </div>
    </div>
    <div class="list-group">
        <a href="/" class="list-group-item list-group-item-action"><i class="fa fa-home"></i> Beranda</a>
        @if (Auth::user()->hak_akses->slug == 'staff')
            <a href="{{ route('getUserAkunPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola User Akun</a>
            <a href="{{ route('getAngkatanDiklatPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Angkatan Diklat</a>
            <a href="{{ route('getMataPelajaranPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Mata Pelajaran</a>
            <a href="{{ route('getVirtualClassPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-edit"></i> Kelola Kelas Virtual</a>
        @elseif (Auth::user()->hak_akses->slug == 'instruktur')
            <a href="{{ route('getVirtualClassListPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Kelas Virtual</a>
            <a href="{{ route('getMateriPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Materi</a>
        @elseif (Auth::user()->hak_akses->slug == 'peserta')
            <a href="{{ route('getListPMateriPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Materi</a>
            <a href="{{ route('getPVClassList') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Kelas Virtual</a>
        @endif
        <a href="{{ route('getForumListPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Forum Diskusi</a>
        <a href="{{ route('getLiveChatPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-gear"></i> Live Chat</a>
        <a href="{{ route('getLogout') }}" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>