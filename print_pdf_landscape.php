<?php 
	session_start();
	require_once('inc/pdfL.class.php');
	
	$pdf = new pdf('L', 'mm', 'A4');
	
	
	
	
	
	
	if(isset($_SESSION['print'])){
		if($_SESSION['print']=='releveEleve'){
			$classe = $_SESSION['releve'];
			$pdf->SetFillColor(155, 150, 149);
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
	