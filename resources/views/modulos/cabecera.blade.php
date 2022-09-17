
<header class="main-header">
    
    <a href="{{ url('Inicio') }}" class="logo">

        <span class="logo-mini"><b>C M</b></span>
        <span class="logo-lg"><b>CLINICA MEDICA</b></span>

    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        {{ auth()->user()->name }}
                        <!--muestra el nombre del usuario-->
                                                
                        <span class="hidden-xs"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('Mis-Datos') }}" class="btn btn-primary btn-flat">Mis Datos</a> 
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();" 
                                class="btn btn-danger btn-flat">Salir</a>
                            </div>

                            <form method="post" id="logout-form" action="{{ route('logout') }}">

                            @csrf

                            </form>

                        </li>
                    </ul>
                </li>

            <!--<li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">                     
                        <span class="hidden-xs">rbtbrgrb</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div class="pull-left">
                                <a herf="" class="btn btn-primary btn-flat">Prueba</a> 
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();" 
                                    class="btn btn-danger btn-flat">test
                                </a>
                            </div>

                            <form method="post" id="logout-form" action="{{ route('logout') }}">

                            @csrf

                            </form>

                        </li>
                    </ul>
                </li>-->

            </ul>

        </div>
    </nav>

</header>