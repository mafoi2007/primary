<?php 
	session_start();
	require_once('inc/pdf.class.php');
	
	$pdf = new pdf('P', 'mm', 'A4');
	$pdf->SetFillColor(155, 150, 149);
	
	
	
	
	
	
	if(isset($_SESSION['print'])){
		if($_SESSION['print']=='listeEleve'){
			$classe = $_SESSION['classe'];
			// La page doit s'afficher en fonction de la section 
			if($classe['section']=='en'){
				$pdf->addPage();
				$pdf->Entete();
				$titre = 'Student List of ';
				$titre.= $classe['libelle_classe'];
				$pdf->Titre($titre);
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Sex', 1, 0 , 'C');
				$pdf->Cell(12, 7, 'Female', 1, 0 , 'C');
				$pdf->Cell(14, 7, 'Male', 1, 0 , 'C');
				$pdf->Cell(10, 7, 'Global', 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Repeater', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['FR'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['GR'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['R'], 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'New', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['FN'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['GN'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['N'], 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Global', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['F'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['G'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['T'], 1, 0 , 'C');
				$pdf->Ln(15);
				
				$pdf->SetFont('Times','B',10);
				// Je positionne l'entete du tableau
				$pdf->Cell(10, 6, $pdf->convert('N°'), 1, 0 , 'C',true);
				$pdf->Cell(28, 6, $pdf->convert('Identifier'), 1, 0 , 'C',true);
				// $pdf->Cell(20, 6, $pdf->convert('Matricule'), 1, 0 , 'C');
				$pdf->Cell(75, 6, $pdf->convert('Full Name'), 1, 0 , 'C',true);
				$pdf->Cell(9, 6, $pdf->convert('Sex'), 1, 0 , 'C',true);
				$pdf->Cell(13, 6, $pdf->convert('Status'), 1, 0 , 'C',true);
				$pdf->Cell(55, 6, $pdf->convert('Date and place of birth'), 1, 0 , 'C',true);
				$pdf->SetFont('Times','',10);
				$pdf->Ln(6);
				$a = 1;
				for($i=0;$i<count($classe['eleve']);$i++){
					$pdf->Cell(10, 6, $a, 1, 0 , 'C');
					$pdf->Cell(28, 6, $pdf->convert($classe['eleve'][$i]['matricule']), 1, 0 , 'C');
					$pdf->Cell(75, 6, $pdf->convert($classe['eleve'][$i]['nom_complet']), 1, 0 , 'L');
					$pdf->Cell(9, 6, $pdf->convert($classe['eleve'][$i]['sexe']), 1, 0 , 'C');
					$pdf->Cell(13, 6, $pdf->convert($classe['eleve'][$i]['statut']), 1, 0 , 'C');
					$dateNaiss = $classe['eleve'][$i]['date_naissance'].' at '.ucwords($classe['eleve'][$i]['lieu_naissance']);
					$pdf->Cell(55, 6, $pdf->convert($dateNaiss), 1, 0 , 'L');
					$pdf->Ln(6);
					$a++;
				}
				$texte = 'Done at '.ucwords($_SESSION['information']['ville']);
				$texte.= ', on the '.DATE('Y-m-d');
				$pdf->Cell(190,10, $texte,0,0,'R');
				
				$pdf->Ln(5);
				// $pdf->Cell(130,30, ' ');
				$pdf->SetFont('Arial','BI',10);
				$pdf->Cell(190,10, 'The Director,',0,0,'R');
				
				$fileName='student_List_';
				$fileName.= strtoupper(str_replace(' ','_',$classe['libelle_classe']));
				$fileName.= '.pdf';
			}elseif($classe['section']=='fr'){
				$pdf->addPage();
				$pdf->Entete();
				$titre = 'Liste des eleves de la classe de ';
				$titre.= $classe['libelle_classe'];
				$pdf->Titre($titre);
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Sexe', 1, 0 , 'C');
				$pdf->Cell(12, 7, 'Feminin', 1, 0 , 'C');
				$pdf->Cell(14, 7, 'Masculin', 1, 0 , 'C');
				$pdf->Cell(10, 7, 'Total', 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Redoublant', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['FR'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['GR'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['R'], 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Nouveau', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['FN'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['GN'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['N'], 1, 0 , 'C');
				$pdf->Ln(7);
				$pdf->SetFont('Times','',8);
				$pdf->Cell(90);
				$pdf->Cell(14, 7, 'Total', 1, 0 , 'C');
				$pdf->Cell(12, 7,  $classe['stat']['F'], 1, 0 , 'C');
				$pdf->Cell(14, 7,  $classe['stat']['G'], 1, 0 , 'C');
				$pdf->Cell(10, 7,  $classe['stat']['T'], 1, 0 , 'C');
				$pdf->Ln(15);
				
				$pdf->SetFont('Times','B',10);
				// Je positionne l'entete du tableau
				$pdf->Cell(10, 6, $pdf->convert('N°'), 1, 0 , 'C',true);
				$pdf->Cell(28, 6, $pdf->convert('Matricule'), 1, 0 , 'C',true);
				$pdf->Cell(75, 6, $pdf->convert('Nom Complet'), 1, 0 , 'C',true);
				$pdf->Cell(9, 6, $pdf->convert('Sexe'), 1, 0 , 'C',true);
				$pdf->Cell(13, 6, $pdf->convert('Statut'), 1, 0 , 'C',true);
				$pdf->Cell(55, 6, $pdf->convert('Date et lieu de naissance'), 1, 0 , 'C',true);
				$pdf->SetFont('Times','',10);
				$pdf->Ln(6);
				$a = 1;
				for($i=0;$i<count($classe['eleve']);$i++){
					$pdf->Cell(10, 6, $a, 1, 0 , 'C');
					$pdf->Cell(28, 6, $pdf->convert($classe['eleve'][$i]['matricule']), 1, 0 , 'C');
					$pdf->Cell(75, 6, $pdf->convert($classe['eleve'][$i]['nom_complet']), 1, 0 , 'L');
					$pdf->Cell(9, 6, $pdf->convert($classe['eleve'][$i]['sexe']), 1, 0 , 'C');
					$pdf->Cell(13, 6, $pdf->convert($classe['eleve'][$i]['statut']), 1, 0 , 'C');
					$dateNaiss = $classe['eleve'][$i]['date_fr'].' a '.ucwords($classe['eleve'][$i]['lieu_naissance']);
					$pdf->Cell(55, 6, $pdf->convert($dateNaiss), 1, 0 , 'L');
					$pdf->Ln(6);
					$a++;
				}
				$texte = 'Fait a '.ucwords($_SESSION['information']['ville']);
				$texte.= ', le '.DATE('d / m / Y');
				$pdf->Cell(190,10, $texte,0,0,'R');
				
				$pdf->Ln(5);
				// $pdf->Cell(130,30, ' ');
				$pdf->SetFont('Arial','BI',10);
				$titre = $classe['information']['titre'];
				$pdf->Cell(190,10, $titre.' Le Directeur',0,0,'R');
				
				$fileName='liste_Eleve_';
				$fileName.= strtoupper(str_replace(' ','_',$classe['libelle_classe']));
				$fileName.= '.pdf';
			} 
			
			$pdf->Output($fileName, 'I');
			
			
			
			
		}
		
		
		
		elseif($_SESSION['print']=='ficheEleve'){
			$eleve = $_SESSION['eleve'];
			
			$pdf->addPage();
			$titre = "Fiche d'identification de l'eleve ";
			$pdf->Titre($titre);
			$sousTitre = 'Classe : '.$eleve['identification']['libelle_classe'];
			$pdf->sousTitre($sousTitre);
			
			// Je positionne la photo de l'élève
			$photo = $eleve['identification']['photo'];
			if(empty($photo)){$photo = 'images/student/no_name.png';}
			$pdf->Image($photo, 170, 66, 20);
			$nom = $eleve['identification']['nom_complet'];
			$matricule = $eleve['identification']['matricule'];
			$sexeEleve = $eleve['identification']['sexe'];
			if($sexeEleve==='F'){
				$sexe='Feminin';
			}elseif($sexeEleve==='M'){
				$sexe='Masculin';
			}
			$statutEleve = $eleve['identification']['statut'];
			if($statutEleve==='N'){
				$statut='Nouveau';
			}elseif($statutEleve==='R'){
				$statut='Redoublant';
			}
			$dateNaissance = $eleve['identification']['date_fr'];
			$lieuNaissance = $eleve['identification']['lieu_naissance'];
			$nomPere = $eleve['identification']['nom_pere'];
			$nomMere = $eleve['identification']['nom_mere'];
			$contactParent = $eleve['identification']['contact_parent'];
			
			// Pour l'expression française
			$pdf->setFont('Times', '', 14);
			$pdf->Text(25, 100, "Nom de l'eleve : ");
			$pdf->Text(25, 115, "Matricule : ");
			$pdf->Text(25, 130, "Sexe : ");
			$pdf->Text(125, 130, "Statut : ");
			$pdf->Text(25, 145, "Date de Naissance : ");
			$pdf->Text(25, 160, "Lieu de Naissance : ");
			$pdf->Text(25, 175, "Nom du Pere : ");
			$pdf->Text(25, 190, "Nom de la Mere : ");
			$pdf->Text(25, 205, "Contact des Parents : ");
			
			
			// Pour l'expression anglaise
			$pdf->setFont('Times', 'I', 12);
			$pdf->Text(25, 105, "Student Name : ");
			$pdf->Text(25, 120, "Identifier : ");
			$pdf->Text(25, 135, "Sex : ");
			$pdf->Text(125, 135, "Status : ");
			$pdf->Text(25, 150, "Date of birth : ");
			$pdf->Text(25, 165, "Place of birth : ");
			$pdf->Text(25, 180, "Father's Name : ");
			$pdf->Text(25, 195, "Mother's Name : ");
			$pdf->Text(25, 210, "Parent's Contact : ");
			
			
			// Affichage des informations
			$pdf->setFont('Times', 'BI', 18);
			$pdf->Text(65, 100, $nom);
			$pdf->Text(65, 115, $matricule);
			$pdf->Text(65, 130, $sexe);
			$pdf->Text(145, 130, $statut);
			$pdf->Text(75, 145, $dateNaissance);
			$pdf->Text(75, 160, $lieuNaissance);
			$pdf->Text(75, 175, $nomPere);
			$pdf->Text(75, 190, $nomMere);
			$pdf->Text(75, 205, $contactParent);
			
			$fileName='fiche_Identification_Eleve_';
			$fileName.= strtoupper(str_replace(' ','_',$nom));
			$fileName.= '.pdf';
			$pdf->setAuthor('Nyambi Computer Services');
			$pdf->Output($fileName, 'I');
		}
		
		
		
		
		elseif($_SESSION['print']=='bulletinMensuel'){
			$classe = $_SESSION['classe'];
			$pdf->bulletinMensuel($classe);
			$fileName = 'bulletin_mensuel_';
			$fileName .= $classe['infoClasse']['libelle_classe'];
			$fileName .= '.pdf';
			$pdf->Output($fileName, 'I');
			
			// La section Anglophone 
			if($classe['section']=='en'){
				// Un bulletin par élève
				// $eleve = $classe['eleve'];
				// $infoClasse = $classe['infoClasse'];
				// $mois = $classe['moisCourant'];
				/*for($i=0;$i<count($eleve);$i++){
					$pdf->addPage();
					$pdf->Entete();
					$idEleve = $eleve[$i]['id'];
					$photo = $eleve[$i]['photo'];
					if($photo=='images/student/' or $photo==''){
						$image = 'images/student/no_name.png';
					}else{
						$image = $photo;
					}
					// // ENTÊTE DU BULLETIN 
					// $pdf->SetFont('Times','',13);
					// $pdf->Image($image, 180, 65, 15);
					// $pdf->Text(20,75,'Level: ');
					// $pdf->Text(60,75,'Class : ');
					// $pdf->Text(100,75,'Month : ');
					// $pdf->Text(20,80,"Pupil Name : ");
					// $pdf->Text(20,85,'Teacher: ');
					// $pdf->SetFont('Times','B',13);
					// $pdf->Text(35,75,$infoClasse['niveau_classe']);
					// $pdf->Text(75,75,$pdf->convert(strtoupper($infoClasse['libelle_classe'])));
					// $pdf->Text(115,75, $pdf->convert(strtoupper($mois['code_periode_en'])));
					// $pdf->Text(50,80,stripslashes($eleve[$i]['nom_complet']));
					// $pdf->SetFont('Times','BI',12);
					// $pdf->Text(50,85, $classe['enseignant']['nom']);
					// $pdf->Ln(30);

					
					// // Entête du Tableau 
					// $pdf->setFont('Times', 'B', 8);
					// $pdf->Cell(75, 5, strtoupper($pdf->convert('Matiere')), 1, 0, 'C', true);
					// $pdf->Cell(10, 5, 'PTS', 1, 0, 'C', true);
					// for($a=0;$a<count($classe['listeSousMatiereAll']); $a++){
					// 	$pdf->setFont('Times', 'B', 6);
					// 	$cle = 'libelle_sous_competence_'.$classe['section'];
					// 	$sousMatiere = $classe['listeSousMatiereAll'][$a][$cle];
					// 	$pdf->Cell(17, 5, strtoupper($sousMatiere), 1, 0, 'C', true);
					// }
					// $pdf->Cell(13, 5, strtoupper('Total'), 1, 0, 'C', true);
					// $pdf->Cell(13, 5, strtoupper('Grade'), 1, 0, 'C', true);
					// $pdf->Cell(13, 5, strtoupper('Appr'), 1, 0, 'C', true);
					// $pdf->Ln(5);			
					
					// GESTION DES MATIERES 
					$listeMatiere = $classe['listeMatiere'];
					for($b=0;$b<count($listeMatiere);$b++){
						$ponderationMatiere = $classe['ponderationMatiere'];
						$pdf->SetFont('Times','',8);
						$cleCompetence = 'libelle_competence_'.$classe['section'];
						$codeMatiere = $listeMatiere[$b]['code_competence'];
						$idMatiere = $listeMatiere[$b]['id_competence'];
						$libelleMatiere = strtoupper($listeMatiere[$b][$cleCompetence]);
						$pdf->Cell(75, 5, substr($libelleMatiere,0,46), 1, 0, 'L');
						$pdf->Cell(10, 5, $ponderationMatiere[$idEleve][$idMatiere], 1, 0, 'C');
						$nbSousMatiereAll = count($classe['listeSousMatiereAll']);
						$noteEleve = $classe['note'][$idEleve][$idMatiere];
						$nbSousMatiere = count($noteEleve);
						$a = 1;
						for($c=0;$c<$nbSousMatiere;$c++){
							$noteObtenue = $noteEleve[$c]['note'];
							$pdf->Cell(17, 5, $noteObtenue, 1, 0, 'C');							
						}

						if($classe['totalNote'][$i]['eleve']==$eleve[$i]['id']){
							$cleCote = $codeMatiere.'_cote';
							$cleAppr = $codeMatiere.'_appr';
							$totalNoteMatiere = $classe['totalNote'][$i][$codeMatiere];
							$totalCote = $classe['totalNote'][$i][$cleCote];
							$totalAppr = $classe['totalNote'][$i][$cleAppr];
							
						}
						$pdf->setFont('Times', 'B', 8);
						$pdf->Cell(13, 5, strtoupper($totalNoteMatiere), 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
						$pdf->Ln(5);
						$pdf->setFont('Times', '', 9);
					}
					$pdf->SetFont('Times', 'B', 11);
					$totalNote = $classe['totalNote'][$i]['total'];
					$totalCote = $classe['totalNote'][$i]['cote'];
					$totalAppr = $classe['totalNote'][$i]['appr'];
					// $pdf->Cell(153, 5, 'TOTAL / '.$classe['ponderation'], 1, 0, 'C', true);
					// $pdf->Cell(13, 5, $totalNote, 1, 0, 'C', true);
					// $pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
					// $pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
					// $pdf->Ln(15);
					$moyenne = $classe['totalNote'][$i]['moyenne'];
					if($classe['totalNote'][$i]['rank']==1){
						$rank = $classe['totalNote'][$i]['rank'].'st';
					}elseif($classe['totalNote'][$i]['rank']==2){
						$rank = $classe['totalNote'][$i]['rank'].'nd';
					}elseif($classe['totalNote'][$i]['rank']==3){
						$rank = $classe['totalNote'][$i]['rank'].'rd';
					}else{
						$rank = $classe['totalNote'][$i]['rank'].'th';
					}
					$moyenneEleve = substr($moyenne,0,5).' / 20';
					$rang = $rank.' / '.$classe['totalNote'][$i]['evalues'];
					$moyenneGenerale = $classe['totalNote'][$i]['moy_gen'];
					$evalues = $classe['totalNote'][$i]['evalues'];
					// $pdf->Cell(47, 5, 'General Average : '.$moyenneGenerale, 1, 0, 'C');
					// $pdf->Cell(48, 5, utf8_decode('Evaluated : ').$evalues, 1, 0, 'C');
					// $pdf->Cell(50, 5, 'Average : '.$moyenneEleve, 1, 0, 'C', true);
					// $pdf->Cell(50, 5, 'Rank : '.$rang, 1, 0, 'C', true);
					// $pdf->SetFont('Times','BI',9);
					// $pdf->Ln(5);
					// $pdf->Cell(195, 5, strtoupper('General Observation and Remarks'), 1, 1, 'C', true);
					// $pdf->Cell(65, 5, strtoupper('Monthly Observation'), 1, 0, 'C');
					// $pdf->Cell(45, 5, strtoupper('Teacher signature'), 1, 0, 'C');
					// $pdf->Cell(50, 5, strtoupper('Administration signature'), 1, 0, 'C');
					// $pdf->Cell(35, 5, strtoupper('Parent signature'), 1, 0, 'C');
					// $pdf->Ln(5);
					// $pdf->Cell(65, 20, '', 1, 0, 'C');
					// $pdf->Cell(45, 20, '', 1, 0, 'C');
					// $pdf->Cell(50, 20, '', 1, 0, 'C');
					// $pdf->Cell(35, 20, '', 1, 0, 'C');
					// $pdf->Ln(25);
					// $faitA = 'Done at '.ucwords($_SESSION['information']['ville']).' on the '.DATE('d / m / Y');
					// $pdf->Cell(180, 5, $faitA, 0,0,'R');
					// $pdf->Ln(3);
					// $pdf->Cell(180, 5, 'The Director', 0,0,'R');
				}*/
				
				$fileName='Mensual_Report_Marks_';
				$fileName .= str_replace(' ', '_', $infoClasse['libelle_classe']);
				$fileName .= '_'.str_replace(' ', '_',$mois['code_periode_en']);
				$fileName.= '.pdf';
				$pdf->Output($fileName, 'I');
			}
			
			
			// La section Francophone
			elseif($classe['section']=='fr'){
				// Un bulletin par élève
				/*$eleve = $classe['eleve'];
				$infoClasse = $classe['infoClasse'];
				$mois = $classe['moisCourant'];*/
				/*for($i=0;$i<count($eleve);$i++){
					$pdf->addPage();
					$pdf->Entete();
					$idEleve = $eleve[$i]['id'];
					$photo = $eleve[$i]['photo'];
					if($photo=='images/student/' or $photo==''){
						$image = 'images/student/no_name.png';
					}else{
						$image = $photo;
					}
					// ENTÊTE DU BULLETIN 
					$pdf->SetFont('Times','',13);
					$pdf->Image($image, 180, 65, 15);
					$pdf->Text(20,75,'Niveau : ');
					$pdf->Text(60,75,'Classe : ');
					$pdf->Text(100,75,'Mois : ');
					$pdf->Text(20,80,"Eleve : ");
					$pdf->Text(20,85,'Enseignant(e): ');
					$pdf->SetFont('Times','B',13);
					$pdf->Text(35,75,$infoClasse['niveau_classe']);
					$pdf->Text(75,75,$pdf->convert(strtoupper($infoClasse['libelle_classe'])));
					$pdf->Text(115,75, $pdf->convert(strtoupper($mois['code_periode_fr'])));
					$pdf->Text(50,80,stripslashes($eleve[$i]['nom_complet']));
					$pdf->SetFont('Times','BI',12);
					$pdf->Text(50,85, $classe['enseignant']['nom']);
					$pdf->Ln(30);

					
					// Entête du Tableau 
					$pdf->setFont('Times', 'B', 8);
					$pdf->Cell(75, 5, strtoupper($pdf->convert('Matiere')), 1, 0, 'C', true);
					$pdf->Cell(10, 5, 'PTS', 1, 0, 'C', true);
					for($a=0;$a<count($classe['listeSousMatiereAll']); $a++){
						$pdf->setFont('Times', 'B', 6);
						$cle = 'libelle_sous_competence_'.$classe['section'];
						$sousMatiere = $classe['listeSousMatiereAll'][$a][$cle];
						$pdf->Cell(17, 5, strtoupper($sousMatiere), 1, 0, 'C', true);
					}
					$pdf->Cell(13, 5, strtoupper('Total'), 1, 0, 'C', true);
					$pdf->Cell(13, 5, strtoupper('Cote'), 1, 0, 'C', true);
					$pdf->Cell(13, 5, strtoupper('Appr'), 1, 0, 'C', true);
					$pdf->Ln(5);			
					
					// GESTION DES MATIERES 
					$listeMatiere = $classe['listeMatiere'];
					for($b=0;$b<count($listeMatiere);$b++){
						$ponderationMatiere = $classe['ponderationMatiere'];
						$pdf->SetFont('Times','',8);
						$cleCompetence = 'libelle_competence_'.$classe['section'];
						$codeMatiere = $listeMatiere[$b]['code_competence'];
						$idMatiere = $listeMatiere[$b]['id_competence'];
						$libelleMatiere = strtoupper($listeMatiere[$b][$cleCompetence]);
						$pdf->Cell(75, 5, substr($libelleMatiere,0,46), 1, 0, 'L');
						$pdf->Cell(10, 5, $ponderationMatiere[$idEleve][$idMatiere], 1, 0, 'C');
						$nbSousMatiereAll = count($classe['listeSousMatiereAll']);
						$noteEleve = $classe['note'][$idEleve][$idMatiere];
						$nbSousMatiere = count($noteEleve);
						$a = 1;
						for($c=0;$c<$nbSousMatiere;$c++){
							// $noteObtenue = $noteEleve[$c]['note'];
							// $pdf->Cell(17, 5, $noteObtenue, 1, 0, 'C');							
							$pdf->Cell(17, 5, $noteEleve[$c]['note'], 1, 0, 'C');							
						}

						if($classe['totalNote'][$i]['eleve']==$eleve[$i]['id']){
							$cleCote = $codeMatiere.'_cote';
							$cleAppr = $codeMatiere.'_appr';
							$totalNoteMatiere = $classe['totalNote'][$i][$codeMatiere];
							$totalCote = $classe['totalNote'][$i][$cleCote];
							$totalAppr = $classe['totalNote'][$i][$cleAppr];
							
						}
						$pdf->setFont('Times', 'B', 8);
						$pdf->Cell(13, 5, strtoupper($totalNoteMatiere), 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
						$pdf->Ln(5);
						$pdf->setFont('Times', '', 9);
					}
					$pdf->SetFont('Times', 'B', 11);
					$totalNote = $classe['totalNote'][$i]['total'];
					$totalCote = $classe['totalNote'][$i]['cote'];
					$totalAppr = $classe['totalNote'][$i]['appr'];
					$pdf->Cell(153, 5, 'TOTAL / '.$classe['ponderation'], 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalNote, 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
					$pdf->Ln(15);
					$moyenne = $classe['totalNote'][$i]['moyenne'];
					if($classe['totalNote'][$i]['rank']!=NULL){
						if($classe['totalNote'][$i]['rank']==1){
							$rank = $classe['totalNote'][$i]['rank'].'er';
						}elseif($classe['totalNote'][$i]['rank']!=1){
							$rank = $classe['totalNote'][$i]['rank'].'eme';
						}
					}else{$rank = NULL;}
					$moyenneEleve = substr($moyenne,0,5).' / 20';
					$rang = $rank.' / '.$classe['totalNote'][$i]['evalues'];
					$moyenneGenerale = $classe['totalNote'][$i]['moy_gen'];
					$evalues = $classe['totalNote'][$i]['evalues'];
					$pdf->Cell(47, 5, 'Moy. Generale : '.$moyenneGenerale, 1, 0, 'C');
					$pdf->Cell(48, 5, utf8_decode('Effectif Evalué : ').$evalues, 1, 0, 'C');
					$pdf->Cell(50, 5, 'Moyenne : '.$moyenneEleve, 1, 0, 'C', true);
					$pdf->Cell(50, 5, 'Rang : '.$rang, 1, 0, 'C', true);
					$pdf->SetFont('Times','BI',9);
					$pdf->Ln(5);
					$pdf->Cell(195, 5, strtoupper('Observations Generales et Remarques'), 1, 1, 'C', true);
					$pdf->Cell(65, 5, strtoupper('Observation Mensuelle'), 1, 0, 'C');
					$pdf->Cell(45, 5, strtoupper('signature enseignant'), 1, 0, 'C');
					$pdf->Cell(50, 5, strtoupper('signature administration'), 1, 0, 'C');
					$pdf->Cell(35, 5, strtoupper('signature parent'), 1, 0, 'C');
					$pdf->Ln(5);
					$pdf->Cell(65, 20, '', 1, 0, 'C');
					$pdf->Cell(45, 20, '', 1, 0, 'C');
					$pdf->Cell(50, 20, '', 1, 0, 'C');
					$pdf->Cell(35, 20, '', 1, 0, 'C');
					$pdf->Ln(25);
					$faitA = 'Fait a '.ucwords($_SESSION['information']['ville']).' le '.DATE('d / m / Y');
					$pdf->Cell(180, 5, $faitA, 0,0,'R');
					$pdf->Ln(3);
					$pdf->Cell(180, 5, 'La Directrice ', 0,0,'R');
				}*/
				
				$fileName='Bulletin_mensuel_';
				$fileName .= str_replace(' ', '_', $infoClasse['libelle_classe']);
				$fileName .= '_'.str_replace(' ', '_',$mois['code_periode_fr']);
				$fileName.= '.pdf';
				$pdf->Output($fileName, 'I');
			} 
			
			$pdf->setAuthor('Nyambi Computer Services');
			$pdf->Output($fileName, 'I');
			
			
			
			
		}




		elseif($_SESSION['print']=='bulletinTrimestre'){
			$classe = $_SESSION['classe'];
			if($classe['section']=='fr'){
				
				// Un bulletin par élève
				$eleve = $classe['eleve'];
				$infoClasse = $classe['infoClasse'];
				$trimestre = $classe['moisCourant'];
				for($i=0;$i<count($eleve);$i++){
					
					
					// GESTION DES MATIERES 
					$listeMatiere = $classe['listeMatiere'];
					for($b=0;$b<count($listeMatiere);$b++){
						/*$ponderationMatiere = $classe['ponderationMatiere'];
						$pdf->SetFont('Times','',8);
						$cleCompetence = 'libelle_competence_'.$classe['section'];
						$codeMatiere = $listeMatiere[$b]['code_competence'];
						$idMatiere = $listeMatiere[$b]['id_competence'];
						$libelleMatiere = strtoupper($listeMatiere[$b][$cleCompetence]);
						$pdf->Cell(75, 5, substr($libelleMatiere,0,46), 1, 0, 'L');
						$pdf->Cell(10, 5, $ponderationMatiere[$idEleve][$idMatiere], 1, 0, 'C');
						$nbSousMatiereAll = count($classe['listeSousMatiereAll']);
						$noteEleve = $classe['note'][$idEleve][$idMatiere];
						$nbSousMatiere = count($noteEleve);
						$a = 1;*/
						/*for($c=0;$c<$nbSousMatiere;$c++){
							// $noteObtenue = $noteEleve[$c]['note'];
							// $pdf->Cell(17, 5, $noteObtenue, 1, 0, 'C');							
							$pdf->Cell(17, 5, $noteEleve[$c]['note'], 1, 0, 'C');							
						}*/

						/*if($classe['totalNote'][$i]['eleve']==$eleve[$i]['id']){
							$cleCote = $codeMatiere.'_cote';
							$cleAppr = $codeMatiere.'_appr';
							$totalNoteMatiere = $classe['totalNote'][$i][$codeMatiere];
							$totalCote = $classe['totalNote'][$i][$cleCote];
							$totalAppr = $classe['totalNote'][$i][$cleAppr];
							
						}*/
						/*$pdf->setFont('Times', 'B', 8);
						$pdf->Cell(13, 5, strtoupper($totalNoteMatiere), 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
						$pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
						$pdf->Ln(5);
						$pdf->setFont('Times', '', 9);*/
					}
					/*$pdf->SetFont('Times', 'B', 11);
					$totalNote = $classe['totalNote'][$i]['total'];
					$totalCote = $classe['totalNote'][$i]['cote'];
					$totalAppr = $classe['totalNote'][$i]['appr'];
					$pdf->Cell(153, 5, 'TOTAL / '.$classe['ponderation'], 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalNote, 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalCote, 1, 0, 'C', true);
					$pdf->Cell(13, 5, $totalAppr, 1, 0, 'C', true);
					$pdf->Ln(15);*/
					/*$moyenne = $classe['totalNote'][$i]['moyenne'];*/
					/*if($classe['totalNote'][$i]['rank']!=NULL){*/
						/*if($classe['totalNote'][$i]['rank']==1){
							$rank = $classe['totalNote'][$i]['rank'].'er';
						}elseif($classe['totalNote'][$i]['rank']!=1){
							$rank = $classe['totalNote'][$i]['rank'].'eme';
						}*/
					/*}else{$rank = NULL;}*/
					/*$moyenneEleve = substr($moyenne,0,5).' / 20';
					$rang = $rank.' / '.$classe['totalNote'][$i]['evalues'];
					$moyenneGenerale = $classe['totalNote'][$i]['moy_gen'];
					$evalues = $classe['totalNote'][$i]['evalues'];
					$pdf->Cell(47, 5, 'Moy. Generale : '.$moyenneGenerale, 1, 0, 'C');
					$pdf->Cell(48, 5, utf8_decode('Effectif Evalué : ').$evalues, 1, 0, 'C');
					$pdf->Cell(50, 5, 'Moyenne : '.$moyenneEleve, 1, 0, 'C', true);
					$pdf->Cell(50, 5, 'Rang : '.$rang, 1, 0, 'C', true);
					$pdf->SetFont('Times','BI',9);
					$pdf->Ln(5);
					$pdf->Cell(195, 5, strtoupper('Observations Generales et Remarques'), 1, 1, 'C', true);
					$pdf->Cell(65, 5, strtoupper('Observation Mensuelle'), 1, 0, 'C');
					$pdf->Cell(45, 5, strtoupper('signature enseignant'), 1, 0, 'C');
					$pdf->Cell(50, 5, strtoupper('signature administration'), 1, 0, 'C');
					$pdf->Cell(35, 5, strtoupper('signature parent'), 1, 0, 'C');
					$pdf->Ln(5);
					$pdf->Cell(65, 20, '', 1, 0, 'C');
					$pdf->Cell(45, 20, '', 1, 0, 'C');
					$pdf->Cell(50, 20, '', 1, 0, 'C');
					$pdf->Cell(35, 20, '', 1, 0, 'C');
					$pdf->Ln(25);
					$faitA = 'Fait a '.ucwords($_SESSION['information']['ville']).' le '.DATE('d / m / Y');
					$pdf->Cell(180, 5, $faitA, 0,0,'R');
					$pdf->Ln(3);
					$pdf->Cell(180, 5, 'La Directrice ', 0,0,'R');*/
				}
				
				/*$fileName='Bulletin_mensuel_';
				$fileName .= str_replace(' ', '_', $infoClasse['libelle_classe']);
				$fileName .= '_'.str_replace(' ', '_',$mois['code_periode_fr']);
				$fileName.= '.pdf';
				$pdf->Output($fileName, 'I');*/
			
			}
			$pdf->bulletinTrimestre($classe);
			$fileName = 'bulletin.pdf';
			$pdf->Output($fileName, 'I');
		}
		
		if($_SESSION['print']=='vueEffectif'){
			$classe = $_SESSION['classe'];
			$pdf->addPage();
			$pdf->Entete();
			$titre = "Vue d'ensemble des effectifs";
			$pdf->Titre($titre);
			
			$pdf->SetFont('Times','B',10);
			$pdf->Cell(14, 7, utf8_decode('N°'), 1, 0 , 'C', true);
			$pdf->Cell(60, 7, 'Nom de la Classe', 1, 0 , 'C', true);
			$pdf->Cell(30, 7, 'Masculin', 1, 0 , 'C', true);
			$pdf->Cell(30, 7, 'Feminin', 1, 0 , 'C', true);
			$pdf->Cell(35, 7, 'Total', 1, 0 , 'C', true);
			$pdf->Ln(7);
			$a = 1;
			for($i=0;$i<count($classe['classe']);$i++){
				$masculin = $classe['statistique'][$i]['G'];
				$feminin = $classe['statistique'][$i]['F'];
				$total = $classe['statistique'][$i]['T'];
				$totalMasc[] = $masculin;
				$totalFem[] = $feminin;
				$totalGen[] = $total;
				$pdf->SetFont('Times','',10);
				$pdf->Cell(14, 7, $a, 1, 0 , 'C');
				$pdf->Cell(60, 7, strtoupper($classe['classe'][$i]), 1, 0 , 'C');
				$pdf->Cell(30, 7, $masculin, 1, 0 , 'C');
				$pdf->Cell(30, 7, $feminin, 1, 0 , 'C');
				$pdf->Cell(35, 7, $total, 1, 0 , 'C');
				$pdf->Ln(7);
				$a++;
			}
			$totalMasculin = array_sum($totalMasc);
			$totalFeminin = array_sum($totalFem);
			$totalGeneral = array_sum($totalGen);
			$pdf->Cell(74, 7, 'TOTAL', 1,0,'C', true);
			$pdf->Cell(30, 7, $totalMasculin, 1, 0 , 'C', true);
			$pdf->Cell(30, 7, $totalFeminin, 1, 0 , 'C',true);
			$pdf->Cell(35, 7, $totalGeneral, 1, 0 , 'C',true);
			
			$fileName='vue_d_ensemble_des_effectifs';
			$fileName.= '.pdf';
			$pdf->setAuthor('Nyambi Computer Services');
			$pdf->Output($fileName, 'I');
		}
	}
	
	
	else{
		$pdf->addPage();
		$titre = 'No data Sent';
		// $pdf->Titre($titre);
		$pdf->SetFont('Times','B',35);
		$pdf->Text(70,100,'No Data Sent');
		$nomFichier = 'NoData.pdf';
		$pdf->setAuthor('Nyambi Computer Services');
		$pdf->Output($nomFichier, 'I');
	}
	
	
	
	
	
	unset($_SESSION['print']);
	unset($_SESSION['classe']);
	unset($_SESSION['releve']);
	unset($_SESSION['eleve']);
	