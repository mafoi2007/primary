<?php
session_start();
require_once('../../inc/connect.inc.php');
$config = new config($db);

if(isset($_POST['sequence'])){
    $sequence = $_POST['sequence'];
    $_SESSION['stat_sequence'] = $sequence;

    if($sequence=='null'){
        echo "<h3 class='alert'>Vous devez choisir un mois</h3>";
    }else{ ?>
            Matière :
            <select name='subject_stat' id='subject_stat' onChange='genererStatMatiere()'>
                <option value='null' selected>-Choisir une matière-</option>
                <?php
                $listeMatiere = $config->getNoteSaisieMois($_SESSION['user']['classeTenue']['id'], $sequence);
                for($i=0;$i<count($listeMatiere);$i++){
                    if($_SESSION['user']['classeTenue']['section']=='fr'){
                        $libMatiere = $listeMatiere[$i]['libelle_competence_fr'];
                    }else{
                        $libMatiere = $listeMatiere[$i]['libelle_competence_en'];
                    }
                    echo "<option value='".$listeMatiere[$i]['matiere']."'>".strtoupper($libMatiere)."</option>";
                }
                ?>
            </select>
<?php
    }
}