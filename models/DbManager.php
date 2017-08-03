<?php

class DbManager {

    private $connexion;

    private $annonceRepo;
    private $commentaireRepo;
    private $locationRepo;
    private $photoRepo;
    private $userRepo;


    public function __construct(){
        $this->connexion = Connexion::getConnexion();

        $this->setAnnonceRepo(new AnnonceRepo($this->connexion));
        $this->setCommentaireRepo(new CommentaireRepo($this->connexion));
        $this->setLocationRepo(new LocationRepo($this->connexion));
        $this->setPhotoRepo(new PhotoRepo($this->connexion));
        $this->setUserRepo(new UserRepo($this->connexion));
    }


    public function getAnnonceRepo(){
        return $this->annonceRepo;
    }
    public function setAnnonceRepo($annonceRepo){
        $this->annonceRepo = $annonceRepo;
    }
    public function getCommentaireRepo(){
        return $this->commentaireRepo;
    }
    public function setCommentaireRepo($commentaireRepo){
        $this->commentaireRepo = $commentaireRepo;
    }
    public function getLocationRepo(){
        return $this->locationRepo;
    }
    public function setLocationRepo($locationRepo){
        $this->locationRepo = $locationRepo;
    }
    public function getPhotoRepo(){
        return $this->photoRepo;
    }
    public function setPhotoRepo($photoRepo){
        $this->photoRepo = $photoRepo;
    }
    public function getUserRepo(){
        return $this->userRepo;
    }
    public function setUserRepo($userRepo){
        $this->userRepo = $userRepo;
    }
}