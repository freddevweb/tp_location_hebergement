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







    $userEmail = $_POST['email'];
    $userPassReal = $_POST['pass'];
    $error = array();
    // verifie user
    if( !empty($userEmail) && !empty($userPassReal) ){
        $db = new DbManager();
        // set user
        $userPass = hash('sha256', $userPassReal);
        $user = new User();
        $user->setEmail($userEmail);
        $user->setWp($userPass);
        // control user exist
        $control = $user->launchControls($db);
        if( empty($control) == false ){

            if($control->getTypeId() == 1){
                $dashboard = "dashboardAdmin";
            }
            if($control->getTypeId() == 2){
                $dashboard = "dashboardcontroler";
            }
            if($control->getTypeId() == 3){
                $dashboard = "dashboardrenter";
            }
        }
    }
    else {
        if(empty($userEmail)){
        $error = "Email non renseigné";
        }
        if(empty($userPassReal)){
            $error = "Mot de passe non renseigné";
        }
    }


