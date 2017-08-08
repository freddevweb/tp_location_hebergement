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

    var_dump(strlen($_POST['pseudo']));
    var_dump(strlen($_POST['pass']));
    $error = array();

    if( empty($_POST["pseudo"]) ){
        $error[] = "Pseudo non renseigné";
    }
    if( strlen($_POST["pseudo"]) < 8 ){
        $error[] = "Le pseudo est trop court";
    }
    if( empty($_POST["email"]) ){
        $error[] = "Email non renseigné";
    }
    if( !preg_match( "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$# ", $_POST["email"]) ){
        $error[] = "Email invalide";
    }
    if( empty($_POST["emailConf"]) ){
        $error[] = "Confirmation de l'Email non renseigné";
    }
    if( empty($_POST["pass"]) ){
        $error[] = "Mot de passe non renseigné";
    }
    if( strlen($_POST["pass"]) < 8 ){
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
    if( $emailExist == true ){
        $error[] = "L'email existe déja, veuillez vous loger";
    }

    if( empty($error) ){
        switch($_POST["def"]){
            case 'hote':
                $def = 3;
                break;
            case 'voyageur':
                $def = 4;
                break;
        }
        $newUser = new User();
        $newUser->setPseudo( htmlspecialchars( $_POST["pseudo"] ) ); 
        $newUser->setEmail(htmlspecialchars( $_POST["email"] ) );
        $newUser->setTypeId($def);
        $newUser->setWp(hash('sha256',htmlspecialchars( $_POST["pass"] )));
        $newUser->save($db);
        var_dump($newUser);
        session_destroy();
    }
    else {
        var_dump($error);
        $_SESSION["error"] = $error;
    }

header('Location:../');