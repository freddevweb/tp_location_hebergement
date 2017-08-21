<?php
session_start();    

    require "../models/Connexion.php";
    require "../models/DbManager.php";
    require "../models/Annonce.php";
    require "../models/AnnonceRepo.php";
    require "../models/Commentaire.php";
    require "../models/CommentaireRepo.php";
    require "../models/Location.php";
    require "../models/LocationRepo.php";
    require "../models/Photo.php";
    require "../models/PhotoRepo.php";
    require "../models/User.php";
    require "../models/UserRepo.php";
    require "../models/UserType.php";
    require "../models/UserTypeRepo.php";

    var_dump($_POST);
    die();

    $error = array();

    if( !empty($_POST['presentation']) ){
        $heureCleMin = $_POST['heureCleMin'];
    }
    else{
        $error[] = "Vous n'avez pas renseigné de photo de présentation."
        $link = "Location:../addPhoto";
        
    }




    if( empty( $error ) ){
        $link = 'Location:../addPhoto';
        $db = new DbManager();
        // $newAnnonce->saveAnnonce($db);
    }
    else{
        $link = 'Location:../formAddAnnonce';
        $_SESSION["error"] = $error;
        $_SESSION["data"] = $newAnnonce;
    }

    $link = 'Location:../addPhoto';













































