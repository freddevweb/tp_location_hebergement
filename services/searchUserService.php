<?php

    session_start();

    require "autoloader1.php";

    $db = new DbManager();
    $user = new User();
    $user->setTypeId($_POST["type"]);
    $user->setPseudo( htmlspecialchars($_POST["name"]) );
    $search = $user->search($db);
    
    $_SESSION["search"] = serialize($search);

    header('Location:../accounts');
