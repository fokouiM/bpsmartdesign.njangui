<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title><?= $title; ?></title>

		<meta charset="utf-8" /> <!-- Encodage des carractères de la page -->
		<meta name="robots" content="noarchive, noindex">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="bpsmartdesign" />
		<meta name="keywords" content="" />

		<link rel="icon" href="Data/imgs/logo.ico" /> <!-- Icone de la page -->
        <meta name="robots" content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&amp;display=swap" rel="stylesheet">
        <link type="text/css" href="../Dist/assets/vendor/perfect-scrollbar.css" rel="stylesheet"><!-- Perfect Scrollbar -->
        <link type="text/css" href="../Dist/assets/css/material-icons.css" rel="stylesheet"><!-- Material Design Icons -->
        <link type="text/css" href="../Dist/assets/css/fontawesome.css" rel="stylesheet"><!-- Font Awesome Icons -->
        <link type="text/css" href="../Dist/assets/vendor/spinkit.css" rel="stylesheet">
        <link type="text/css" href="../Dist/assets/css/preloader.css" rel="stylesheet"><!-- Preloader -->
        <link type="text/css" href="../Dist/assets/css/app.css" rel="stylesheet"><!-- App CSS -->
        <link type="text/css" href="../Dist/assets/css/dark-mode.css" rel="stylesheet"><!-- Dark Mode CSS (optional) -->
        <link type="text/css" href="../Dist/assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet"><!-- Vector Maps -->
        <link type="text/css" href="../Dist/assets/css/main.css" rel="stylesheet"><!-- Main css -->
	</head>
    <body class="layout-sticky layout-sticky-subnav ">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--> 

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div> <!-- Preloader -->

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->
            <div id="header" class="mdk-header js-mdk-header mb-0" data-fixed>
                <div class="mdk-header__content">
                    <div class="navbar navbar-expand navbar-shadow px-0  pl-lg-16pt navbar-light bg-body" id="default-navbar" data-primary>
                        <!-- Navbar toggler -->
                        <button class="navbar-toggler d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
                            <span class="material-icons">menu</span>
                        </button>

                        <!-- Navbar Brand -->
                        <a href="index" class="navbar-brand mr-16pt">
                            <img class="navbar-brand-icon mr-0 mr-lg-8pt" src="../Dist/assets/images/logo/logo_clear.png" width="32" alt="Njangui">
                            <span class="d-none d-lg-block">Njangui</span>
                        </a>

                        <form class="search-form navbar-search d-none d-md-flex mr-16pt">
                            <button class="btn" type="submit"><i class="material-icons">search</i></button>
                            <input type="text" class="form-control" placeholder="Search ...">
                        </form>
        
                        <div class="flex"></div>

                        <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
                            <div class="nav-item dropdown d-none d-sm-flex">
                                <a href="#" class="nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                    <img width="32" height="32" class="rounded-circle mr-8pt" src="../Dist/assets/images/people/50/guy-3.jpg" alt="account" />
                                    <span class="flex d-flex flex-column mr-8pt">
                                        <span class="navbar-text-100"><?= ucfirst($_SESSION['bpsmartdesign.njangui.username']); ?></span>
                                        <small class="navbar-text-50">Administrateur</small>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-header"><strong>Compte</strong></div>
                                    <a class="dropdown-item" href="#">Consulter</a>
                                    <a class="dropdown-item" href="logout">Se déconnecter</a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown border-left-2 navbar-border">
                            <button class="navbar-toggler navbar-toggler-custom d-block" type="button" data-toggle="dropdown" data-caret="false">
                                <span class="material-icons">business_center</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

                <!-- Drawer Layout -->
                <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

                    <!-- Drawer Layout Content -->
                    <div class="mdk-drawer-layout__content page-content">

                        <div class="border-bottom-2 py-32pt position-relative z-1">
                            <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                                <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                                    <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                                        <h2 class="mb-0"><?= $_SESSION['current_page'] != 'Index' ? $_SESSION['current_page'].'s' : 'Tableau de Bord' ?> </h2>

                                        <ol class="breadcrumb p-0 m-0">
                                            <li class="breadcrumb-item"><a href="index">Accueil</a></li>

                                            <li class="breadcrumb-item active">

                                            <?= $_SESSION['current_page'] != 'Index' ? $_SESSION['current_page'].'s' : 'Tableau de Bord' ?>

                                            </li>

                                        </ol>

                                    </div>

                                    <div class="dropdown">
                                        <a href="#" class="border rounded d-flex align-items-center p-16pt" data-toggle="dropdown" data-caret="false">
                                            <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-primary">RS</span>

                                            </div>

                                            <small class="ml-4pt flex">
                                                <span class="d-flex align-items-center">
                                                    <span class="flex d-flex flex-column">
                                                        <strong class="text-100"><?= ucfirst($_SESSION['bpsmartdesign.njangui.reunion']); ?></strong>
                                                        <span class="text-50">Réunion Sélectionnée</span>
                                                    </span>
                                                </span>
                                            </small>
                                        </a>
                                    </div>

                                </div>

                                <div class="row"
                                    role="tablist">
                                    <div class="col-auto d-flex flex-column">
                                        <h6 class="m-0"><?= $_SESSION['bpsmartdesign.njangui.total_depot'] ?> Frs CFA</h6>
                                        <p class="text-50 mb-0 d-flex align-items-center">
                                            Total de dépots
                                            <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                        </p>
                                    </div>
                                    <div class="col-auto border-left">
                                        <h6 class="m-0"><?= $_SESSION['bpsmartdesign.njangui.total_emprunt'] ?> Frs CFA</h6>
                                        <p class="text-50 mb-0 d-flex align-items-center">
                                            Total des Emprunts
                                            <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                        </p>
                                    </div>
                                    <div class="col-auto border-left">
                                        <a href="#"class="btn btn-accent">Bilans</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container-fluid page__container">
                            <div class="page-section">
                                <?= $content; ?>
                            </div>
                        </div>

                        <div class="js-fix-footer footer border-top-2">
                            <div class="container-fluid page__container page-section d-flex flex-column">
                                <p class="text-70 brand mb-24pt">
                                    <img class="brand-icon"
                                        src="../Dist/assets/images/logo/logo_dark.png"
                                        width="30"
                                        alt="Njangui"> Njangui
                                </p>
                                <p class="measure-lead-max text-muted mb-0 small">
                                    Njangui est une application web, autonome de gestion des réunions (enrégistrement des réunions, des membres et des transactions) qui calcule aisaiment les taux d'intérêts afin d'alléger la tâches des gestionnaires des réunions dans la repartition des intérêts de la façon la plus claire possible. <br> <br>
                                    Un produit réalisé par <b>BpsmartDesign</b>, <b><em>Contact :</em> 690 534 401</b>
                                </p>
                            </div>
                            <div class="pb-16pt pb-lg-24pt">
                                <div class="container-fluid page__container">
                                    <div class="bg-dark rounded page-section py-lg-32pt px-16pt px-lg-24pt">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                                                <p class="text-white-70 mb-8pt"><strong>Me suivre</strong></p>
                                                <nav class="nav nav-links nav--flush">
                                                    <a href="#" class="nav-link mr-8pt"><img src="../Dist/assets/images/icon/footer/facebook-square%402x.png" width="24" height="24" alt="Facebook"></a>
                                                    <a href="#" class="nav-link mr-8pt"><img src="../Dist/assets/images/icon/footer/twitter-square%402x.png" width="24" height="24" alt="Twitter"></a>
                                                    <a href="#" class="nav-link mr-8pt"><img src="../Dist/assets/images/icon/footer/vimeo-square%402x.png" width="24" height="24" alt="Vimeo"></a>
                                                </nav>
                                            </div>
                                            <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                                                <a href="#" class="btn btn-outline-white">Français <span class="icon--right material-icons">arrow_drop_down</span></a>
                                            </div>
                                            <div class="col-md-4 text-md-right">
                                                <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                                                    <a href="#" class="text-white-70 text-underline mr-16pt">Terms</a>
                                                    <a href="#"class="text-white-70 text-underline">Privacy policy</a>
                                                </p>
                                                <p class="text-white-50 small mb-0">Copyright 2020 &copy; bpsmartdesign.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- // END drawer-layout__content -->

                    <!-- drawer -->
                    <div class="mdk-drawer js-mdk-drawer"
                        id="default-drawer">
                        <div class="mdk-drawer__content top-md-navbar">
                            <div class="sidebar sidebar-dark sidebar-left sidebar-p-t"
                                data-perfect-scrollbar>

                                <a href="sticky-index.html" class="sidebar-brand d-sm-none ">
                                    <img class="sidebar-brand-icon"
                                        src="../Dist/assets/images/logo/logo_clear.png"
                                        alt="Njangui">
                                    <span>Njangui</span>
                                </a>

                                <br>
                                
                                <div class="sidebar-account mx-16pt mb-16pt dropdown">
                                    <a href="#"
                                    class="nav-link d-flex align-items-center dropdown-toggle"
                                    data-toggle="dropdown"
                                    data-caret="false">
                                        <img width="32"
                                            height="32"
                                            class="rounded-circle mr-8pt"
                                            src="../Dist/assets/images/people/50/guy-2.jpg"
                                            alt="account" />
                                        <span class="flex d-flex flex-column mr-8pt">
                                            <span class="text-black-100"><?= ucfirst($_SESSION['bpsmartdesign.njangui.reunion']); ?></span>
                                            <small class="text-black-50">Réunion active</small>
                                        </span>
                                    </a>
                                </div>
                                <br>

                                <ul class="sidebar-menu">
                                    <div class="sidebar-heading">Accueil</div>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="index">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                                            <span class="sidebar-menu-text">Tableau de Bord</span>
                                        </a>
                                    </li><br>
                                    
                                    <div class="sidebar-heading">La Réunion</div>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">link</span>
                                            Transactions
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse sm-indent" id="dashboards_menu">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="depot">
                                                    <span class="sidebar-menu-text">Dépôts </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="emprunt">
                                                    <span class="sidebar-menu-text">Emprunts </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="membre">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people_outline</span>
                                            <span class="sidebar-menu-text">Membres</span>
                                        </a>
                                    </li><br>
                                    <!-- <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="rapport">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">access_time</span>
                                            <span class="sidebar-menu-text">Rapports</span>
                                        </a>
                                    </li><br> -->
                                
                                    <div class="sidebar-heading">Autres</div>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" data-toggle="collapse" href="#dashboards_menu2">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                            Paramètres
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse sm-indent" id="dashboards_menu2">
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="user">
                                                    <span class="sidebar-menu-text">Utilisateurs </span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button" href="reunion">
                                                    <span class="sidebar-menu-text">Réunions </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- // END drawer -->
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END Header Layout Content -->

        </div>
        <!-- // END Header Layout -->
            
        <script src="../Dist/assets/vendor/jquery.min.js"></script><!-- jQuery -->
        <script src="../Dist/assets/vendor/popper.min.js"></script><!-- Bootstrap -->
        <script src="../Dist/assets/vendor/bootstrap.min.js"></script>
        <script src="../Dist/assets/vendor/perfect-scrollbar.min.js"></script><!-- Perfect Scrollbar -->
        <script src="../Dist/assets/vendor/dom-factory.js"></script><!-- DOM Factory -->
        <script src="../Dist/assets/vendor/material-design-kit.js"></script><!-- MDK -->
        <script src="../Dist/assets/js/app.js"></script><!-- App JS -->
        <script src="../Dist/assets/js/hljs.js"></script><!-- Highlight.js -->
        <script src="../Dist/assets/js/settings.js"></script><!-- Global Settings -->
        <script src="../Dist/assets/vendor/flatpickr/flatpickr.min.js"></script><!-- Flatpickr -->
        <script src="../Dist/assets/js/flatpickr.js"></script>
        <script src="../Dist/assets/vendor/moment.min.js"></script><!-- Moment.js -->
        <script src="../Dist/assets/vendor/moment-range.js"></script>
        <script src="../Dist/assets/vendor/Chart.min.js"></script><!-- Chart.js -->
        <script src="../Dist/assets/js/chartjs.js"></script>
        <script src="../Dist/assets/js/page.analytics-dashboard.js"></script><!-- Chart.js Samples -->
        <script src="../Dist/assets/vendor/jqvmap/jquery.vmap.min.js"></script><!-- Vector Maps -->
        <script src="../Dist/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="../Dist/assets/js/vector-maps.js"></script>
        <script src="../Dist/assets/vendor/list.min.js"></script><!-- List.js -->
        <script src="../Dist/assets/js/list.js"></script>
        <script src="../Dist/assets/js/toggle-check-all.js"></script><!-- Tables -->
        <script src="../Dist/assets/js/check-selected-row.js"></script>
        <script src="../Dist/assets/js/app-settings.js"></script><!-- App Settings (safe to remove) -->
    </body>
</html>