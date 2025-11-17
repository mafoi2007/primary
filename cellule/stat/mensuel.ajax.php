<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
    // print_r($_POST);
    if(isset($_POST['mois'])){
        $mois = (int) $_POST['mois'];
        if($mois==0){
            $msg = "<h3 class='alert'>Sélectionnez un mois.</h3>";
            echo $msg;
        }else{ ?>
            Section : <select name='section'>
                <option value='fr'>Section Francophone</option>
                <option value='en' selected>Section Anglophone</option>
            </select>
            <input type='hidden' name='to_print' value='statistiqueMensuelle' />
            <input type = 'submit' name='print' value='Générer' />
        <?php
        }
    }