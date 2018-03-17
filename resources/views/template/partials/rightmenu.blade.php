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
            <a href="{{ route('getUserAkunPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Kelola User Akun</a>
            <a href="{{ route('getAngkatanDiklatPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-tags"></i> Kelola Angkatan Diklat</a>
            <a href="{{ route('getMataPelajaranPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Kelola Mata Pelajaran</a>
            <a href="{{ route('getVirtualClassPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-institution"></i> Kelola Kelas Virtual</a>
            <a href="{{ route('getRewardPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-id-badge"></i> Kelola Penghargaan</a>
        @elseif (Auth::user()->hak_akses->slug == 'instruktur')
            <a href="{{ route('getMateriPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-file-text"></i> Materi</a>
            <a href="{{ route('getVirtualClassListPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-institution"></i> Kelas Virtual</a>
            <a href="{{ route('getPollingMainPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-bar-chart"></i> Polling</a>
        @elseif (Auth::user()->hak_akses->slug == 'peserta')
            <a href="{{ route('getListPMateriPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-file-text"></i> Materi</a>
            <a href="{{ route('getPVClassList') }}" class="list-group-item list-group-item-action"><i class="fa fa-institution"></i> Kelas Virtual</a>
            <a href="{{ route('getPostTestList') }}" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i> Post Test</a>
            <a href="{{ route('getNilaiPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Lihat Nilai</a>
            <a href="{{ route('getPollingListPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-bar-chart"></i> Polling</a>
        @elseif (Auth::user()->hak_akses->slug == 'pimpinan')
            <a href="{{ route('getDataInstrukturPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Data Instuktur</a>
            <a href="{{ route('getListAngkatanDiklatPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-book"></i> Data Diklat</a>
            <a href="{{ route('getAngkatanList') }}" class="list-group-item list-group-item-action"><i class="fa fa-institution"></i> Kelas Virtual</a>
        @endif
        <a href="{{ route('getForumListPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-globe"></i> Forum Diskusi</a>
        <a href="{{ route('getLiveChatPage') }}" class="list-group-item list-group-item-action"><i class="fa fa-send"></i> Live Chat</a>
        <a href="{{ route('getLogout') }}" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>