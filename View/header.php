<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="Oliver Fermin">

    <title><?=NOMBRE_APLICATION.VERSION ?> - Dashboard</title>

    <link rel="stylesheet" href="./vendor/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="./vendor/jscrollpane/jquery.jscrollpane.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/switchery/dist/switchery.min.css">
    <link rel="stylesheet" href="./vendor/sweetalert2/sweetalert2.min.css"> <!-- AGREGAR-->
    <link rel="stylesheet" href="./vendor/jquery-wizard/libs/formvalidation/formValidation.min.css"> <!-- AGREGAR-->
    <link rel="stylesheet" href="./vendor/toastr/toastr.min.css">  <!-- AGREGAR-->

    <link rel="stylesheet" href="./vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="./vendor/select2/select2.min.css">
    <link rel="stylesheet" href="./vendor/css/core.css">

    <link rel="stylesheet" href="./vendor/DataTables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="./vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">

    <script type="text/javascript" src="./vendor/jquery/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="./vendor/tether/js/tether.min.js"></script>
    <script type="text/javascript" src="./vendor/bootstrap4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/Buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="./vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js"></script>

    <script type="text/javascript" src="./vendor/js/select2.full.min.js"></script>

    <script type="text/javascript" src="./vendor/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript" src="./vendor/js/ui-notifications.js"></script>
    <script type="text/javascript" src="./vendor/js/moment.js"></script>
    <script type="text/javascript" src="./vendor/js/moment-with-locales.js"></script>

    <style>

        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px !important; }
        .toggle.ios .toggle-handle { border-radius: 20px !important; }

        .footer {
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            color: #777;
            padding: 1rem 0;
            background-color: #fff;
        }

    </style>

</head>

<body class="fixed-sidebar fixed-header skin-5">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Sidebar -->
    <div class="site-overlay"></div>
    <div class="site-sidebar">
        <div class="custom-scroll custom-scroll-dark">
            <ul class="sidebar-menu">
                <li class="menu-title">Menu</li>

                <!--<li>
                    <a href="?c=Dashboard&a=minipopup" class="waves-effect  waves-light">
                        <span class="s-icon"><i class="ti-layout-tab"></i></span>
                        <span class="s-text">Minipopup</span>
                    </a>
                </li>-->

                <li>
                    <a href="?c=Dashboard&a=index" class="waves-effect  waves-light">
                        <span class="s-icon"><i class="ti-layout-tab"></i></span>
                        <span class="s-text">Dashboard</span>
                    </a>
                </li>

                 <?php if($_SESSION['DataUserOnline']->Rol == "Admin") {?>

                <li class="menu-title">Administración Candidatos</li>

                <li class="menu-title">Otros Mantenimientos</li>
               
                <!--DEPARTAMENTOS-->
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                        <span class="s-text">Departamentos</span>
                    </a>
                    <ul>
                        <li><a href="?c=departamentos&a=Edit">Nuevo Departamento</a></li>
                        <li><a href="?c=departamentos&a=index">Ver Listado</a></li>

                    </ul>
                </li>

                <!--PUESTOS-->
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                        <span class="s-text">Puestos</span>
                    </a>
                    <ul>
                        <li><a href="?c=puestos&a=Edit">Nuevo Puesto</a></li>
                        <li><a href="?c=puestos&a=index">Ver Listado</a></li>

                    </ul>
                </li>

                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-pencil-alt"></i></span>
                        <span class="s-text">Idiomas</span>
                    </a>
                    <ul>
                        <li><a href="?c=idiomas&a=Edit">Nuevo idioma</a></li>
                        <li><a href="?c=idiomas&a=index">Ver Listado</a></li>

                    </ul>
                </li>

                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-user"></i></span>
                        <span class="s-text">Candidatos</span>
                    </a>
                    <ul>
                        <li><a href="?c=candidatos&a=Edit">Nuevo Candidato</a></li>
                        <li><a href="?c=candidatos&a=index">Ver Listado</a></li>

                    </ul>
                </li>

                <!--MANT DE USUARIOS-->
                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-user"></i></span>
                        <span class="s-text">Usuarios</span>
                    </a>
                    <ul>
                        <li><a href="?c=usuarios&a=Edit">Nuevo Usuario</a></li>
                        <li><a href="?c=usuarios&a=index">Ver Listado</a></li>

                    </ul>
                </li>

                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-user"></i></span>
                        <span class="s-text">Empleados</span>
                    </a>
                    <ul>
                        <li><a href="?c=empleados&a=Edit">Nuevo Empleado</a></li>
                        <li><a href="?c=empleados&a=index">Ver Listado</a></li>

                    </ul>
                </li>



                <li class="with-sub">
                    <a href="#" class="waves-effect  waves-light">
                        <span class="s-caret"><i class="fa fa-angle-down"></i></span>
                        <span class="s-icon"><i class="ti-user"></i></span>
                        <span class="s-text">Nivel capacitacion</span>
                    </a>
                    <ul>
                        <li><a href="?c=nivelcapacitaciones&a=edit">Nuevo nivel</a></li>
                        <li><a href="?c=nivelcapacitaciones&a=index">Ver Listado</a></li>

                    </ul>
                </li>



            </ul>
            </li>
             <?php }?>
            </ul>
        </div>
    </div>


    <!-- Header -->
    <div class="site-header">
        <nav class="navbar navbar-dark">
            <div class="navbar-left">
                <a class="navbar-brand" href="index.php?c=dashboard&a=index">
                    <div class="logo"></div>
                </a>
                <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
                    <span class="hamburger"></span>
                </div>
                <div class="toggle-button-second dark float-xs-right hidden-md-up">
                    <i class="ti-arrow-left"></i>
                </div>
                <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
                    <span class="more"></span>
                </div>
            </div>
            <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
                <div class="toggle-button dark sidebar-toggle-second float-xs-left hidden-sm-down">
                    <span class="hamburger"></span>
                </div>
                <div class="toggle-button-second dark float-xs-right hidden-sm-down">
                    <i class="ti-arrow-left"></i>
                </div>
                <ul class="nav navbar-nav float-md-right">

                    <li class="nav-item dropdown hidden-sm-down">
                        <a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32">
										<img height="40" src="uploads/logo.png">
									</span>
                            <b style="" class="FontWhite"> <?=$_SESSION['DataUserOnline']->Nombre; ?></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp">

                            <a class="dropdown-item" href="index.php?c=usuarios&a=Edit&Id=<?=$_SESSION['DataUserOnline']->Id; ?>">
                                <i class="ti-user mr-0-5"></i> Mi Rol
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?c=login&a=Logout"><i class="ti-power-off mr-0-5"></i> Salir</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link"  href="#">
                        <b class="FontWhite"> <?= NOMBRE_APLICATION.VERSION ?> </b>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>

    <div class="site-content"> <!-- BODY -->

        <!-- Content -->
        <div class="content-area py-1">
            <div class="container-fluid">
                <div class="box box-block bg-white b-t-0 mb-2">