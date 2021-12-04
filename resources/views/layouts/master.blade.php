<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Control escolar</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-secondary">
            <!-- Navbar Brand-->
            {{-- <a class="text-light navbar-brand ps-3" href="index.html">Start Bootstrap</a> --}}
            <!-- Sidebar Toggle-->
            <button class="btn btn-light btn-sm  ml-10" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
        </nav>
        {{-- sidebar --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-secondary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu ">
                        <div class="nav ">
                            <div class="logo">
                                <h4 class="text-light font-weight-bold ml-3">Cuenta administrativa</h4>
                            </div>
                            <div class="menu">
                                <a href="{{route('admin.indexEstudiantes')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Estudiantes</a>
                
                                <a href="{{route('admin.indexTutores')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Tutores</a>
                
                                <a href="{{route('admin.indexDocentes')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Docentes</a>
                                <a href="{{route('admin.index')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Grupos</a>
                                <a href="{{route('permissions.index')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Permisos</a>
                                <a href="{{route('roles.index')}}" class="d-block text-light p-3 border-0"><i ></i>
                                    Rol de usuarios</a>
                                <a href="#" class="d-block text-light p-3 border-0"> <i></i>
                                    Pagos</a>
                                <a href="{{route('users.index')}}" class="d-block text-light p-3 border-0"> <i></i>
                                    Usuarios</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        {{-- fin sidebar --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
