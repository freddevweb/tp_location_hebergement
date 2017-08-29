<?php

class ReservationRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function checkResa( Reservation $reservation){

        $query = 'SELECT * FROM reservation WHERE annonce_id = :annonce and date_fin >= now()';
        $values = array( 
            'annonce'=>$reservation->getAnnonceId()
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $resa = $objet->fetchAll(PDO::FETCH_ASSOC);
        if(empty($resa)==false){
            foreach($resa as $resa){
                if(( $reservation->getDateDebut() <= $resa["date_debut"] && $reservation->getDateFin() > $resa["date_debut"] && $reservation->getDateFin() < $resa["date_fin"]) // deborde début
                || ( $reservation->getDateDebut() > $resa["date_debut"] && $reservation->getDateDebut() < $resa["date_fin"] && $reservation->getDateFin() >= $resa["date_fin"])  // deborde fin
                || ( $reservation->getDateDebut() >= $resa["date_debut"] && $reservation->getDateFin() <= $resa["date_fin"]) // compris entre
                || ( $reservation->getDateDebut() < $resa["date_debut"] && $reservation->getDateFin() > $resa["date_fin"]) // déborde des deux coté
                ){
                    return true;
                }
            }
        }
        return false;
    }


    public function saveResa( Reservation $reservation ){
        $query = 'INSERT INTO reservation SET user_id = :userid,  annonce_id = :annonce, date_debut = :dateDebut, date_fin = :dateFin';
        $values = array( 
            'userid'=>$reservation->getUserId(),
            'annonce'=>$reservation->getAnnonceId(),
            'dateDebut'=>$reservation->getDateDebut(),
            'dateFin'=>$reservation->getDateFin()
        );

        $objet = $this->connexion->prepare($query);
        $row = $objet;
        $objet->execute($values);
        if($row->rowCount() == 1){
            return $row->rowCount();
        }
        return false;
    }


    public function createJsonResa($annonceId){

        $query = 'SELECT date_debut, date_fin FROM reservation WHERE annonce_id = :annonce and date_fin > now()';
        $value = array( 
            'annonce'=>$annonceId
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($value);

        $resa = $objet->fetchAll(PDO::FETCH_ASSOC);

        $datesArray = [];

        if(empty($resa)==false){
            foreach($resa as $values){
                
                $date = date_create($values["date_debut"]);
                $length = date_diff($date, date_create($values["date_fin"])) ->format('%a');

                for($i = 0; $i <= $length; $i++){
                    $dateFormat = date_format($date,"Y-m-d");
                    $datesArray[] = $dateFormat;
                }
            }

            $json = json_encode($datesArray);
            return $json;
        }
        return false;
    }

}