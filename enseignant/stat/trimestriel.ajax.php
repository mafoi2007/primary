<?php
session_start();
require_once('../../inc/connect.inc.php');
$config = new config($db);

if(isset($_POST['trimestre'])){
    $trimestre = (int) $_POST['trimestre'];
    if($trimestre===0){
        echo "<h3 class='alert'>Vous devez choisir un trimestre.</h3>";
    }else{
        if($trimestre===1){
            $listeMois = array(1,2,3);
        }elseif($trimestre===2){
            $listeMois = array(4,5,6);
        }else{
            $listeMois = array(7,8);
        }

        $listeMatiereUnique = array();
        $classe = $_SESSION['user']['classeTenue']['id'];

        for($i=0;$i<count($listeMois);$i++){
            $listeMatiere = $config->getNoteSaisieMois($classe, $listeMois[$i]);
            for($j=0;$j<count($listeMatiere);$j++){
                $idMatiere = $listeMatiere[$j]['matiere'];
                if(!isset($listeMatiereUnique[$idMatiere])){
                    $listeMatiereUnique[$idMatiere] = $listeMatiere[$j];
                }
            }
        }

        if(empty($listeMatiereUnique)){
            echo "<h3 class='alert'>Aucune matière disponible pour ce trimestre.</h3>";
        }else{ ?>
            Matière :
            <select name='subject_trimestre_stat' id='subject_trimestre_stat' onChange='genererStatMatiereTrimestre()'>
                <option value='null' selected>-Choisir une matière-</option>
                <?php
                foreach($listeMatiereUnique as $matiere){
                    if($_SESSION['user']['classeTenue']['section']=='fr'){
                        $libMatiere = $matiere['libelle_competence_fr'];
                    }else{
                        $libMatiere = $matiere['libelle_competence_en'];
                    }
                    echo "<option value='".$matiere['matiere']."'>".strtoupper($libMatiere)."</option>";
                }
                ?>
            </select>
<?php
        }
    }
}