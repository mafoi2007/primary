<?php 
	$data[] = "INSERT INTO 
				 annee_scolaire(libelle_pays_fr,
								libelle_pays_en,
								libelle_devise_fr,
								libelle_devise_en,
								libelle_ministere_fr,
								libelle_ministere_en,
								region,
								departement,
								arrondissement,
								ville,
								nom_etablissement_fr,
								nom_etablissement_en,
								contact,
								email,
								boite_postale,
								sexe,
								nom_chef,
								type_etablissement,
								libelle_annee,
								statut)
				 VALUES('$paysFr',
						'$paysEn',
						'$deviseFr',
						'$deviseEn',
						'$ministereFr',
						'$ministereEn',
						'$region',
						'$departement',
						'$arrondissement',
						'$ville',
						'$etablissementFr',
						'$etablissementEn',
						'$contact',
						'$email',
						'$bp',
						'$sexe',
						'$chef',
						'$typeEts',
						'$anneeScolaire',
						'actif')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet) 
				VALUES('CNA',
						'SNA',
						'D',
						'0',
						'10')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)	
				VALUES('CMA',
						'SAA',
						'C',
						'10',
						'12')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)
				VALUES('CA',
						'SA',
						'C+',
						'12',
						'14')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)
				VALUES('CBA',
						'SWA',
						'B',
						'14',
						'15')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)
				VALUES('CBA',
						'SWA',
						'B+',
						'15',
						'16')";
	$data[] = "INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)
				VALUES('CTBA',
						'CVWA',
						'A',
						'16',
						'18')";
	$data[] = 	"INSERT INTO 
				appreciation(libelle_appreciation_fr,
							libelle_appreciation_en,
							cote,
							interv_ouvert,
							interv_fermet)			
				VALUES('CTBA',
						'CVWA',
						'A+',
						'18',
						'20')";
	$mdpCell = sha1('cellule');
	$mdpAdmin = sha1('administrateur');					
	
	$data[] = "INSERT INTO enseignant(nom, 
										sexe, 
										type_utilisateur, 
										login,
										password, 
										etat) 
							VALUES('Cellule Informatique',
									'M',
									'2',
									'cellule',
									'$mdpCell',
									'actif')";
	$data[] = "INSERT INTO enseignant(nom, 
										sexe, 
										type_utilisateur, 
										login,
										password, 
										etat) 
				VALUES('Administrateur Systeme',
									'M',
									'1',
									'administrateur',
									'$mdpAdmin',
									'actif')";		
	// On charge les classes en fonction du type choisi de l'établissement 
	if($typeEts=='bil'){
		$data[] = "INSERT INTO section(code_section, libelle_section)
					VALUES('fr','Section Francophone')";
		$data[] = "INSERT INTO section(code_section, libelle_section)
					VALUES('en','Section Anglophone')";
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','sil','sil','1','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cp','cp','2','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','ce 1','ce1','3','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','ce 2','ce2','4','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cm 1','cm1','5','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cm 2','cm2','6','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 1','class1','1','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 2','class2','2','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 3','class3','3','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 4','class4','4','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 5','class5','5','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 6','class6','6','actif')";*/
	}elseif($typeEts=='fr'){
		$data[] = "INSERT INTO section(code_section, libelle_section)
					VALUES('fr','Section Francophone')";
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','sil','sil','1','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cp','cp','2','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','ce 1','ce1','3','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','ce 2','ce2','4','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cm 1','cm1','5','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('fr','cm 2','cm2','6','actif')";	*/	
	}elseif($typeEts=='en'){
		$data[] = "INSERT INTO section(code_section, libelle_section)
					VALUES('en','Section Anglophone')";
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 1','class1','1','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 2','class2','2','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 3','class3','3','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 4','class4','4','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 5','class5','5','actif')";*/
		/*$data[] = "INSERT INTO classe(section, 
									libelle_classe, 
									code_classe, 
									niveau_classe,
									etat_classe) 
					VALUES('en','class 6','class6','6','actif')";*/
	}		
	
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('francais','communiquer en francais','communicate in french','actif')";	
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('english','communiquer en anglais','communicate in English','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('langue','pratiquer une langue nationale','communicate in one national language','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('maths','utiliser les notions de base en mathematiques','use basic notions in mathematics','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('science','utiliser les notions de base en sciences et technologies','use basic notion in science and technology','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('social','pratiquer les valeurs sociales','practise social values','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('citoyen','pratiquer les valeurs citoyennes','practise citizenship values','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('esprit','demontrer lautonomie lesprit dinitiative et creativite','demonstrate autonomy, spirit of initiative','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('info','utiliser les concepts de base et les outils TIC','use basic concept and tools of ICT','actif')";				
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('sportapte','pratiquer les activites physiques sportives pour les aptes','practise sport and physical activities','actif')";
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('sportinapte','pratiquer les activites physiques sportives pour les inaptes','practise physical and sports for the physically challenged','actif')";		
	$data[] = "INSERT INTO liste_competence(code_competence, libelle_competence_fr,
												libelle_competence_en, statut_competence)
				VALUES('art','pratiquer les activites artistiques','practise artistic activities','actif')";
	$data[] = "INSERT INTO liste_sous_competence(code_sous_competence,
													libelle_sous_competence_fr,
													libelle_sous_competence_en,
													statut_sous_competence) 
							VALUES('oral','oral','oral','actif')";
	$data[] = "INSERT INTO liste_sous_competence(code_sous_competence,
													libelle_sous_competence_fr,
													libelle_sous_competence_en,
													statut_sous_competence) 
							VALUES('ecrit','ecrit','written','actif')";
	$data[] = "INSERT INTO liste_sous_competence(code_sous_competence,
													libelle_sous_competence_fr,
													libelle_sous_competence_en,
													statut_sous_competence) 
							VALUES('prat','pratique','practical','actif')";
	$data[] = "INSERT INTO liste_sous_competence(code_sous_competence,
													libelle_sous_competence_fr,
													libelle_sous_competence_en,
													statut_sous_competence) 
							VALUES('se','savoir - etre','attitude','actif')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua1','September', 'Septembre')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua2','October', 'Octobre')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua3','November', 'Novembre')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua4','December','Décembre')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)	
						VALUES('ua5','January','Janvier')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua6','February','Février')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)
						VALUES('ua7','March','Mars')";
	$data[] = "INSERT INTO periode(libelle_periode, code_periode_en, code_periode_fr)	
						VALUES('ua8','April', 'Avril')";
							
	$data[] = "INSERT INTO type_utilisateur(code_poste, libelle_poste)
					VALUES('administrateur','Administrateur Systeme')";
	$data[] = "INSERT INTO type_utilisateur(code_poste, libelle_poste)
					VALUES('cellule','Cellule Informatique')";
	$data[] = "INSERT INTO type_utilisateur(code_poste, libelle_poste)
					VALUES('enseignant','Maitre de la Classe')";
	
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('1','Niveau 1','Level 1')";
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('2','Niveau 2','Level 2')";
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('3','Niveau 3','Level 3')";
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('4','Niveau 4','Level 4')";
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('5','Niveau 5','Level 5')";
	$data[] = "INSERT INTO niveau(code_niveau, libelle_niveau_fr, libelle_niveau_en)
				VALUES('6','Niveau 6','Level 6')";
	
	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 1 *********************************
	***************************************************************************
	**************************************************************************/
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','1','1',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','1','4',5)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','2','1',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','2','4',5)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','3','2',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','3','3',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','4','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','4','2',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','4','4',5)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','5','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','5','2',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','5','3',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','5','4',5)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','6','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','6','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','7','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','7','2',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','7','3',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','7','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','8','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','8','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','9','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','9','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','9','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','9','4',6)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','10','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','10','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','10','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','11','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','11','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','12','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','12','2',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','12','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('1','12','4',2)";



	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 2 *********************************
	***************************************************************************
	**************************************************************************/
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','1','1',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','1','4',5)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','2','1',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','2','4',5)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','3','2',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','3','3',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','4','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','4','2',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','4','4',5)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','5','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','5','2',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','5','3',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','5','4',5)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','6','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','6','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','7','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','7','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','7','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','7','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','8','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','8','3',11)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','9','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','9','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','9','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','9','4',6)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','10','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','10','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','10','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','11','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','11','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','12','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','12','2',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','12','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('2','12','4',2)";

	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 3 *********************************
	***************************************************************************
	**************************************************************************/
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','1','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','1','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','2','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','2','4',3)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','3','2',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','3','3',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','4','1',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','4','2',28)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','4','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','5','1',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','5','2',7)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','5','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','5','4',7)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','6','2',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','6','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','7','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','7','2',9)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','7','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','7','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','8','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','8','3',11)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','9','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','9','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','9','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','9','4',6)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','10','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','10','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','10','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','11','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','11','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','12','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','12','2',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','12','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('3','12','4',2)";
	
	
	
	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 4 *********************************
	***************************************************************************
	**************************************************************************/
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','1','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','1','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','2','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','2','4',3)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','3','2',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','3','3',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','4','1',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','4','2',28)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','4','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','5','1',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','5','2',7)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','5','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','5','4',7)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','6','2',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','6','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','7','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','7','2',9)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','7','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','7','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','8','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','8','3',11)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','9','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','9','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','9','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','9','4',6)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','10','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','10','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','10','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','11','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','11','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','12','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','12','2',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','12','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('4','12','4',2)";
	
	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 5 *********************************
	***************************************************************************
	**************************************************************************/
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','1','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','1','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','2','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','2','4',3)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','3','2',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','3','3',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','4','1',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','4','2',28)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','4','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','5','1',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','5','2',7)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','5','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','5','4',7)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','6','2',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','6','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','7','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','7','2',9)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','7','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','7','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','8','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','8','3',11)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','9','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','9','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','9','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','9','4',6)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','10','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','10','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','10','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','11','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','11','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','12','1',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','12','2',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','12','3',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('5','12','4',2)";
	
	
	
	/**************************************************************************
	***************************************************************************
	*********  LISTE DES MATIERES DU NIVEAU 6 *********************************
	***************************************************************************
	**************************************************************************/
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','1','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','1','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','1','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','1','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','2','1',12)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','2','2',15)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','2','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','2','4',3)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','3','1',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','3','2',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','3','3',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','3','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','4','1',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','4','2',28)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','4','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','4','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','5','1',6)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','5','2',7)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','5','3',20)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','5','4',7)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','6','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','6','2',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','6','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','6','4',4)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','7','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','7','2',9)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','7','3',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','7','4',3)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','8','1',5)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','8','2',2)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','8','3',11)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','8','4',2)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','9','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','9','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','9','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','9','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','10','1',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','10','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','10','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','10','4',4)";
	
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','11','1',8)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','11','2',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','11','3',0)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','11','4',2)";

	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','12','1',4)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','12','2',3)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','12','3',10)";
	$data[] = "INSERT INTO matiere_niveau(id_niveau, id_competence, id_sous_competence,nb_point)
					VALUES('6','12','4',3)";
