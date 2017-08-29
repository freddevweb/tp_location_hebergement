<?php

require 'flight/Flight.php';
require "autoloader.php";

session_start();

$url = '/2_dev_idem/php/tp_fred_le_grand_final/tp_location_hebergement/';
Flight::render('header', array('heading'=>'RBNB', 'url'=>$url), "header");
Flight::render('footer', array('traduction'=>'cool'), "footer");
if( isset($_SESSION["type"]) ){
    switch($_SESSION["type"]){
        case 1:
            Flight::render('navAdmin', array('url'=>$url), "nav");
            break;
        case 2:
            Flight::render('navControleur', array('url'=>$url), "nav");
            break;
        case 3:
            Flight::render('navRender', array('url'=>$url), "nav");
            break;
        case 4:
            Flight::render('navUser', array('url'=>$url), "nav");
            break;
    }
}
else {
    Flight::render('nav', array('heading'=>'title'), "nav");
}
// ##############################################################
// ##############################################################
Flight::route('/', function(){
    
    if( isset( $_SESSION["error"]) ){
        $error = $_SESSION["error"];
    }
    else{
        $error="";
    }
    $db = new DbManager();
    $annonceRepo = $db->getAnnonceRepo();
    $annonce = $annonceRepo->getAnnonces();
    Flight::render('accueil', array(
        "error"=>$error,
        "annonce"=>$annonce
    ));
    if( isset( $_SESSION["error"]) ){
        unset( $_SESSION["error"] );
    }
});
// ##############################################################
// ##############################################################
Flight::route('/dashboardAdmin', function(){
    Flight::render('dashboardAdmin', array(
    ));
});

// ##############################################################
Flight::route('/dashboardControler', function(){
    //$db = new DbManager();
    Flight::render('dashboardControler', array(
    ));
});

// ##############################################################
Flight::route('/dashboardRender', function(){
    Flight::render('dashboardRender', array(
        
    ));
});

// ##############################################################
Flight::route('/dashboardUser', function(){
    Flight::render('dashboardUser', array(
        
    ));

});
// ##############################################################
// ##############################################################

Flight::route('/annoncesRender', function(){
    $hote = $_SESSION;
    $db = new DbManager();
    $annonceRepo = $db->getAnnonceRepo();
    $annonce = $annonceRepo->getAnnoncesByHote($_SESSION["id"]);
    
    Flight::render('annonces', array(
        "annonce" => $annonce
    ));


});

// ##############################################################
Flight::route('/annoncesAll', function(){
    $db = new DbManager();
    $annonceRepo = $db->getAnnonceRepo();
    $logementType = $db->getLogementTypeRepo()->getType();
    if(array_key_exists("reset", $_POST)){
        unset($_POST);
    }
    if(!empty($_POST)){
        $dataForm = $_POST;
        $annonce = $annonceRepo->getAnnoncesSearch($_POST);
        if(empty($annonce)){
            $annonce = "Il n'y a pas de locations avec vos paramètres de recherche !";
        }
    }
    else {
        $dataForm = [];
        $annonce = $annonceRepo->getAnnonces();
    }

    Flight::render('annoncesAll', array(
        "annonce" => $annonce,
        "type"=> $logementType,
        "dataForm"=>$dataForm
    ));

});

// ##############################################################
Flight::route('/detail/@id', function($id){
    if( isset( $_SESSION["retour"]) ){
        $retour = $_SESSION["retour"];
    }
    else{
        $retour="";
    }

    $db = new DbManager();
    $annonceRepo = $db->getAnnonceRepo();
    $annonce = $annonceRepo->getAnnonceById($id);
    
    $reservationRepo = $db->getReservationRepo();
    $dates = $reservationRepo->createJsonResa($id);

    Flight::render('annonceDetail', array(
        "annonce"=>$annonce,
        "dates"=> $dates,
        "retour"=>$retour
    ));
    
    if( isset( $_SESSION["retour"]) ){
        unset( $_SESSION["retour"] );
    }
});

// ##############################################################
Flight::route('/formAddAnnonce', function(){
    
    if(isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
    } else { $error = array();}
    if(isset($_SESSION["conseil"])) {
        $conseil = $_SESSION["conseil"];
    } else { $conseil = array();}
    if(isset($_SESSION["data"])) {
        $data = $_SESSION["data"];
    } else { $data = array();}

    Flight::render('formAddAnnonce', array(
        "error" => $error,
        "conseil" => $conseil,
        "data" => $data
    ));

    if(isset($_SESSION["error"])){    unset($_SESSION["error"]);    }
    if(isset($_SESSION["conseil"])){    unset($_SESSION["conseil"]);    }
    if(isset($_SESSION["data"])){    unset($_SESSION["data"]);    }

});

// ##############################################################
Flight::route('/addPhoto', function(){
    if(isset($_SESSION["conseil"])){
        $conseil = $_SESSION["conseil"];
    }
    else{
        $conseil = array();
    }

    if(isset($_SESSION["msg"])){
        $msg = $_SESSION["msg"];
    }
    else{
        $msg = array();
    }

    $db = new DbManager();
    $photoRepo = $db->getPhotoRepo();
    $path = $photoRepo->getPhotoByAnnonce($_SESSION["annonceId"]);

    Flight::render('formAddPhoto', array(
        "path"=>$path,
        "msg"=>$msg,
        "conseil"=>$conseil
    ));

    if(isset($_SESSION["msg"])){    unset($_SESSION["msg"]);    }
    if(isset($_SESSION["conseil"])){    unset($_SESSION["conseil"]);    }
    

});
// ##############################################################
// ##############################################################
Flight::route('/accounts', function(){
    
    if( isset( $_SESSION["search"]) ){
        $search = unserialize($_SESSION["search"]);
    }
    else{
        $search="";
    }
    $db = new DbManager();
    $userTypeRepo = $db->getUserTypeRepo();
    switch($_SESSION["type"]){
        case 1:
            $userType = $userTypeRepo->getAllUserTypeSupAs(0);
            break;
        case 2:
            $userType = $userTypeRepo->getAllUserTypeSupAs(2);
            break;
    }
    Flight::render('accounts', array(
        "userType"=>$userType,
        "user"=>$search
    ));
    if( isset( $_SESSION["search"]) ){
        unset( $_SESSION["search"] );
    }
});

// ##############################################################
Flight::route('/profil', function(){
    $db = new DbManager();
    $user = new User();
    $user->setId($_SESSION["id"]);
    $userRepo = $db->getUserRepo();
    $getUser = $userRepo->getUserById($user->getId());

    $type=$_SESSION["type"];
    $userTypeRepo = $db->getUserTypeRepo();
    $getType = $userTypeRepo->getUserType($type);
    
    Flight::render('profil', array(
        "user"=>$getUser,
        "type"=>$getType
    ));

});
// ##############################################################
// ##############################################################


Flight::start();
?>
