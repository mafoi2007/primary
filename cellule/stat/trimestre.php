<div id = 'body2'>
	<h1 class='alert'>statistiques trimestrielles</h1>
    <?php $listeTrimestres = $config->getTrimestresTraites();?>
	<form method='post' action='../traitement.php' target='_blank'>
		Choisir le trimestre :
            <?php
            if(empty($listeTrimestres)){
                $msg = "<h3 class='alert'>Aucun trimestre n'est encore disponible.</h3>";
                echo $msg;
            }else{ ?>
                <select name="trimestre" id='trimestre' onChange='statTrimestre()'>
                    <?php
                    for($i=0;$i<count($listeTrimestres);$i++){
                        $idTrimestre = $listeTrimestres[$i]['trimestre'];
                        echo "<option value='".$idTrimestre."'>Trimestre ".$idTrimestre."</option>";
                    }?>
                    <option value='null' selected>-Choisir un trimestre-</option>
                </select>
                <div id='sectionTrimestre' style=display:inline>
                </div>
<?php
            }
            ?>
	</form>
</div>