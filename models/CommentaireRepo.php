<?php

class CommentaireRepo {
    
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }


    public function addCommentaire(Commentaire $commentaire){

        $query = "INSERT INTO commentaire SET annonceId = :annonceId, user_id = :userid, commentaire = :commentaire";
        $values = array(
            'annonceId'=>$commentaire->getAnnonceId(),
            'userid'=>$commentaire->getTitre(),
            'commentaire'=>$commentaire->getPhotoPath()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();

        
    }

    public function getCommentaire($annonceId){

        $query = "INSERT INTO commentaire SET annonceId = :annonceId, user_id = :userid, commentaire = :commentaire";
        $values = array(
            'annonceId'=>$commentaire->getAnnonceId(),
            'userid'=>$commentaire->getTitre(),
            'commentaire'=>$commentaire->getPhotoPath()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();

        
    }

    public function countCommentaire(){

        $query = "SELECT annonce_id, count(annonce_id) FROM commentaire GROUP BY annonce_id";
        $values = array(        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        $comment = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($comment)){
            
            $arrayComment = [];
            foreach ( $comment as $tableauComment ) {
                $arrayComment[] = new Photo($tableauComment);
            }
            return $arrayComment;
        }
        return FALSE;
        
    }





















} 