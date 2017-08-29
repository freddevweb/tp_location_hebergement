<?php

class DbManager {

    private $connexion;

    private $annonceRepo;
    private $commentaireRepo;
    private $locationRepo;
    private $photoRepo;
    private $userRepo;
    private $userTypeRepo;
    private $reservationRepo;


    public function __construct(){
        $this->connexion = Connexion::getConnexion();

        $this->setAnnonceRepo( new AnnonceRepo($this->connexion) );
        $this->setCommentaireRepo( new CommentaireRepo($this->connexion) );
        $this->setPhotoRepo( new PhotoRepo($this->connexion) );
        $this->setUserRepo( new UserRepo($this->connexion) );
        $this->setUserTypeRepo( new UserTypeRepo($this->connexion) );
        $this->setReservationRepo( new ReservationRepo($this->connexion) );
        $this->setLogementTypeRepo( new LogementTypeRepo($this->connexion) );

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
    public function getUserTypeRepo(){
        return $this->userTypeRepo;
    }
    public function setUserTypeRepo($userTypeRepo){
        $this->userTypeRepo = $userTypeRepo;
    }
    public function getReservationRepo(){
        return $this->reservationRepo;
    }
    public function setReservationRepo($reservationRepo){
        $this->reservationRepo = $reservationRepo;
    }
    public function getLogementTypeRepo(){
        return $this->logementTypeRepo;
    }
    public function setLogementTypeRepo($logementTypeRepo){
        $this->logementTypeRepo = $logementTypeRepo;
    }
}