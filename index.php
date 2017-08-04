<?php
session_start();

require 'flight/Flight.php';
require "autoloader.php";

Flight::render('nav', array('heading'=>'Hello'), "nav");
Flight::render('footer', array('traduction'=>'cool'), "footer");

/**
 * Alfonso: bravo toi au moins t'es bien parti!
 * Fred : merci mais c'est grace à ce que tu nous as appris. Le principe du tp c'est d'appliquer, pour ceux qui t'ont écouté en cours !!!
 * Alfonso: lol. merci!
 */

Flight::route('/', function(){
    $page = "accueil";
    
    $db = new DbManager();

    // $texteRepo = $db->getTextRepo();
    // $text = $texteRepo->getText($lang);
    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('accueil', array(
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

Flight::route('/addLocation', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    
    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('accueil', array(
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


Flight::route('/addLocation', function(){
    $page = "Ajouter une location";
    
    //$db = new DbManager();

    Flight::render('header', array('heading'=>$page), "header");
    Flight::render('accueil', array(
        "title"=>$page
    ));

});

Flight::start();
?>
