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


    if ( isset( $_SESSION["data"]) ){
        unset($_SESSION["data"]);
    }
    if ( isset( $_SESSION["error"]) ){
        unset($_SESSION["error"]);
    }

    $error = array();
    $conseil = array();
    $data = array();
    $newAnnonce = new Annonce();
    $newAnnonce->setUserId($_SESSION['id']);

    if( !empty($_POST["id"]) ) {
        $newAnnonce->setId($_POST["id"]);
    }
    if( empty($_POST["adress"]) ){
        $error[] = "L'adresse du logement n'a pas été renseignée";
    }
    else {
        $newAnnonce->setAdress($_POST["adress"]);
    }
    if( empty($_POST["cp"]) ){
        $error[] = "Le code postal du logement n'a pas été renseignée";
    }
    else {
        $newAnnonce->setCodePostal($_POST["cp"]);
    }
    if( empty($_POST["ville"]) ){
        $error[] = "La ville postal du logement n'a pas été renseignée";
    }
    else {
        $newAnnonce->setVille($_POST["ville"]);
    }
    if( empty($_POST["type"]) ){
        $error[] = "Vous n'avez pas renseigné le type d'hébergement que vous proposez";
    }
    else {
        $newAnnonce->setTypeLogementId($_POST["type"]);
    }
    if( empty($_POST["pieces"]) ){
        $error[] = "Vous n'avez pas renseigné le nombre de pièces de votre bien";
    }
    else {
        $newAnnonce->setNbrePieces($_POST["pieces"]);
    }
    if( empty($_POST["chambre"]) ){
        $error[] = "Vous n'avez pas renseigné le type d'hébergement que vous proposez";
    }
    else {
        $newAnnonce->setNbreChambre($_POST["chambre"]);
    }
    if( empty($_POST["titre"]) ){
        $error[] = "Vous n'avez pas donné de titre à votre annonce";
    }
    else {
        $newAnnonce->setTitre($_POST["titre"]);
    }
    if( empty($_POST["description"]) ){
        $error[] = "Vous n'avez pas fait de descriptions de votre bien";
    }
    else {
        $newAnnonce->setDescription($_POST["description"]);
    }
    if( empty($_POST["surface"]) ){
        $error[] = "Vous n'avez pas renseigné la surface de votre bien";
    }
    else {
        $newAnnonce->setSurface($_POST["surface"]);
    }
    if( empty($_POST["capacite"]) ){
        $error[] = "Vous n'avez pas renseigné la capacité d'accueil de votre bien";
    }
    else {
        $newAnnonce->setCapacite($_POST["capacite"]);
    }
    if( empty($_POST["tarif"]) ){
        $error[] = "Vous n'avez pas renseigné le tarif de la location de votre bien";
    }
    else {
        $newAnnonce->setTarif($_POST["tarif"]);
    }
    if( empty($_POST["heureCleMin"]) ){
        $conseil[] = "Vous n'avez pas renseigné un horaire minimum pour l'entrée la récupération des clés";
    }
    else {
        $newAnnonce->setArriveeDebut($_POST["heureCleMin"]);
    }
    if( empty($_POST["heureCleMax"]) ){
        $conseil[] = "Vous n'avez pas renseigné un horaire maximum pour l'entrée la récupération des clés";
    }
    else {
        $newAnnonce->setArriveeFin($_POST["heureCleMin"]);
    }
    if( empty($_POST["depart"]) ){
        $error[] = "Vous n'avez pas renseigné l'heure de départ maximum des locataires";
    }
    else {
        $newAnnonce->setHDepart($_POST["depart"]);
    }
    if( empty($_POST["television"]) && empty($_POST["chaufage"]) && empty($_POST["climatisation"]) && empty($_POST["sdb"]) && empty($_POST["parking"]) && empty($_POST["laveLinge"]) && empty($_POST["wifi"]) ){
        $error[] = "Vous n'avez renseigné aucune option pour votre bien";
    }
    else {
        if( !empty($_POST["television"]) ){
            $newAnnonce->setTelevision(1);
        }
        if( !empty($_POST["chaufage"]) ){
            $newAnnonce->setChauffage(1);
        }
        if( !empty($_POST["climatisation"]) ){
            $newAnnonce->setClimatisation(1);
        }
        if( !empty($_POST["sdb"]) ){
            $newAnnonce->setSdb(1);
        }
        if( !empty($_POST["parking"]) ){
            $newAnnonce->setParking(1);
        }
        if( !empty($_POST["laveLinge"]) ){
            $newAnnonce->setLaveLinge(1);
        }
        if( !empty($_POST["wifi"]) ){
            $newAnnonce->setWifi(1);
        }
        if( !empty($_POST["fumeur"]) ){
            $newAnnonce->setFumeur(1);
        }
    }
    if( !empty($_POST['heureCleMin']) ){
        $heureCleMin = $_POST['heureCleMin'];
    }
    if( !empty($_POST['heureCleMax']) ){
        $heureCleMin = $_POST['heureCleMax'];
    }

if( empty( $error ) ){
    $link = 'Location:../addPhoto';
    $_SESSION["conseil"] = $conseil;
    $db = new DbManager();
    $_SESSION['annonceId'] = $newAnnonce->saveAnnonce($db)["id"];
}
else{
    $link = 'Location:../formAddAnnonce';
    $_SESSION["error"] = $error;
    $_SESSION["conseil"] = $conseil;
    $_SESSION["data"] = $newAnnonce;
}

header($link);





