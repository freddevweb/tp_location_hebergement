<?php

    require "autoloader1.php";

    session_start();

    $retour = array();
    $errorStart = '<p class="has-error text-center"><span class="help-block">';
    $successStart = '<p class="has-success text-center"><span class="help-block">';
    $end = '</span></p>';

    if( empty( $_POST["quoi"] ) ){
        $retour=$errorStart."Connectez vous ou enregistrez vous";
    }
    if(empty($_POST["arrivee"])){
        $retour=$errorStart."Veuillez renseigner une date d'arrivée";
    }
    if(empty($_POST["depart"])){
        $retour=$errorStart."Veuillez renseigner une date de départ";
    }
    if($_POST["arrivee"] > $_POST["depart"] ){
        $retour=$errorStart."La date de départ doit être suppérieure à la date d'arrivée";
    }

    if(empty($retour)){

        $db = new DbManager();
        $newResa = new Reservation();
        $newResa->setAnnonceId(htmlspecialchars( $_POST["quoi"] )) ; 
        $newResa->setUserId(htmlspecialchars( $_SESSION["id"] ));
        $newResa->setDateDebut(htmlspecialchars( $_POST["arrivee"] ));
        $newResa->setDateFin(htmlspecialchars( $_POST["depart"] ));
        $confirmResa = $newResa->save($db);
        if($confirmResa == false){
            $retour = $errorStart."Les dates souhaitées viennent d'être réservées à l'instant.";
        }
        else{
            $retour = $successStart.'<p class="has-success text-center"><span class="help-block">Réservation validée.</span></p>';
        }
    }

    $_SESSION['retour'] = $retour.$end;
    
    $link = 'Location:../detail/'.$_POST["quoi"];

    header($link);















