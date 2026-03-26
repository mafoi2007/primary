<?php
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);

    if(isset($_POST['trimestre'])){
        $trimestre = (int) $_POST['trimestre'];
        if($trimestre==0){
            $msg = "<h3 class='alert'>Sélectionnez un trimestre.</h3>";
            echo $msg;
        }else{ ?>
            Section : <select name='section'>
                <option value='fr'>Section Francophone</option>
                <option value='en' selected>Section Anglophone</option>
            </select>
            <input type='hidden' name='to_print' value='statistiqueTrimestrielle' />
            <input type='submit' name='print' value='Générer' />
        <?php
        }
    }