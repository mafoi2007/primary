<?php 
	require_once('aside.php');
	$typeConnected = $_SESSION['user']['userPost'];
	$menuCell = $menu[$typeConnected];
	$resultat = array_keys($menuCell);
?>
	<nav>
		<ul>
			<?php 
			for($i=0;$i<count($resultat);$i++){
				echo "<li><a href='";
				echo $resultat[$i];
				echo ".php'>&nbsp; ";
				echo $resultat[$i];
				echo "&nbsp;</a></li>";
			}
			?>
		</ul>
	</nav>

<?php 
$myMenu = $menu[$user];
$pageEnCours = $config->pageEnCours();
$lien = str_replace('.php','',$pageEnCours);
$sousMenu = $myMenu[$lien];
?>
<div id="menu">
	<?php 
		if($sousMenu===NULL){
			echo "<h3>Pas de Sous - Menu</h3>";
		}else{
			for($i=0;$i<count($sousMenu['libelle']);$i++){
				echo "<div id='sous_menu'>";
					echo "<h3><a href='";
					echo $pageEnCours."?action=";
					echo $sousMenu['lien'][$i]."#body2'>";
					echo $sousMenu['libelle'][$i]."</a></h3>";
				echo "</div>";
			}
		}
	?>
</div>
