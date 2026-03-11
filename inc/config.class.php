<?php 
	class Config{
		private $_db;
		
		public function __construct($db){
			$this->setDb($db);
		}
		
		public function setDb(PDO $db){
			$this->_db = $db;
		}
		
		const TOTAL_POINT_CLASSE = 320;

		

		/*******************************************************
		 * **********************************************************
		 *  							LES SETTERS 
		 * ******************************************************
		 *******************************************************/
		
		// On veut initialiser les données de l'application avec ses tables  
		public function setDatabaseStructure($requete){
			$execution = $this->_db->query($requete);
			return $execution;
		}


		// On veut introduire les données issues des tables 
		public function setDatabaseData($requete){
			$execution = $this->_db->query($requete);
		}
		
		
		// On ne blague pas avec les clés primaires et etrangères qui sont des Id,
		// donc des entiers naturels 
		private function setUserId($id){
			$this->_id = (int) $id;
			if($this->_id==0){
				$this->_id = NULL;
			}
			return $this->_id;
		}
		
		// Les mots de passe utilisent le système de hachage sha1 
		private function setPassword($pwd){
			$this->_pwd = sha1($pwd);
			return $this->_pwd;
		}
		
		
		// On configure l'enregistrement du nom 
		public function setNom($nom){
			// On convertit d'abord les A 
			$this->nom = $this->replaceA($nom);
			// On convertit ensuite les E 
			$this->nom =$this->replaceE($this->nom);
			// On covertit les I 
			$this->nom =$this->replaceI($this->nom);
			$this->nom = addslashes($this->nom);
			return $this->nom;
		}
		
		// On configure l'enregistrement du login 
		private function setLogin($login){
			$this->login = str_replace(' ','',strtolower($login));
			$this->login = $this->replaceA($this->login);
			$this->login =$this->replaceE($this->login);
			$this->login =$this->replaceI($this->login);
			$this->login =$this->replaceApos($this->login);
			return $this->login;
		}
		
		private function setNote($note){
			$this->_note = str_replace(',', '.', $note);
			if($this->_note <= 0){
				$this->_note = NULL;
			}elseif($this->_note > 500){
				$this->_note = NULL;
			}else{
				$this->_note = (float) $this->_note;
			}
			return $this->_note;
		}


		/*************************************************************
		 * *******************************************************
		 * 			LES GETTERS 
		 * *******************************************************
		 *******************************************************/
		public function getRegion(){
			$sql = "SELECT *
					FROM region";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


		public function getDepartement($region){
			$sql = "SELECT *
					FROM departement
					WHERE id_region='$region'";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


		// Je veux pouvoir afficher la liste des enseignants 
		// selon qu'ils sont Maitre, Cellule,
		// ou Administrateur 
		public function getUtilisateurType($type){
			$sql = "SELECT nom, sexe, login, enseignant.id as idEnseignant, 
							libelle_poste
					FROM enseignant, type_utilisateur
					WHERE code_poste='$type' 
						AND enseignant.type_utilisateur = type_utilisateur.id
						AND etat = 'actif'
						ORDER BY nom";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


		// On affiche tout sur un élève donné 
		public function getEleve($eleve){
			$sql = "SELECT nom_complet, eleve.sexe as sexe, 
						eleve.statut, date_naissance,
						DATE_FORMAT(date_naissance, '%d / %m / %Y') as date_fr,
						lieu_naissance, classe, libelle_classe,
						nom_pere, nom_mere, photo, 
						contact_parent, matricule, etat, 
						annee_scolaire, libelle_annee, eleve.id as id
					FROM eleve, classe, annee_scolaire 
					WHERE eleve.id = '$eleve'
						AND classe = classe.id
						AND annee_scolaire = annee_scolaire.id";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if($res['sexe']=='F'){$valeurSexe='Feminin';}
			elseif($res['sexe']=='M'){$valeurSexe='Masculin';}
			$res['valeurSexe'] = $valeurSexe;
			if($res['statut']=='N'){$valeurStatut='Nouveau';}
			elseif($res['statut']=='R'){$valeurStatut='Redoublant';}
			$res['valeurStatut'] = $valeurStatut;
			return $res;
		}


		// On affiche tout sur un utilisateur donné 
		public function getUser($utilisateur){
			$sql = "SELECT enseignant.id as id, nom, sexe, 
						type_utilisateur as user_code,
						libelle_poste as type_utilisateur, 
						login, etat, image
					FROM enseignant, type_utilisateur 
					WHERE enseignant.id = '$utilisateur' 
						AND type_utilisateur.id = type_utilisateur";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			if($res['sexe']=='F'){$valeurSexe='Feminin';}
			elseif($res['sexe']=='M'){$valeurSexe='Masculin';}
			$res['valeurSexe'] = $valeurSexe;
			return $res;
		}


		// On affiche tout sur une classe donnée 
		public function getClasse($classe){
			$sql = "SELECT classe.id as id, section, libelle_classe, code_classe, niveau_classe,
							etat_classe, enseignant, libelle_section, libelle_niveau_fr, 
							libelle_niveau_en
					FROM classe, section, niveau
					WHERE classe.id = '$classe' 
						AND classe.section = section.code_section
						AND classe.niveau_classe = niveau.code_niveau";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}


		// On vérifie si la classe appartient à 
		// la section Francophone ou Anglophone
		public function getSection($classe){
			$sql = "SELECT section 
					FROM classe 
					WHERE id='$classe'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$resultat = $res['section'];
			return $resultat;
		}
		
		
		/**
		**
		**
		*/
		public function getSectionAll(){
			$sql = "SELECT * 
					FROM section 
					";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		
		protected function replaceA($text){
			$txt = str_replace('à','a',$text);
			return $txt;
		}
		
		
		protected function replaceE($text){
			$txt = str_replace('é','e',$text);
			$txt = str_replace('è','e',$txt);
			$txt = str_replace('ê','e',$txt);
			return $txt;
		}
		
		
		protected function replaceI($text){
			$txt = str_replace('î','i',$text);
			$txt = str_replace('ï','i',$txt);
			return $txt;
		}
		
		
		protected function replaceApos($text){
			$txt = str_replace("'","",$text);
			return $txt;
		}
		
		
		public function getMoisAll(){
			$sql = "SELECT * FROM periode ORDER BY libelle_periode";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


		/**
		 * On récupère les mois dont les notes ont été traitées
		 */
		public function getMoisTraites(){
			$sql = "SELECT DISTINCT mois 
					FROM bull_mensuel
					ORDER BY mois DESC";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		public function getAppreciation($note, $total){
			if(empty($note)){
				$this->_appreciation = NULL;
			}elseif($note==0){
				$this->_appreciation = 'D';
			}else{
				$noteAppr = $note * 20 / $total;
				/*$sql = "SELECT *
						FROM appreciation 
						WHERE $noteAppr>=interv_ouvert
							AND $noteAppr <interv_fermet";*/
				$sql = "SELECT * FROM appreciation 
						WHERE $noteAppr BETWEEN interv_ouvert 
							AND interv_fermet";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				$this->_appreciation = $res['cote'];
			}
			return $this->_appreciation;
		}
		
		
		
		// A partir de la côte, on ressort l'appreciation d'une note
		public function getLibelleAppreciation($cote, $section){
			$nomChamp = 'libelle_appreciation_'.$section;
			if($cote==''){
				$this->_appreciation = '';
			}else{
				$sql = "SELECT `$nomChamp` as appr
						FROM appreciation
						WHERE cote = '$cote'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				$this->_appreciation = $res['appr'];
			}
			return $this->_appreciation;
		}
		
		
		
		
		public function getMoisCourant($id){
			$sql = "SELECT * FROM periode WHERE id = '$id'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// Je veux afficher les différents types utilisateurs 
		public function userType(){
			$sql = "SELECT id, code_poste, libelle_poste
					FROM type_utilisateur
					ORDER BY id";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// La fonction qui gère le formulaire de connexion 
		public function connectUser($source, $login, $mdp){
			$this->_login = $this->setUserId($login);
			$this->_mdp = $this->setPassword($mdp);
			$sql = "SELECT enseignant.id as id, nom, sexe, type_utilisateur,
							login, password, image, etat, code_poste, libelle_poste
					FROM enseignant, type_utilisateur
					WHERE enseignant.id = '$this->_login'
						AND password='$this->_mdp'
						AND type_utilisateur.id = type_utilisateur";
			$req = $this->_db->query($sql);
			$reponse = $req->fetch(PDO::FETCH_ASSOC);
			if($reponse==false){
				$_SESSION['message'] = 'Le mot de passe entré est incorrect.';
				header('Location:'.$source);
			}else{
				if($reponse['etat']=='inactif'){
					$_SESSION['message'] = 'Votre compte a été désactivé.';
					$_SESSION['message'] .= ' Contactez un administrateur.';
					header('Location:'.$source);
				}else{
					// On commence par inscrire la connexion dans un journal.
					$adresse = $_SERVER['REMOTE_ADDR'];
					$periode = DATE('Y-m-d H:i:s');
					$navigateur = $this->getNavigateur();
					$journal = $this->_db->prepare('INSERT INTO journal_connexion
												SET 
												utilisateur=:login, 
												periode=:periode, 
												adresse_ip = :adresse, 
												nom_machine = :machine, 
												type_machine = :type');
					$journal->bindValue(':login', $this->_login);
					$journal->bindValue(':adresse', $adresse);
					$journal->bindValue(':periode', $periode);
					$journal->bindValue(':machine', $navigateur['navigateur']);
					$journal->bindValue(':type', $navigateur['os']);
					$journal->execute();
					// On charge les informations de l'établissement 
					$information = $this->chargerInformation();
					$_SESSION['information']['pays_fr'] = $information['libelle_pays_fr'];
					$_SESSION['information']['pays_en'] = $information['libelle_pays_en'];
					$_SESSION['information']['devise_fr'] = $information['libelle_devise_fr']; 
					$_SESSION['information']['devise_en'] = $information['libelle_devise_en'];
					$_SESSION['information']['ministere_fr'] = $information['libelle_ministere_fr'];
					$_SESSION['information']['ministere_en'] = $information['libelle_ministere_en'];
					$_SESSION['information']['region_fr'] = $information['libelle_region_fr'];
					$_SESSION['information']['region_en'] = $information['libelle_region_en'];
					$_SESSION['information']['departement_fr'] = $information['libelle_departement_fr'];
					$_SESSION['information']['departement_en'] = $information['libelle_departement_en'];
					$_SESSION['information']['arrondissement'] = $information['arrondissement'];
					$_SESSION['information']['ville'] = $information['ville'];
					$_SESSION['information']['nom_etablissement_fr'] = $information['nom_etablissement_fr'];
					$_SESSION['information']['nom_etablissement_en'] = $information['nom_etablissement_en'];
					$_SESSION['information']['contact'] = $information['contact'];
					$_SESSION['information']['email'] = $information['email'];
					$_SESSION['information']['bp'] = $information['boite_postale'];
					$_SESSION['information']['typeEts'] = $information['type_etablissement'];
					$_SESSION['information']['titre'] = $this->getTitre($information['sexe']);
					$_SESSION['information']['nom_directeur'] = $information['nom_chef'];
					$_SESSION['information']['annee_scolaire'] = $information['libelle_annee'];
					$_SESSION['information']['id'] = $information['id'];
					// On crée des variables de session de l'utilisateur
					$_SESSION['user']['id'] = $reponse['id'];
					$_SESSION['user']['nom'] = stripslashes($reponse['nom']);
					$_SESSION['user']['sexe'] = $this->getTitre($reponse['sexe']);
					$_SESSION['user']['type_utilisateur'] = $reponse['type_utilisateur'];
					$_SESSION['user']['userPost'] = $reponse['code_poste'];
					$_SESSION['user']['login'] = $reponse['login'];
					$_SESSION['user']['password'] = $reponse['password'];
					$_SESSION['user']['image'] = $reponse['image'];
					$_SESSION['user']['libellePoste'] = $reponse['libelle_poste'];
					// La redirection 
					$_SESSION['connected'] = true;;
					$_SESSION['message'] = 'Welcome '.$_SESSION['user']['nom'];
					header('Location:'.$source);
				}
			}
		}
		
		
		function str_contains($haystack, $needle){
			return $needle !=='' && mb_strpos($haystack,$needle)!== false;
		}
		
		// On veut connaitre le navigateur et le Système d'exploitation utilisé
		public function getNavigateur(){
			if($this->str_contains($_SERVER['HTTP_USER_AGENT'], 'Chrome')){
				$navigateur = 'Chrome';
			}elseif($this->str_contains($_SERVER['HTTP_USER_AGENT'], 'Firefox')){
				$navigateur = 'Firefox';
			}
			if($this->str_contains($_SERVER['HTTP_USER_AGENT'], 'Windows')){
				$os = 'Windows';
			}elseif($this->str_contains($_SERVER['HTTP_USER_AGENT'], 'Android')){
				$os = 'Android';
			}
			$information = array("navigateur"=>$navigateur,
								"os"=>$os);
			return $information;
		}
		
		
		
		// Obtenir l'id de l'année scolaire en cours 
		public function getCurrentYear(){
			$sql = "SELECT id
					FROM annee_scolaire 
					WHERE statut='actif'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res['id'];
		}
		
		
		
		
		
		// On charge les informations sur l'établissement au complet. 
		public function chargerInformation(){
			$sql = "SELECT libelle_pays_fr, libelle_pays_en, libelle_devise_fr,
							libelle_devise_en, libelle_ministere_fr, libelle_ministere_en,
							libelle_region_fr, libelle_region_en, libelle_departement_fr,
							libelle_departement_en, arrondissement, ville, nom_etablissement_fr,
							nom_etablissement_en, contact, email, boite_postale, sexe, 
							nom_chef, libelle_annee, type_etablissement, annee_scolaire.id as id
					FROM annee_scolaire, region, departement  
					WHERE statut='actif'
						AND region.id = region
						AND departement.id = departement";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		// On verifie si un matricule existe déjà.
		private function checkMatricule($matricule){
			$sql = "SELECT matricule 
					FROM eleve 
					WHERE matricule='$matricule'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res['matricule'];
		}
		
		
		
		// on vérifie si un nom existe deja.
		private function checkNom($nom, $table, $champ){
			$sql = "SELECT $champ 
					FROM $table 
					WHERE $champ = '$nom'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}






		private function checkTable($table){
			$sql = $this->_db->prepare("SHOW TABLES LIKE :table");
			$sql->bindValue(':table', $table);
			$sql->execute();
			return $sql->fetch();
		}
		
		
		
		
		
		
		// On transforme le sexe de l'usager en titre : Monsieur ou Madame
		public function getTitre($sexe){
			if($sexe=='M'){
				$this->titre = 'Monsieur ';
			}elseif($sexe=='F'){
				$this->titre = 'Madame ';
			}else{
				$this->titre = '';
			}
			return $this->titre;
		}
		
		
		
		
		
		
		
		
		
		// On transforme la section de la classe en titre : Francophone ou Anglophone
		public function transformSection($section){
			if($section=='fr'){
				$this->section = 'Francophone';
			}elseif($section=='en'){
				$this->section = 'Anglophone';
			}else{
				$this->section = 'Francophone';
			}
			return $this->section;
		}
		
		
		
		
		
		
		
		
		
		// On choisit un sexe pour l'utilisateur 
		public function setSexe($sexe){
			if($sexe=='M'){
				$this->sexe = $sexe;
			}elseif($sexe=='F'){
				$this->sexe = $sexe;
			}else{
				$this->sexe = 'M';
			}
			return $this->sexe;
		}
		
		
		
		
		
		
		
		
		
		// On définit les sections 
		public function setSection($section){
			if($section=='fr'){
				$this->section = $section;
			}elseif($section=='en'){
				$this->section = $section;
			}else{
				$this->section = 'fr';
			}
			return $this->section;
		}
		
		
		
		
		
		
		
		
		// On choisit un statut pour l'élève 
		public function setStatut($statut){
			if($statut=='N'){
				$this->statut = $statut;
			}elseif($statut=='R'){
				$this->statut = $statut;
			}else{
				$this->statut = 'N';
			}
			return $this->statut;
		}
		
		
		
		
		
		
		
		
		
		// On veut connaitre la page sur laquelle on se trouve
		public function pageEnCours(){
			$page = $_SERVER['PHP_SELF'];
			$explosion = explode('/',$page);
			$nbVal = count($explosion);
			$indice = $nbVal - 1;
			$nomPage = $explosion[$indice];
			return $nomPage;
		}
		
		
		
		
		
		
		
		
		// Deconnecter l'utilisateur courant.
		public function deconnect(){
			unset($_SESSION['information']);
			unset($_SESSION['user']);
			unset($_SESSION['connected']);
			$_SESSION['message'] = 'Vous avez été déconnecté. A bientôt';
		}
		
		
		
		
		
		
		
		
		
		// L'utilisateur courant modifie son mot de passe  
		public function changePassword($source, $ancien, $nouveau, $confirm, $id){
			$this->_id = $this->setUserId($id);
			$this->_ancien = $this->setPassword($ancien);
			$this->_nouveau = $this->setPassword($nouveau);
			$this->_confirm = $this->setPassword($confirm);
			// On vérifie d'abord que le mot de passe ancien est bien celui qui y était avant.
			$verif = $this->getPassword($this->_id);
			if($this->_ancien!=$verif){
				$_SESSION['message'] = 'L ancien mot de passe entré n est pas correct.'; 
				header('Location:'.$source);
			}else{
				// On s'assure que les mots de passe nouveau et confirm sont identiques. 
				if($this->_ancien==$this->_nouveau){
					$_SESSION['message'] = 'L ancien mot de passe correspond au nouveau.';
					header('Location:'.$source);
				}else{
					if($this->_nouveau!=$this->_confirm){
						$_SESSION['message'] = 'Vous n avez pas pu confirmer votre Nouveau mot de passe.';
						header('Location:'.$source);
					}else{
						$sql = "UPDATE enseignant 
								SET password='$this->_nouveau'
								WHERE id='$this->_id'";
						$exec = $this->_db->query($sql);
						$_SESSION['message'] = 'Mot de Passe modifié. Deconnectez-vous pour continuer.';
						header('Location:'.$source);
					}
				}
			}
		}









		public function changeClasseEleve($source, $info){
			// echo '<pre>'; print_r($info); echo '</pre>';
			$this->_classe = $this->setUserId($info['classeEleve']);
			$this->_eleve = $this->setUserId($info['idEleve']);
			$infoEleve = $this->getEleve($this->_eleve);
			$infoClasse = $this->getClasse($this->_classe);
			$sqlEleve =  $this->_db->prepare("UPDATE eleve SET classe =:classe WHERE id=:eleve");
			$sqlEleve->execute(array("classe"=>$this->_classe, "eleve"=>$this->_eleve));
			$sqlNote = $this->_db->prepare("UPDATE note SET classe=:classe WHERE eleve=:eleve");
			$sqlNote->execute(array("classe"=>$this->_classe, "eleve"=>$this->_eleve));
			$_SESSION['message'] = 'L élève '.$infoEleve['nom_complet'].' est maintenant en '.$infoClasse['libelle_classe'];
			// echo $_SESSION['message'];
			// print_r($infoClasse);
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		
		// On réinitialise le mot de passe de l'utilisateur donné 
		public function resetPassword($source, $user){
			
		}
		
		
		
		
		
		
		
		
		// Obtenir le mot de passe de l'utilisateur courant 
		protected function getPassword($user){
			$sql = "SELECT password 
					FROM enseignant 
					WHERE id = '$user'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res['password'];
		}
		
		
		
		
		
		
		
		
		// Fonction utile pour aider à la génération du Matricule Elève
		public function getCode(){
			$sql = "SELECT num_rand
					FROM eleve
					ORDER BY num_rand DESC";
			$req = $this->_db->query($sql);
			$reponse = $req->fetch(PDO::FETCH_ASSOC);
			$resultat = $reponse['num_rand'];
			return $resultat;
		}
		
		
		
		
		
		
		
		
		// On liste les classes
		public function viewClasseSection($etat, $section){
			$sql = "SELECT classe.id as id, section, libelle_classe, code_classe, niveau_classe, 
							etat_classe
						FROM classe 
						WHERE etat_classe='".$etat."'
							AND section='".$section."'
						ORDER BY niveau_classe";
			$req = $this->_db->query($sql);
			$res=$req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		 }
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 // On liste les enseignants intervenant dans les classes
		public function viewEnseignantClasse($etat, $section){
			$sql = "SELECT classe.id as id, section, libelle_classe, code_classe, niveau_classe, 
							etat_classe, enseignant, nom
						FROM classe, enseignant 
						WHERE etat_classe='".$etat."'
							AND section='".$section."'
							AND enseignant.id = enseignant
						ORDER BY niveau_classe";
			$req = $this->_db->query($sql);
			$res=$req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		 }
		
		
		
		
		
		
		
		
		// On ajoute un élève à la Base de Données
		public function ajouterEleve($source,$eleve){
			// echo '<pre>'; print_r($eleve); echo '</pre>';
			$this->_nom = strtoupper($this->setNom($eleve['nom']));
			$this->_nom .= ' ';
			$this->_nom .= ucwords($this->setNom($eleve['prenom']));
			$this->_sexe = $this->setSexe($eleve['sexe']);
			$this->_dateNaissance = $eleve['date_naissance'];
			$this->_lieuNaissance = strtoupper($this->setNom($eleve['lieu_naiss']));
			$this->_classe = $this->setUserId($eleve['classe']);
			$this->_nomPere = strtoupper($this->setNom($eleve['nom_pere']));
			$this->_nomMere = strtoupper($this->setNom($eleve['nom_mere']));
			$this->_contactParent = $eleve['adresse'];
			$this->_matricule = $eleve['matricule'];
			$this->_numero = $this->setUserId($eleve['numero']);
			$this->_etat = 'non_supprime';
			$this->_statut = $eleve['statut'];
			$this->_as = $this->getCurrentYear();
			
			// On vérifie l'existence du matricule en base une première fois 
			$matricule = $this->checkMatricule($this->_matricule);
			if($matricule==NULL){
				$nom = $this->checkNom($this->_nom, 'eleve', 'nom_complet');
				// On vérifie l'existence du nom en base une première fois 
				if($nom==NULL){
					// On procède à l'insertion 
					$add = $this->_db->prepare('INSERT INTO eleve SET
											nom_complet =:nom,
											sexe =:sexe,
											date_naissance=:dateN,
											lieu_naissance =:lieuN,
											classe=:classe,
											nom_pere =:pere,
											nom_mere =:mere,
											contact_parent=:contact,
											matricule =:matricule,
											etat =:etat,
											statut =:statut,
											annee_scolaire=:as,
											num_rand=:numero');
					$add->bindValue(':nom', $this->_nom);
					$add->bindValue(':sexe', $this->_sexe);
					$add->bindValue(':statut', $this->_statut);
					$add->bindValue(':dateN', $this->_dateNaissance);
					$add->bindValue(':lieuN', $this->_lieuNaissance);
					$add->bindValue(':classe', $this->_classe);
					$add->bindValue(':pere', $this->_nomPere);
					$add->bindValue(':mere', $this->_nomMere);
					$add->bindValue(':contact', $this->_contactParent);
					$add->bindValue(':matricule', $this->_matricule);
					$add->bindValue(':etat', $this->_etat);
					$add->bindValue(':as', $this->_as);
					$add->bindValue(':numero', $this->_numero);
					$add->execute();
					$_SESSION['message'] = strtoupper($this->_nom).' a été ajouté(e) aux listes.'; 
					header('Location:'.$source);
				}else{
					$_SESSION['message'] = 'Cet élève est déjà positionné dans une classe.';
					header('Location:'.$source);
				}
			}else{
				$_SESSION['message'] = 'Un problème est survenu. Relancez l tâche svp.';
				header('Location:'.$source);
			}
		}
		
		
		
		
		
		
		
		
		
		
		// On ajoute une classe à la Base de Données
		public function ajouterClasse($source,$classe){
			// echo '<pre>'; print_r($classe); echo '</pre>';
			$niveauClasse = $this->setUserId($classe['niveau']);
			$section = $this->setSection($classe['section']);
			$libelleClasse = $this->setNom($classe['nomClasse']);
			$codeClasse = $this->setLogin($classe['codeClasse']);
			$etatClasse = 'actif';

			// On vérifie que le nom de la classe n'existe pas déjà 
			$checkNom = $this->checkNom($libelleClasse,'classe', 'libelle_classe');
			if($checkNom==false){
				// On vérifie que le code de la classe n'existe pas déjà
				$checkCode = $this->checkNom($codeClasse,'classe', 'code_classe');
				if($checkCode==false){
					// On insère d'abord les données
					$addClasse = $this->_db->prepare("INSERT INTO classe SET 
													section =:section,
													libelle_classe =:nom,
													code_classe =:code,
													niveau_classe =:niveau,
													etat_classe=:etat");							
					$addClasse->bindValue(':section', $section);
					$addClasse->bindValue(':nom', $libelleClasse);
					$addClasse->bindValue(':code', $codeClasse);
					$addClasse->bindValue(':niveau', $niveauClasse);
					$addClasse->bindValue(':etat', $etatClasse);
					$addClasse->execute();
					$this->ajouterMatiere($niveauClasse, $codeClasse);
					$_SESSION['message'] = 'La Classe '.strtoupper($libelleClasse).' a été ajoutée.';
					header('Location:'.$source);
				}else{
					$_SESSION['message'] = 'Ce code est déjà utilisé comme code de classe.';
					header('Location:'.$source);
				}
			}else{
				$_SESSION['message'] = 'Ce nom est déjà utilisé comme nom de classe.';
				header('Location:'.$source);
			}
		}
		
		
		
		
		private function ajouterMatiere($niveau, $classe){
			$sql = "SELECT id_competence, id_sous_competence, nb_point
					FROM matiere_niveau
					WHERE id_niveau = '$niveau'";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			// echo '<pre>'; print_r($res); echo '</pre>';
			$sqlClasse = "SELECT id
					FROM classe
					WHERE code_classe = '$classe'";
			$reqClasse = $this->_db->query($sqlClasse);
			$resClasse = $reqClasse->fetch(PDO::FETCH_ASSOC);
			// echo var_dump($resClasse);
			for($i=0;$i<count($res);$i++){
				$idClasse = $resClasse['id'];
				$idComp = $res[$i]['id_competence'];
				$idSousComp = $res[$i]['id_sous_competence'];
				$nbPoint = $res[$i]['nb_point'];
				$insert = $this->_db->prepare("INSERT INTO matiere SET 
												id_classe =:classe,
												id_competence =:competence,
												id_sous_competence =:sous_comp,
												nb_point =:point");
				$insert->bindValue(':classe', $idClasse);
				$insert->bindValue(':competence', $idComp);
				$insert->bindValue(':sous_comp', $idSousComp);
				$insert->bindValue(':point', $nbPoint);
				$insert->execute();
			}
		}
		
		
		
		
		// On met à jour l'élève 
		public function updateEleve($source, $eleve){
			// echo '<pre>'; print_r($eleve); echo '</pre>';
			$idEleve = $this->setUserId($eleve['idEleve']);
			$infoEleve = $this->getEleve($idEleve);
			// echo '<pre>';print_r($infoEleve);echo '</pre>';
			
			$nom = $this->setNom($eleve['nomEleve']);
			$sexe = $this->setSexe($eleve['sexeEleve']);
			$statut = $this->setStatut($eleve['statutEleve']);
			$dateNaiss = $eleve['dateNaissEleve'];
			$lieuNaiss = $this->setNom($eleve['lieuNaissEleve']);
			$classe = $this->setUserId($eleve['classeEleve']);
			$nomPere = $this->setNom($eleve['nomPereEleve']);
			$nomMere = $this->setNom($eleve['nomMereEleve']);
			$contactParent = $eleve['contactParentEleve'];
			$matricule = $eleve['matriculeEleve'];
			
			if(!empty($nom)){
				if($nom!=$infoEleve['nom_complet']){
					$champ[] = 'nom_complet';
					$valeur[] = $nom;
				}
			}
			if(!empty($sexe)){
				if($sexe!=$infoEleve['sexe']){
					$champ[] = 'sexe';
					$valeur[] = $sexe;
				}
			}
			if(!empty($statut)){
				if($statut!=$infoEleve['statut']){
					$champ[] = 'statut';
					$valeur[] = $statut;
				}
			}
			if(!empty($dateNaiss)){
				if($dateNaiss!=$infoEleve['date_naissance']){
					$champ[] = 'date_naissance';
					$valeur[] = $dateNaiss;
				}
			}
			if(!empty($lieuNaiss)){
				if($lieuNaiss!=$infoEleve['lieu_naissance']){
					$champ[] = 'lieu_naissance';
					$valeur[] = $lieuNaiss;
				}
			}
			if(!empty($classe)){
				if($classe!=$infoEleve['classe']){
					$champ[] = 'classe';
					$valeur[] = $classe;
				}
			}
			if(!empty($nomPere)){
				if($nomPere!=$infoEleve['nom_pere']){
					$champ[] = 'nom_pere';
					$valeur[] = $nomPere;
				}
			}
			if(!empty($nomMere)){
				if($nomMere!=$infoEleve['nom_mere']){
					$champ[] = 'nom_mere';
					$valeur[] = $nomMere;
				}
			}
			if(!empty($contactParent)){
				if($contactParent!=$infoEleve['contact_parent']){
					$champ[] = 'contact_parent';
					$valeur[] = $contactParent;
				}
			}
			if(!empty($matricule)){
				if($matricule!=$infoEleve['matricule']){
					$champ[] = 'matricule';
					$valeur[] = $matricule;
				}
			}
			
			$iteration = count($champ);
			$sql = "UPDATE eleve SET ";
			for($i=0;$i<$iteration-1;$i++){
				$sql .= $champ[$i]." = '".$valeur[$i]."', ";
			}
			$valeurFinaleArray = $iteration - 1;
			$sql .= $champ[$valeurFinaleArray]." = '".$valeur[$valeurFinaleArray]."' ";
			$sql .= "WHERE id = '".$idEleve."'";
			
			$this->_db->query($sql);
			$_SESSION['message'] = 'Informations Elève Mises à jour.';
			header('Location:'.$source);
			echo'<h1> Ce que vaut Champ : </h1>';
			echo '<pre>'; print_r($champ);echo '</pre>';
			
			echo '<h1>Ce que vaut Valeur : </h1>';
			echo '<pre>'; print_r($valeur);echo '</pre>';
		}
		
		
		
		
		
		
		
		
		
		
		
		// On met à jour l'utilisateur 
		public function updateUtilisateur($source, $utilisateur){
			echo '<pre>'; print_r($utilisateur); echo '</pre>';
			$userId = $this->setUserId($utilisateur['userId']);
			$userName = $this->setNom($utilisateur['nom_utilisateur']);
			$userSexe = $this->setSexe($utilisateur['sexe_utilisateur']);
			$userLogin = $this->setNom($utilisateur['login_utilisateur']);
			
			$infoUtilisateur = $this->getUser($userId);
			echo '<pre>';print_r($infoUtilisateur);echo '</pre>';
			if(!empty($userName)){
				if($userName!=$infoUtilisateur['nom']){
					$champ[] = 'nom';
					$valeur[] = $userName;
				}
			}
			
			if(!empty($userLogin)){
				if($userLogin!=$infoUtilisateur['login']){
					$champ[] = 'login';
					$valeur[] = $userLogin;
				}
			}
			
			if(!empty($userSexe)){
				if($userSexe!=$infoUtilisateur['sexe']){
					$champ[] = 'sexe';
					$valeur[] = $userSexe;
				}
			}
			$iteration = count($champ);
			$sql = "UPDATE enseignant SET ";
			for($i=0;$i<$iteration-1;$i++){
				$sql .= $champ[$i]." = '".$valeur[$i]."', ";
			}
			$valeurFinaleArray = $iteration - 1;
			$sql .= $champ[$valeurFinaleArray]." = '".$valeur[$valeurFinaleArray]."' ";
			$sql .= "WHERE id = '".$userId."'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Informations Utilisateur Mises à jour.';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		
		// On met à jour la classe 
		public function updateClasse($source, $classe){
			// echo '<pre>'; print_r($classe); echo '</pre>';
			$classId = $this->setUserId($classe['classId']);
			$classNiveau = $this->setUserId($classe['niveau_classe']);
			$classCode = $this->setLogin($classe['code_classe']);
			$classSection = $this->setSection($classe['section']);
			$classNom = $this->setNom($classe['nom_classe']);
			
			$infoClasse = $this->getClasse($classId);
			// echo '<pre>';print_r($infoClasse); echo '</pre>';
			if(!empty($classNom)){
				if($classNom!=$infoClasse['libelle_classe']){
					$champ[] = 'libelle_classe';
					$valeur[] = $classNom;
				}
			}
			if(!empty($classCode)){
				if($classCode!=$infoClasse['code_classe']){
					$champ[] = 'code_classe';
					$valeur[] = $classCode;
				}
			}
			if(!empty($classNiveau)){
				if($classNiveau!=$infoClasse['niveau_classe']){
					$champ[] = 'niveau_classe';
					$valeur[] = $classNiveau;
				}
			}
			if(!empty($classSection)){
				if($classSection!=$infoClasse['section']){
					$champ[] = 'section';
					$valeur[] = $classSection;
				}
			}
			$iteration = count($champ);
			$sql = "UPDATE classe SET ";
			for($i=0;$i<$iteration-1;$i++){
				$sql .= $champ[$i]." = '".$valeur[$i]."', ";
			}
			$valeurFinaleArray = $iteration - 1;
			$sql .= $champ[$valeurFinaleArray]." = '".$valeur[$valeurFinaleArray]."' ";
			$sql .= "WHERE id = '".$classId."'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Classe Mise à jour.';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		
		// On supprime un élève 
		public function deleteEleve($source, $eleve){
			$sql = "UPDATE eleve SET etat= 'supprime' WHERE id='$eleve'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Eleve supprimé';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		// On supprime un utilisateur 
		public function deleteUser($source, $user){
			$sql = "UPDATE enseignant SET etat= 'inactif' WHERE id='$user'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Utilisateur supprimé';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		// On supprime une classe 
		public function deleteClasse($source, $classe){
			$sql = "UPDATE classe SET etat_classe = 'inactif' WHERE id='$classe'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Classe supprimée';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		
		
		
		public function deleteMatiere($classe){
			$this->_matiere = $this->setUserId($classe['matiere']);
			$this->_classe = $this->setUserId( $classe['classe']);
			$sql = $this->_db->prepare("DELETE FROM matiere 
										WHERE id_classe=:classe 
										AND id_competence =:matiere");
			$sql->bindValue(':classe',$this->_classe);
			$sql->bindValue(':matiere',$this->_matiere);
			$sql->execute();
			$_SESSION['message'] = 'Matière Retirée de la classe';
		}
		
		
		
		
		
		
		
		
		// On restaure un élève suypprimé
		public function restaureEleve($source, $eleve){
			$sql = "UPDATE eleve SET etat= 'non_supprime' WHERE id='$eleve'";
			$this->_db->query($sql);
			$_SESSION['message'] = 'Eleve retabli';
			header('Location:'.$source);
		}
		
		
		
		
		
		
		// On ajoute un utilisateur(Enseignant, Cellule) à la Base de Données
		public function ajouterUtilisateur($source,$user){
			echo '<pre>'; print_r($user); echo '</pre>';
			$this->_nom = strtoupper($this->setNom($user['nomUser']));
			$this->_nom .= ' ';
			$this->_nom .= ucwords($this->setNom($user['prenomUser']));
			$this->_sexe = $this->setSexe($user['sexeUser']);
			$this->_type = $this->setUserId($user['type']);
			$this->_login = $this->setLogin($user['loginUser']);
			$this->_password = $this->setPassword($user['pwdUser']);
			$this->_etat = 'actif';
			$this->_image = $this->saveImage($user['photo'], 'images/user/', $this->_login);
			echo '<pre>'; print_r($this->_image); echo '</pre>';
			// On vérifie que le nom complet et/ou le login n'existent pas déjà 
			$nom = $this->checkNom($this->_nom,'enseignant','nom');
			if($nom==false){
				$login = $this->checkNom($this->_login,'enseignant','login');
				if($login==false){
					$add = $this->_db->prepare('INSERT INTO enseignant SET
											nom=:nomUser,
											sexe=:sexeUser,
											type_utilisateur =:typeUser,
											login=:loginUser,
											password=:passwordUser,
											etat=:etatUser,
											image=:imageUser');
					$add->bindValue(':nomUser', $this->_nom);
					$add->bindValue(':sexeUser', $this->_sexe);
					$add->bindValue(':typeUser', $this->_type);
					$add->bindValue(':loginUser', $this->_login);
					$add->bindValue(':passwordUser', $this->_password);
					$add->bindValue(':etatUser', $this->_etat);
					$add->bindValue(':imageUser', $this->_image['nomFichier']);
					$add->execute();
					$_SESSION['message'] = $this->_nom.' a été ajouté(e) aux listes.'; 
					$_SESSION['message'] .= ' / '.$this->_image['message']; 
					header('Location:'.$source);
				}else{
					$_SESSION['message'] = 'Le login existe déjà. Aucun ajout effectué';
					header('Location:'.$source);
				}
			}else{
				$_SESSION['message'] = 'L utilisateur existe déjà. Aucun ajout effectué';
				header('Location:'.$source);
			}
		}
		
		
		
		
		
		
		
		
		
		
		// On ajoute un utilisateur(Enseignant) à la Classe
		public function ajouterUtilisateurClasse($source,$user){
			// echo '<pre>'; print_r($user); echo '</pre>';
			$this->_classe = $this->setUserId($user['classe']);
			$this->_enseignant = $this->setUserId($user['enseignant']);
			$sql = "UPDATE classe 
					SET enseignant = '$this->_enseignant'
					WHERE id='$this->_classe'";
			$req = $this->_db->query($sql);
			$_SESSION['message'] = 'Enseignant ajouté à la classe';
			header('Location:'.$source);
		}
		
		
		
		
		// La liste des élèves d'une classe 
		public function listeEleve($classe, $etat, $as){
			$sql = "SELECT nom_complet, eleve.sexe as sexe, date_naissance, lieu_naissance,
							DATE_FORMAT(date_naissance, '%d / %m / %Y') as date_fr,
							libelle_classe, nom_pere, nom_mere, photo, contact_parent, 
							matricule, etat, libelle_annee, eleve.statut as statut, 
							eleve.id as id
					FROM eleve, classe, annee_scolaire
					WHERE etat='$etat'
						AND classe='$classe'
						AND classe = classe.id
						AND annee_scolaire = annee_scolaire.id
					ORDER BY nom_complet";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}



		// La liste des classes 
		public function listeClasse($etat){
			$sql = "SELECT classe.id as id, section, libelle_classe, code_classe, niveau_classe, 
							etat_classe, libelle_section
					FROM classe, section 
					WHERE section.code_section = classe.section
					ORDER BY section, niveau_classe, libelle_classe
					";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// Les statistiques de liste d'une classe donnée 
		public function listeEleveStat($classe, $etat, $as){
			$table = 'eleve';
			$effFilleRed = $this->statSexeStatut($table, $classe, 'F','R');
			$effFilleNv = $this->statSexeStatut($table, $classe, 'F','N');
			$effGarRed = $this->statSexeStatut($table, $classe, 'M','R');
			$effGarNv = $this->statSexeStatut($table, $classe, 'M','N');
			$stat['FR'] = $effFilleRed;
			$stat['FN'] = $effFilleNv;
			$stat['GR'] = $effGarRed;
			$stat['GN'] = $effGarNv;
			$stat['F'] = $effFilleRed + $effFilleNv;
			$stat['G'] = $effGarRed + $effGarNv;
			$stat['R'] = $effFilleRed + $effGarRed;
			$stat['N'] = $effFilleNv + $effGarNv;
			$stat['T'] = $stat['F'] + $stat['G'];
			return $stat;
		}
		
		
		
		
		private function statSexeStatut($table, $classe, $sexe, $statut){
			$sql = "SELECT count(*) as nombre
					FROM $table 
					WHERE sexe='$sexe'
						AND statut='$statut'
						AND classe='$classe'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res['nombre'];
		}
		
		
		
		
		
		
		
		
		// On liste les matières qui appartiennent à une classe 
		public function listeMatiereClasse($classe){
			$sql = "SELECT libelle_classe, code_classe, section, code_competence,
							libelle_competence_fr, libelle_competence_en, id_competence 
					FROM matiere, classe, liste_competence 
					WHERE id_classe='$classe' 
						AND classe.id = id_classe
						AND id_competence=liste_competence.id
						AND liste_competence.statut_competence='actif'
						GROUP BY code_competence";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}









		// On liste les sous - matières présentes dans la Base de Données 
		public function listeSousMatiere(){
			$sql = "SELECT *
					FROM liste_sous_competence
					ORDER BY id";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		
		// On liste les sous-matières d'une matière précise de la classe 
		public function listeSousMatiereClasse($classe, $matiere){
			$this->_classe = $this->setUserId($classe);
			$this->_matiere = $this->setUserId($matiere);
			$sql = "SELECT matiere.id as id, id_classe, 
							libelle_classe, id_competence,
							libelle_competence_fr, libelle_competence_en,
							code_competence, id_sous_competence, nb_point,
							libelle_sous_competence_fr, libelle_sous_competence_en,
							code_sous_competence
					FROM matiere, classe, liste_competence, liste_sous_competence 
					WHERE id_classe='$this->_classe' 
						AND id_competence='$this->_matiere'
						AND classe.id=id_classe
						AND liste_competence.id = id_competence
						AND liste_sous_competence.id = id_sous_competence
					";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		// Je veux les informations complètes de la table matière suivant un id 
		public function getMatiere($id){
			$sql = "SELECT matiere.id as id, id_classe, libelle_classe, section,
						id_competence, libelle_competence_fr, libelle_competence_en,
						id_sous_competence, libelle_sous_competence_fr, 
						libelle_sous_competence_en, nb_point
					FROM matiere, classe, liste_competence, liste_sous_competence 
					WHERE matiere.id = '$id'
						AND id_classe = classe.id
						AND id_competence = liste_competence.id
						AND id_sous_competence = liste_sous_competence.id";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		public function findEleve($eleve){
			$sql = "SELECT *
					FROM eleve 
					WHERE nom_complet LIKE '%$eleve%' 
					";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		// On sauvegarde une image à la fois 
		public function saveImage($photo, $dossier, $nom){
			$this->image = $photo;
			$erreur = $this->image['error'];
			if($erreur==8){
				$message = "Une erreur a stoppé l envoi de l image."; 
			}elseif($erreur==7){
				$message = "Le disque semble protégé en écriture."; 
			}elseif($erreur==6){
				$message = "Le dossier temporaire que vous voulez utiliser est manquant."; 
			}elseif($erreur==4){
				$message = "Aucune image n a été téléchargée."; 
			}elseif($erreur==3){
				$message = "Image partiellement envoyé."; 
			}elseif($erreur==2){
				$message = "L image dépasse la taille maximale autorisée par HTML."; 
			}elseif($erreur==1){
				$message = "L image depasse la taille maximale autorisée."; 
			}elseif($erreur==0){
				$extensionAutorisee = array('jpg', 'jpeg', 'png', 'gif');
				$extension = strtolower(pathinfo($this->image['name'], PATHINFO_EXTENSION));
				if(in_array($extension,$extensionAutorisee)){
					$nomFichier = $nom.'.'.$extension;
					if(move_uploaded_file($this->image['tmp_name'], $dossier.$nomFichier)){
						$message = "Image enregistrée sous ".$dossier.$nomFichier;
					}else{
						$message = $message = "Image non enregistree pour raison inconnue.";
					}
				}else{
					$message='Format d image non autorisé';
				}
			}else{
				$message = "Erreur Inconnue";
			}
			$infoImage['message'] = $message;
			$infoImage['nomFichier'] = $dossier.$nomFichier;
			return $infoImage;
		}
		
		
		
		
		
		
		
		
		
		public function listeSexe(){
			$sexe['libelle'] = array('-Choisir Sexe-','Féminin', 'Masculin');
			$sexe['code'] = array('null','F','M');
			return $sexe;
		}
		
		
		
		
		
		
		
		
		
		public function listeStatut(){
			$sexe['libelle'] = array('-Choisir Statut-','Nouveau', 'Redoublant');
			$sexe['code'] = array('null','N','R');
			return $sexe;
		}
		
		
		
		
		
		
		
		
		// On sauvegarde les photos des élèves 
		public function enregistrerImageEleve($source, $eleve, $dossier, $photo){
			$this->eleve = $eleve; 
			// echo '<h1>Before</h1>';
			// echo '<pre>';print_r($photo);echo '</pre>';
			for($i=0;$i<count($this->eleve);$i++){
				$image['name'] = $photo['name'][$i];
				$image['full_path'] = $photo['full_path'][$i];
				$image['type'] = $photo['type'][$i];
				$image['tmp_name'] = $photo['tmp_name'][$i];
				$image['error'] = $photo['error'][$i];
				$image['size'] = $photo['size'][$i];
				$info[] = $this->saveImage($image, $dossier, $this->eleve[$i]);
				$this->_eleve[] = $this->eleve[$i];
			}
			
			for($j=0;$j<count($info);$j++){
				$sql = "UPDATE eleve 
						SET photo = '".$info[$j]['nomFichier']."' 
						WHERE id='".$this->_eleve[$j]."'";
				$this->_db->query($sql);
			}
			$_SESSION['message'] = 'Les images ont été enregisstrées';
			header('Location:'.$source);
			// echo '<pre>'; print_r($info); echo '</pre>';
		}
		
		
		
		
		
		
		
		
		
		
		
		// Afficher le journal des Connexions d'un utilisateur 
		public function journalConnexion($user){
			$sql = "SELECT journal_connexion.id as id, utilisateur, adresse_ip, periode, 
						DATE_FORMAT(periode, '%d / %m / %Y %H:%i:%s') as periode_fr, 
						type_machine as os, nom_machine as navigateur, nom
					FROM journal_connexion, enseignant
					WHERE utilisateur = '$user'
						AND enseignant.id = utilisateur
					ORDER BY periode DESC
					";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		
		
		
		// On affiche la classe enseignée par un maitre 
		public function classeEnseignee($user){
			$sql = "SELECT classe.id as id, section, libelle_classe, code_classe, 
							niveau_classe, etat_classe, enseignant, nom 
					FROM classe, enseignant 
					WHERE enseignant = '$user'
						AND enseignant.id = enseignant";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		private function listSection(){
			$sql = "SELECT * 
					FROM section
					ORDER BY libelle_section";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		public function vueEffectif(){
			$section = $this->listSection();
			for($x=0;$x<count($section);$x++){
				$codeSection = $section[$x]['code_section'];
				$listeClasse = $this->viewClasseSection('actif', $codeSection);
				for($i=0;$i<count($listeClasse);$i++){
					$idClasse = $listeClasse[$i]['id'];
					$nomClasse[] = $listeClasse[$i]['libelle_classe'];
					$statistique[] = $this->listeEleveStat($idClasse, 'actif', '');
				}
				$res['classe'] = $nomClasse;
				$res['statistique'] = $statistique;
			}
			return $res;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/********************************************************************
		*
		*		G 
		*			E 
		*				S 
		*					T 
		*						I 
		*							O 
		*  								N 
		*		
		*		D 
		*			E 
		*				S 
		*
		*
		*
		*			N 
		*				O 
		*					T 
		*						E 
		*							S 
		********************************************************************/
		
		
		
		public function modifierPonderation($source, $info){
			// echo '<pre>'; print_r($info); echo '</pre>';
			$identifiant = $info['sousCompetence'];
			$ponderation = $info['nb_point'];
			for($i=0;$i<count($identifiant);$i++){
				$id = $this->setUserId($identifiant[$i]);
				$nbPoint = $this->setUserId($ponderation[$i]);
				$requete = $this->_db->prepare("UPDATE matiere SET 
									nb_point =:point 
									WHERE id =:id");
				$requete->bindValue(':point',$nbPoint);
				$requete->bindValue(':id',$id);
				$requete->execute();
			}
			$_SESSION['message'] = 'Pondérations mises à jour.';
			header('Location:'.$source);
		}
		
		
		
		
		/**
		 * On a validé l'insertion des NOTES dans la table note
		 * @param $source string
		 * @param $note array
		 * @return void 
		 */
		// On ajoute les notes à la base de donnéees 
		public function ajouterNote($source, $note){
			// echo '<pre>'; print_r($note); echo '</pre>';
			$eleve = $note['eleve'];
			$periode = $this->setUserId($note['mois']);
			$subject = $this->setUserId($note['subject']);
			$notes = $note['note'];
			$matiere[] = 'oral';
			$matiere[] = 'ecrit';
			$matiere[] = 'prat';
			$matiere[] = 'se';
			$this->_classe = $_SESSION['user']['classeTenue']['id'];
			$this->_date = DATE('Y-m-d H:i:s');
			$navig = $this->getNavigateur();
			$this->_os = $navig['os'];
			$this->_ip = $_SERVER['REMOTE_ADDR'];
			$ponderationMatiere = $this->getPonderationMatiere($subject, $this->_classe);

			// Je paramètre pour l'enregistrement des Notes en un tour 
			for($i=0;$i<count($matiere);$i++){
				$this->_matiere = $matiere[$i];
				$marks[$this->_matiere] = $notes[$i];
			}
			// Je lance l'enregistrement des notes 
			$w = 1;
			for($x=0;$x<count($eleve);$x++){
				$idEleve = $this->setUserId($eleve[$x]);
				$oralEleve = $this->setNote($marks['oral'][$x]);
				$ecritEleve = $this->setNote($marks['ecrit'][$x]);
				$pratEleve = $this->setNote($marks['prat'][$x]);
				$seEleve = $this->setNote($marks['se'][$x]);
				$total = array($oralEleve, $ecritEleve, $pratEleve, $seEleve);
				$cote = $this->getAppreciation($this->setNote(array_sum($total)), $ponderationMatiere);
				$appr = $this->getLibelleAppreciation($cote, $_SESSION['user']['classeTenue']['section']);
				$insertion = $this->_db->prepare("INSERT INTO note SET 
											eleve =:eleve,
											classe =:classe,
											periode =:periode,
											competence =:competence,
											oral =:oral,
											ecrit =:ecrit,
											prat =:prat,
											se =:se,
											total =:total,
											cote =:cote,
											appr =:appr");
				$insertion->bindValue(':eleve', $idEleve);
				$insertion->bindValue(':classe', $this->_classe);
				$insertion->bindValue(':periode', $periode);
				$insertion->bindValue(':competence', $subject);
				$insertion->bindValue(':oral', $oralEleve);
				$insertion->bindValue(':ecrit', $ecritEleve);
				$insertion->bindValue(':prat', $pratEleve);
				$insertion->bindValue(':se', $seEleve);
				$insertion->bindValue(':cote', $cote);
				$insertion->bindValue(':appr', $appr);
				$insertion->bindValue(':total', $this->setNote(array_sum($total)));
				$insertion->execute();
			}
			// J'inscris dans le journal desaisie des notes
			$this->journalSaisieNote($this->_classe, $subject, $periode, $this->_date,
									$this->_ip, $this->_os);
			$_SESSION['message'] = 'Les notes ont été enregistrées.';
			header('Location:'.$source);
		}
		
		
		
		
		
		// On modifie les notes saisies  
		public function modifierNote($source, $note){
			$oral = $note['oral'];
			$ecrit = $note['ecrit'];
			$prat = $note['prat'];
			$se = $note['se'];
			$eleve = $note['eleve'];
			$this->_classe = $_SESSION['user']['classeTenue']['id'];
			$this->_date = DATE('Y-m-d H:i:s');
			$subject = $this->setUserId($note['subject']);
			$periode = $this->setUserId($note['mois']);
			$ponderationMatiere = $this->getPonderationMatiere($subject, $this->_classe);
			for($i=0;$i<count($eleve);$i++){
				$this->_eleve = $this->setUserId($eleve[$i]);
				$this->_ecrit = $this->setNote($ecrit[$i]);
				$this->_oral = $this->setNote($oral[$i]);
				$this->_prat = $this->setNote($prat[$i]);
				$this->_se = $this->setNote($se[$i]);
				$total = array($this->_ecrit, $this->_oral, $this->_prat, $this->_se);
				$this->_total = $this->setNote(array_sum($total));
				$cote = $this->getAppreciation($this->_total, $ponderationMatiere);
				$appr = $this->getLibelleAppreciation($cote, $_SESSION['user']['classeTenue']['section']);
				// echo '<p>Le total est '.$this->_total.'</p>';
				$update = $this->_db->prepare("UPDATE note SET 
										oral =:oral,
										ecrit =:ecrit,
										prat =:prat,
										se =:se,
										cote =:cote,
										appr =:appr,
										total =:total
										WHERE id =:id");
				$update->bindValue(':oral', $this->_oral);
				$update->bindValue(':ecrit', $this->_ecrit);
				$update->bindValue(':prat', $this->_prat);
				$update->bindValue(':se', $this->_se);
				$update->bindValue(':cote', $cote);
				$update->bindValue(':appr', $appr);
				$update->bindValue(':total', $this->_total);
				$update->bindValue(':id', $this->_eleve);
				$update->execute();
			}
			$this->journalUpdateNote($this->_classe, $subject, $periode, $this->_date);
			$_SESSION['message'] = 'Les notes ont été mises à jour.';
			header('Location:'.$source);
		}







		/**
		 * On modifie les notes sur la base des révendications
		 * @param string $source
		 * @param array $note
		 * 
		 */
		public function modifierNoteRevendic($source, $note){
			echo '<pre>'; print_r($note); echo '</pre>';
			$matiere = $note['matiere'];
			$oral = $note['oral'];
			$ecrit = $note['ecrit'];
			$prat = $note['prat'];
			$se = $note['se'];
			$eleve = $this->setUserId($note['eleve']);
			$mois = $this->setUserId($note['mois']);
			$infoEleve = $this->getEleve($eleve);
			for($x=0;$x<count($matiere);$x++){
				$this->_matiere = $this->setUserId($matiere[$x]);
				$this->_oral = $this->setNote($oral[$x]);
				$this->_ecrit = $this->setNote($ecrit[$x]);
				$this->_prat = $this->setNote($prat[$x]);
				$this->_se = $this->setNote($se[$x]);
				$total = array($this->_oral, $this->_ecrit, $this->_prat, $this->_se);
				$this->_total = $this->setNote(array_sum($total));
				// echo "<p>L'élève ".$eleve." obtient en $this->_matiere les notes 
				// suivantes : ".$this->_oral.", ".$this->_ecrit.", ".$this->_prat." et ".$this->_se."
				// soit un TOTAL DE <b>".$this->_total."</b></p>";
				$delete = $this->_db->prepare("DELETE FROM note 
												WHERE 
												eleve =:eleve AND 
												competence =:matiere AND
												periode =:mois");
				$delete->execute(array(
								"eleve"=>$eleve,
								"matiere"=>$this->_matiere,
								"mois"=>$mois
				));
				$insert = $this->_db->prepare("INSERT INTO note SET 
												eleve =:eleve,
												classe =:classe,
												periode =:periode,
												competence =:competence,
												oral =:oral,
												ecrit =:ecrit,
												prat =:prat, 
												se =:se,
												total =:total");
				$insert->execute(array(
								"eleve"=>$eleve,
								"classe"=>$_SESSION['user']['classeTenue']['id'],
								"periode"=>$mois,
								"competence"=>$this->_matiere,
								"oral"=>$this->_oral,
								"ecrit"=>$this->_ecrit,
								"prat"=>$this->_prat,
								"se"=>$this->_se,
								"total"=>$this->_total
				));
			}
			$_SESSION['message'] = "Les notes de ".$infoEleve['nom_complet']." ont été mises à jour pour le mois ".$mois;
			header('Location:'.$source);
		}
		
		
		
		// On verifie les notes qui ont été saisies 
		public function verifNoteSaisie($classe, $matiere, $periode){
			$sql = "SELECT classe, libelle_classe, matiere, 
							libelle_competence_fr, libelle_competence_en,
							periode, ip_saisie, type_machine,
							date_saisie,
							DATE_FORMAT(date_saisie, '%d / %m / %Y') as date_fr,
							DATE_FORMAT(date_saisie, '%Hh %imin %sSec') as heure_fr
					FROM note_saisie, classe, liste_competence
					WHERE classe='$classe'
						AND matiere='$matiere'
						AND periode='$periode'
						AND classe.id = classe
						AND matiere = liste_competence.id
						";
			// $sql = "SELECT classe, libelle_classe, matiere, 
			// 				libelle_competence_fr, libelle_competence_en,
			// 				periode, ip_saisie, type_machine,
			// 				date_saisie,
			// 				DATE_FORMAT(date_saisie, '%d / %m / %Y') as date_fr,
			// 				DATE_FORMAT(date_saisie, '%Hh %imin %sSec') as heure_fr
			// 		FROM note_saisie, classe, liste_competence 
			// 		WHERE classe='$classe'
			// 			AND matiere = '$matiere' 
			// 			AND periode = '$periode'
			// 			AND classe.id = classe
			// 			AND matiere = liste_competence.id";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		
		
		// Pour une classe précise, on liste les mois dont les notes ont été saisies 
		public function getMoisSaisi($classe){
			$sql = "SELECT *
					FROM note_saisie 
					WHERE classe = '$classe'
					GROUP BY periode";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		// On ressort les notes saisies pour une classe durant un mois précis 
		public function getNoteSaisieMois($classe, $mois){
			$sql = "SELECT classe, libelle_classe, section, matiere, 
						libelle_competence_fr, libelle_competence_en,
						periode, ip_saisie, type_machine, date_saisie, 
						DATE_FORMAT(date_saisie, '%d / %m / %Y %Hh %imin') as date_saisie_fr,
						date_modification,
						DATE_FORMAT(date_modification, '%d / %m / %Y %Hh %imin') as date_modification_fr
					FROM note_saisie, classe, liste_competence 
					WHERE classe = '$classe'
						AND periode = '$mois'
						AND classe = classe.id
						AND matiere = liste_competence.id ";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		// La note obtenue par un élève dans une sous matière durant un mois 
		/**
		 * @param int $eleve
		 * @param int $matiere
		 * @param int $periode
		 * @return array $res */ 
		public function noteEleveSousMatiere($eleve, $matiere, $periode){
			$sql = "SELECT * 
					FROM note 
					WHERE eleve = '$eleve' 
						AND sous_matiere = '$matiere' 
						AND periode = '$periode'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res;
		}





		public function noteEleveMatiere($eleve, $matiere, $periode){
			$sql = "SELECT eleve, nom_complet, matiere, code_competence, sous_matiere, 
							periode, note, observation, nb_point, libelle_sous_competence_fr,
							libelle_sous_competence_en, code_sous_competence
							 
					FROM notes, eleve, liste_competence, matiere, liste_sous_competence 
					WHERE eleve = '$eleve' 
						AND matiere = '$matiere' 
						AND periode = '$periode'
						AND eleve.id = eleve
						AND liste_competence.id = matiere
						AND matiere.id = sous_matiere
						AND liste_sous_competence.id = id_sous_competence";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		
		
		// On supprime les notes saisies pour une période 
		public function deleteNote($source, $periode, $matiere, $classe){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$this->_periode = $this->setUserId($periode);
			$this->_subject = $this->setUserId($matiere);
			$this->_classe = $this->setUserId($classe);
			$as = $this->getCurrentYear();
			// Avant de supprimer, on vérifie qu'elles avaient été effectivement saisies
			$a = $this->verifNoteSaisie($this->_classe, $this->_subject, $this->_periode);
			if($a==false){
				$_SESSION['message'] = 'Une erreur inconnue s est produite';
				header('Location:'.$source);
			}else{
				// On commence par supprimer du Journal
				$journal = $this->_db->prepare("DELETE FROM note_saisie
												WHERE classe = :classe
												AND matiere = :matiere
												AND periode = :periode");
				$journal->execute(array(
										'classe'=>$this->_classe,
										'matiere'=>$this->_subject,
										'periode'=>$this->_periode
										));
				// Ensuite de la table note
				$noteDelete = $this->_db->prepare("DELETE FROM note
												WHERE classe =:classe
												AND periode=:periode
												AND competence=:matiere");
				$noteDelete->execute(array(
										'classe'=>$this->_classe,
										'matiere'=>$this->_subject,
										'periode'=>$this->_periode
										));
				// On affiche le message
				$_SESSION['message'] = 'Les notes ont été supprimées.';
				header('Location:'.$source);
			}
			// echo '<pre>'; print_r($a); echo '</pre>';
		}
		
		
		
		
		// On veut savoir les classes prêtes pour le bulletin mensuel 
		public function classeMensuellePrete(){
			$sql = "SELECT classe, libelle_classe, section
					FROM bull_mensuel, classe 
					WHERE classe = classe.id
					GROUP BY classe ORDER BY section, niveau_classe, libelle_classe";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		// On veut, sachant les classes, quels sont les mois prêts pour le bull mensuel 
		public function mensuelPret($classe){
			$sql = "SELECT mois, libelle_periode, code_periode_en, 
							code_periode_fr
					FROM bull_mensuel, periode 
					WHERE classe = '$classe'
						AND periode.id = mois";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}





		// On veut, sachant les classes, quels sont les mois prêts pour le bull trimestriel 
		public function trimestrielPret($classe){
			$sql = "SELECT trimestre, classe 
					FROM bull_trimestriel 
					WHERE classe = '$classe'
						";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		
		private function getPonderationMatiere($matiere, $classe){
			$sql = "SELECT SUM(nb_point) as total 
					FROM matiere 
					WHERE id_classe='$classe'
						AND id_competence = '$matiere'";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			return $res['total'];
		}
		
		
		public function getPonderationClasse($classe){
			$this->_classe = $this->setUserId($classe);
			$listeMatiere = $this->listeMatiereClasse($this->_classe);
			for($i=0;$i<count($listeMatiere);$i++){
				$idMatiere = $listeMatiere[$i]['id_competence'];
				$ponderations[] = $this->getPonderationMatiere($idMatiere, $this->_classe);
			}
			$ponderation = array_sum($ponderations);
			return $ponderation;
		}







		/**
		 * Les Notes obtenues par les élèves d'une classe au cours d'un mois précis
		 */
		public function noteEleveClasse($classe, $mois){
			$listeEleve = $this->listeEleve($classe, 'non_supprime', '');
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				$sql = "SELECT * 
						FROM note, liste_competence 
						WHERE classe = '$classe'
							AND periode = '$mois' 
							AND eleve = '$idEleve'
							AND liste_competence.id = note.competence 
							ORDER BY code_competence";
				$req = $this->_db->query($sql);
				$res[$i] = $req->fetchAll(PDO::FETCH_ASSOC);
			}
			return $res;
		}







		
		
		
		// On prépare les données pour le bulletin Mensuel
		public function configBulletinMensuel($classe, $mois){
			$this->_classe = $this->setUserId($classe);
			$this->_mois = $this->setUserId($mois);
			$as = $this->getCurrentYear();
			$tableNote = 'mensuel_'.$this->_mois.'_'.$this->_classe;
			$listeEleve = $this->listeEleve($this->_classe, 'non_supprime', $as);
			$notesEleve = $this->noteEleveClasse($this->_classe, $this->_mois);
			$totalNote = $this->totalNoteEleve($this->_classe, $this->_mois);
			$section = $this->getSection($this->_classe);
			$listeMatiere = $this->listeMatiereClasse($this->_classe);
			$listeSousMatiere['fr'] = array('oral', 'ecrit', 'pratique', 'savoir - etre');
			$listeSousMatiere['en'] = array('oral','written','practical','attitude');
			$infoClasse = $this->getClasse($this->_classe);
			$enseignant = $this->getUser($infoClasse['enseignant']);
			$mois = $this->getMoisCourant($this->_mois);
			for($x=0;$x<count($listeMatiere);$x++){
				$idMatiere = $listeMatiere[$x]['id_competence'];
				$ponderationMatiere[$x] = $this->getPonderationMatiere($idMatiere, $this->_classe);
			}
			// 
			// $listeSousMatiereAll = $this->listeSousMatiere();
			// for($i=0;$i<count($listeEleve);$i++){
			// 	$idEleve = $listeEleve[$i]['id'];
			// 	for($j=0;$j<count($listeMatiere);$j++){
			// 		$idMatiere = $listeMatiere[$j]['id_competence'];
			// 		$notes[$idEleve][$idMatiere] = $this->noteEleveMatiere($idEleve, $idMatiere, $this->_mois);
			// 		$ponderationsMatiere[$idEleve][$idMatiere] = $this->getPonderationMatiere($idMatiere, $this->_classe);
			// 	}
				
			// }
			// $ponderation = $this->getPonderationClasse($this->_classe);
			// $totalNote = $this->totalNoteEleve($this->_classe, $this->_mois);
			// $ponderationMatiere = $ponderationsMatiere;

			

			
			// $configuration['infoClasse'] = $classe;
			// 
			
			
			// 
			// 
			
			// 
			
			// 
			
			// 
			// $configuration['listeSousMatiereAll'] = $listeSousMatiereAll;
			// $configuration['ponderation'] = $ponderation;
			$configuration['ponderationMatiere'] = $ponderationMatiere;
			$configuration['moisCourant'] = $mois;
			$configuration['infoClasse'] = $infoClasse;
			$configuration['enseignant'] = $enseignant;
			$configuration['listeSousMatiere'] = $listeSousMatiere;
			$configuration['listeMatiere'] = $listeMatiere;
			$configuration['section'] = $section;
			$configuration['totalNote'] = $totalNote;
			$configuration['note'] = $notesEleve;
			$configuration['eleve'] = $listeEleve;
			return $configuration;
		}








		/**
		 * On ressort s'il y'a lieu les notes d'un élève pour une sequence donnée.
		 * Ceci est utile pour la révendication des notes d'un élève
		 * @param string $eleve
		 * @param string $mois
		 * @return array $notes
		 */
		public function noteEleveRevendic($eleve,$mois){
			$this->_eleve = $this->setUserId($eleve);
			$this->_mois = $this->setUserId($mois);
			$sql = "SELECT eleve, note.classe as classe, periode, competence, oral, ecrit, prat, se, total, 
							note.id  as idNote, nom_complet, libelle_competence_fr, libelle_competence_en
					FROM note, eleve, liste_competence
					WHERE eleve = '$this->_eleve'
						AND periode = '$this->_mois'
						AND eleve.id = note.eleve
						AND liste_competence.id = note.competence";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}








		// On prépare les données pour le bulletin Trimestriel
		public function configBulletinTrimestre($classe, $trimestre){
			$this->_classe = $this->setUserId($classe);
			$this->_trimestre = $this->setUserId($trimestre);
			$as = $this->getCurrentYear();
			$tableNote = 'trimestre_'.$this->_trimestre.'_'.$this->_classe;
			$listeEleve = $this->listeEleve($this->_classe, 'non_supprime', $as);
			$section = $this->getSection($this->_classe);
			$classe = $this->getClasse($this->_classe);
			$enseignant = $this->getUser($classe['enseignant']);
			$listeMatiere = $this->listeMatiereClasse($this->_classe);
			if($this->_trimestre==1){
				$nbMois = 3;
			}elseif($this->_trimestre==2){
				$nbMois = 3;
			}elseif($this->_trimestre==3){
				$nbMois = 2;
			}
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				for($j=0;$j<count($listeMatiere);$j++){
					$idMatiere = $listeMatiere[$j]['id_competence'];
					$codeMatiere = $listeMatiere[$j]['code_competence'];
					$ponderationsMatiere[$idEleve][$idMatiere] = $this->getPonderationMatiere($idMatiere, $this->_classe);
				}
				$sql = "SELECT *
						FROM $tableNote
						WHERE eleve = '$idEleve'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				$resultat[$idEleve] = $res;
			}
			$ponderation = $this->getPonderationClasse($this->_classe);
			$totalNote = $this->totalNoteEleve($this->_classe, $this->_trimestre);
			$ponderationMatiere = $ponderationsMatiere;

			

			// $configuration['totalNote'] = $totalNote;
			$configuration['note'] = $resultat;
			$configuration['eleve'] = $listeEleve;
			$configuration['section'] = $section;
			$configuration['infoClasse'] = $classe;
			$configuration['enseignant'] = $enseignant;
			$configuration['moisCourant'] = $trimestre;
			$configuration['listeMatiere'] = $listeMatiere;
			// $configuration['listeSousMatiereAll'] = $listeSousMatiereAll;
			$configuration['nbMois'] = $nbMois;
			$configuration['ponderation'] = $ponderation;
			$configuration['ponderationMatiere'] = $ponderationMatiere;
			// $configuration['listeSousMatiere'] = $listeSousMatiereClasse;
			return $configuration;
		}


		private function classeTraiteesMois($mois, $section){
			$sql = "SELECT classe, libelle_classe, section, enseignant, enseignant.nom as nom_enseignant
					FROM bull_mensuel, classe, enseignant
					WHERE mois = '$mois' 
						AND classe.id = classe
						AND classe.section = '$section'
						AND enseignant.id = classe.enseignant
					ORDER BY section, niveau_classe, libelle_classe";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}



		public function configStatMensuelle($mois){
			$this->_mois = $this->setUserId($mois['mois']);
			$this->_section = $this->setSection($mois['section']);
			// On commence par lister toutes les classes dont les bull mensuels ont été gérés
			$classes = $this->classeTraiteesMois($this->_mois, $this->_section);
			// echo '<pre>'; print_r($classes); echo '</pre>';
			
			for($i=0;$i<count($classes);$i++){
				$idClasse = $classes[$i]['classe'];
				$effectifClasse[$idClasse] = $this->listeEleveStat($idClasse, 'actif', '');
				$table = 'mensuel_'.$this->_mois.'_'.$idClasse;
				$exist = $this->checkTable($table);
				if($exist==NULL){
					$_SESSION['message'] = 'Certaines classes ne sont pas traitées.';
					header('Location:'.$_SERVER['HTTP_REFERER']);
					exit;
				}else{
					$nbEvalue = $this->nbEvalues($table);
					$resultat[$idClasse] = $nbEvalue;
					$nbMoyenne = $this->nbMoyennes($table);
					$resMoyenne[$idClasse] = $nbMoyenne;
					/*$sql = "SELECT * 
							FROM $table, eleve
							WHERE eleve = eleve.id";
					$req = $this->_db->query($sql);
					$res = $req->fetch(PDO::FETCH_ASSOC);
					$resultat[$idClasse] = $res;*/
				}
			}
			// echo '<pre>'; print_r($effectifClasse); echo '</pre>';
			$information['mois'] = $this->_mois;
			$information['section'] = $this->_section;
			$information['classe'] = $classes;
			$information['effectif'] = $effectifClasse;
			$information['evalues'] = $resultat;
			$information['moyennes'] = $resMoyenne;
			return $information;
		}
		
		
		
		
		// On traite les notes mensuelles 
		public function traiterNoteMensuelle($source, $classe, $mois){
			$this->_classe = $this->setUserId($classe);
			$this->_mois = $this->setUserId($mois);
			$this->_section = $this->getSection($this->_classe);
			$this->_as = $this->getCurrentYear();
			$infoClasse = $this->getClasse($this->_classe);
			// On crée la table qui va recevoir les données 
			$this->prepaTableMensuelle($this->_classe, $this->_mois);
			
			// On hydrate la table avec les données de l'élève: nom, notes 
			$this->addDataMensuel($this->_classe, $this->_mois);

			// On fait la vérification pour savoir si on doit calculer ou pas 
			/*$this->verificationClassementMensuel($this->_classe, $this->_mois);*/
			
			// On lance le calcul des Notes et des moyennes 
			$this->calculNoteMensuel($this->_classe, $this->_mois);
			
			// On informe que tout s'est bien passé 
			$_SESSION['message'] = 'Notes de '.$infoClasse['libelle_classe'].' traitées. Imprimez le bulletin Mensuel';
			header('Location:'.$source);
		}



		
		
		
		
		private function prepaTableMensuelle($classe, $mois){
			// En créant la table, on y ajoute les élèves 
			$nomTable = 'mensuel_'.$mois.'_'.$classe;
			$as = $this->getCurrentYear();
			$drop = $this->_db->prepare("DROP TABLE IF EXISTS ".$nomTable);
			$drop->execute();
			$listeMatiere = $this->listeMatiereClasse($classe);
			$creation = "CREATE TABLE $nomTable ( ";
			$creation .= "id int(11) auto_increment primary key, ";
			$creation .= "eleve int(11) not null, ";
			/*for($a=0;$a<count($listeMatiere);$a++){
				$codeMatiere = $listeMatiere[$a]['code_competence'];
				$idMatiere = $listeMatiere[$a]['id_competence'];
				$creation .= $codeMatiere.' float(4,2) null, ';
				$creation .= $codeMatiere.'_cote varchar(5) null, ';
				$creation .= $codeMatiere.'_appr varchar(10) null, ';
			}*/
			$creation .= "total float(5,2) null, ";
			$creation .= "cote varchar(5) null , ";
			$creation .= "appr varchar(10) null,";
			$creation .= "moyenne decimal(4,2) null,";
			$creation .= "evalues int(11) null,";
			$creation .= "moy_gen decimal(4,2) null,";
			$creation .= "ponderation decimal(5,2) null,";
			$creation .= "ponderation_classe decimal(5,2) null,";
			$creation .= "rank int(11) null )";
			$create = $this->_db->prepare($creation);
			$create->execute();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			for($b=0;$b<count($listeEleve);$b++){
				$insert = $this->_db->prepare("INSERT INTO $nomTable SET 
											eleve = :eleve");
				$insert->bindValue(':eleve', $listeEleve[$b]['id']);
				$insert->execute();
			}
		}









		private function prepaTableTrimestre($classe, $trimestre){
			// En créant la table, on y ajoute les élèves 
			$nomTable = 'trimestre_'.$trimestre.'_'.$classe;
			$as = $this->getCurrentYear();
			$drop = $this->_db->prepare("DROP TABLE IF EXISTS ".$nomTable);
			$drop->execute();
			$listeMatiere = $this->listeMatiereClasse($classe);
			$creation = "CREATE TABLE $nomTable ( ";
			$creation .= "id int(11) auto_increment primary key, ";
			$creation .= "eleve int(11) not null, ";
			for($a=0;$a<count($listeMatiere);$a++){
				$codeMatiere = $listeMatiere[$a]['code_competence'];
				$idMatiere = $listeMatiere[$a]['id_competence'];
				// On crée les champs qui vont stocker les matières 
				if($trimestre==1){
					$creation .= $codeMatiere.'_1 float(4,2) null, ';
					$creation .= $codeMatiere.'_2 float(4,2) null, ';
					$creation .= $codeMatiere.'_3 float(4,2) null, ';
					$creation .= $codeMatiere.' float(4,2) null, ';
					$creation .= $codeMatiere.'_cote varchar(5) null, ';
					$creation .= $codeMatiere.'_appr varchar(10) null, ';
				}elseif($trimestre==2){
					$creation .= $codeMatiere.'_4 float(4,2) null, ';
					$creation .= $codeMatiere.'_5 float(4,2) null, ';
					$creation .= $codeMatiere.'_6 float(4,2) null, ';
					$creation .= $codeMatiere.' float(4,2) null, ';
					$creation .= $codeMatiere.'_cote varchar(5) null, ';
					$creation .= $codeMatiere.'_appr varchar(10) null, ';
				}elseif($trimestre==3){
					$creation .= $codeMatiere.'_7 float(4,2) null, ';
					$creation .= $codeMatiere.'_8 float(4,2) null, ';
					$creation .= $codeMatiere.' float(4,2) null, ';
					$creation .= $codeMatiere.'_cote varchar(5) null, ';
					$creation .= $codeMatiere.'_appr varchar(10) null, ';
				}
			}
			// On crée les champs qui vont stocker les moyennes mensuelles
			if($trimestre==1){
				$creation .= 'moyenne_1 float(4,2) null,';
				$creation .= 'moyenne_2 float(4,2) null,';
				$creation .= 'moyenne_3 float(4,2) null,';
			}elseif($trimestre==2){
				$creation .= 'moyenne_4 float(4,2) null,';
				$creation .= 'moyenne_5 float(4,2) null,';
				$creation .= 'moyenne_6 float(4,2) null,';
			}elseif($trimestre==3){
				$creation .= 'moyenne_7 float(4,2) null,';
				$creation .= 'moyenne_8 float(4,2) null,';
			}
			$creation .= "total float(5,2) null, ";
			$creation .= "cote varchar(5) null , ";
			$creation .= "appr varchar(10) null,";
			$creation .= "moyenne decimal(4,2) null,";
			$creation .= "evalues int(11) null,";
			$creation .= "moy_gen decimal(4,2) null,";
			$creation .= "ponderation decimal(5,2) null,";
			$creation .= "ponderation_classe decimal(5,2) null,";
			$creation .= "rank int(11) null )";
			$create = $this->_db->prepare($creation);
			$create->execute();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			for($b=0;$b<count($listeEleve);$b++){
				$insert = $this->_db->prepare("INSERT INTO $nomTable SET 
											eleve = :eleve");
				$insert->bindValue(':eleve', $listeEleve[$b]['id']);
				$insert->execute();
			}
		}
		
		
		
		
		
		private function addDataMensuel($classe, $mois){
			// On ajoute les notes et on y met les cotes et les appreciations 
			$nomTable = 'mensuel_'.$mois.'_'.$classe;
			$as = $this->getCurrentYear();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			$ponderationClasse = $this->getPonderationClasse($classe);
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				$sql = "SELECT SUM(total) as total
						FROM note 
						WHERE periode = '$mois' 
							AND eleve = '$idEleve' ";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				
				// On veut savoir dans combien de matière l'élève a été évalué 
				$sql_verif = "SELECT competence
							FROM note
							WHERE periode = '$mois'
								AND eleve = '$idEleve'
								AND total > 0";
				$req_verif = $this->_db->query($sql_verif);
				$res_verif = $req_verif->fetchAll(PDO::FETCH_ASSOC);
				for($x=0; $x<count($res_verif); $x++){
					$pondMat[$i][] = $this->getPonderationMatiere($res_verif[$x]['competence'], $classe);
				}
				if(!empty($pondMat[$i])){
					$ponderationMatiere = $this->setNote(array_sum($pondMat[$i]));
				}else{
					$ponderationMatiere = NULL;
				}
				$classement = $ponderationClasse * 50 / 100;
				$section = $this->getSection($classe);
				$cote = $this->getAppreciation($res['total'],$ponderationMatiere);
				$appr = $this->getLibelleAppreciation($cote, $section);
				// echo $ponderationMatiere.'<br/>';
				if($ponderationMatiere>=$classement){
					$moyenne = $res['total'] * 20 / $ponderationMatiere;
				}else{
					$moyenne = NULL;
				}
				// echo '<p><b>'.$moyenne.'</b></p>';
				// echo '<pre>'; print_r($res_verif); echo '</pre>';
				$insertion = $this->_db->prepare("UPDATE $nomTable SET 
													total =:total,
													ponderation_classe =:ponderationClasse,
													ponderation =:ponderation,
													cote =:cote,
													appr =:appr,
													moyenne =:moyenne
												WHERE eleve =:eleve");
				$insertion->execute(array(
								"total"=>$this->setNote($res['total']),
								"ponderationClasse"=>$ponderationClasse,
								"ponderation"=>$ponderationMatiere,
								"cote"=>$cote,
								"appr"=>$appr,
								"moyenne"=>$this->setNote(round($moyenne,2)),
								"eleve"=>$idEleve
				));
				
			}
		}








		/**
		 * On ressort toutes les notes obtenues par un élève au cours d'un trimestre 
		 * quelque soit la matière 
		*/
		private function getNoteTrimestreEleve($eleve, $trimestre){
			if($trimestre == 1){
				$mois = array(1,2,3);
			}elseif($trimestre == 2){
				$mois = array(4,5,6);
			}elseif($trimestre == 3){
				$mois = array(7,8);
			}
			for($x=0;$x<count($mois);$x++){
				$sql = "SELECT competence, total
						FROM note 
						WHERE eleve='$eleve'
							AND periode='$mois[$x]' ";
				$req = $this->_db->query($sql);
				$res = $req->fetchAll(PDO::FETCH_ASSOC);
				$resultat[] = $res;
			}
			return $resultat;
		}









		/**
		 * On ressort les moyennes mensuelles obtenues par un élève au cours 
		 * d'un trimestre
		 */
		private function getMoyenneTrimestreEleve($eleve, $trimestre){
			// Quelle classe fait l'élève ? 
			$infoEleve = $this->getEleve($eleve);
			$classeEleve = $infoEleve['classe'];
			if($trimestre == 1){
				$info1 = "mensuel_1_".$classeEleve;
				$info2 = "mensuel_2_".$classeEleve;
				$info3 = "mensuel_3_".$classeEleve;
				$mois = array($info1, $info2, $info3);
			}elseif($trimestre == 2){
				$info1 = "mensuel_4_".$classeEleve;
				$info2 = "mensuel_5_".$classeEleve;
				$info3 = "mensuel_6_".$classeEleve;
				$mois = array($info1, $info2, $info3);
			}elseif($trimestre == 3){
				$info1 = "mensuel_7_".$classeEleve;
				$info2 = "mensuel_8_".$classeEleve;
				$mois = array($info1, $info2);
			}
			for($x=0;$x<count($mois);$x++){
				$sql = "SELECT moyenne 
						FROM $mois[$x] 
						WHERE eleve='$eleve'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				$resultat[] = $res['moyenne'];
			}
			return $resultat;
		}



		












		private function addDataTrimestre($classe, $trimestre){
			// On ajoute les notes et on y met les cotes et les appreciations 
			$nomTable = 'trimestre_'.$trimestre.'_'.$classe;
			$as = $this->getCurrentYear();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			$section = $this->getSection($classe);
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				// On prend les notes trimestrielles d'un élève ainsi que ses moyennes mensuelles
				$notes = $this->getNoteTrimestreEleve($idEleve, $trimestre);
				$moyenne = $this->getMoyenneTrimestreEleve($idEleve, $trimestre);
				// On scinde les notes en notes mensuelles 
				for($x=0;$x<count($notes);$x++){
					$mois = $notes[$x];
					// On subdivise les notes mensuelles en matières pour calculer 
					for($j=0;$j<count($mois);$j++){
						$competence = $mois[$j]['competence'];
						$note[$idEleve][$competence][] = $this->setNote($mois[$j]['total']);
					}
				}
				$listeMatiere = $this->listeMatiereClasse($classe);
				for($a=0;$a<count($listeMatiere);$a++){
					$idMatiere = $listeMatiere[$a]['id_competence'];
					$codeMatiere = $listeMatiere[$a]['code_competence'];
					$noteTrim = $note[$idEleve][$idMatiere];
					for($b=0;$b<count($noteTrim);$b++){
						if(empty($noteTrim[$b])){
							unset($noteTrim[$b]);
						}
					}
					$sommeTrimestrielle = array_sum($noteTrim);
					$noteTrimestrielle = $sommeTrimestrielle / count($noteTrim);
					$ponderationMatiere = $this->getPonderationMatiere($idMatiere, $classe);
					$cote = $this->getAppreciation($noteTrimestrielle, $ponderationMatiere);
					$appr = $this->getLibelleAppreciation($cote, $section);
					if($trimestre==1){
						$champ1 = $codeMatiere."_1";
						$champ2 = $codeMatiere."_2";
						$champ3 = $codeMatiere."_3";
						$champMoy1 = 'moyenne_1';
						$champMoy2 = 'moyenne_2';
						$champMoy3 = 'moyenne_3';
						$champ = $codeMatiere;
						$champCote = $codeMatiere."_cote";
						$champAppr = $codeMatiere."_appr";

						$note1 = $this->setNote($noteTrim[0]);
						$note2 = $this->setNote($noteTrim[1]);
						$note3 = $this->setNote($noteTrim[2]);
						$moy1 = $this->setNote($moyenne[0]);
						$moy2 = $this->setNote($moyenne[1]);
						$moy3 = $this->setNote($moyenne[2]);

						$update = $this->_db->prepare("UPDATE $nomTable SET 
												$champ =:note,
												$champ1 =:note1,
												$champ2 =:note2,
												$champ3 =:note3,
												$champMoy1 =:moy1,
												$champMoy2 =:moy2,
												$champMoy3 =:moy3,
												$champCote =:cote,
												$champAppr =:appr
												WHERE eleve =:eleve");
						$update->execute(array(
								"note"=>$noteTrimestrielle,
								"note1"=>$note1,
								"note2"=>$note2,
								"note3"=>$note3,
								"moy1"=>$moy1,
								"moy2"=>$moy2,
								"moy3"=>$moy3,
								"cote"=>$cote,
								"appr"=>$appr,
								"eleve"=>$idEleve
						));
					}
					elseif($trimestre==2){
						$champ1 = $codeMatiere."_4";
						$champ2 = $codeMatiere."_5";
						$champ3 = $codeMatiere."_6";
						$champMoy1 = 'moyenne_4';
						$champMoy2 = 'moyenne_5';
						$champMoy3 = 'moyenne_6';
						$champ = $codeMatiere;
						$champCote = $codeMatiere."_cote";
						$champAppr = $codeMatiere."_appr";

						$note1 = $this->setNote($noteTrim[0]);
						$note2 = $this->setNote($noteTrim[1]);
						$note3 = $this->setNote($noteTrim[2]);
						$moy1 = $this->setNote($moyenne[0]);
						$moy2 = $this->setNote($moyenne[1]);
						$moy3 = $this->setNote($moyenne[2]);

						$update = $this->_db->prepare("UPDATE $nomTable SET 
												$champ =:note,
												$champ1 =:note1,
												$champ2 =:note2,
												$champ3 =:note3,
												$champMoy1 =:moy1,
												$champMoy2 =:moy2,
												$champMoy3 =:moy3,
												$champCote =:cote,
												$champAppr =:appr
												WHERE eleve =:eleve");
						$update->execute(array(
								"note"=>$noteTrimestrielle,
								"note1"=>$note1,
								"note2"=>$note2,
								"note3"=>$note3,
								"moy1"=>$moy1,
								"moy2"=>$moy2,
								"moy3"=>$moy3,
								"cote"=>$cote,
								"appr"=>$appr,
								"eleve"=>$idEleve
						));
					}elseif($trimestre==3){}
				}
			}
			
			for($w=0;$w<count($listeEleve);$w++){
				$idEleve = $listeEleve[$w]['id'];
				$listeMatiere = $this->listeMatiereClasse($classe);
				for($x=0;$x<count($listeMatiere);$x++){
					// On totalise d'abord les points des élèves 
					$idMatiere = $listeMatiere[$x]['id_competence'];
					$codeMatiere = strtolower($listeMatiere[$x]['code_competence']);
					$sql = "SELECT $codeMatiere 
							FROM $nomTable
							WHERE eleve = '$idEleve'";
					$req = $this->_db->query($sql);
					$res = $req->fetch(PDO::FETCH_ASSOC);
					$total[$x] = $res[$codeMatiere];
					
				}
				// Ensuite on totalise les points définis dans la classe
				$totalPoint = array_sum($total);
				$ponderationClasse = $this->getPonderationClasse($classe);
				$update = $this->_db->prepare("UPDATE $nomTable SET 
												total =:total,
												ponderation_classe =:ponderation
												WHERE eleve =:eleve");
				$update->execute(array(
						"total"=>$totalPoint,
						"ponderation"=>$ponderationClasse,
						"eleve"=>$idEleve
				));
			}

		}




		private function calculMatiereTrimestre($note){
			$this->_note = array_sum($note) / count($note);
			return $this->_note;
		}


		/**
		 * L'objet de la fonction est de vérifier si on doit classer un élève ou pas.
		 * En fait, celui qui se fait evaluer à moins de 50% de ses points ne doit
		 * pas être classé.
		 */
		private function verificationClassementMensuel($classe, $mois){
			$nomTable = 'mensuel_'.$mois.'_'.$classe;
			$as = $this->getCurrentYear();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				$listeMatiere = $this->listeMatiereClasse($classe);
				for($j=0;$j<count($listeMatiere);$j++){
					$idMatiere = $listeMatiere[$j]['id_competence'];
					$codeMatiere = $listeMatiere[$j]['code_competence'];
					$libChamp = strtolower($codeMatiere);
					$sql = "SELECT $libChamp 
							FROM $nomTable 
							WHERE eleve = '$idEleve'";
					$req = $this->_db->query($sql);
					$res = $req->fetch(PDO::FETCH_ASSOC);
					
					if($res[$libChamp]!=NULL){
						$pointEvaluation[$i][$j] = $this->getPonderationMatiere($idMatiere,$classe);
					}
					// echo count($occurence);
					// echo '<pre>'; print_r($occurence); echo '</pre>';
					// echo $codeMatiere.'<br />';
				}
				$update = $this->_db->prepare("UPDATE $nomTable SET
												ponderation = :pondEleve
												WHERE eleve = '$idEleve'");
				$update->execute(array('pondEleve'=>array_sum($pointEvaluation[$i])));
				// echo "<p>La valeur des points est ".array_sum($pointEvaluation[$i])." pour ".$listeEleve[$i]['nom_complet']."</p>";
			}
		}








		/**
		 * L'objet de la fonction est de vérifier si on doit classer un élève ou pas.
		 * En fait, celui qui se fait evaluer à moins de 50% de ses points ne doit
		 * pas être classé.
		 */
		private function verificationClassementTrimestre($classe, $trimestre){
			$nomTable = 'trimestre_'.$trimestre.'_'.$classe;
			$as = $this->getCurrentYear();
			$listeEleve = $this->listeEleve($classe, 'non_supprime', $as);
			for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				$listeMatiere = $this->listeMatiereClasse($classe);
				for($j=0;$j<count($listeMatiere);$j++){
					$idMatiere = $listeMatiere[$j]['id_competence'];
					$codeMatiere = $listeMatiere[$j]['code_competence'];
					$libChamp = strtolower($codeMatiere);
					$sql = "SELECT $libChamp 
							FROM $nomTable 
							WHERE eleve = '$idEleve'";
					$req = $this->_db->query($sql);
					$res = $req->fetch(PDO::FETCH_ASSOC);
					
					if($res[$libChamp]!=NULL){
						$pointEvaluation[$i][$j] = $this->getPonderationMatiere($idMatiere,$classe);
					}
					// echo count($occurence);
					// echo '<pre>'; print_r($occurence); echo '</pre>';
					// echo $codeMatiere.'<br />';
				}
				$update = $this->_db->prepare("UPDATE $nomTable SET
												ponderation = :pondEleve
												WHERE eleve = '$idEleve'");
				$update->execute(array('pondEleve'=>array_sum($pointEvaluation[$i])));
				// echo "<p>La valeur des points est ".array_sum($pointEvaluation[$i])." pour ".$listeEleve[$i]['nom_complet']."</p>";
			}
		}
		
		
		// Pour les appreciations et les cotes 
		private function calculNoteMensuel($classe, $mois){
			$nomTable = 'mensuel_'.$mois.'_'.$classe;
			
			// On insère dans la table bull_mensuel
			$supprime = $this->_db->prepare("DELETE FROM bull_mensuel 
										WHERE classe = :classe 
											AND mois = :periode");
			$supprime->execute(array('classe'=>$classe,
									'periode'=>$mois));
			$insert = $this->_db->prepare('INSERT INTO bull_mensuel 
											SET  
											classe=:classe, 
											mois=:mois,
											pret = :reponse');
			$insert->bindValue(':classe', $classe);
			$insert->bindValue(':mois', $mois);
			$insert->bindValue(':reponse', 'oui');
			$insert->execute();

			// On ressort le nombre des evalués et leurs rangs repsectifs
			$this->listEvalue($nomTable);
			$this->listRank($nomTable);
			$this->listMoyenneGenerale($nomTable);
			
		}








		// Pour les appreciations et les cotes 
		private function calculNoteTrimestre($classe, $trimestre){
			$nomTable = 'trimestre_'.$trimestre.'_'.$classe;
			$as = $this->getCurrentYear();
			$section = $this->getSection($classe);
			// On sort le total des points définis dans la classe 
			$sql = "SELECT * FROM $nomTable";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			for($i=0;$i<count($res);$i++){
				$id = $res[$i]['id'];
				$noteEleve = $res[$i]['total'];
				$ponderationEleve = $res[$i]['ponderation'];
				$ponderationClasse = $res[$i]['ponderation_classe'];
				$classement = $ponderationClasse * 50 / 100;
				if($ponderationEleve>=$classement){
					$totalEvaluation = $ponderationEleve;
					$cote = $this->getAppreciation($noteEleve, $totalEvaluation);
					$appreciation = $this->getLibelleAppreciation($cote, $section);
					$moyenne = $noteEleve * 20 / $totalEvaluation;
				}else{
					$cote = NULL;
					$appreciation = NULL;
					$moyenne = NULL;
				}
				$requete = $this->_db->prepare("UPDATE $nomTable SET 
												cote = :cote,
												appr = :appreciation,
												moyenne = :moyenne
												WHERE id = '$id'");
				$requete->execute(array('cote'=>$cote,
										'appreciation'=>$appreciation,
										'moyenne'=>$moyenne));
			}
			// On insère dans la table bull_trimestriel
			$supprime = $this->_db->prepare("DELETE FROM bull_trimestriel 
										WHERE classe = :classe 
											AND trimestre = :periode");
			$supprime->execute(array('classe'=>$classe,
									'periode'=>$trimestre));
			$insert = $this->_db->prepare('INSERT INTO bull_trimestriel 
											SET  
											classe=:classe, 
											trimestre=:trimestre');
			$insert->bindValue(':classe', $classe);
			$insert->bindValue(':trimestre', $trimestre);
			$insert->execute();

			// On ressort le nombre des evalués et leurs rangs repsectifs
			$this->listEvalue($nomTable);
			$this->listRank($nomTable);
			$this->listMoyenneGenerale($nomTable);
			
		}
		
		
		private function listEvalue($table){
			$sql = "SELECT count(moyenne) as total
					FROM $table
					WHERE moyenne!=0";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$total = $res['total'];
			$requete = $this->_db->prepare("UPDATE $table SET evalues=:eval");
			$requete->bindValue(':eval', $total);
			$requete->execute();
		}
		
		private function listRank($table){
			$sql = "SELECT moyenne, id 
					FROM $table 
					WHERE moyenne!=0
					ORDER BY moyenne DESC";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			$a = 1;
			for($i=0;$i<count($res);$i++){
				$moyenne = $res[$i]['moyenne'];
				$id = $res[$i]['id'];
				$requete = $this->_db->prepare("UPDATE $table 
											SET rank =:rang 
											WHERE id =:id");
				$requete->bindValue(':rang', $a);
				$requete->bindValue(':id', $id);
				$requete->execute();
				$a++;
			}
		}
		
		private function listMoyenneGenerale($table){
			$sql = "SELECT AVG(moyenne) as total
					FROM $table
					WHERE moyenne!=0";
			$req = $this->_db->query($sql);
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$total = $res['total'];
			$requete = $this->_db->prepare("UPDATE $table SET moy_gen=:eval");
			$requete->bindValue(':eval', $total);
			$requete->execute();
		}
		
		
		private function journalSaisieNote($classe, $matiere, 
											$periode, $date, $ip, $os){
			$journal = $this->_db->prepare('INSERT INTO note_saisie 
											SET 
											classe=:classe,
											matiere=:matiere,
											periode=:periode,
											date_saisie=:date,
											ip_saisie=:ip,
											type_machine=:os');
			$journal->bindValue(':classe', $classe);
			$journal->bindValue(':matiere', $matiere);
			$journal->bindValue(':periode', $periode);
			$journal->bindValue(':date', $date);
			$journal->bindValue(':ip', $ip);
			$journal->bindValue(':os', $os);
			$journal->execute();
		}
		
		
		
		
		private function journalUpdateNote($classe, $matiere, 
											$periode, $date){
			$sql = "UPDATE note_saisie SET 
					date_modification = '$date'
					WHERE classe='$classe'
						AND matiere = '$matiere'
						AND periode = '$periode'";
			$req = $this->_db->query($sql);
		}
		
		
		// Les notes obtenues par un élève au cours d'un mois 
		private function listeNoteEleve($eleve, $mois){
			$sql = "SELECT  note.id as id, eleve, matiere, sous_matiere, periode, note, observation,
							nom_complet, libelle_competence_fr, libelle_competence_en, code_competence,
							nb_point, libelle_sous_competence_fr, libelle_sous_competence_en
					FROM note, eleve, liste_competence, matiere, liste_sous_competence
					WHERE eleve = '$eleve'
						AND periode = '$mois'
						AND eleve.id = eleve
						AND liste_competence.id = matiere
						AND matiere.id = sous_matiere
						AND id_sous_competence = liste_sous_competence.id
					ORDER BY nom_complet
						";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		
		

		private function totalNoteEleve($classe, $mois){
			$table = "mensuel_".$mois."_".$classe;
			$sql = "SELECT * 
					FROM $table";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


		private function nbEvalues($table){
			$sqlMasc = "SELECT count(sexe) as masculin
					FROM $table, eleve
					WHERE eleve = eleve.id
						AND sexe='M'
						AND moyenne>0";
			$reqMasc = $this->_db->query($sqlMasc);
			$resMasc = $reqMasc->fetch(PDO::FETCH_ASSOC);
			$resultat['masculin'] = $resMasc['masculin'];

			$sqlFem = "SELECT count(sexe) as feminin
					FROM $table, eleve
					WHERE eleve = eleve.id
						AND sexe='F'
						AND moyenne>0";
			$reqFem = $this->_db->query($sqlFem);
			$resFem = $reqFem->fetch(PDO::FETCH_ASSOC);
			$resultat['feminin'] = $resFem['feminin'];
			$resultat['total'] = $resultat['masculin'] + $resultat['feminin'];
			return $resultat;
		}





		private function nbMoyennes($table){
			$sqlMasc = "SELECT count(sexe) as masculin
					FROM $table, eleve
					WHERE eleve = eleve.id
						AND sexe='M'
						AND moyenne>=10";
			$reqMasc = $this->_db->query($sqlMasc);
			$resMasc = $reqMasc->fetch(PDO::FETCH_ASSOC);
			$resultat['masculin'] = $resMasc['masculin'];

			$sqlFem = "SELECT count(sexe) as feminin
					FROM $table, eleve
					WHERE eleve = eleve.id
						AND sexe='F'
						AND moyenne>=10";
			$reqFem = $this->_db->query($sqlFem);
			$resFem = $reqFem->fetch(PDO::FETCH_ASSOC);
			$resultat['feminin'] = $resFem['feminin'];
			$resultat['total'] = $resultat['masculin'] + $resultat['feminin'];
			return $resultat;
		}













		/**
		 * On vérifier si on doit calculer les notes trimestrielles d'un élève ou pas
		 */
		public function verifTrimUn($classe){
			$this->_classe = $this->setUserId($classe);
			$mois= array();
			for($i=1;$i<=3;$i++){
				$sql = "SELECT * 
						FROM bull_mensuel 
						WHERE classe='$this->_classe'
							AND mois = '$i'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if(empty($res['mois'])){
					$mois[] = 'no';
				}else{
					$mois[] = 'yes';
				}
			}
			if(in_array('no', $mois)){
				$erreur = TRUE;
			}else{
				$erreur = FALSE;
			}
			return $erreur;
		}








		public function verifTrimDeux($classe){
			$this->_classe = $this->setUserId($classe);
			$mois= array();
			for($i=4;$i<=6;$i++){
				$sql = "SELECT * 
						FROM bull_mensuel 
						WHERE classe='$this->_classe'
							AND mois = '$i'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if(empty($res['mois'])){
					$mois[] = 'no';
				}else{
					$mois[] = 'yes';
				}
			}
			if(in_array('no', $mois)){
				$erreur = TRUE;
			}else{
				$erreur = FALSE;
			}
			return $erreur;
		}









		public function verifTrimTrois($classe){
			$this->_classe = $this->setUserId($classe);
			$mois= array();
			for($i=7;$i<=8;$i++){
				$sql = "SELECT * 
						FROM bull_mensuel 
						WHERE classe='$this->_classe'
							AND mois = '$i'";
				$req = $this->_db->query($sql);
				$res = $req->fetch(PDO::FETCH_ASSOC);
				if(empty($res['mois'])){
					$mois[] = 'no';
				}else{
					$mois[] = 'yes';
				}
			}
			if(in_array('no', $mois)){
				$erreur = TRUE;
			}else{
				$erreur = FALSE;
			}
			return $erreur;
		}













		// On traite les notes mensuelles 
		public function traiterNoteTrimestrielle($source, $classe, $trimestre){
			$this->_classe = $this->setUserId($classe);
			$this->_trimestre = $this->setUserId($trimestre);
			$this->_section = $this->getSection($this->_classe);
			$this->_as = $this->getCurrentYear();
			$infoClasse = $this->getClasse($this->_classe);
			// On crée la table qui va recevoir les données 
			$this->prepaTableTrimestre($this->_classe, $this->_trimestre);
			
			// On hydrate la table avec les données de l'élève: nom, notes 
			$this->addDataTrimestre($this->_classe, $this->_trimestre);
			
			// On fait la vérification pour savoir si on doit calculer ou pas 
			$this->verificationClassementTrimestre($this->_classe, $this->_trimestre);
			
			// On lance le calcul des Notes et des moyennes 
			$this->calculNoteTrimestre($this->_classe, $this->_trimestre);
			
			// On informe que tout s'est bien passé 
			$_SESSION['message'] = 'Notes de '.$infoClasse['libelle_classe'].' traitées ';
			$_SESSION['message'].= ' pour le trimestre '.$this->_trimestre.'. Imprimez le bulletin.';
			header('Location:'.$source);
		}








		public function viewNoteMatiere($classe, $periode, $matiere){
			$this->_classe = $this->setUserId($classe);
			$this->_periode = $this->setUserId($periode);
			$this->_matiere = $this->setUserId($matiere);

			$sql = "SELECT eleve, note.classe as classe, periode, competence, oral, ecrit, prat, se, total,
							nom_complet, note.id as idNote
					FROM note, eleve 
					WHERE note.classe = '$this->_classe'
						AND periode = '$this->_periode' 
						AND competence = '$this->_matiere' 
						AND eleve.id = note.eleve
						";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


















		/***
		 * Cette fnction est réservée aux mises à jour directes sur la Base de 
		 * Données.
		 */
		public function update(){
			/*
			// J'ajoute les notes des élèves par classe 
			$listeClasse = $this->viewClasseSection('actif','fr');
			// echo '<pre>'; print_r($listeClasse); echo '</pre>';
			for($i=0;$i<count($listeClasse);$i++){
				$idClasse = $listeClasse[$i]['id'];
				$listeEleve = $this->listeEleve($idClasse, 'non_supprime', '');
				for($j=0;$j<count($listeEleve);$j++){
					$idEleve = $listeEleve[$j]['id'];
					// echo "<p>".$idEleve." fait la classe de ".$idClasse.".</p>";
					$listeMatiere = $this->listeMatiereClasse($idClasse);
					for($k=0;$k<count($listeMatiere);$k++){
						$idMatiere = $listeMatiere[$k]['id_competence'];
						// J'insère les matières pour un mois 
						$insertion = $this->_db->prepare("INSERT INTO note 
													SET 
													eleve =:eleve,
													classe =:classe,
													periode =:periode, 
													competence =:competence");
						$insertion->bindValue(':eleve', $idEleve);
						$insertion->bindValue(':classe', $idClasse);
						$insertion->bindValue(':periode', 3);
						$insertion->bindValue(':competence',$idMatiere);
						$insertion->execute();
					}
				} 
			}

			*/

			/** J'ajoute les notes des élèves par classe STEP 2
			 * Voici les id des classes : 
			 * Class 1 => 11
			 * Class 2 => 12
			 * Class 3 => 13
			 * Class 4 => 14
			 * Class 5 => 1
			 * Class 6 => 15
			 * *************
			 * SIL => 2
			 * CP => 3
			 * CE1 A => 4
			 * CE1 B => 5
			 * CE2 A => 6
			 * CE2 B => 7
			 * CM1 A => 8
			 * CM1 B => 9
			 * CM2 => 10
			 */
			/*$idClasse = 10;
			$idPeriode = 3;
			$listeEleve = $this->listeEleve($idClasse,'non_supprime','');*/
			// echo '<pre>'; print_r($listeEleve); echo '</pre>';
			/*for($i=0;$i<count($listeEleve);$i++){
				$idEleve = $listeEleve[$i]['id'];
				$listeMatiere = $this->listeMatiereClasse($idClasse);
				for($x=0;$x<count($listeMatiere);$x++){
					$idCompetence = $listeMatiere[$x]['id_competence'];
					$sql_search = "SELECT notes.id as idNote, eleve, classe, matiere, sous_matiere, 
											periode, note, id_classe, id_competence, id_sous_competence,
											nb_point, libelle_competence_fr, libelle_sous_competence_fr,
											code_sous_competence
									FROM notes, matiere, liste_competence, liste_sous_competence 
									WHERE eleve = '$idEleve'
										AND periode = '$idPeriode'
										AND matiere = '$idCompetence'
										AND notes.sous_matiere = matiere.id
										AND id_competence = liste_competence.id
										AND id_sous_competence = liste_sous_competence.id";
					$req_search = $this->_db->query($sql_search);
					$res_search = $req_search->fetchAll(PDO::FETCH_ASSOC);
					// echo '<pre>'; print_r($res_search); echo '</pre>';
					for($j=0;$j<count($res_search);$j++){
						$champ[$j] = $res_search[$j]['code_sous_competence'];
						$noteObtenue[$j] = $this->setNote($res_search[$j]['note']);
						$update = $this->_db->prepare("UPDATE note SET 
													$champ[$j] =:note
													WHERE eleve =:eleve
														AND classe=:classe
														AND periode=:periode
														AND competence =:competence");
						$update->bindValue(':note', $noteObtenue[$j]);
						$update->bindValue(':eleve', $idEleve);
						$update->bindValue(':classe', $idClasse);
						$update->bindValue(':periode', $idPeriode);
						$update->bindValue(':competence', $idCompetence);
						$update->execute();
						// echo "<h1>".$champ[$j]." vaut : ".$noteObtenue[$j]."</h1>";
					}
				}
				// echo '<pre>'; print_r($listeMatiere); echo '</pre>';
			}*/

			// On va sommer toutes les notes de la Séquence 1 stockées dans la table note 
			/*$sql = "SELECT * 
					FROM note 
					WHERE classe='15' 
						";
			$req = $this->_db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);
			// echo '<pre>'; print_r($res); echo '</pre>';
			for($x=0;$x<count($res);$x++){
				$total['oral'] = $res[$x]['oral'];
				$total['ecrit'] = $res[$x]['ecrit'];
				$total['prat'] = $res[$x]['prat'];
				$total['se'] = $res[$x]['se'];
				$id = $res[$x]['id'];
				$noteTotal = $this->setNote(array_sum($total));
				// echo '<p> '.$id.' a le total de '.$noteTotal.'.</p>';
				$update = $this->_db->prepare("UPDATE note SET 
												total =:total
												WHERE id =:id");
				$update->bindValue(':total', $noteTotal);
				$update->bindValue(':id', $id);
				$update->execute();
			}*/

		}
		
		
	}