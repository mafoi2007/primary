<?php 
	session_start();
	require_once('inc/pdfL.class.php');
	$pdf = new pdf('L', 'mm', 'A4');
	$pdf->SetFillColor(200, 205, 180);
	
	
	
	
	
	
	if(isset($_SESSION['print'])){
		if($_SESSION['print']=='releveEleve'){
			$classe = $_SESSION['releve'];
			
			// La page doit s'afficher en fonction de la section 
			if($classe['section']=='en'){
				$pdf->addPage();
				$pdf->Entete();
				$titre = 'Reported Marks of ';
				$titre.= $classe['sousMatiere'][0]['libelle_classe'];
				$pdf->Titre($titre);
				$subject = 'Subject : '.$classe['sousMatiere'][0]['libelle_competence_en'];
				$pdf->SousTitre($subject);
				$pdf->Cell(10, 6, $pdf->convert('Term : ____________________'), 0, 0 , 'L');
				$pdf->Ln(7);
				$pdf->SetFont('Times','BI',8);
				$pdf->Cell(10, 12, $pdf->convert('N°'), 1, 0 , 'C',true);
				$pdf->Cell(65, 12, $pdf->convert('Full Name'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Month 1'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Month 2'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Month 3'), 1, 0 , 'C',true);
				$pdf->Ln(6);
				$pdf->Cell(10,12,'',0,0,'C');
				$pdf->Cell(65,12,'',0,0,'C');
				for($i=0;$i<3;$i++){
					$nbMat = count($classe['sousMatiere'])+1;
					$cell = 69 / $nbMat;
					$pdf->SetFont('Times','BI',6);
					for($j=0;$j<count($classe['sousMatiere']);$j++){
						$matiere = $classe['sousMatiere'][$j]['libelle_sous_competence_en'];
						$total[$j] = $classe['sousMatiere'][$j]['nb_point'];
						$point = $classe['sousMatiere'][$j]['nb_point'];
						$pdf->Cell($cell,6,$pdf->convert(ucwords($matiere).' / '.$point),1,0,'C',true);
					}
					$pdf->SetFont('Times','BI',8);
					$totalMatiere = array_sum($total);
					$pdf->Cell($cell,6, $pdf->convert('Total / '.$totalMatiere),1,0,'C',true);
				}
				$pdf->Ln(6);
				$a = 1;
				$pdf->SetFont('Times','',8);
				for($k=0;$k<count($classe['eleve']);$k++){
					$nomEleve = strtoupper($classe['eleve'][$k]['nom_complet']);
					$pdf->Cell(10, 6, $pdf->convert($a), 1, 0 , 'C');
					$pdf->Cell(65, 6, $pdf->convert($nomEleve), 1, 0 , 'L');
					for($l=0;$l<3;$l++){
						$nbMat = count($classe['sousMatiere'])+1;
						$cell = 69 / $nbMat;
						for($m=0;$m<count($classe['sousMatiere']);$m++){
							$pdf->Cell($cell,6,'',1,0,'C');
						}
						$pdf->Cell($cell,6,$pdf->convert(''),1,0,'C',true);
					}
					
					$pdf->Ln(6);
					$a++;
				}
								
				$fileName=strtoupper('reported_marks_');
				$fileName.= strtoupper(str_replace(' ','_',$classe['sousMatiere'][0]['libelle_classe']));
				$fileName.= '_'.strtoupper(str_replace(' ','_',$classe['sousMatiere'][0]['libelle_competence_en']));
				$fileName.= '.pdf';
			}
			elseif($classe['section']=='fr'){
				$pdf->addPage();
				$pdf->Entete();
				$titre = 'Releve de Notes de ';
				$titre.= $classe['sousMatiere'][0]['libelle_classe'];
				$pdf->Titre($titre);
				$subject = 'Matiere : '.$classe['sousMatiere'][0]['libelle_competence_fr'];
				$pdf->SousTitre($subject);
				$pdf->Cell(10, 6, $pdf->convert('Trimestre : ____________________'), 0, 0 , 'L');
				$pdf->Ln(7);
				$pdf->SetFont('Times','BI',8);
				$pdf->Cell(10, 12, $pdf->convert('N°'), 1, 0 , 'C',true);
				$pdf->Cell(65, 12, $pdf->convert('Nom Complet'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Mois 1'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Mois 2'), 1, 0 , 'C',true);
				$pdf->Cell(69, 6, $pdf->convert('Mois 3'), 1, 0 , 'C',true);
				$pdf->Ln(6);
				$pdf->Cell(10,12,'',0,0,'C');
				$pdf->Cell(65,12,'',0,0,'C');
				for($i=0;$i<3;$i++){
					$nbMat = count($classe['sousMatiere'])+1;
					$cell = 69 / $nbMat;
					$pdf->SetFont('Times','BI',6);
					for($j=0;$j<count($classe['sousMatiere']);$j++){
						$matiere = $classe['sousMatiere'][$j]['libelle_sous_competence_fr'];
						$total[$j] = $classe['sousMatiere'][$j]['nb_point'];
						$point = $classe['sousMatiere'][$j]['nb_point'];
						$pdf->Cell($cell,6,$pdf->convert(ucwords($matiere).' / '.$point),1,0,'C',true);
					}
					$pdf->SetFont('Times','BI',8);
					$totalMatiere = array_sum($total);
					$pdf->Cell($cell,6, $pdf->convert('Total / '.$totalMatiere),1,0,'C',true);
				}
				$pdf->Ln(6);
				$a = 1;
				$pdf->SetFont('Times','',8);
				for($k=0;$k<count($classe['eleve']);$k++){
					$nomEleve = strtoupper($classe['eleve'][$k]['nom_complet']);
					$pdf->Cell(10, 6, $pdf->convert($a), 1, 0 , 'C');
					$pdf->Cell(65, 6, $pdf->convert($nomEleve), 1, 0 , 'L');
					for($l=0;$l<3;$l++){
						$nbMat = count($classe['sousMatiere'])+1;
						$cell = 69 / $nbMat;
						for($m=0;$m<count($classe['sousMatiere']);$m++){
							$pdf->Cell($cell,6,'',1,0,'C');
						}
						$pdf->Cell($cell,6,$pdf->convert(''),1,0,'C',true);
					}
					
					$pdf->Ln(6);
					$a++;
				}
								
				$fileName=strtoupper('releve_Notes_');
				$fileName.= strtoupper(str_replace(' ','_',$classe['sousMatiere'][0]['libelle_classe']));
				$fileName.= '_'.strtoupper(str_replace(' ','_',$classe['sousMatiere'][0]['libelle_competence_fr']));
				$fileName.= '.pdf';
			} 
			
			$pdf->setAuthor('Nyambi Computer Services');
			$pdf->Output($fileName, 'I');
			
			
			
			
		}



		elseif($_SESSION['print']=='statistiqueMensuelle'){
			$pdf->addPage();
			$pdf->Entete();
			$information = $_SESSION['info'];
			$section = $information['section'];
			$titre['fr'] = 'Statistiques Mensuelles du Mois '.$information['mois'];
			$titre['en'] = 'Monthly statistic of Month '.$information['mois'];
			$classeTitle['fr'] = 'Classe';
			$classeTitle['en'] = 'Class';
			$enseignantTitle['fr'] = 'Enseignant';
			$enseignantTitle['en'] = 'Teacher';
			$effectifTitle['fr'] = 'Effectif';
			$effectifTitle['en'] = 'Roll';
			$evalueTitle['fr'] = 'Evalués';
			$evalueTitle['en'] = 'Evaluated';
			$moyenneTitle['fr'] = 'Nb Moyenne';
			$moyenneTitle['en'] = 'Nb of Aver.';
			$sousMoyenneTitle['fr'] = 'Nb Sous Moy.';
			$sousMoyenneTitle['en'] = 'Nb of Sub Aver.';
			$tauxTitle['fr'] = 'Pourcentage';
			$tauxTitle['en'] = 'Percentage';
			$masculinTitle['fr'] = 'M';
			$masculinTitle['en'] = 'M';
			$femininTitle['fr'] = 'F';
			$femininTitle['en'] = 'F';
			$totalTitle['fr'] = 'T';
			$totalTitle['en'] = 'T';

			$pdf->Titre($titre[$section]);
			$pdf->SetFont('Times','B',14);
			$pdf->Ln(6);
			$pdf->Cell(10, 12, utf8_decode('N°'), 1, 0, 'C', true);
			$pdf->Cell(35, 12, utf8_decode($classeTitle[$section]), 1, 0, 'C', true);
			$pdf->Cell(45, 6, utf8_decode($effectifTitle[$section]), 1, 0, 'C', true);
			$pdf->Cell(45, 6, utf8_decode($evalueTitle[$section]), 1, 0, 'C', true);
			$pdf->Cell(45, 6, utf8_decode($moyenneTitle[$section]), 1, 0, 'C', true);
			$pdf->Cell(45, 6, utf8_decode($sousMoyenneTitle[$section]), 1, 0, 'C', true);
			$pdf->Cell(45, 6, utf8_decode($tauxTitle[$section]), 1, 0, 'C', true);
			$pdf->Ln(6);
			$pdf->Cell(45);
			for($a=0;$a<5;$a++){
				$pdf->Cell(15, 6, utf8_decode($femininTitle[$section]), 1, 0, 'C',true);
				$pdf->Cell(15, 6, utf8_decode($masculinTitle[$section]), 1, 0, 'C', true);
				$pdf->Cell(15, 6, utf8_decode($totalTitle[$section]), 1, 0, 'C',true);
			}
			$pdf->Ln(6);
			$pdf->SetFont('Times','',14);
			$a = 1;
			for($i=0;$i<count($information['classe']);$i++){
				$classe = $information['classe'];
				$idClasse = $classe[$i]['classe'];
				$effectif = $information['effectif'][$idClasse];
				$evalue = $information['evalues'][$idClasse];
				$moyennes = $information['moyennes'][$idClasse];
				$sousMoyenneFille = $evalue['feminin'] - $moyennes['feminin'];
				$sousMoyenneGarcon = $evalue['masculin'] - $moyennes['masculin'];
				$sousMoyenneTotal = $sousMoyenneFille + $sousMoyenneGarcon;
				if($evalue['masculin']!=0){
					$tauxMasc = $moyennes['masculin'] * 100 / $evalue['masculin'];
				}else{$tauxMasc ='';}
				if($evalue['feminin']!=0){
					$tauxFem =  $moyennes['feminin'] * 100 / $evalue['feminin'];
				}else{
					$tauxFem = '';
				}
				if($evalue['total']!=0){
					$tauxTot =  $moyennes['total'] * 100 / $evalue['total'];
				}else{
					$tauxTot = '';
				}
				$pdf->Cell(10, 6, utf8_decode($a), 1, 0, 'C');
				$pdf->Cell(35, 6, strtoupper(utf8_decode($classe[$i]['libelle_classe'])), 1, 0, 'L');
				$pdf->Cell(15, 6, utf8_decode($effectif['F']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($effectif['G']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($effectif['T']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($evalue['feminin']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($evalue['masculin']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($evalue['total']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($moyennes['feminin']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($moyennes['masculin']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($moyennes['total']), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($sousMoyenneFille), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($sousMoyenneGarcon), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode($sousMoyenneTotal), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode(substr($tauxFem,0,5)), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode(substr($tauxMasc,0,5)), 1, 0, 'C');
				$pdf->Cell(15, 6, utf8_decode(substr($tauxTot,0,5)), 1, 0, 'C');
				$pdf->Ln(6);
				$effFille[] = $effectif['F'];
				$effMasculin[] = $effectif['G'];
				$effTotal[] = $effectif['T'];
				$evalF[] = $evalue['feminin'];
				$evalM[] = $evalue['masculin'];
				$evalT[] = $evalue['total'];
				$moyM[] = $moyennes['masculin'];
				$moyF[] = $moyennes['feminin'];
				$moyT[] = $moyennes['total'];
				$sMoyF[]= $sousMoyenneFille;
				$sMoyM[]= $sousMoyenneGarcon;
				$sMoyT[] = $sousMoyenneTotal;
				$a++;
			}
			$pdf->SetFont('Times','B',14);
			$tauxM =  array_sum($moyM) * 100 / array_sum($evalM);
			$tauxF = array_sum($moyF) * 100 / array_sum($evalF);
			$tauxT = array_sum($moyT) * 100 / array_sum($evalT);
			$pdf->Cell(45, 6, strtoupper(utf8_decode('Total')), 1, 0, 'C', true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($effFille)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($effMasculin)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($effTotal)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($evalF)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($evalM)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($evalT)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($moyF)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($moyM)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($moyT)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($sMoyF)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($sMoyM)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(array_sum($sMoyT)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(substr($tauxF,0,5)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(substr($tauxM,0,5)), 1, 0, 'C',true);
			$pdf->Cell(15, 6, utf8_decode(substr($tauxT,0,5)), 1, 0, 'C',true);

			$fileName='Statistiques_'.$section.'_mois_'.$information['mois'].'.pdf';
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
	unset($_SESSION['info']);
	