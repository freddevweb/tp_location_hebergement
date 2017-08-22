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

    public function save( Photo $photo){
        var_dump($photo);
        $query = "INSERT INTO photo SET annonce_id = :annonce_id, type_id = :type_id, titre = :titre, photo_path = :photo_path";
        $values = array(
            'annonce_id'=>$photo->getAnnonceId(),
            'type_id'=>$photo->getType(),
            'titre'=>$photo->getTitre(),
            'photo_path'=>$photo->getPhotoPath(),
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);
    }

    public function delete( Photo $photo){

        unlink($photo->getPhotoPath());

        $name = preg_replace( "../photos/", $photo->getPhotoPath(), "" );
        $path = scandir("photos/");
        if(in_array($name, $path)){
            $query = "DELETE FROM photo WHERE id = :id";
            $values = array(
                'id'=> $photo->getId()
            );
            $objet = $this->connexion->prepare($query);
            $objet->execute($values);
            $msg = "La photo a bien été supprimée.";
        }
        else{
            $msg = "La photo n'a pas pu été supprimée, veuillez contacter notre service client.";
        }

        return $msg;
        
    }

















    

}