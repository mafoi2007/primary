<?php 
	session_start();
	require_once('inc/connect.inc.php');
	$config = new config($db);
	$source = $_SERVER['HTTP_REFERER'];
	$_SESSION['appName'] = appName;
	$_SESSION['appVersion'] = appVersion;
	$_SESSION['appContact'] = appContact;
	
	
		// echo '<pre>';print_r($_POST);echo '</pre>';
		/****************
		On initialise l'année scolaire. On peut aussi la cloturer. ;-)
		*****************/
		if(isset($_POST['setSchoolYear'])){
			if($_POST['setSchoolYear']=="Debuter l'année"){
				// echo htmlentities(addslashes($_POST['ministereFr']));
				// echo '<pre>';print_r($_POST);echo '</pre>';
				$ministereFr = $config->setNom($_POST['ministereFr']);
				$ministereEn = $config->setNom($_POST['ministereEn']);
				$region = (int)$_POST['region'];
				$departement = (int)$_POST['departement'];
				$arrondissement = $config->setNom($_POST['arrondissement']);
				$ville = $config->setNom($_POST['ville']);
				$etablissementFr = $config->setNom($_POST['etablissementFr']);
				$etablissementEn = $config->setNom($_POST['etablissementEn']);
				$contact = (int) $_POST['contact'];
				$email = $_POST['email'];
				$bp = (int) $_POST['boitePostale'];
				$sexe = $_POST['sexe'];
				$chef = $config->setNom($_POST['chef']);
				$anneeScolaire = (int)$_POST['debut'].' - '.(int)$_POST['fin'];
				$paysFr = 'REPUBLIQUE DU CAMEROUN';
				$deviseFr = 'Paix - Travail - Patrie';
				$paysEn = 'REPUBLIC OF CAMEROON';
				$deviseEn = 'Peace - Work - Fatherland';
				$typeEts = $_POST['typeEts'];
				
				// J'appelle le fichier de structure SQL 
				require_once('sql/structure.sql.php');
				// J'appelle le fichier d'insertion des données SQL 
				require_once('sql/data.sql.php');
				// echo '<pre>';print_r($structure);echo '</pre>';
				// echo '<pre>';print_r($data);echo '</pre>';
				// J'éxecute les réquêtes de structure et de données.
				for($i=0;$i<count($structure);$i++){
					$config->setDatabaseStructure($structure[$i]);
				}
				for($j=0;$j<count($data);$j++){
					$config->setDatabaseData($data[$j]);
				}
				// Je renomme le fichier firstConnexion.php en fisrtConnexion.done.php
				rename('inc/firstConnexion.php','inc/firstConnexion.done.php');
				// Je prepare le message selon lequel tout s'est bien passé 
				$_SESSION['message'] = 'Application initialisée. Connectez-vous';
				// Je redirige vers la page d'accueil pour qu'on affiche 
				// le formulaire de connexion
				header('Location:'.$_SERVER['HTTP_REFERER']);
				
				
				
				
				
				
				
				
				
			}elseif($post['setSchoolYear']=="Cloturer l'année"){
				echo 'Fin';
			}else{
				echo 'Ne sais pas';
			}
				/* */
		}

		
		
		// On a choisi le formulaire de connexion 
		if(isset($_POST['connexion'])){
			$config->connectUser($source, $_POST['login'], $_POST['mdp']);
		}
		
		
		
		// On modifie le mot de passe
		if(isset($_POST['changer_mdp'])){
			$mdpAncien = $_POST['mdp_ancien'];
			$mdpNouveau = $_POST['nouveau_mdp'];
			$mdpConfirm = $_POST['mdp_confirm'];
			$userId = $_SESSION['user']['id'];
			$config->changePassword($source, $mdpAncien, $mdpNouveau, $mdpConfirm, $userId);
		}
		
		
		
		// On ajoute un élève 
		if(isset($_POST['ajout_eleve'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$eleve = $_POST;
			$config->ajouterEleve($source, $eleve);
		}
		
		
		
		// On ajoute un utilisateur 
		if(isset($_POST['ajout_utilisateur'])){
			$user = $_POST;
			$user['photo'] = $_FILES['photoUser'];
			// echo '<pre>'; print_r($user); echo '</pre>';
			$config->ajouterUtilisateur($source, $user);
		}
		
		
		
		
		
		
		
		
		
		// On ajoute un élève 
		if(isset($_POST['ajout_classe'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$classe = $_POST;
			$config->ajouterClasse($source, $classe);
		}
		
		
		
		
		
		
		
		
		
		// On ajoute un utilisateur à la classe
		if(isset($_POST['ajout_utilisateur_classe'])){
			$user = $_POST;
			// echo '<pre>'; print_r($user); echo '</pre>';
			$config->ajouterUtilisateurClasse($source, $user);
		}
		
		
		
		
		
		
		
		
		// On met à jour un élève 
		if(isset($_POST['updEleve'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$eleve = $_POST;
			$var1 = '?action=upd&';
			$var2 = 'id='.$_POST['idEleve'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			$config->updateEleve($source, $eleve);
		}
		
		
		
		
		
		
		
		
		
		// On met à jour un utilisateur 
		if(isset($_POST['upd_utilisateur'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$utilisateur = $_POST;
			$var1 = '?action=upd&';
			$var2 = 'id='.$_POST['userId'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			$config->updateUtilisateur($source, $utilisateur);
		}
		
		
		
		
		
		
		
		
		
		// On met à jour une classe 
		if(isset($_POST['upd_classe'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$classe = $_POST;
			$var1 = '?action=update&';
			$var2 = 'id='.$_POST['classId'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			$config->updateClasse($source, $classe);
		}
		
		
		
		
		
		
		
		
		
		// On supprime un élève 
		if(isset($_POST['delEleve'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$eleve = $_POST;
			$var1 = '?action=delete&';
			$var2 = 'id='.$eleve['eleve'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			if($eleve['delEleve']=='non'){
				$_SESSION['message'] = 'L élève ne sera pas supprimé';
				header('Location:'.$source);
			}elseif($eleve['delEleve']=='oui'){
				$config->deleteEleve($source, $eleve['eleve']);
			}
		}
		
		
		
		
		
		
		
		
		
		
		// On supprime un utilisateur 
		if(isset($_POST['delUser'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$utilisateur = $_POST;
			$var1 = '?action=delete&';
			$var2 = 'id='.$utilisateur['utilisateur'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			if($utilisateur['delUser']=='non'){
				$_SESSION['message'] = 'L utilisateur ne sera pas supprimé';
				header('Location:'.$source);
			}elseif($utilisateur['delUser']=='oui'){
				$config->deleteUser($source, $utilisateur['utilisateur']);
			}
			
		}
		
		
		
		
		
		
		
		
		
		// On supprime une classe 
		if(isset($_POST['delClasse'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$classe = $_POST;
			$var1 = '?action=delete&';
			$var2 = 'id='.$classe['classe'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source); 
			if($classe['delClasse']=='non'){
				$_SESSION['message'] = 'La Classe ne sera pas supprimée';
				header('Location:'.$source);
			}elseif($classe['delClasse']=='oui'){
				$config->deleteClasse($source, $classe['classe']);
			}
		}
		
		
		
		
		
		
		
		
		
		if(isset($_POST['restaureEleve'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$eleve = $_POST;
			$var1 = '?action=restaure&';
			$var2 = 'id='.$eleve['eleve'];
			$source = str_replace($var1,'',$source);
			$source = str_replace($var2,'',$source);
			if($eleve['restaureEleve']=='non'){
				$_SESSION['message'] = 'L élève ne sera pas retabli';
				header('Location:'.$source);
			}elseif($eleve['restaureEleve']=='oui'){
				$config->restaureEleve($source, $eleve['eleve']);
			}
		}
		
		
		
		
		
		
		
		
		
		//On ajoute la photo des élèves 
		if(isset($_POST['ajout_photo_eleve'])){
			/*echo '<h1>Les Eleves</h1>';
			echo '<pre>'; print_r($_POST); echo '</pre>';
			echo '<h1>Les Photos</h1>';
			echo '<pre>'; print_r($_FILES); echo '</pre>';*/
			$config->enregistrerImageEleve($source, $_POST['eleve'], 'images/student/',$_FILES['photo']);
		}
		
		
		
		
		
		
		
		
		
		
		
		
		/*************************************************************************
		**************  Gestion des Génération du PDf  ***************************
		*************************************************************************/
		if(isset($_POST['print'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$print = $_POST['to_print'];
			$as = $config->getCurrentYear();  // Année Scolaire en Cours
			// On imprime la liste des élèves 
			if($print==='listeEleve'){
				$listeEleve = $config->listeEleve($_POST['classe'], 'non_supprime', $as );
				$nbValue = count($listeEleve); // Si ça vaut 0, y'a pas d'élèves dans la classe.
				if($nbValue===0){
					$_SESSION['message'] = 'Classe sans élèves.';
					header('Location:'.$source);
				}else{
					$_SESSION['classe']['information'] = $_SESSION['information'];
					$_SESSION['classe']['eleve'] = $listeEleve;
					$_SESSION['classe']['libelle_classe'] = $listeEleve[0]['libelle_classe'];
					$_SESSION['classe']['section'] = $_POST['section'];
					$_SESSION['print'] = 'listeEleve';
					$_SESSION['classe']['stat'] = $config->listeEleveStat($_POST['classe'], 'non_supprime', $as);
					header('Location:print_pdf.php');
				}
			}
			// On imprime le releve de notes 
			elseif($print==='releveEleve'){
				$listeEleve = $config->listeEleve($_POST['classe'], 'non_supprime', $as );
				$nbValue = count($listeEleve); // Si ça vaut 0, y'a pas d'élèves dans la classe.
				if($nbValue===0){
					$_SESSION['message'] = 'Classe sans élèves.';
					header('Location:'.$source);
				}else{
					if($_POST['lib_matiere']=='null'){
						$_SESSION['message'] = 'Vous devez choisir une matière.';
						header('Location:'.$source);
					}else{
						$_SESSION['releve']['information'] = $_SESSION['information'];
						$classe = $_POST['classe'];
						$matiere = $_POST['lib_matiere'];
						$_SESSION['releve']['sousMatiere'] = $config->listeSousMatiereClasse($classe,$matiere);
						$_SESSION['releve']['eleve'] = $listeEleve;
						$_SESSION['releve']['section'] = $_POST['section'];
						$_SESSION['print'] = 'releveEleve';
						// echo '<pre>'; print_r($_SESSION['releve']['eleve']); echo '</pre>';
						header('Location:print_pdf_landscape.php');
					}
				}
			}
			
			// On imprime la fiche individuelle de l'élève 
			elseif($print==='ficheEleve'){
				$reponse = $_POST['fEleve'];
				$var1 = 'action=view&';
				$var2 = 'id='.$_POST['eleve'];
				$source = str_replace($var1,'',$source);
				$source = str_replace($var2,'',$source);
				if($reponse=='non'){
					$_SESSION['message'] = 'Fiche non générée';
					header('Location:'.$source);
				}elseif($reponse==='oui'){
					$eleve = $config->getEleve($_POST['eleve']);
					$_SESSION['eleve']['identification'] = $eleve;
					$_SESSION['eleve']['information'] = $_SESSION['information'];
					$_SESSION['print'] = 'ficheEleve';
					// echo '<pre>'; print_r($_SESSION['eleve']); echo '</pre>';
					header('Location:print_pdf.php');
				}
			}
			
			
			// On imprime le bulletin Mensuel des élèves de la classe 
			elseif($print ==='bulletinMensuel'){
				$print = $_POST['to_print'];
				$classe = $_POST['classe'];
				$mois = $_POST['mois'];
				if($classe=='null'){
					$_SESSION['message'] = 'Vous devez choisir une classe.';
					header('Location:'.$source);
				}else{
					if($mois=='null'){
						$_SESSION['message'] = 'Vous devez choisir un mois.';
						header('Location:'.$source);
					}else{
						$bull = $config->configBulletinMensuel($classe, $mois);
						
						// echo '<pre>'; print_r($bull['totalNote']); echo '</pre>';
						$_SESSION['print'] = $print;
						$_SESSION['classe'] = $bull;
						header('Location:print_pdf.php');
					}
				}
			}
			
			// La vue d'ensemble des effectifs 
			elseif($print=='vueEffectif'){
				$vueEffectif = $config->vueEffectif();
				$_SESSION['classe'] = $vueEffectif;
				$_SESSION['print'] = $print;
				// echo '<pre>';print_r($vueEffectif);
				header('Location:print_pdf.php');
			}


			// Les statistiques Mensuelles 
			elseif($print=='statistiqueMensuelle'){
				$data['mois'] = $_POST['mois'];
				$data['section'] = $_POST['section'];
				$information = $config->configStatMensuelle($data);
				// echo '<pre>'; print_r($information); echo '</pre>';
				$_SESSION['print'] = $print;
				$_SESSION['info'] = $information;
				// echo '<pre>'; print_r($_SESSION['info']);
				header('Location:print_pdf_landscape.php');
			}
		}














		/**********************************************************************
		 * ********************************************************************
		 *  GESTION DES NOTES, DES STATS ET DES BULLETINS 
		 * ********************************************************************
		 *********************************************************************/

		// On veut enregistrer ses notes 
		if(isset($_POST['saveNote'])){
			$notes = $_POST;
			// Avant d'enregistrer, on s'assure que depuis un autre onglet, la tâche n'avait pas déjà été validée.
			$verification = $config->verifNoteSaisie($_SESSION['user']['classeTenue']['id'], 
													$_POST['subject'], 
													$_POST['mois']);
			if($verification==false){
				$config->ajouterNote($source, $notes);
			}else{
                $_SESSION['message'] = "Les Notes de cette matière ont été saisies le ";
                $_SESSION['message'] .= $verification['date_fr'];
                $_SESSION['message'] .= " à ";
                $_SESSION['message'] .= $verification['heure_fr'];
                $_SESSION['message'] .= ". Reportez-vous au menu Modifier des Notes ";
                $_SESSION['message'] .= "pour des éventuels changements de notes.";
				header('Location:'.$source);
			}
		}
		
		
		
		
		
		
		// On veut mettre à jour ses notes 
		if(isset($_POST['updateNote'])){
			$notes = $_POST;
			$config->modifierNote($source, $notes);
		}
		
		
		
		
		
		
		// On veut supprimer ses notes 
		/*if(isset($_POST['deleteNote'])){
			$reponse = $_POST['deleteNote'];
			if($reponse==='Non'){
				$_SESSION['message'] = 'Les notes de cette matière ne seront pas supprimées.';
				header('Location:'.$source);
			}elseif($reponse=='Oui'){
				$periode = $_POST['mois'];
				$matiere = $_POST['subject'];
				$classe = $_POST['classe'];
				$config->deleteNote($source, $periode, $matiere, $classe);
			}
		}*/
		
		if(isset($_POST['supprimerNote'])){
			echo '<pre>'; print_r($_POST); echo '</pre>';
			$classe = (int) $_POST['classe'];
			$periode = (int) $_POST['mois'];
			$matiere = (int) $_POST['matiere'];
			$config->deleteNote($source, $periode, $matiere, $classe);
		}
		
		
		
		
		
		
		
		// On lance le traitement mensuel des notes 
		if(isset($_POST['traitementMensuel'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$classe = $_POST['classe'];
			$mois = $_POST['mois'];
			if($classe=='null'){
				$_SESSION['message'] = 'Aucune classe n a été choisie.';
				header('Location:'.$source);
			}else{
				if($mois=='null'){
					$_SESSION['message'] = 'Vous devez sélectionner un mois précis.';
					header('Location:'.$source);
				}else{
					// On vérifie que toutes les notes ont été saisies. Sinon on refuse
					// de lancer le traitement 
					$listeMatiere = $config->listeMatiereClasse($classe);
					$matiereSaisie = $config->getNoteSaisieMois($classe, $mois);
					$nombre = count($listeMatiere);
					$nombreMatiereSaisie = count($matiereSaisie);
					if($nombreMatiereSaisie<$nombre){
						$nb = $nombre - $nombreMatiereSaisie;
						$_SESSION['message'] = 'Il reste encore '.$nb.' matières';
						$_SESSION['message'] .= ' non saisies pour le mois que vous avez choisi.';
						header('Location:'.$source);
					}elseif($nombreMatiereSaisie==$nombre){
						$config->traiterNoteMensuelle($source, $classe, $mois);
					}else{
						$_SESSION['message'] = 'une erreur fatale s est produite et le traitement ';
						$_SESSION['message'] .= ' ne peut se poursuivre. Contactez le concepteur du logicel';
						header('Location:'.$source);
					}
					
					
					// Le code commenté suivant sera utilisé pour générer le bulletin mensuel
					/*if($nombreMatiereSaisie<$nombre){
						
						
						
						
					}elseif(){
						
						
						$_SESSION['classe']['eleve'] = $bulletin['eleve'];
						$_SESSION['classe']['section'] = $bulletin['section'];
						$_SESSION['classe']['effectif'] = $bulletin['effectif'];
						$_SESSION['classe']['moisCourant'] = $bulletin['moisCourant'];
						$_SESSION['classe']['listeMatiere'] = $bulletin['listeMatiere'];
						$_SESSION['classe']['listeSousMatiere'] = $bulletin['listeSousMatiere'];
						$_SESSION['classe']['noteEleve'] = $bulletin['noteEleve'];
						
						// echo '<pre>'; print_r($_SESSION['classe']['noteEleve']); echo '</pre>';
						
					}else{
						
						
						
					}*/
				}
			}
		}
		
		
		
		
		
		
		
		if(isset($_POST['updatePonderation'])){
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			$info = $_POST;
			$config->modifierPonderation($source, $info);
		}
		
		
		
		