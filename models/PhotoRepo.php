<?php

class PhotoRepo {
    
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function getPhotoByAnnonce($id){

        $query = 'SELECT titre, photo_path FROM photo WHERE annonce_id = :id';
        $values = array( 
            'id'=>$id
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $photoPath = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($photoPath)){
            
            $arrayPhotoPath = [];
            foreach ( $photoPath as $tableauPhoto ) {
                $arrayPath[] = new Photo($tableauPhoto);
            }
            return $arrayPath;
        }
        return FALSE;
    }

    public function insertPhoto ( Photo $photo){
        $query = "INSERT INTO photo SET annonceId = :annonceId, titre = :titre, photoPath = :photoPath";
        $values = array(
            'annonceId'=>$annonce->getAnnonceId(),
            'titre'=>$annonce->getTitre(),
            'photoPath'=>$annonce->getPhotoPath()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }

    public function updatePhoto ( Photo $photo){
        $query = "UPDATE INTO photo SET annonceId = :annonceId, titre = :titre, photoPath = :photoPath WHERE id = :id";
        $values = array(
            'id'=>$annonce->getId(),
            'annonceId'=>$annonce->getAnnonceId(),
            'titre'=>$annonce->getTitre(),
            'photoPath'=>$annonce->getPhotoPath()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }


    public function savePhoto ( Photo $photo ){
        if ( empty( $photo->getId() ) == TRUE ){
            $row = $this->insertPhoto($photo);
            $function = 1;
        }
        else {
            $row = $this->updatePhoto($photo);
            $function = 2;
        }
        $arrayReturn = [];
        $arrayReturn[] = $function;
        $arrayReturn[] = $row;

        return $arrayReturn;
    }

    public function controlUpload(){

        $target_path = "uploads/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

        if (isset($_FILES['uploadedfile']) AND $_FILES['uploadedfile']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['uploadedfile']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['uploadedfile']['name']);

                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpeg', 'gif', 'png');// à tester le JPG et JPEG en majuscule
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    $newName = hash('sha1',$_FILES['uploadedfile']['name']).'.'.$extension_upload;
                    move_uploaded_file($_FILES['uploadedfile']['tmp_name'], 'uploads/' . basename($newName));
                    echo "Transfert du fichier complété !";
                }
            }else{
                echo 'Erreur fichier trop gros';
            }
        }else{
            $erreur = $_FILES['uploadedfile']['error'];
            echo "Le transfert du fichier a subis une erreur de code $erreur";
        }
    }



















    

}