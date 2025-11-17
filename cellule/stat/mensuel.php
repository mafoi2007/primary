<div id = 'body2'>
	<h1 class='alert'>statistiques mensuelles</h1>
    <?php $listeMois = $config->getMoisTraites();/* echo '<pre>'; print_r($listeMois); echo '</pre>';*/?>
	<form method='post' action='../traitement.php' target='_blank'>
		Choisir le mois :
            <?php 
            if(empty($listeMois)){
                $msg = "<h3 class='alert'>Aucun mois n'est encore disponible.</h3>";
                echo $msg;
            }else{ ?>
                <select name="mois" id='mois' onChange='statMensuel()'>
                    <?php 
                    for($i=0;$i<count($listeMois);$i++){
                        $idMois = $listeMois[$i]['mois'];
                        echo "<option value='".$idMois."'>Mois ".$idMois."</option>";
                    }?>
                    <option value='null' selected>-Choisir un mois-</option>
                </select>
                <div id='section' style=display:inline>
                </div>
<?php 
            }
            ?>
	</form>
</div>