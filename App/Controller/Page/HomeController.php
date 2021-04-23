<?php

	namespace bpsmartdesignMedecinApp\Controller\Page;

	class HomeController extends \bpsmartdesignMedecinApp\Controller\AppController{

		public function index() {

			$this->render($_SESSION['bpsmartdesignMedecinToken'].'.home.index');
		}
	}
 ?>