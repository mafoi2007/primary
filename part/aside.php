<?php 
/**********************************************************************
*********   A S I D E   CELLULE ***************************************
**********************************************************************/
$menu['cellule']['etat']['libelle'] = array('liste des élèves', 'releve de notes', 'vue des effectifs');
$menu['cellule']['etat']['lien'] = array('liste', 'releve', 'vueEffectif');

$menu['cellule']['traitement']['libelle'] = array('verification des notes',
													'supprimer des notes',
													'traitement mensuel', 
													'traitement trimestriel',
													'traitement annuel');
$menu['cellule']['traitement']['lien'] = array('visuMensuel','delNote', 'mensuel', 'trimestriel', 'annuel');

$menu['cellule']['bulletin']['libelle'] = array('bulletin mensuel', 
													'bulletin trimestriel',
													'bulletin annuel');
$menu['cellule']['bulletin']['lien'] = array('mensuel', 'trimestriel', 'annuel');

$menu['cellule']['stat']['libelle'] = array('statistiques mensuelles', 
											'statistiques trimestrielles',
											'statistiques annuelles');
$menu['cellule']['stat']['lien'] = array('mensuel', 'trimestre', 'annuel');

$menu['cellule']['eleve']['libelle'] = array('ajouter', 'rechercher');
$menu['cellule']['eleve']['lien'] = array('ajouter', 'rechercher');

/*$menu['cellule']['enseignant']['libelle'] = array('créer un enseignant',
													'liste des enseignants',
													'affecter à la classe',
													'enseignants de la classe',
													'modifier login',
													'modifier mot de passe');*/
/*$menu['cellule']['enseignant']['lien'] = array('add','viewall','addprofcls','profcls','updlogin','updpwd');*/

$menu['cellule']['classe']['libelle'] = array('ajouter une classe',
													'liste des classes'
													);
$menu['cellule']['classe']['lien'] = array('addcls','lscls');

$menu['cellule']['photo']['libelle'] = array('ajouter une photo', 
											'supprimer une photo',
											'modifier une photo');
$menu['cellule']['photo']['lien'] = array('addph', 'delph', 'updph');



/****************************************************************************
***********  A S I D E  Administrateur **************************************
****************************************************************************/
$menu['administrateur']['utilisateur']['libelle'] = array('créer un utilisateur',
															'liste des utilisateurs',
															'affecter à la classe',
															'enseignants de la classe');
$menu['administrateur']['utilisateur']['lien'] = array('add', 'viewall', 'addprofcls',
														'profcls');

$menu['administrateur']['matiere']['libelle'] = array('Ajouter une matière',
													   'Retirer une matière',
													'modifier ponderation');
$menu['administrateur']['matiere']['lien'] = array('addmatcls','rmmatcls', 'updpondcls');

$menu['administrateur']['journal']['libelle'] = array('Mon Journal', 'Journal des Enseignants');
$menu['administrateur']['journal']['lien'] = array('myjr','otjr');

$menu['administrateur']['bd']['libelle'] = array('Année Scolaire', 'Appréciation', 'classe',
												'periode', 'type utilisateur');
$menu['administrateur']['bd']['lien'] = array('as','appr','cls','per','usert');

/**************************************************************************************
*****************  A S I D E   ENSEIGNANT *********************************************
**************************************************************************************/

$menu['enseignant']['note']['libelle'] = array('Insérer des Notes', 
												'Modifier des Notes',
												'Consulter ses notes');
$menu['enseignant']['note']['lien'] = array('addnt','updnt','viewnt');


$menu['enseignant']['stat']['libelle'] = array('Statistiques Mensuelles', 
													'Statistiques Trimestrielles',
													'Statistiques Annuelles');
$menu['enseignant']['stat']['lien'] = array('mensuel','trimestriel', 'annuel');














/*$myMenu = $menu[$user];
$pageEnCours = $config->pageEnCours();
$lien = str_replace('.php','',$pageEnCours);
$sousMenu = $myMenu[$lien];*/
/*if($_SESSION['user']['userPost']=='cellule'){
	$myMenu = $menu[$user];
	$pageEnCours = $config->pageEnCours();
	$lien = str_replace('.php','',$pageEnCours);
	$sousMenu = $myMenu[$lien];
}*/
?>

<?php /*
<div id="menu">
	<?php 
		for($i=0;$i<count($sousMenu['libelle']);$i++){
			echo "<div id='sous_menu'>";
				echo "<h3><a href='";
				echo $pageEnCours."?action=";
				echo $sousMenu['lien'][$i]."#body2'>";
				echo $sousMenu['libelle'][$i]."</a></h3>";
			echo "</div>";
		}
	?>
</div> */ ?>
