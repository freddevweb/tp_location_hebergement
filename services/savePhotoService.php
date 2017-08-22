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

    

    if( !empty($_POST["type"])){
        
        if( !empty($_POST["titre"])){

            if( !empty($_FILES['uploadedfile']) ){

                $target_path = "../photos/";

                $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);


                
                if (isset($_FILES['uploadedfile']) AND $_FILES['uploadedfile']['error'] == 0)
                {
                    
                    if ($_FILES['uploadedfile']['size'] <= 1000000)
                    {
                        
                        $infosfichier = pathinfo($_FILES['uploadedfile']['name']);

                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('jpeg', 'jpg', 'gif', 'png');

                        if (in_array($extension_upload, $extensions_autorisees))
                        {
                            $newName = $_FILES['uploadedfile']['name'].$_POST["type"].$_SESSION["id"];
                            $Name = hash('sha1',$newName).'.'.$extension_upload;
                            move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "../photos/" . $Name);
                            $message = "Le transfert du fichier est terminé !";

                            $db = new DbManager();
                            $newPhoto = new Photo();
                            $newPhoto->setAnnonceId($_SESSION["annonceId"] ); 
                            $newPhoto->setType(htmlspecialchars( $_POST["type"] ) );
                            $newPhoto->setTitre( htmlspecialchars( $_POST["titre"] ) );
                            $newPhoto->setPhotoPath("../photos/" . $Name);
                            
                            $newPhoto->save($db);
                        }
                    }else{
                        $message = 'Erreur : le fichier est trop gros';
                    }
                }else{
                    $erreur = $_FILES['uploadedfile']['error'];
                    $message = "Le transfert du fichier a subis une erreur de code $erreur";
                }
                
            }
        }
        else {
            $message = "Vous n'avez pas renseigné de titre a votre photo";
        }
    }
    else {
        $message = "Vous n'avez pas renseigné le type de la photo";
    }


    $_SESSION["msg"]= $message;
    header('Location:../addPhoto');











































