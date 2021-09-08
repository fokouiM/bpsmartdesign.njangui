<?php

	namespace bpsmartdesignMedecinApp\Controller\Admin;


	class AdminController extends \bpsmartdesignMedecinApp\Controller\AppController {

		private $taux;

		public function getTaux() { return $this->taux; }
		public function setTaux($value) { $this->taux = $value; }


		private function secureData($string) {

			if(ctype_digit($string)) {

				$string = intval($string);
			}else {

				//$string = mysql_real_escape_string($string);
				$string = addcslashes($string, '%');
			}

			return $string;
		}

		private function postControl() {

			if(empty($_POST)) {

				header('Location: index');
				die();
			}
		}

		private function setTitle() {

			$p = stripcslashes(htmlentities($_GET['p']));
			$p = explode('.', $p);
			return 'NJANGUI :: Application de Gestion des Réunion - Lite (Bpsmartdesign) - '.ucfirst($p[3]).'s';
		}

		private function adminVerification($type = 'personnel') {

			if(!isset($_SESSION['bpsmartdesignMedecinLogToken'])) {

				header('Location: forbidden');
				die();
			}else {

				if($_SESSION['ç_exphairedegreeaoejmfalnfma'] != $type) {

					$superUsers = $this->loadModel('user')->find($_SESSION['id_lkjaldkafpoijdmfaexphair']);
					
					if($superUsers->niveau == 'patron') {
					
						$_SESSION['ç_exphairauthorizationsdioamkpàaç_rsslnf'] = 99;
					}else {
						header('Location : '.$_SERVER['HTTP_REFERER']);
						die();
					}
				}else {
					
					if($_SESSION['ç_exphairedegreeaoejmfalnfma'] == 'personnel') {

						$_SESSION['ç_exphairauthorizationsdioamkpàaç_rsslnf'] = 1;
					}elseif($_SESSION['ç_exphairedegreeaoejmfalnfma'] == 'patron') {

						$_SESSION['ç_exphairauthorizationsdioamkpàaç_rsslnf'] = 99;
					}
				}
			}
		}

		public function controlLog() {
		    
			$reunion = $this->secureData(strtoupper($_POST['reunion'])); 
			$username = $this->secureData(strtoupper($_POST['username']));
			$users = $this->loadModel('user')->findeInReunion($reunion);

			$reunionName = $this->loadModel('reunion')->find($reunion);

			if (count($users) > 0) {
				
				foreach($users as $v) {
	
					if(strtoupper($v->username) == $username)
						$_SESSION['bpsmartdesign.njangui.userId'] = $v->id;
				}

				if (isset($_SESSION['bpsmartdesign.njangui.userId'])) {

					$actualUser = $this->loadModel('user')->find($_SESSION['bpsmartdesign.njangui.userId']);

					if (sha1(md5($this->secureData($_POST['password']))) == $actualUser->password) {
						$_SESSION['bpsmartdesign.njangui.user'] = $actualUser;
						$_SESSION['bpsmartdesign.njangui.username'] = $actualUser->username;
						$_SESSION['bpsmartdesign.njangui.reunion'] = $reunionName->nom;
						$_SESSION['bpsmartdesign.njangui.id'] = $reunionName->id;
						$_SESSION['bpsmartdesign.njangui.total_depot'] = 0;
						$_SESSION['bpsmartdesign.njangui.total_emprunt'] = 0;
						$_SESSION['bpsmartdesign.njangui.total_solde'] = 0;

						$depots = $this->loadModel('depot')->all();
						$emprunts = $this->loadModel('emprunt')->all();
						$membres = $this->loadModel('membre')->where('statut', 1);

						foreach($depots as $dd) { $_SESSION['bpsmartdesign.njangui.total_depot'] += $dd->montant; }
						foreach($emprunts as $ee) { $_SESSION['bpsmartdesign.njangui.total_emprunt'] += $ee->montant; }
						foreach($membres as $mm) { $_SESSION['bpsmartdesign.njangui.total_solde'] += $mm->solde + $mm->cumul_interet; }

						header('Location: Index');
						die();
					} else {
					
						$_SESSION['mess'] = 'Mot de passe incorrect';
		
						header('Location: '.$_SERVER['HTTP_REFERER']);
						die();

					}
				} else {
					
					$_SESSION['mess'] = 'Le nom d\'utilisateur est Incorrect';
	
					header('Location: '.$_SERVER['HTTP_REFERER']);
					die();

				}
			} else {

				$_SESSION['mess'] = 'Cet utilisateur n\'existe pas dans la réunion sélectionnée';

				header('Location: '.$_SERVER['HTTP_REFERER']);
				die();
			}
		}

		public function save() {

			$this->postControl();
			$table = $this->secureData($_POST['table']);
			$action = $this->secureData($_POST['action']);

			if ($table == 'reunion') {

				$nom = $this->secureData($_POST['nom']);
				$description = $this->secureData($_POST['description']);
				$taux = $this->secureData($_POST['taux']);
				$id = $this->secureData($_POST['id']);

				if ($action == 'add') {

					$this->loadModel($table)->create([
						'nom' => $nom,
						'description' => $description,
						'taux' => $taux,
						'statut' => 1,
					]);
				} else {

					$this->loadModel($table)->update($id, [
						'nom' => $nom,
						'description' => $description,
						'taux' => $taux
					]);
				}

				header('Location: reunion');
				die();
			} else if ($table == 'user') {

				$username = $this->secureData($_POST['username']);
				$password = $this->secureData($_POST['password']);
				$id_reunion = $this->secureData($_POST['id_reunion']);
				$id = $this->secureData($_POST['id']);

				if ($action == 'add') {

					$this->loadModel($table)->create([
						'id_reunion' => $id_reunion,
						'username' => $username,
						'password' => sha1(md5($password)),
						'statut' => 1
					]);
				} else {

					if (strlen($password) > 0) {
						$this->loadModel($table)->update($id, [
							'id_reunion' => $id_reunion,
							'username' => $username,
							'password' => sha1(md5($password))
						]);
					} else {
						$this->loadModel($table)->update($id, [
							'id_reunion' => $id_reunion,
							'username' => $username
						]);
					}
				}

				header('Location: user');
				die();
			} else if ($table == 'membre') {

				$nom_complet = $this->secureData($_POST['nom_complet']);
				$adresse = $this->secureData($_POST['adresse']);
				$cni = $this->secureData($_POST['cni']);
				$contact = $this->secureData($_POST['contact']);
				$date_naissance = $this->secureData($_POST['date_naissance']);
				$lieu_naissance = $this->secureData($_POST['lieu_naissance']);
				$id_reunion = $_SESSION['bpsmartdesign.njangui.id'];
				$id = $this->secureData($_POST['id']);

				if ($action == 'add') {

					$this->loadModel($table)->create([
						'id_reunion' => $id_reunion,
						'nom_complet' => $nom_complet,
						'adresse' => $adresse,
						'cni' => $cni,
						'contact' => $contact,
						'date_naissance' => $date_naissance,
						'lieu_naissance' => $lieu_naissance,
						'statut' => 1
					]);
				} else {
					$this->loadModel($table)->update($id, [
						'nom_complet' => $nom_complet,
						'adresse' => $adresse,
						'cni' => $cni,
						'contact' => $contact,
						'date_naissance' => $date_naissance,
						'lieu_naissance' => $lieu_naissance,
					]);
				}

				header('Location: membre');
				die();
			} else if ($table == 'depot') {

				$id_membre = $this->secureData($_POST['id_membre']);
				$id_reunion = $_SESSION['bpsmartdesign.njangui.id'];
				$montant = $this->secureData($_POST['montant']);
				$date = $this->secureData($_POST['date']);
				$id = $this->secureData($_POST['id']);

				if ($action == 'add') {

					$this->loadModel($table)->create([
						'id_membre' => $id_membre,
						'id_reunion' => $id_reunion,
						'montant' => $montant,
						'date' => $date,
					]);
				} else {

					$this->loadModel($table)->update($id, [
						'id_membre' => $id_membre,
						'id_reunion' => $id_reunion,
						'montant' => $montant,
						'date' => $date,
					]);
				}

				$membre = $this->loadModel('membre')->find($id_membre);
				$solde = (isset($_POST['old_montant'])) ? $membre->solde - (int)$_POST['old_montant'] + $montant : $membre->solde + $montant;
				$this->loadModel('membre')->update($id_membre, ['solde' => $solde]);

				header('Location: depot');
				die();
			} else if ($table == 'emprunt') {

				$id_membre = $this->secureData($_POST['id_membre']);
				$id_reunion = $_SESSION['bpsmartdesign.njangui.id'];
				$montant = $this->secureData($_POST['montant']);
				$date = $this->secureData($_POST['date']);
				$id = $this->secureData($_POST['id']);

				$taux_reunion = $this->loadModel('reunion')->find($_SESSION['bpsmartdesign.njangui.id'])->taux;
				$montant_interet = (int)$montant * (1 + (int)$taux_reunion / 100);
				$interet = (int)$montant * (int)$taux_reunion / 100;
				$current_total_deposit = 0;

				// On récupères tous les dépots effectués avant la date du jour
				$all_deposits = $this->loadModel('depot')->deposit_stamp($_SESSION['bpsmartdesign.njangui.id'], $date);
				foreach($all_deposits as $ad) { $current_total_deposit += $ad->montant; }

				// Attribution des pourcentage par dépot effectué
				$tmp_total = 0;
				foreach($all_deposits as $deposit) {
					$deposit->percent = round((100 * $deposit->montant) / $current_total_deposit, 2);
					$tmp_total += $deposit->percent;
				}

				// On s'assure que le total des pourcentage ne dépasse pas 100% et on rajuste au cas où
				if($tmp_total > 100) { 
					$diff = round($tmp_total - 100, 2);
					$all_deposits[0]->percent -= $diff;
				}

				foreach($all_deposits as $deposit) {
					$profit = $deposit->percent * $interet / 100;
					$sorti = (int)$deposit->percent * (int)$montant / 100;

					$membre = $this->loadModel('membre')->find($deposit->id_membre);

					$old_sorti = isset($_POST['old_montant']) ? $deposit->percent * $_POST['old_montant'] / 100 : 0;
					$solde = isset($_POST['old_montant']) ? $membre->solde + $old_sorti - $sorti : $membre->solde - $sorti;
					$old_interet = isset($_POST['old_montant']) ? $_POST['old_montant'] * $taux_reunion / 100 : 0;
					$old_profit = isset($_POST['old_montant']) ? $deposit->percent * $old_interet / 100 : 0;
					$cumul = isset($_POST['old_montant']) ? $membre->cumul_interet - $old_profit + $profit : $membre->cumul_interet + $profit;

					if (isset($_POST['old_montant'])) {
						
						$transactionId = $this->loadModel('transaction')->searchTransaction($id_reunion, $membre->id, $id_membre, $date, $old_sorti)[0]->id;
						$this->loadModel('transaction')->update($transactionId, [
							'id_reunion' => $id_reunion,
							'id_membre' => $membre->id,
							'id_emprunt' => $id_membre,
							'montant' => $sorti,
							'date' => $date
						]);

					} else {

						$this->loadModel('transaction')->create([
							'id_reunion' => $id_reunion,
							'id_membre' => $membre->id,
							'id_emprunt' => $id_membre,
							'montant' => $sorti,
							'date' => $date
						]);
					}

					$this->loadModel('membre')->update($deposit->id_membre, [
						'cumul_interet' => $cumul,
						'solde' => $solde
					]);
				}

				if ($action == 'add') {

					$this->loadModel($table)->create([
						'id_membre' => $id_membre,
						'id_reunion' => $id_reunion,
						'montant' => $montant,
						'reste' => $montant,
						'montant_interet' => $montant_interet,
						'date' => $date,
					]);
				} else {

					$this->loadModel($table)->update($id, [
						'id_membre' => $id_membre,
						'id_reunion' => $id_reunion,
						'montant' => $montant,
						'reste' => $montant,
						'montant_interet' => $montant_interet,
						'date' => $date,
					]);
				}

				header('Location: emprunt');
				die();
			} else {
				die('jkl');
			}
		}

		public function rembourse() {

			$this->postControl();
			$title = 'Procéder au remboursement';

			$emprunt = $this->loadModel('emprunt')->find($this->secureData($_POST['id']));
			$membre = $this->loadModel('membre')->find($this->secureData($_POST['membre']));

			$this->render('admin.form.rembourse', compact('title', 'membre', 'emprunt'));
		}

		public function process_rembourse() {

			$id_emprunt = $this->secureData($_POST['id_emprunt']);
			$id_membre = $this->secureData($_POST['id_membre']);
			$montant = $this->secureData($_POST['montant']);

			$emprunt = $this->loadModel('emprunt')->find($id_emprunt);

			$date = $emprunt->date;
			$id_r = $_SESSION['bpsmartdesign.njangui.id'];

			$percent_rembourse = (int)$montant * 100 / (int)$emprunt->reste ;
			$transactions = $this->loadModel('transaction')->activeTransaction($id_r, $id_membre, $date);
			
			foreach($transactions as $tr) {
				$membre = $this->loadModel('membre')->find($tr->id_membre);
				$tmp_montant = (int)$percent_rembourse * (int)$tr->montant /100;

				$this->loadModel('membre')->update($tr->id_membre, ['solde' => $membre->solde + $tmp_montant]);
				$this->loadModel('transaction')->update($tr->id, ['montant' => $tr->montant - $tmp_montant]);
			}

			$this->loadModel('emprunt')->update($id_emprunt, [ 'reste' => (int)$emprunt->reste - (int)$montant ]);
			
			header('Location: emprunt');
			die();
		}

		public function addElement() {

			$this->postControl();
			
			$title = 'Ajout d\'un nouvel élément';
			$table = $this->secureData($_POST['table']);

			$this->render('admin.form.add'.ucfirst($table), compact('title'));
		}

		public function modElement() {

			$this->postControl();
			
			$title = 'Modification d\'un nouvel élément';
			$table = $this->secureData($_POST['table']);
			$id = $this->secureData($_POST['id']);

			$old = $this->loadModel($table)->find($id);

			$this->render('admin.form.add'.ucfirst($table), compact('title', 'old'));
		}

		public function delElement() {

			$table = $this->secureData($_POST['table']);
			$id = $this->secureData($_POST['id']);
			$statut = $this->secureData($_POST['statut']) == 0 ? 1 : 0 ;

			$this->loadModel($table)->update($id, ['statut' => $statut]);
			
			header('Location: '.$_SERVER['HTTP_REFERER']);
			die();
		}

		public function logout() {

			header('Location : http://localhost/bpsmartdesign.njangui');
			die();
			// $this->renderLogOut('admin.home.forbidden', compact('title'));
		}

		public function forbidden() {

			$title = $this->setTitle();

			$this->renderForbidden('admin.home.forbidden', compact('title'));
		}

		public function nofound() {

			$title = $this->setTitle();

			$this->renderForbidden('admin.home.nofound', compact('title'));
		}

		public function Home() {

			$title = 'WebPlan_site';

			$this->render('admin.home.Home', compact('title'));
		}

		public function Gestion_des_Ressources() {

			$title = 'WebPlan_site :: Gestion_des_Ressources';

			$this->render('admin.Gestion_des_Ressources', compact('title'));
		}

		public function Gestion_des_clients() {

			$title = 'WebPlan_site :: Gestion_des_clients';

			$this->render('admin.Gestion_des_clients', compact('title'));
		}

		public function Activites_Commerciales() {

			$title = 'WebPlan_site :: Activités_Commerciales';

			$this->render('admin.Activites_Commerciales', compact('title'));
		}

		public function Planifications() {

			$title = 'WebPlan_site :: Planifications';

			$this->render('admin.Planifications', compact('title'));
		}
		
		public function Releves_activites() {

			$title = 'WebPlan_site :: Releves_activites';

			$this->render('admin.Releves_activites', compact('title'));
		}

		public function Preparation_de_la_paie() {

			$title = 'WebPlan_site :: Preparation_de_la_paie';

			$this->render('admin.Preparation_de_la_paie', compact('title'));
		}

		public function Configuration() {

			$title = 'WebPlan_site :: Configuration';

			$this->render('admin.Configuration', compact('title'));
		}

		public function Gestion_des_utilisateurs() {

			$title = 'WebPlan_site :: Gestion_des_utilisateurs';

			$this->render('admin.Gestion_des_utilisateurs', compact('title'));
		}

		public function Guide_utilisation() {

			$title = 'WebPlan_site :: Guide_utilisation';

			$this->render('admin.Guide_utilisation', compact('title'));
		}

		public function Support_tecchnique() {

			$title = 'WebPlan_site :: Support_tecchnique';

			$this->render('admin.Support_tecchnique', compact('title'));
		}

		public function Accedez_a_lextranet() {

			$title = 'WebPlan_site :: Accedez_a_lextranet';

			$this->render('admin.Accedez_a_lextranet', compact('title'));
		}
		public function liens_provisoires() {

			$title = 'WebPlan_site :: liens provisoires';

			$this->render('admin.liens_provisoires', compact('title'));
		}
		public function contact() {

			$title = 'WebPlan_site :: contact';

			$this->render('admin.form.contact', compact('title'));
		}

		public function Devis() {

			$title = 'WebPlan_site :: Devis';

			$this->render('admin.form.Devis', compact('title'));
		}

		public function notre_expertise() {

			$title = 'WebPlan_site :: notre_expertise';

			$this->render('admin.notre_expertise', compact('title'));
		}

		public function toutes_les_fonctionnalites() {

			$title = 'WebPlan_site :: toutes_les_fonctionnalites';

			$this->render('admin.toutes_les_fonctionnalites', compact('title'));
		}

		public function actualite() {

			$title = 'WebPlan_site :: actualite';

			$this->render('admin.actualite', compact('title'));
		}

		public function societe() {

			$title = 'WebPlan_site :: societe';

			$this->render('admin.societe', compact('title'));
		}

		public function Partenaires() {

			$title = 'WebPlan_site :: Partenaires';

			$this->render('admin.Partenaires', compact('title'));
		}

		public function Nous_rejoindre() {

			$title = 'WebPlan_site :: Nous_rejoindre';

			$this->render('admin.Nous_rejoindre', compact('title'));
		}

		public function Tarifs_Packs() {

			$title = 'WebPlan_site :: Tarifs_Packs';

			$this->render('admin.Tarifs_Packs', compact('title'));
		}

		public function Tarifs_DemoPacks() {

			$title = 'WebPlan_site :: Demo';

			$this->render('admin.Demo', compact('title'));
		}

		public function MENTIONS_LAGALES() {

			$title = 'WebPlan_site :: MENTIONS_LAGALES';

			$this->render('admin.MENTIONS_LAGALES', compact('title'));
		}

		public function POLITIQUE_DE_PROTECTION() {

			$title = 'WebPlan_site :: POLITIQUE_DE_PROTECTION';

			$this->render('admin.POLITIQUE_DE_PROTECTION', compact('title'));
		}

		public function send_mail_contact() {

			$title = 'WebPlan_site :: send_mail_contact';
			$this->postControl();
			$nom = $this->secureData($_POST['nom']);
			$email = $this->secureData($_POST['email']);
			$phone = $this->secureData($_POST['phone']);
			$societe = $this->secureData($_POST['societe']);
			$effectifs = $this->secureData($_POST['effectifs']);
			$pays = $this->secureData($_POST['pays']);
			$message = $this->secureData($_POST['message']);
			$objet = $this->secureData($_POST['objet']);

					$to = "Email: contact@webplansaas.com, Info@webplansaas.com";
					$subject = "webplan site";

					$message = "
					<html>
					<head>
					<title>mail de contact</title>
					<style>
						table {
							border-collapse: collapse
						}

						th {
							background: #8c8b8c;
							color:#fff;
							border: 1px solid black;
  							padding: 10px;
						}
						td {
							border: 1px solid black;
  							padding: 10px;
						}
					</style>
					</head>
					<body>
					<p>Ce mail proviens du formulaire de contact de webplan site web</p>
					<table>
					<tr>
					<th>nom</th>
					<th>email</th>
					<th>telephone</th>
					<th>société</th>
					<th>objet</th>
					<th>message</th>
					</tr>
					<tr>
					<td>$nom</td>
					<td>$email</td>
					<td>$phone</td>
					<td>$societe</td>
					<td>$objet</td>
					<td>$message</td>
					</tr>
					</table>
					</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <contact@webplansaas.com>' . "\r\n";
					$headers .= 'Cc: Info@webplansaas.com' . "\r\n";

					mail($to,$subject,$message,$headers);
					$valide = true;
					$this->render('admin.form.contact', compact('title','valide'));
		}

		public function send_devis() {

			$title = 'WebPlan_site :: send_mail_contact';
			$this->postControl();
			$nom = $this->secureData($_POST['nom']);
			$email = $this->secureData($_POST['email']);
			$phone = $this->secureData($_POST['phone']);
			$societe = $this->secureData($_POST['societe']);
			$effectifs = $this->secureData($_POST['effectifs']);
			$pays = $this->secureData($_POST['pays']);
			$message = $this->secureData($_POST['message']);

					$to = "Email: contact@webplansaas.com, Info@webplansaas.com";
					$subject = "webplan site";

					$message = "
					<html>
					<head>
					<title>mail de contact</title>
					<style>
						table {
							border-collapse: collapse
						}

						th {
							background: #8c8b8c;
							color:#fff;
							border: 1px solid black;
  							padding: 10px;
						}
						td {
							border: 1px solid black;
  							padding: 10px;
						}
					</style>
					</head>
					<body>
					<p>Ce mail proviens du formulaire de demande de devis de webplan site web</p>
					<table>
					<tr>
					<th>nom</th>
					<th>email</th>
					<th>telephone</th>
					<th>société</th>
					<th>nombre d'agents</th>
					<th>adresse</th>
					<th>message</th>
					</tr>
					<tr>
					<td>$nom</td>
					<td>$email</td>
					<td>$phone</td>
					<td>$societe</td>
					<td>$effectifs</td>
					<td>$pays</td>
					<td>$message</td>
					</tr>
					</table>
					</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <contact@webplansaas.com>' . "\r\n";
					$headers .= 'Cc: Info@webplansaas.com' . "\r\n";

					mail($to,$subject,$message,$headers);
					$valide = true;
					$this->render('admin.form.Devis', compact('title','valide'));
		}

		public function newslatter() {

			$title = 'WebPlan_site :: send_mail_contact';
			$this->postControl();
			$email= $this->secureData($_POST['email']);

					$to = "Email: contact@webplansaas.com, Info@webplansaas.com";
					$subject = "webplan site";

					$message = "
					<html>
					<head>
					<title>mail de contact</title>
					<style>
						table {
							border-collapse: collapse
						}

						th {
							background: #8c8b8c;
							color:#fff;
							border: 1px solid black;
  							padding: 10px;
						}
						td {
							border: 1px solid black;
  							padding: 10px;
						}
					</style>
					</head>
					<body>
					<p>Ce mail proviens du formulaire des newslatters de webplan site web</p>
					<table>
					<tr>
					<th>email</th>
					</tr>
					<tr>
					<td>$email</td>
					</tr>
					</table>
					</body>
					</html>
					";

					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					// More headers
					$headers .= 'From: <contact@webplansaas.com>' . "\r\n";
					$headers .= 'Cc: Info@webplansaas.com' . "\r\n";

					mail($to,$subject,$message,$headers);
					$valide = true;
					$this->render('admin.home.Home', compact('title','valide'));
		}
	}
 ?>