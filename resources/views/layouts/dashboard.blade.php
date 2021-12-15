<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
            
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
        </style>
        
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        
        
    </head>
    <body class="sb-nav-fixed">

        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">#</div>
        <div class="list-group list-group-flush">
            
            <a href="{{route('admin.indexEstudiantes')}}" class="list-group-item list-group-item-action bg-light">Estudiantes</a>
            @can('tutor_index')
            <a href="{{route('admin.indexTutores')}}" class="list-group-item list-group-item-action bg-light">Tutores</a>
            @endcan
            @can('docente_index')
            <a href="{{route('admin.indexDocentes')}}" class="list-group-item list-group-item-action bg-light">Docentes</a>
            @endcan

            <a href="{{route('grupos.index')}}" class="list-group-item list-group-item-action bg-light">Grupos</a>
            
            @can('observaciones_index')
            <a href="#" class="list-group-item list-group-item-action bg-light">Observaciones</a>
            @endcan
            @can('permission_index')
            <a href="{{route('permissions.index')}}" class="list-group-item list-group-item-action bg-light">Permisos a usuarios</a>
            @endcan
            @can('role_index')
            <a href="{{route('roles.index')}}" class="list-group-item list-group-item-action bg-light">Roles de usuario</a>
            @endcan
            @can('user_index')
            <a href="{{route('users.index')}}" class="list-group-item list-group-item-action bg-light">Usuarios</a>
            @endcan
            @can('tutor_index')

            <a href="#" class="list-group-item list-group-item-action bg-light">Pagos</a>
            @endcan
        </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">
                <i class="fas fa-ellipsis-v"></i>          
            </button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                {{-- para greagr link en el navbar --}}
                {{-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li> --}}
                {{-- fin de link en el navbar --}}

                {{-- incio del logout --}}
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Cerrar sesión') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </div>
                </li>
                {{-- finde del logout --}}
            </ul>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>