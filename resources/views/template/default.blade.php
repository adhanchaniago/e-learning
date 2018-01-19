<!DOCTYPE html>
<html lang="en">
    <head>

        <title> @yield('title') </title>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/now-ui-kit.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/now-ui-kit/css/demo.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
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
                            
                            @if (Session::has('success'))
                                
                                <div class="alert alert-success animated fadeInDown with-time-out" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="now-ui-icons ui-2_like"></i>
                                        </div>
                                        <strong>Sukses!</strong> {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>

                            @endif

                            @yield('content')

                        </div>
                        <div class="col-md-3">
                            
                            @include('template.partials.rightmenu')

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

        <script>

            $(document).ready(function() {

                $(".with-time-out").delay(5000).slideUp(300, function() {
                    $(this).alert('close');
                });

            });

        </script>

        @stack('script')

    </body>
</html>