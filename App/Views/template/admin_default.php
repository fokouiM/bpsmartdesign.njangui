<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WebPlan site">
    <meta name="author" content="unicoder">
    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../Dist/assets/images/favicon.jpg">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&amp;display=swap&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!--  CSS Style -->
    <link rel="stylesheet" href="../Dist/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Dist/assets/css/all.min.css">
    <link rel="stylesheet" href="../Dist/assets/css/animate.min.css">
    <link rel="stylesheet" href="../Dist/assets/webfonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="../Dist/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../Dist/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Dist/assets/css/layerslider.css">
    <link rel="stylesheet" href="../Dist/assets/css/template.css">
    <link rel="stylesheet" href="../Dist/assets/css/style.css">
    <link rel="stylesheet" href="../Dist/assets/css/category/category-two.css">

</head>

<body>
    <div id="page_wrapper" class="bg-light">
        <!-- Header Section Start -->
        <header class="fixed-bg-secondary nav-on-banner">
            <div class="middle-header py-3 sm-mx-none">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-3">
                            <a class="navbar-brand" href="#"><img class="nav-logo" src="../Dist/assets/images/logo/2.png" alt="Logo webPlan"></a>
                        </div>
                        <div class="col-lg-3 col-md-3 pl-0">
                            <div class="d-flex py-3 justify-content-end">
                                <i class="flaticon-phone-call flat-small text-white mr-3 py-1"></i>
                                <div>
                                    <span class="text-white">+33 767 897 694</span><br>
                                    <span class="text-light">Appel 24/7 disponible</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 pl-0">
                            <div class="d-flex py-3 justify-content-end">
                                <i class="flaticon-email-1 flat-small text-white mr-3 py-1"></i>
                                <div>
                                    <span class="text-white">contact@webplansaas.com</span><br>
                                    <span class="text-light">Contact en ligne</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-expand-lg nav-white nav-primary-hover nav-down-line-active py-3 line-navbar">
                                <a class="navbar-brand d-lg-none" href="#"><img class="nav-logo" src="../Dist/assets/images/logo/1.png" alt="Image not found !"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon flaticon-menu flat-small text-primary"></span>
								</button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav justify-content-between w-100">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="Home">Accueil
												<span class="d-block">Presentation WebPlan </span>
											</a>
                                            <!-- <ul class="dropdown-menu" >
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Planification : la clé de votre rentabilité</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Rentabilité : prenez les bonnes décisions</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Facturation : maîtrisez votre trésorerie</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Devis : gagnez en réactivité et en fiabilité</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Dossier des agents : assurez la conformité RH</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Satisfaction client : objectif fidélisationy</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Eléments variables de paie : oubliez les régularisations</a></li><hr>
                                                <li><a class="dropdown-item" href="#"><i class="material-icons" style="color:#da2828;">dashboard</i>&nbsp;Mobilité : simplifiez la communication avec vos agents</a></li>
                                            </ul> -->
                                        </li>
                                        <li class="nav-item dropdown" > <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modules
											<span class="d-block">Modules Principaux</span>
										</a>
                                            <ul class="dropdown-menu" >
                                                <li ><a class="dropdown-item" href="Gestion_des_Ressources"><span class="material-icons flat-medium text-primary" style="color:#da2828;">view_list</span>
                                                    &nbsp;Gestion des Ressources</a></li><hr>
                                                <li><a class="dropdown-item" href="Gestion_des_clients"><span class="material-icons flat-medium text-primary" style="color:#da2828;">supervisor_account</span>
                                                    &nbsp;Gestion des clients</a></li><hr>
                                                <li><a class="dropdown-item" href="Activites_Commerciales"><span class="material-icons flat-medium text-primary" style="color:#da2828;">view_headline</span>
                                                    &nbsp;Activités Commerciales</a></li><hr>
                                                <li><a class="dropdown-item" href="Planifications"><span class="material-icons flat-medium text-primary" style="color:#da2828;">book_online</span>
                                                    &nbsp;Planifications</a></li><hr>
                                                <li><a class="dropdown-item" href="Preparation_de_la_paie"><span class="material-icons flat-medium text-primary" style="color:#da2828;">vignette</span>
                                                    &nbsp;Préparation de la paie</a></li><hr>
                                                <li><a class="dropdown-item" href="Accedez_a_lextranet"><span class="material-icons flat-medium text-primary" style="color:#da2828;">insert_link</span>
                                                    &nbsp;Accedez a l'extranet</a></li><hr>
                                                <li><a class="dropdown-item" href="Releves_activites"><span class="material-icons flat-medium text-primary" style="color:#da2828;">vignette</span>
                                                    &nbsp;Relevés d'activités</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="Tarifs_Packs">Tarifs & Packs
												<span class="d-block">Tarifs & Packs </span>
											</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="actualite">Demo
												<span class="d-block">Demo de l'application WebPlan </span>
											</a>
                                        </li>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="societe"><span class="material-icons flat-medium text-primary" style="color:#da2828;">location_city</span>
                                                        &nbsp;Société</a></li><hr>
                                                    <li><a class="dropdown-item" href="Partenaires"><span class="material-icons flat-medium text-primary" style="color:#da2828;">groups</span>
                                                        &nbsp;Partenaires</a></li><hr>
                                                    <li><a class="dropdown-item" href="Nous_rejoindre"><span class="material-icons flat-medium text-primary" style="color:#da2828;">group_add</span>
                                                        &nbsp;Nous rejoindre</a></li>
                                            </li>
                                        </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact">Contact
												<span class="d-block">Entrer en contact</span>
											</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Section End -->


            <?= $content; ?>

        <!-- Footer Section Start -->
        <footer class="full-row bg-secondary footer-default-dark" style="padding-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-md-6">
                        <div class="footer-widget contact-widget mb-5">
                            <div class="footer-logo mb-4">
                                <img src="../Dist/assets/images/logo/2.png" alt="Image not found!">
                            </div>
                        </div>
                        <div class="footer-widget media-widget mb-5">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-6">
                        <div class="footer-widget contact-widget mb-5">
                            <h4 class="widget-title mb-4">Coordonnées</h4>
                            <ul>
                                <li>1 Rue du Lavoir 85290 Mortagne sur Sèvre</li>
                                <li>Phone: +33 767 897 694</li>
                                <li>Email: contact@webplansaas.com</li>
                                <li><a href="contact" class="btn btn-primary rounded-0 text-white d-block mt-4">Contactez nous</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg- col-md-6">
                        <div class="footer-widget appointment-widget mb-4">
                        <h4 class="widget-title mb-4">A propos</h4>
                            <ul>
                                <li><a href="societe">Société</a></li>
                                <li><a href="actualite">Actualités</a></li>
                                <li><a href="Partenaires">Partenaires</a></li>
                                <li><a href="Nous_rejoindre">Nous rejoindre</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="bg-secondary py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>WebPlan @2021 | Développé Par : Groupe Themis Technologies</span>
                    </div>
                    <div class="col-md-6">
                        <ul class="line-menu float-md-right list-color-general">
                            <li class="float-left"><a href="POLITIQUE_DE_PROTECTION">POLITIQUE DE PROTECTION DES DONNÉES</a></li>
                            <li class="float-left">|</li>
                            <li class="float-left"><a href="MENTIONS_LAGALES">MENTIONS LÉGALES</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section End -->

        <!-- Scroll to top -->
        <a href="#" class="bg-primary text-white" id="scroll"><i class="fa fa-angle-up"></i></a>
        <!-- End Scroll To top -->
    </div>
    <!-- Page Wrapper End -->

    <!--===============================================================================================-->
    <!-- All Javascript Plugin File here -->
    <script src="../Dist/assets/js/jquery.min.js"></script>
    <script src="../Dist/assets/js/greensock.js"></script>
    <script src="../Dist/assets/js/layerslider.transitions.js"></script>
    <script src="../Dist/assets/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="../Dist/assets/js/popper.min.js"></script>
    <script src="../Dist/assets/js/bootstrap.min.js"></script>
    <script src="../Dist/assets/js/jquery.fancybox.min.js"></script>
    <script src="../Dist/assets/js/owl.carousel.min.js"></script>
    <script src="../Dist/assets/js/wow.js"></script>
    <script src="../Dist/assets/js/paraxify.js"></script>
    <script src="../Dist/assets/js/mixitup.min.js"></script>
    <script src="../Dist/assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#slider').layerSlider({
                sliderVersion: '6.0.0',
                type: 'fullwidth',
                responsiveUnder: 1350,
                maxRatio: 1,
                slideBGSize: 'auto',
                hideUnder: 0,
                hideOver: 100000,
                autoStart: true,
                keybNav: true,
                touchNav: true,
                skin: 'numbers',
                navPrevNext: false,
                hoverPrevNext: false,
                navStartStop: true,
                navButtons: true,
                showCircleTimer: false,
                allowRestartOnResize: true,
                skinsPath: '../Dist/assets/skins/',
                height: 980
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZ-Erd-14Vf2AoPW2Pzlxssf6-2R3PPs"></script>
	<script src="assets/js/map.scripts.js"></script>

</body>


<!-- Mirrored from unicoderbd.com/theme/html/pahara/index-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Sep 2021 10:28:55 GMT -->
</html>