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


    if (!empty($_POST["typeName"])){
        $db = new DbManager();
        $user = new User();
        $user->setTypeId($_POST["typeName"]);
        $user->setId($_POST["id"]);
        $user->updateUserTypeId($db);
    }
    

    header('Location:../accounts');
