<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Selamat Datang</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/now-ui-kit.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/demo.css') }}" />

    </head>
    <body class="login-page sidebar-collapse">

        <div class="page-header" filter-color="orange">

            <div class="page-header-image"></div>

            <div class="container">
                <div class="col-md-4 content-center">
                    <div class="card card-login card-plain">
                        <form class="form" method="POST" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="header header-primary text-center">
                                <div class="logo-container">
                                    <img src="{{ asset('vendor/now-ui-kit/img/now-logo.png') }}" alt="">
                                </div>
                                <p>E-Learning Diklat <br> PT. Pegadaian (Persero) Padang</p>
                            </div>
                            <div class="content">
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </span>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons objects_key-25"></i>
                                    </span>
                                    <input type="password" name="password" placeholder="Password" class="form-control" />
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Masuk</button>
                            </div>
                            <div class="pull-right">
                                <h6>
                                    <a href="#pablo" class="link">Lupa Password?</a>
                                </h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, All Right Reserved.
                    </div>
                </div>
            </footer>

        </div>

        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('vendor/popper/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/now-ui-kit/js/now-ui-kit.js') }}" type="text/javascript"></script>

    </body>
</html>