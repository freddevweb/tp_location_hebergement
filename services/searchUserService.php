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

    $db = new DbManager();
    $user = new User();
    $user->setTypeId($_POST["type"]);
    $user->setPseudo( htmlspecialchars($_POST["name"]) );
    $search = $user->search($db);
    
    $_SESSION["search"] = serialize($search);

    header('Location:../accounts');
