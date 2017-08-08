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
    // verifie user
    if( !empty($userEmail) && !empty($userPassReal) ){
        $db = new DbManager();
        // set user
        $userPass = hash('sha256', $userPassReal);
        $user = new User();
        $user->setEmail($userEmail);
        $user->setWp($userPass);
        $error = array();
        // control user exist
        $control = $user->launchControls($db);
        if( empty($control) == false ){
            //recuperer user
            $userRepo = $db->getUserRepo();
            $getUser = $userRepo->getUser($user->getEmail($userEmail));
            // modifier user dern connexion
            $derConnectUpdate = $userRepo->updateConnexion($user);
            $_SESSION["id"] = $user->getId();

            if($control->getTypeId() == 1){
                // $value = $user->getPseudo().$user->getEmails().$user->getInscription();
                // $_SESSION["id"] = hash('sha256', $value);
                
                $link = 'Location:../dashboardAdmin';
            }
            if($control->getTypeId() == 2){
                // $value = $user->getPseudo().$user->getEmails().$user->getInscription();
                // $_SESSION["id"] = hash('sha256', $value);

                $link = 'Location:../dashboardControler';
            }
            if($control->getTypeId() == 3){

                $link = 'Location:../dashboardRenter';
            }
            if($control->getTypeId() == 4){

                $link = 'Location:../dashboardUser';
            }
        }
    }
    else {
        if( empty($userEmail) ){
            $error[] = "Email non renseigné";
        }
        if( empty($userPassReal) ){
            $error[] = "Mot de passe non renseigné";
        }
        
        $_SESSION["error"] = $error;
        var_dump($_SESSION["error"]);
        die();
        $link = 'Location:../';
    }

header($link);
