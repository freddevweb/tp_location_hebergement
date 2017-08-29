<?php
    session_start();

    require "autoloader1.php";


    if (!empty($_POST["typeName"])){
        $db = new DbManager();
        $user = new User();
        $user->setTypeId($_POST["typeName"]);
        $user->setId($_POST["id"]);
        $user->updateUserTypeId($db);
    }
    

    header('Location:../accounts');
