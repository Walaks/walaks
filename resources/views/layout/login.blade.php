<!doctype html>
<html>
<header>
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::asset('css/material-dashboard.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
</header>
<body>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="{{URL::asset('img/tema/bg-login.jpg')}}">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            @yield('conteudo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!--   Core JS Files   -->
    <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/material.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('js/moment.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.bootstrap-wizard.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{URL::asset('js/jquery-jvectormap.js')}}"></script>
    <script src="{{URL::asset('js/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.select-bootstrap.js')}}"></script>
    <script src="{{URL::asset('js/jquery.datatables.js')}}"></script>
    <script src="{{URL::asset('js/sweetalert2.js')}}"></script>
    <script src="{{URL::asset('js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/fullcalendar.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.tagsinput.js')}}"></script>
    <script src="{{URL::asset('js/material-dashboard.js')}}"></script>
    <script src="{{URL::asset('js/demo.js')}}"></script>
    <script type="text/javascript">
        $().ready(function() {
            demo.checkFullPageBackgroundImage();
            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
   
</body>
</html>
