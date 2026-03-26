<?php
session_start();
require_once('../../inc/connect.inc.php');
$config = new config($db);

if(isset($_POST['sequence']) && isset($_POST['matiere'])){
    $sequence = (int) $_POST['sequence'];
    $matiere = (int) $_POST['matiere'];

    if($sequence==0){
        echo "<h3 class='alert'>Vous devez choisir un mois.</h3>";
    }elseif($matiere==0){
        echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
    }else{
        $notes = $config->viewNoteMatiere($_SESSION['user']['classeTenue']['id'], $sequence, $matiere);

        if(empty($notes)){
            echo "<h3 class='alert'>Aucune note disponible pour cette matière à ce mois.</h3>";
        }else{
            $effectif = count($notes);
            $somme = 0;
            $noteMax = -1;
            $noteMin = 21;
            $nbMoyenne = 0;

            for($i=0;$i<$effectif;$i++){
                $total = (float) $notes[$i]['total'];
                $somme += $total;
                if($total > $noteMax){
                    $noteMax = $total;
                }
                if($total < $noteMin){
                    $noteMin = $total;
                }
                if($total >= 10){
                    $nbMoyenne++;
                }
            }

            $moyenneClasse = round($somme/$effectif, 2);
            ?>
            <h3 class='alert'>Résultats du Mois  <?php echo $sequence; ?></h3>
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