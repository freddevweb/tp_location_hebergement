<?php

class ReservationRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function checkResa( Reservation $reservation){
        $annonceId = $reservation->getAnnonceId();
        $dateDebut = $reservation->getDateDebut();
        $dateFin = $reservation->getDateFin();

        $query = 'SELECT * FROM user WHERE annonce_id = :annonce';
        $values = array( 
            'annonce'=>$annonceId
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $resa = $objet->fetchAll(PDO::FETCH_ASSOC);


        var_dump($resa);

        if(empty($user)==false){
            return new User($user[0]);
        }
        return false;
    }


    public function saveResa( Reservation $reservation ){

    }


}