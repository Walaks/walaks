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
        <div class="wrapper">
        <div class="sidebar" data-active-color="red" data-background-color="black" data-image="">
            <div class="logo">
                <a href="#this" class="simple-text">
                    Walaks Silva
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    WS
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            {{  Auth::user()->name}}
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="material-icons">dashboard</i>
                                <p>Conteúdo</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('PREFIX_ADMIN').'/header'}}">
                                <p>Header</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('PREFIX_ADMIN').'/servico'}}">
                                <p>Serviços</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('PREFIX_ADMIN').'/portifolio'}}">
                                <p>Portifolio</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('PREFIX_ADMIN').'/experiencia'}}">
                                <p>Experiências</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{env('PREFIX_ADMIN').'/sobre'}}">
                                <p>Sobre</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        {{-- <div class="collapse navbar-collapse">
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group form-search is-empty">
                                    <input type="text" class="form-control" placeholder="Pesquisar">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                        </div> --}}
                    </div>
                </nav>
                <div class="content">
                 <div class="container-fluid">
                        @yield('conteudo')
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
    <script src="{{URL::asset('js/chartist.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.bootstrap-wizard.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-notify.js')}}"></script>
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
    <script src="{{URL::asset('js/main.js')}}"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
     @if(Session::get('sweet_alert.text'))
        <?php   
            $msg_type = Session::pull('info');;
            $msg_text = Session::pull('sweet_alert.text');
        ?>
        <script>
            var msg_type = "<?php echo $msg_type ?>";
            var msg_text = "<?php echo $msg_text ?>";
            window.addEventListener("load", function(){
                showNotification(msg_type,msg_text);
            });;
        </script>
    @endif
</body>
</html>
