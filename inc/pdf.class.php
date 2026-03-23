<?php 
	require_once('fpdf.class.php');
	
	
	class pdf extends FPDF {
		
		function convert($texte){
			$txt = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $texte);
			return $txt;
		}
		
		
		
			
		function Entete(){
			$this->Image('images/logo.jpg', 90, 20, 25);
			$this->SetFont('Times','',8);
			$this->Cell(70,7, $this->convert($_SESSION['information']['pays_fr']),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert($_SESSION['information']['pays_en']),0,0,'C');
			
			$this->Ln(4);
			
			$this->Cell(70,7, $this->convert($_SESSION['information']['devise_fr']),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert($_SESSION['information']['devise_en']),0,0,'C');
			$this->Ln(3);
			
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['ministere_fr'])),0,0,'C');
			$this->Cell(50,7, strtoupper($this->convert('')),0,0,'C');
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['ministere_en'])),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['region_fr'])),0,0,'C');
			$this->Cell(50,7, strtoupper($this->convert('')),0,0,'C');
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['region_en'])),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['departement_fr'])),0,0,'C');
			$this->Cell(50,7, strtoupper($this->convert('')),0,0,'C');
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['departement_en'])),0,0,'C');
			$this->Ln(4);
			
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert('**************'),0,0,'C');
			$this->Ln(4);
			
			$this->SetFont('Times','B',9);
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['nom_etablissement_fr'])),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, strtoupper($this->convert($_SESSION['information']['nom_etablissement_en'])),0,0,'C');
			$this->Ln(4);
			
			$this->SetFont('Times','I',8);
			$contactFr = 'Contact : '.$_SESSION['information']['contact'];
			$contactEn = 'Contact : '.$_SESSION['information']['contact'];
			$emailFr = 'Email : '.$_SESSION['information']['email'];
			$emailEn = 'Email : '.$_SESSION['information']['email'];
			$bpFr = 'B.P. : '.$_SESSION['information']['bp'].' '.$_SESSION['information']['arrondissement'];
			$bpEn = 'P.O. Box: '.$_SESSION['information']['bp'].' '.$_SESSION['information']['arrondissement'];
			$this->Cell(70,7, $this->convert($bpFr.'. '.$contactFr),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert($bpEn.'. '.$contactEn),0,0,'C');
			$this->Ln(4);
			
			$this->SetFont('Times','B',8);
			$asFr = 'Année Scolaire : '.$_SESSION['information']['annee_scolaire'];
			$asEn = 'School Year : '.$_SESSION['information']['annee_scolaire'];
			$this->Cell(70,7, $this->convert($asFr),0,0,'C');
			$this->Cell(50,7, $this->convert(''),0,0,'C');
			$this->Cell(70,7, $this->convert($asEn),0,0,'C');
			$this->Ln(4);
			
		}
		
		
		
		
		function Footer(){
			$this->setFont('Arial', 'I', 6);
			$texte = $_SESSION['appName'].' '.$_SESSION['appVersion'];
			$texte .= ', votre partenaire éducatif. Tel : ';
			$texte .= $_SESSION['appContact'];
			// $numeroPage = 'Page '.$this->PageNo().' / '.$this->AliasNbPages();
			$this->Text(90,290, $this->convert($texte));
			$horaire = 'Généré le '.DATE('d / m / Y').' à '.DATE('H:i:s');
			$this->Text(25, 290, $this->convert($horaire));
			$this->setAuthor('Nyambi Computer Services');
		}
		
		
		
		
		function Titre($titre){
			// On crée d'abord un espace pour gérer les informations d'entête
			$this->Ln(9);
			$this->SetFont('Times', 'B', 18);
			// Déplacer à droite
			$this->Cell(10);
			// Bordure du titre
			$this->Cell(140, 8, $this->convert(strtoupper($titre)), 0, 0 , 'C');
			// Retour à la ligne
			$this->Ln(10);
		}
		
		
		function SousTitre($titre){
			// On crée d'abord un espace pour gérer les informations d'entête
			$this->Ln(2);
			$this->SetFont('Times', 'BI', 14);
			// Déplacer à droite
			$this->Cell(10);
			// Bordure du titre
			$this->Cell(140, 8, $this->convert(strtoupper($titre)), 0, 0 , 'C');
			// Retour à la ligne
			$this->Ln(5);
		}
		



		public function bulletinTrimestre($classe){
			$eleve = $classe['eleve'];
			$infoClasse = $classe['infoClasse'];
			$trimestre = $classe['moisCourant'];
			$section = $classe['section'];
			for($i=0;$i<count($eleve);$i++){
				$this->addPage();
				$this->Entete();
				$idEleve = $eleve[$i]['id'];
				$photo = $eleve[$i]['photo'];
				if($photo=='images/student/' or $photo==''){
					$image = 'images/student/no_name.png';
				}else{
					$image = $photo;
				}
				// ENTÊTE DU BULLETIN 
				$libNiveau['fr'] = 'Niveau : ';
				$libClasse['fr'] = 'Classe : ';
				$libTrimestre['fr'] = 'Trimestre : ';
				$libEleve['fr'] = 'Eleve : ';
				$libEnseignant['fr'] = 'Enseignant(e) : ';
				$libMatiere['fr'] = 'Matiere';
				$libPoint['fr'] = 'pts';
				$libMensu['fr'] = 'Mois ';
				$libNiveau['en'] = 'Level : ';
				$libClasse['en'] = 'Class : ';
				$libTrimestre['en'] = 'Term : ';
				$libEleve['en'] = 'Student : ';
				$libEnseignant['en'] = 'Teacher : ';
				$libMatiere['en'] = 'Subject';
				$libPoint['en'] = 'mks';
				$libMensu['en'] = 'Month ';
				$libTotal['fr'] = 'Total';
				$libCote['fr'] = 'Cote';
				$libAppr['fr'] = 'Appr';
				$libTotal['en'] = 'Total';
				$libCote['en'] = 'Grade';
				$libAppr['en'] = 'Appr';



				$this->SetFont('Times','',13);
				$this->Image($image, 180, 65, 15);
				$this->Text(20,75,$libNiveau[$section]);
				$this->Text(60,75,$libClasse[$section]);
				$this->Text(100,75,$libTrimestre[$section]);
				$this->Text(20,80,$libEleve[$section]);
				$this->Text(20,85,$libEnseignant[$section]);
				$this->SetFont('Times','B',13);
				$this->Text(39,75,$infoClasse['niveau_classe']);
				$this->Text(77,75,$this->convert(strtoupper($infoClasse['libelle_classe'])));
				$this->Text(125,75, $this->convert(strtoupper($trimestre)));
				$this->Text(50,80,stripslashes($eleve[$i]['nom_complet']));
				$this->SetFont('Times','BI',12);
				$this->Text(50,85, $classe['enseignant']['nom']);
				$this->Ln(30);


				// Entête du Tableau 
				$this->setFont('Times', 'B', 8);
				$this->Cell(75, 5, strtoupper($this->convert($libMatiere[$section])), 1, 0, 'C', true);
				$this->Cell(10, 5, strtoupper($libPoint[$section]), 1, 0, 'C', true);
				for($a=1;$a<=$classe['nbMois']; $a++){
					$this->setFont('Times', 'B', 6);
					$mensualite = $libMensu[$section];
					$this->Cell(15, 5, $this->convert($mensualite.' '.$a), 1, 0, 'C', true);
				}
				$this->Cell(16, 5, strtoupper($libTotal[$section]), 1, 0, 'C', true);
				$this->Cell(16, 5, strtoupper($libCote[$section]), 1, 0, 'C', true);
				$this->Cell(16, 5, strtoupper($libAppr[$section]), 1, 0, 'C', true);
				$this->Ln(5);


				// Gestion des Matières 
				$listeMatiere = $classe['listeMatiere'];
				for($b=0;$b<count($listeMatiere);$b++){
					$ponderationMatiere = $classe['ponderationMatiere'];
					$this->SetFont('Times','',8);
					$cleCompetence = 'libelle_competence_'.$classe['section'];
					$codeMatiere = $listeMatiere[$b]['code_competence'];
					$idMatiere = $listeMatiere[$b]['id_competence'];
					$libelleMatiere = strtoupper($listeMatiere[$b][$cleCompetence]);
					$this->Cell(75, 5, substr($libelleMatiere,0,46), 1, 0, 'L');
					$this->Cell(10, 5, $ponderationMatiere[$idEleve][$idMatiere], 1, 0, 'C');
					$idEleve = $eleve[$i]['id'];
					$note = $classe['note'][$idEleve];

					// Nombre de Mois en fonction des Trimestres 
					if($trimestre==1){
						for($c=1;$c<=$classe['nbMois'];$c++){
							$val = array(1,2,3);
							$champ[$c] = $codeMatiere.'_'.$val[$c-1];
							$cle = $champ[$c];
							$this->Cell(15,5,$note[$cle],1,0,'C');
						}
					}elseif($trimestre==2){
						for($c=1;$c<=$classe['nbMois'];$c++){
							$val = array(4,5,6);
							$champ[$c] = $codeMatiere.'_'.$val[$c-1];
							$cle = $champ[$c];
							$this->Cell(15,5,$note[$cle],1,0,'C');
						}
					}
					
					

					$this->SetFont('Times','B',8);
					$cleCote = $codeMatiere.'_cote';
					$cleAppr = $codeMatiere.'_appr';
					$this->Cell(16, 5, strtoupper($note[$codeMatiere]), 1, 0, 'C', true);
					$this->Cell(16, 5, strtoupper($note[$cleCote]), 1, 0, 'C', true);
					$this->Cell(16, 5, strtoupper($note[$cleAppr]), 1, 0, 'C', true);
					$this->Ln(5);
				}
				$this->SetFont('Times', 'B', 11);
				$totalNote = $classe['note'][$idEleve]['total'];
				$totalCote = $classe['note'][$idEleve]['cote'];
				$totalAppr = $classe['note'][$idEleve]['appr'];;
				$this->Cell(75, 5, 'TOTAL ', 1, 0, 'C', true);
				$this->Cell(10, 5, $classe['ponderation'], 1, 0, 'C', true);
				// Moyenne en fonction des trimestres 
				if($trimestre==1){
					for($d=1;$d<=$classe['nbMois'];$d++){
						$val = array(1,2,3);
						$cle = 'moyenne_'.$val[$d-1];
						$champ[$d] = $classe['note'][$idEleve][$cle];
						$this->Cell(15,5,$champ[$d],1,0,'C');
					}
				}elseif($trimestre==2){
					for($d=1;$d<=$classe['nbMois'];$d++){
						$val = array(4,5,6);
						$cle = 'moyenne_'.$val[$d-1];
						$champ[$d] = $classe['note'][$idEleve][$cle];
						$this->Cell(15,5,$champ[$d],1,0,'C');
					}
				}



				
				$this->Cell(16, 5, $totalNote, 1, 0, 'C', true);
				$this->Cell(16, 5, $totalCote, 1, 0, 'C', true);
				$this->Cell(16, 5, $totalAppr, 1, 0, 'C', true);
				$this->Ln(15);

				$libMG['fr'] = 'Moy. Generale : ';
				$libMoy['fr'] = 'Moyenne : ';
				$libRang['fr'] = 'Rang : ';
				$libObs['fr'] = 'Observations Generales et Remarques';
				$libObsTrim['fr'] = 'Observation Trimestrielle';
				$libSignEns['fr'] = 'signature enseignant';
				$libSignAdm['fr'] = 'signature administration';
				$libSignParent['fr'] = 'signature parent';
				$libMG['en'] = 'General Aver. : ';
				$libMoy['en'] = 'Average : ';
				$libRang['en'] = 'Rank : ';
				$libObs['en'] = 'General Observation  and Remarks';
				$libObsTrim['en'] = 'end of Term Observation';
				$libSignEns['en'] = 'teacher signature';
				$libSignAdm['en'] = 'administration signature';
				$libSignParent['en'] = 'parent signature';
				$libEval['fr'] = 'Effectif Evalué : ';
				$libEval['en'] = 'Evaluated : ';
				$moyenne = $classe['note'][$idEleve]['moyenne'];
				$rank = $classe['note'][$idEleve]['rank'];
				$moyenneGenerale = $classe['note'][$idEleve]['moy_gen'];
				$evalues = $classe['note'][$idEleve]['evalues'];
				$rang = $rank.' / '.$evalues;
				$this->Cell(47, 5, $libMG[$section].$moyenneGenerale, 1, 0, 'C');
				$this->Cell(48, 5, utf8_decode($libEval[$section]).$evalues, 1, 0, 'C');
				$this->Cell(50, 5, $libMoy[$section].$moyenne, 1, 0, 'C', true);
				$this->Cell(50, 5, $libRang[$section].$rang, 1, 0, 'C', true);
				$this->SetFont('Times','BI',9);
				$this->Ln(5);
				$this->Cell(195, 5, strtoupper($libObs[$section]), 1, 1, 'C', true);
				$this->Cell(65, 5, strtoupper($libObsTrim[$section]), 1, 0, 'C');
				$this->Cell(45, 5, strtoupper($libSignEns[$section]), 1, 0, 'C');
				$this->Cell(50, 5, strtoupper($libSignAdm[$section]), 1, 0, 'C');
				$this->Cell(35, 5, strtoupper($libSignParent[$section]), 1, 0, 'C');
				$this->Ln(5);
				$this->Cell(65, 20, '', 1, 0, 'C');
				$this->Cell(45, 20, '', 1, 0, 'C');
				$this->Cell(50, 20, '', 1, 0, 'C');
				$this->Cell(35, 20, '', 1, 0, 'C');
				$this->Ln(25);
				$faitA['fr'] = 'Fait a '.ucwords($_SESSION['information']['ville']).' le '.DATE('d / m / Y');
				$faitA['en'] = 'Done at '.ucwords($_SESSION['information']['ville']).' the '.DATE('d / m / Y');
				$this->Cell(180, 5, $faitA[$section], 0,0,'R');
				$this->Ln(3);
				$titre['fr'] = 'La Directrice';
				$titre['en'] = 'The Director';
				$this->Cell(180, 5, $titre[$section], 0,0,'R');
			}
		}









		public function bulletinMensuel($classe){
			$eleve = $classe['eleve'];
			$section = $classe['section'];
			$infoClasse = $classe['infoClasse'];
			$mois = $classe['moisCourant'];
			$note = $classe['note'];
			for($i=0;$i<count($eleve);$i++){
				$this->addPage();
				$this->Entete();
				$idEleve = $eleve[$i]['id'];
				$photo = $eleve[$i]['photo'];
				$totalNote = $classe['totalNote'];
				if($photo=='images/student/' or $photo==''){
					$image = 'images/student/no_name.png';
				}else{
					$image = $photo;
				}
				// ENTÊTE DU BULLETIN 
				$libNiveau['fr'] = 'Niveau :';
				$libClass['fr'] = 'Classe : ';
				$month['fr'] = 'Mois : ';
				$libEleve['fr'] = "Nom de l'eleve : ";
				$libEns['fr'] = "Enseignant : ";
				$libMatiere['fr'] = 'Matière';
				$libPoint['fr'] = 'pts';
				$libCote['fr'] = 'Côte';
				/******************************** */
				$libNiveau['en'] = 'Level: ';
				$libClass['en'] = 'Class : ';
				$month['en'] = 'Month : ';
				$libEleve['en'] = "Pupil Name : ";
				$libEns['en'] = "Teacher : ";
				$libMatiere['en'] = 'Subject';
				$libPoint['en'] = 'mks';
				$libCote['en'] = 'grade';
				/******************************* */
				$this->SetFont('Times','',13);
				$this->Image($image, 180, 65, 15);
				$this->Text(20,75,$libNiveau[$section]);
				$this->Text(60,75,$libClass[$section]);
				$this->Text(100,75,$month[$section]);
				$this->Text(20,80,$libEleve[$section]);
				$this->Text(20,85,$libEns[$section]);
				/************************************ */
				$this->SetFont('Times','B',13);
				$this->Text(35,75,$infoClasse['niveau_classe']);
				$this->Text(75,75,$this->convert(strtoupper($infoClasse['libelle_classe'])));
				$this->Text(115,75, $this->convert(strtoupper($mois['id'])));
				$this->Text(50,80,stripslashes($eleve[$i]['nom_complet']));
				$this->SetFont('Times','BI',12);
				$this->Text(50,85, $classe['enseignant']['nom']);
				$this->Ln(30);
				/**************************************** */
				// Entête du Tableau 
				$this->setFont('Times', 'B', 8);
				$this->Cell(75, 5, strtoupper($this->convert('Matiere')), 1, 0, 'C', true);
				$this->Cell(10, 5, 'PTS', 1, 0, 'C', true);
				$listeSousMatiere = $classe['listeSousMatiere'][$section];
				for($a=0;$a<count($listeSousMatiere); $a++){
					$this->setFont('Times', 'B', 6);
					$this->Cell(17, 5, strtoupper($listeSousMatiere[$a]), 1, 0, 'C', true);
				}
				$this->Cell(13, 5, strtoupper('Total'), 1, 0, 'C', true);
				$this->Cell(13, 5, strtoupper('Grade'), 1, 0, 'C', true);
				$this->Cell(13, 5, strtoupper('Appr'), 1, 0, 'C', true);
				$this->Ln(5);
				/****************************************
				 * **************************************
				 */

				// GESTION DES MATIERES
				$listeMatiere = $classe['listeMatiere'];
				for($b=0;$b<count($listeMatiere);$b++){
					$ponderationMatiere = $classe['ponderationMatiere'];
					$this->SetFont('Times','',8);
					$cleCompetence = 'libelle_competence_'.$section;
					$codeMatiere = $listeMatiere[$b]['code_competence'];
					$idMatiere = $listeMatiere[$b]['id_competence'];
					$libelleMatiere = strtoupper($listeMatiere[$b][$cleCompetence]);
					$this->Cell(75, 5, substr($libelleMatiere,0,46), 1, 0, 'L');
					$this->Cell(10, 5, $ponderationMatiere[$b], 1, 0, 'C');
					$this->Cell(17, 5, $note[$i][$b]['oral'], 1, 0, 'C');
					$this->Cell(17, 5, $note[$i][$b]['ecrit'], 1, 0, 'C');
					$this->Cell(17, 5, $note[$i][$b]['prat'], 1, 0, 'C');
					$this->Cell(17, 5, $note[$i][$b]['se'], 1, 0, 'C');
					$this->SetFont('Times','B',8);
					$this->Cell(13, 5, $note[$i][$b]['total'], 1, 0, 'C', true);
					$this->Cell(13, 5, $note[$i][$b]['cote'], 1, 0, 'C', true);
					$this->Cell(13, 5, $note[$i][$b]['appr'], 1, 0, 'C',true);
					$this->Ln(5);
				}
				$this->SetFont('Times', 'B', 11);
				// 	$totalNote = $classe['totalNote'][$i]['total'];
				// $totalCote = $classe['totalNote'][$i]['cote'];
				// $totalAppr = $classe['totalNote'][$i]['appr'];
				$this->Cell(153, 5, 'TOTAL / '.$totalNote[$i]['ponderation'], 1, 0, 'C', true);
				$this->Cell(13, 5, $totalNote[$i]['total'], 1, 0, 'C', true);
				$this->Cell(13, 5, $totalNote[$i]['cote'], 1, 0, 'C', true);
				$this->Cell(13, 5, $totalNote[$i]['appr'], 1, 0, 'C', true);
				$this->Ln(15);
				/**************************************************** */
				$libMoyGen['fr'] = 'Moy. Générale : ';
				$libEval['fr'] = 'Effectif Evalué : ';
				$libMoy['fr'] = 'Moyenne :';
				$libRang['fr'] = 'Rang :';
				$libObservGen['fr'] = 'observations generales et remarques';
				$libObservMens['fr'] = 'observation mensuelle';
				$libTeacherSign['fr'] = 'signature enseignant';
				$libAdminSign['fr'] = 'signature administration';
				$libParentSign['fr'] = 'signature parent';
				$libFaitA['fr'] = "Fait a ".$_SESSION['information']['ville'];
				$libFaitA['fr'] .= " le ".DATE('d / m / Y');
				$libDirecteur['fr'] = 'La Directrice';
				/*************************************************** */
				$libMoyGen['en'] = 'General Average : ';
				$libEval['en'] = 'Evaluated : ';
				$libMoy['en'] = 'Average :';
				$libRang['en'] = 'Rank :';
				$libObservGen['en'] = 'General Observation and Remarks';
				$libObservMens['en'] = 'Monthly Observation';
				$libTeacherSign['en'] = 'Teacher signature';
				$libAdminSign['en'] = 'Administration signature';
				$libParentSign['en'] = 'Parent signature';
				$libFaitA['en'] = "Done at ".$_SESSION['information']['ville'];
				$libFaitA['en'] .= " on the ".DATE('d / m / Y');
				$libDirecteur['en'] = 'The Director';
				/***************************************************** */
				$lignClassement = $libRang[$section].' '.$totalNote[$i]['rank'].' / '.$totalNote[$i]['evalues'];
				$this->Cell(47, 5, utf8_decode($libMoyGen[$section]).' '.$totalNote[$i]['moy_gen'], 1, 0, 'C');
				$this->Cell(48, 5, utf8_decode($libEval[$section]).' '.$totalNote[$i]['evalues'], 1, 0, 'C');
				$this->Cell(50, 5, utf8_decode($libMoy[$section]).' '.$totalNote[$i]['moyenne'], 1, 0, 'C', true);
				$this->Cell(50, 5, utf8_decode($lignClassement), 1, 0, 'C', true);
				$this->SetFont('Times','BI',9);
				$this->Ln(5);
				$this->Cell(195, 5, strtoupper($libObservGen[$section]), 1, 1, 'C', true);
				$this->Cell(65, 5, strtoupper($libObservMens[$section]), 1, 0, 'C');
				$this->Cell(45, 5, strtoupper($libTeacherSign[$section]), 1, 0, 'C');
				$this->Cell(50, 5, strtoupper($libAdminSign[$section]), 1, 0, 'C');
				$this->Cell(35, 5, strtoupper($libParentSign[$section]), 1, 0, 'C');
				$this->Ln(5);
				$this->Cell(65, 20, '', 1, 0, 'C');
				$this->Cell(45, 20, '', 1, 0, 'C');
				$this->Cell(50, 20, '', 1, 0, 'C');
				$this->Cell(35, 20, '', 1, 0, 'C');
				$this->Ln(25);
				$this->Cell(180, 5, utf8_decode($libFaitA[$section]), 0,0,'R');
				$this->Ln(3);
				$this->Cell(180, 5, utf8_decode($libDirecteur[$section]), 0,0,'R');
			}
		}
		
		
	}