<table border='1' width='100%'>
    <tr>
        <th>N°</th>
        <th>Matière</th>
    <?php 
    $listeSousMatiere = $config->listeSousMatiere();
    for($i=0;$i<count($listeSousMatiere);$i++){
        $section = $_SESSION['user']['classeTenue']['section'];
        $cle = 'libelle_sous_competence_'.$section;
        echo "<th>".ucwords($listeSousMatiere[$i][$cle])."</th>";
    } ?>
    </tr>
<?php 
$listeMatiere = $config->listeMatiereClasse($_SESSION['user']['classeTenue']['id']);
$key = 'libelle_competence_'.$section;
if(empty($listeNote)){
    $a = 1;
    for($x=0;$x<count($listeMatiere);$x++){ 
        $ponderation = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                        $listeMatiere[$x]['id_competence']);
        ?>
        <tr>
            <td><?php echo $a; ?></td>
            <td>
                <input
                    type='hidden'
                    name='matiere[]'
                    value='<?php echo $listeMatiere[$x]['id_competence']; ?>' />
            <?php echo strtoupper($listeMatiere[$x][$key]); ?>
            </td>
            <td>
                <input
                    type='number'
                    name='oral[]'
                    step = '0.01'
                    min='0.1'
                    max = '<?php echo $ponderation[0]['nb_point']; ?>'
                    />
            </td>
            <td>
                <input
                    type='number'
                    name='ecrit[]'
                    step = '0.01'
                    min='0.1'
                    max = '<?php echo $ponderation[1]['nb_point']; ?>'
                />
            </td>
            <td>
                <input
                    type='number'
                    name='prat[]'
                    step = '0.01'
                    min='0.1'
                    max = '<?php echo $ponderation[2]['nb_point']; ?>' 
                />
            </td>
            <td>
                <input
                    type='number'
                    name='se[]'
                    step = '0.01'
                    min='0.1' 
                    max = '<?php echo $ponderation[3]['nb_point']; ?>'
                />
            </td>
        </tr>
<?php 
        $a++;
    } ?>
    Vide
<?php }else{
    $a = 1;
    for($x=0;$x<count($listeNote);$x++){ 
        $ponderation = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                        $listeMatiere[$x]['id_competence']);
        $key = 'libelle_competence_'.$section;
        ?>
        <tr>
            <td><?php echo $a; ?></td>
            <td>
                <input
                    type='hidden'
                    name='matiere[]'
                    value='<?php echo $listeNote[$x]['competence']; ?>' />
                <?php echo strtoupper($listeNote[$x][$key]); ?></td>
            <td><input 
                    type='number'
                    name='oral[]'
                    min='0.1'
                    max = <?php echo $ponderation[0]['nb_point']; ?>
                    step = '0.01'
                    value = '<?php echo $listeNote[$x]['oral']; ?>'
                />
            </td>
             <td><input 
                    type='number'
                    name='ecrit[]'
                    min='0.1'
                    max = <?php echo $ponderation[1]['nb_point']; ?>
                    step = '0.01'
                    value = '<?php echo $listeNote[$x]['ecrit']; ?>'
                />
            </td>
             <td><input 
                    type='number'
                    name='prat[]'
                    min='0.1'
                    max = <?php echo $ponderation[2]['nb_point']; ?>
                    step = '0.01'
                    value = '<?php echo $listeNote[$x]['prat']; ?>'
                />
            </td>
            <td><input 
                    type='number'
                    name='se[]'
                    min='0.1'
                    max = <?php echo $ponderation[3]['nb_point']; ?>
                    step = '0.01'
                    value = '<?php echo $listeNote[$x]['se']; ?>'
                />
            </td>
        </tr>
<?php 
    $a++;}
    // echo '<pre>'; print_r($listeNote); echo '</pre>';
} ?>
    <tr>
        <td colspan='10' align='center'>
            <input 
                type='submit' 
                name='updateNoteRevendic'
                value='Valider' />
        </td>
    </tr>
</table>