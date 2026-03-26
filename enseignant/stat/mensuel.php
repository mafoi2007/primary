<div id='body2'>
    <h1 class='alert'>Statistiques mensuelles</h1>
    <?php $listeSequence = $config->getMoisTraites(); ?>

    <?php if(empty($listeSequence)){ ?>
        <h3 class='alert'>Aucun mois n'est encore disponible.</h3>
    <?php }else{ ?>
            Mois :
            <select name='sequence' id='sequence' onChange='listMatiereStat()'>
                <option value='null' selected>-Choisir un mois-</option>
                <?php for($i=0;$i<count($listeSequence);$i++){
                    $idSequence = $listeSequence[$i]['mois'];
                    echo "<option value='".$idSequence."'>Séquence ".$idSequence."</option>";
                } ?>
            </select>
        
        <div id='matiere_stat' style="display:inline">
        </div>
        <div id='resultat_stat'>
        </div>
    <?php } ?>
</div>