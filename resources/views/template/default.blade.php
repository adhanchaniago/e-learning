<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Home</title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/now-ui-kit.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/demo.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @stack('style')

    </head>

    <body class="template-page sidebar-collapse">

        @include('template.partials.header')

        <div class="wrapper">

            <div class="section">
                
                <div class="container devider-top">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <p class="category">Title Here</p>
                                    <p>
                                        I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.
                                    </p>
                                    <p>
                                        I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.
                                    </p>
                                    <p>
                                        I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('vendor/now-ui-kit/img/default-avatar.png') }}" class="rounded-circle" height="150px">
                                        <br><br>
                                        <p class="profil-text">{{ Auth::user()->user_profil->nik }}</p>
                                        <p class="profil-text">{{ Auth::user()->user_profil->nama }}</p>
                                        <p class="profil-text">{{ Auth::user()->hak_akses->nama }}</p>
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">Kelola User Akun</a>
                                    <a href="#" class="list-group-item list-group-item-action">Kelola Angkatan Diklat</a>
                                    <a href="#" class="list-group-item list-group-item-action">Kelola Mata Pelajaran</a>
                                    <a href="#" class="list-group-item list-group-item-action">Kelola Kelas Virtual</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            @include('template.partials.footer')

        </div>

        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
        
        <script src="{{ asset('vendor/popper/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/now-ui-kit/js/now-ui-kit.js') }}" type="text/javascript"></script>

        @stack('script')

    </body>
</html>