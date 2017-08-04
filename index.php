<?php
session_start();

require 'flight/Flight.php';
require "autoloader.php";

Flight::render('footer', array('traduction'=>'cool'), "footer");

/**
 * Alfonso: bravo toi au moins t'es bien parti!
 * Fred : merci mais c'est grace à ce que tu nous as appris. Le principe du tp c'est d'appliquer, pour ceux qui t'ont écouté en cours !!!
 * Alfonso: lol. merci!
 */



Flight::route('/', function(){
    $page = "accueil";
    $error = "";
    if( isset( $_SESSION["error"]) ){
        $error = $_SESSION["error"];
    }
    
    $db = new DbManager();

    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('nav', array('heading'=>'Hello'), "nav");
    Flight::render('accueil', array(
        "title"=>$page,
        "error"=>$error
    ));

    if( isset( $_SESSION["error"]) ){
        unset( $_SESSION["error"] );
    }
});



Flight::route('/dashboardadmin', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    
    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('dashboardadmin', array(
        "title"=>$page
    ));

});

Flight::route('/dashboardcontroler', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    
    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('dashboardcontroler', array(
        "title"=>$page
    ));

});


Flight::route('/dashboardrender', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    
    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('dashboardrender', array(
        "title"=>$page
    ));

});


Flight::route('/addLocation', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('accueil', array(
        "title"=>$page
    ));

});

Flight::route('POST /loginService', function(){
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
                
                Flight::redirect('/dashboardAdmin');
            }
            if($control->getTypeId() == 2){
                // $value = $user->getPseudo().$user->getEmails().$user->getInscription();
                // $_SESSION["id"] = hash('sha256', $value);

                Flight::redirect('/dashboardcontroler');
            }
            if($control->getTypeId() == 3){

                Flight::redirect('/dashboardrenter');
            }
        }
    }
    else {
        if( empty($userEmail) && empty($userPassReal) ){
            $error = "Email et mot de passe non renseignés";
        }
        if( empty($userEmail) xor empty($userPassReal) ){
            if( empty($userEmail) ){
                $error = "Email non renseigné";
            }
            if( empty($userPassReal) ){
                $error = "Mot de passe non renseigné";
            }
        }
        
        $_SESSION["error"] = $error;
        Flight::redirect('/');
    }
});


Flight::start();
?>
