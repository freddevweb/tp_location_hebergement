<?php
session_start();

require 'flight/Flight.php';
require "autoloader.php";

Flight::render('header', array('heading'=>'RBNB'), "header");
Flight::render('footer', array('traduction'=>'cool'), "footer");

/**
 * Alfonso: bravo toi au moins t'es bien parti!
 * Fred : merci mais c'est grace à ce que tu nous as appris. Le principe du tp c'est d'appliquer, pour ceux qui t'ont écouté en cours !!!
 * Alfonso: lol. merci!
 */



Flight::route('/', function(){
    
    if( isset( $_SESSION["error"]) ){
        $error = $_SESSION["error"];
    }
    else{
        $error="";
    }
    
    $db = new DbManager();
    
    
    Flight::render('nav', array('heading'=>'Hello'), "nav");
    Flight::render('accueil', array(
        "error"=>$error
    ));

    if( isset( $_SESSION["error"]) ){
        unset( $_SESSION["error"] );
    }
});



Flight::route('/dashboardAdmin', function(){
    

    Flight::render('navAdmin', array('heading'=>'Hello'), "nav");
    Flight::render('dashboardAdmin', array(

    ));

});

Flight::route('/accounts', function(){
    
    if( isset( $_SESSION["search"]) ){
        $search = $_SESSION["search"];

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
    Flight::render('navAdmin', array('heading'=>'Hello'), "nav");
    Flight::render('accounts', array(
        "userType"=>$userType,
        "user"=>$search
    ));
    if( isset( $_SESSION["search"]) ){
        unset( $_SESSION["search"] );
    }

});

Flight::route('/dashboardControler', function(){
    
    //$db = new DbManager();

    
    Flight::render('navControleur', array('heading'=>'Hello'), "nav");
    Flight::render('dashboardControler', array(

    ));

});


Flight::route('/dashboardRender', function(){
    
    
    //$db = new DbManager();

    
    Flight::render('navRender', array('heading'=>'title'), "nav");
    Flight::render('dashboardrender', array(
        "title"=>$page
    ));

});

/**************************************/
Flight::route('POST /searchUserService', function(){
    
    $db = new DbManager();
    $user = new User();
    $user->setTypeId($_POST["type"]);
    $user->setPseudo( htmlspecialchars($_POST["name"]) );
    $search = $user->search($db);

    $_SESSION["search"] = $search;
    Flight::redirect('accounts');
});



Flight::start();
?>
