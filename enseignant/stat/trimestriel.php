<div id='body2'>
    <h1 class='alert'>Statistiques trimestrielles</h1>
    <?php $listeTrimestre = $config->trimestrielPret($_SESSION['user']['classeTenue']['id']); ?>

    <?php if(empty($listeTrimestre)){ ?>
        <h3 class='alert'>Aucun trimestre n'est encore disponible.</h3>
    <?php }else{ ?>
            Trimestre :
            <select name='trimestre_stat' id='trimestre_stat' onChange='listMatiereStatTrimestre()'>
                <option value='null' selected>-Choisir un trimestre-</option>
                <?php for($i=0;$i<count($listeTrimestre);$i++){
                    $idTrimestre = $listeTrimestre[$i]['trimestre'];
                    echo "<option value='".$idTrimestre."'>Trimestre ".$idTrimestre."</option>";
                } ?>
            </select>

        <div id='matiere_trimestre_stat' style="display:inline">
        </div>
        <div id='resultat_trimestre_stat'>
        </div>
    <?php } ?>
</div>