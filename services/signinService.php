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

    

    $error = array();


    if( empty($_POST["pseudo"]) ){
        $error[] = "Pseudo non renseigné";
    }
    if( strlen($_POST["pseudo"]) <= 8 ){
        $error[] = "Le pseudo est trop court";
    }
    if( empty($_POST["email"]) ){
        $error[] = "Email non renseigné";
    }
    if( preg_match( '#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST["email"]) ){
        $error[] = "Email invalide";
    }
    if( empty($_POST["emailConf"]) ){
        $error[] = "Confirmation de l'Email non renseigné";
    }
    if( empty($_POST["pass"]) ){
        $error[] = "Mot de passe non renseigné";
    }
    if( strlen($_POST["pass"]) <= 8 ){
        $error[] = "Le mot de passe est trop court";
    }
    if( empty($_POST["passConf"]) ){
        $error[] = "Confirmation du mot de passe non renseigné";
    }
    if ( $_POST["passConf"] !== $_POST["pass"] ){
        $error[] = "La confirmation du mot de passe ne correspond pas au mot de passe renseigné";
    }  
    // function email exist
    $db = new DbManager();
    $userRepo = $db->getUserRepo();
    $emailExist = $userRepo->checkEmailExist($_POST["email"]);
    var_dump ($emailExist);
    die();

    if( empty($error) ){
        var_dump("ok");
        // $link = 'Location:../index.php?';
    }
    else {
        var_dump($error);
        // $link = 'Location: http://www.example.com/';
    }
    

// header($link);
