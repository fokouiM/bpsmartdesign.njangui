<?php

	////////////////////////////////////////////////////////////////////// I N T R O D U C T I O N
	define('ROOT', dirname(__DIR__)); // Constante qui contient nom du repertoire parent
	require ROOT.'/App/App.php'; // Inclusion du fichier App.php [notre fichier principal]
	App::load(); // Appel de la fonction load() qui se trouve dans la classe statique App

	////////////////////////////////////////////////////////////////////// L A   L A N G U E
	if(!isset($_SESSION['bpsmartdesignMedecinToken'])) {
		if(isset($_GET['p'])) {
			$__tmp = stripcslashes(htmlentities($_GET['p']));
			$__tmp = explode('.', $__tmp);
			$_SESSION['bpsmartdesignMedecinToken'] = $__tmp[0];
		} else {

			$_SESSION['bpsmartdesignMedecinToken'] = 'fr';
		}
	}

	if($_SESSION['bpsmartdesignMedecinToken'] == '*') {
		$_SESSION['bpsmartdesignMedecinToken'] = 'fr';
	}
	///////////////////////////////////////////////////////////////////// C H A N G E M E N T   D E   L A N G U E
	if(!empty($_POST['lang'])) {
			$_SESSION['bpsmartdesignMedecinToken'] = $_POST['lang'];
		// $_POST = null;
	}

	///////////////////////////////////////////////////////////////////// P E T I T   S Y S T E M E   D E   R O U T I N G
	$p = isset($_GET['p']) ? stripcslashes(htmlentities($_GET['p'])) : $_SESSION['bpsmartdesignMedecinToken'].'.Page.Home.Index'; // récupération de la page à charger
	$p = explode('.', $p); // division de la valeur de $p en un tableau de plusieurs éléments correspondants aux noms des fichiers à charger
	
	if($p[0] != 'admin') {

		$controller = '\bpsmartdesignMedecinApp\Controller\\'.ucfirst($p[1]).'\\'.ucfirst($p[2]).'Controller'; // Appel du controleur correspondant
	}else {

		if($p[3] == 'logout_') {

			unset($_SESSION['bpsmartdesignMedecinLogToken']);
			header('Location: index');
			die();
		}else {

			$_SESSION['bpsmartdesignMedecinToken'] = 'admin';
			$controller = '\bpsmartdesignMedecinApp\Controller\\'.ucfirst($p[0]).'\\'.ucfirst($p[0]).'Controller'; // Appel du controleur correspondant
		}

	}

	//////////////////////////////////////////////////////////////////// C O N T R O L L E U R  E T  V U E
	$action = $p[3]; // Chargement de la méthode correspondante
	$_SESSION['current_page'] = ucfirst($action);
	
	$controller = new $controller(); // Appel de la page correspondante
	$controller->$action(); // Appel de la page correspondante
?>