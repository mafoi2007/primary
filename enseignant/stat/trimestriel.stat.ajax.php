<?php
session_start();
require_once('../../inc/connect.inc.php');
$config = new config($db);

if(isset($_POST['trimestre']) && isset($_POST['matiere'])){
    $trimestre = (int) $_POST['trimestre'];
    $matiere = (int) $_POST['matiere'];

    if($trimestre===0){
        echo "<h3 class='alert'>Vous devez choisir un trimestre.</h3>";
    }elseif($matiere===0){
        echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
    }else{
        if($trimestre===1){
            $listeMois = array(1,2,3);
        }elseif($trimestre===2){
            $listeMois = array(4,5,6);
        }else{
            $listeMois = array(7,8);
        }

        $classe = $_SESSION['user']['classeTenue']['id'];
        $notesParEleve = array();

        for($i=0;$i<count($listeMois);$i++){
            $notesMois = $config->viewNoteMatiere($classe, $listeMois[$i], $matiere);
            for($j=0;$j<count($notesMois);$j++){
                $idEleve = $notesMois[$j]['eleve'];
                $total = (float) $notesMois[$j]['total'];
                if(!isset($notesParEleve[$idEleve])){
                    $notesParEleve[$idEleve] = array();
                }
                $notesParEleve[$idEleve][] = $total;
            }
        }

        if(empty($notesParEleve)){
            echo "<h3 class='alert'>Aucune note disponible pour cette matière à ce trimestre.</h3>";
        }else{
            $moyennesEleves = array();
            foreach($notesParEleve as $notes){
                $moyennesEleves[] = array_sum($notes)/count($notes);
            }

            $effectif = count($moyennesEleves);
            $somme = array_sum($moyennesEleves);
            $moyenneClasse = round($somme/$effectif, 2);
            $noteMax = round(max($moyennesEleves), 2);
            $noteMin = round(min($moyennesEleves), 2);
            $nbMoyenne = 0;

            for($i=0;$i<count($moyennesEleves);$i++){
                if($moyennesEleves[$i] >= 10){
                    $nbMoyenne++;
                }
            }
            ?>
            <h3 class='alert'>Résultats du trimestre <?php echo $trimestre; ?></h3>
            <table border =1 width='75%'>
                <tr>
                    <td>Effectif évalué</td>
                    <td><?php echo $effectif; ?></td>
                </tr>
                <tr>
                    <td>Moyenne de classe</td>
                    <td><?php echo $moyenneClasse; ?>/20</td>
                </tr>
                <tr>
                    <td>Note maximale</td>
                    <td><?php echo $noteMax; ?>/20</td>
                </tr>
                <tr>
                    <td>Note minimale</td>
                    <td><?php echo $noteMin; ?>/20</td>
                </tr>
                <tr>
                    <td>Élèves avec moyenne (&ge;10/20)</td>
                    <td><?php echo $nbMoyenne; ?></td>
                </tr>
                <tr>
                    <td>Élèves en dessous de la moyenne</td>
                    <td><?php echo ($effectif - $nbMoyenne); ?></td>
                </tr>
            </table>
            <?php
        }
    }
}