<?php

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
    require "../models/Reservation.php";
    require "../models/ReservationRepo.php";

    session_start();




    $error = array();

    if(empty($_POST("arrivee"))){
        $error="";
    }

    if(empty($_POST("depart"))){
        $error="";
    }

    if($_POST("depart") > $_POST("depart") ){
        $error="";
    }
    if(!empty($_POST("depart")) && !empty($_POST("depart")) ){


        $newResa = new Reservation();
        $newResa->setAnnonceId(htmlspecialchars( $_POST["quoi"] )) ; 
        $newResa->setUserId(htmlspecialchars( $_SESSION["id"] ));
        $newResa->setDateDebut(htmlspecialchars( $_POST["arrivee"] ));
        $newResa->setDateFin(htmlspecialchars( $_POST["depart"] ));
        $newResa->save($db);













    }

    header($link);















