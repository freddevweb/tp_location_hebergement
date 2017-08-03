<?php
session_start();

require 'flight/Flight.php';
require "autoloader.php";

Flight::render('nav', array('heading'=>'Hello'), "nav");
Flight::render('footer', array('traduction'=>'cool'), "footer");

/**
 * Alfonso: bravo toi au moins t'es bien parti!
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
