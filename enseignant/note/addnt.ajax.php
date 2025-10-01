<?php 
    session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['subject'])){
        $matiere = $_POST['subject'];
        if($matiere=='null'){
            echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
        }else{ 
             $listeSousMatiere = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                                    $matiere);
            /*Avant de présenter le formulaire de saisie, on se rassure que les notes n'avaient pas déjà été
            enregistrées, afin d'éviter un double emploi. Si c'est la première saisie, on affiche le formulaire.
            Sinon, on informe simplement ques les notes ont déjà été saisies. On suggère humblement se reporter au 
            menu de modification des notes.*/
            $verifNote = $config->verifNoteSaisie($_SESSION['user']['classeTenue']['id'], $matiere, $_SESSION['mois']);
            // echo '<pre>';echo var_dump($verifNote); echo '</pre>';
			if($verifNote==false){ // On présente le formulaire de saisie des notes
                if($_SESSION['user']['classeTenue']['section']=='fr'){
                    $nomMatiere = $listeSousMatiere[0]['libelle_competence_fr'];
                }elseif($_SESSION['user']['classeTenue']['section']=='en'){
                    $nomMatiere = $listeSousMatiere[0]['libelle_competence_en'];
                } ?>
                <h3 class='bien'>Matière : <?php echo strtoupper($nomMatiere); ?></h3>
                <table border = 1 width='100%'>
                    <tr>
                        <th>Nom de l'élève</th>
                        <?php 
                         for($i=0;$i<count($listeSousMatiere);$i++){
                             if($_SESSION['user']['classeTenue']['section']=='fr'){
                                $sousMatiere  = $listeSousMatiere[$i]['libelle_sous_competence_fr'];
                             }elseif($_SESSION['user']['classeTenue']['section']=='en'){
                                $sousMatiere = $listeSousMatiere[$i]['libelle_sous_competence_en'];
                             }
                             $point[] = $listeSousMatiere[$i]['nb_point'];
                             echo "<th>".ucwords($sousMatiere)." / ".$listeSousMatiere[$i]['nb_point']."</th>";
                             echo "<input type='hidden' name='matiere[]' value='".$listeSousMatiere[$i]['id']."' />";
                         }
                         $totalPoint = array_sum($point);
                         ?>
                          <th>Total / <?php echo $totalPoint; ?></th>
                    </tr>
                    <?php
                    $listeEleve = $config->listeEleve($_SESSION['user']['classeTenue']['id'],
                                                        'non_supprime',
                                                        $_SESSION['information']['id']);
                     for($a=0;$a<count($listeEleve);$a++){
                        $nomEleve = $listeEleve[$a]['nom_complet'];
                        $idEleve = $listeEleve[$a]['id'];
                        $listeSousMat = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'], 
                                                                        $matiere); ?>
                        <tr>
                             <td>
                                <?php echo $nomEleve; ?><input type='hidden' name='eleve[]' value="<?php echo $idEleve; ?>" />
                            </td> <?php 
                        for($b=0;$b<count($listeSousMat);$b++){
                            $name = "note[$b][]"; ?>
                            <td>
                                <input
                                    type='number'
                                    step = '0.01'
                                    name="<?php echo $name; ?>"
                                    id = "<?php echo $name; ?>"
									min ="0"
									max = "<?php echo $listeSousMat[$b]['nb_point']; ?>"
									/>
                            </td> <?php 
                        } ?>
							<td>&nbsp;</td>
                        </tr>
<?php 
                     }  ?>
                        <tr>
                            <td colspan = '6' align = 'center'>
                                <input 
                                    type='submit' 
                                    name='saveNote' 
                                    value='Enregistrer ses notes' />
                            </td>
                        </tr>
                </table>



<?php 

            }else{
                $message = "<h3 class='bien'>";
                $message .= "Les Notes de cette matière ont été saisies le <font class='blink'>";
                $message .= $verifNote['date_fr'];
                $message .= " à ";
                $message .= $verifNote['heure_fr'];
                $message .= "</font>. Reportez-vous au menu <i class='alert'>Modifier des Notes</i> ";
                $message .= "pour des éventuels changements de notes.</h3>";
                
                echo $message;
            }
            // echo '<pre>'; print_r($verifNote); echo '</pre>';
            
         }
    }