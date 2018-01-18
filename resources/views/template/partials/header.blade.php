<nav class="navbar navbar-expand-lg bg-green fixed-top " color-on-scroll="400">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">
                PT. Pegadaian (Persero) Padang
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset('vendor/now-ui-kit/img/blurred-image-1.jpg') }}">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Beranda" data-placement="bottom" href="{{ url('/') }}">
                        <i class="fa fa-home"></i>
                        <p class="d-lg-none d-xl-none">Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="Profil" data-placement="bottom" href="{{ route('getStaffProfilPage') }}">
                        <i class="fa fa-user"></i>
                        <p class="d-lg-none d-xl-none">Profil</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                        <i class="fa fa-gear"></i>
                        <p class="d-lg-none d-xl-none">Pengaturan</p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-header">Pengaturan</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-edit"></i>&nbsp;Ubah Profil</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-edit"></i>&nbsp;Ubah Password</a>
                        <a class="dropdown-item" href="{{ route('getLogout') }}"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>