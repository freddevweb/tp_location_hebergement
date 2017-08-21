<?php
session_start();

require 'flight/Flight.php';
require "autoloader.php";

Flight::render('header', array('heading'=>'RBNB'), "header");
Flight::render('footer', array('traduction'=>'cool'), "footer");
if( isset($_SESSION["type"]) ){
    switch($_SESSION["type"]){
        case 1:
            Flight::render('navAdmin', array('heading'=>'Hello'), "nav");
            break;
        case 2:
            Flight::render('navControleur', array('heading'=>'Hello'), "nav");
            break;
        case 3:
            Flight::render('navRender', array('heading'=>'title'), "nav");
            break;
        case 4:
            Flight::render('navUser', array('heading'=>'title'), "nav");
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
    Flight::render('accueil', array(
        "error"=>$error
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
    $db = new DbManager();

    
    Flight::render('dashboardRender', array(
        
    ));

});

// ##############################################################
Flight::route('/dashboardUser', function(){
    //$db = new DbManager();
    Flight::render('dashboardUser', array(
        
    ));

});
// ##############################################################
// ##############################################################
Flight::route('/annonces', function(){
    $db = new DbManager();
    $annonceRepo = $db->getAnnonceRepo();
    $annonces = $annonceRepo->getAnnoncesByHote($_SESSION['id']);
    Flight::render('annonces', array(
        
    ));

});

// ##############################################################
Flight::route('/annonceDetail', function(){
    $db = new DbManager();
    

    Flight::render('locationDetail', array(
        
    ));

});

// ##############################################################
Flight::route('/formAddAnnonce', function(){
    if(isset($_SESSION["error"])) {
        $error = $_SESSION["error"];
    } else { $error = "";}
    if(isset($_SESSION["conseil"])) {
        $conseil = $_SESSION["conseil"];
    } else { $conseil = "";}
    if(isset($_SESSION["data"])) {
        $data = $_SESSION["data"];
    } else { $data = "";}

    Flight::render('formAddAnnonce', array(
        "error" => $error,
        "conseil" => $conseil,
        "data" => $data
    ));

});

// ##############################################################
Flight::route('/addPhoto', function(){
    
    Flight::render('formAddPhoto', array(
        
    ));

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
