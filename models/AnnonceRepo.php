<?php

class AnnonceRepo {
    
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }
    
    public function getAnnoncesByHote( $hoteId ){
        $query = 'SELECT * FROM annonce WHERE user_id = :id';
        $values = array( 
            'id'=>$hoteId
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $annonce = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($annonce)){
            $arrayAnnonce = [];
            foreach ( $annonce as $tableauAnnonce){
                $arrayAnnonce[]= new Annonce($tableauAnnonce);
            }
            return $arrayAnnonce;
        }
        return FALSE;
    }

    public function getAnnonce ( $id ){
        $query = 'SELECT * FROM annonce WHERE id = :id';
        $values = array( 
            'id'=>$id
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $annonce = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($annonce)){
            
            return new Annonce($annonce[0]);
        }
        return FALSE;
    }


    public function insertAnnonce ( Annonce $annonce){
        
        $query = "INSERT INTO annonce SET user_id = :user_id, titre = :titre, type_logement_id = :type_logement_id, adress = :adress, tarif = :tarif, surface = :surface, nbreChambre = :nbreChambre, nbrePieces = :nbrePieces, description = :description, codePostal = :codePostal, ville = :ville, capacite = :capacite, arriveeDebut = :arriveeDebut, arriveeFin = :arriveeFin, fumeur = :fumeur, television = :television, chauffage = :chauffage, climatisation = :climatisation, sdb = :sdb, parking = :parking, laveLinge = :laveLinge, wifi = :wifi, hDepart = :hDepart, statut_id = 1";
        $values = array(
            'user_id'=>$annonce->getUserId(),
            'titre'=>$annonce->getTitre(),
            'type_logement_id'=>$annonce->getTypeLogementId(),
            'adress'=>$annonce->getAdress(),
            'tarif'=>$annonce->getTarif(),
            'surface'=>$annonce->getSurface(),
            'nbreChambre'=>$annonce->getNbreChambre(),
            'nbrePieces'=>$annonce->getNbrePieces(),
            'description'=>$annonce->getDescription(),
            'codePostal'=>$annonce->getCodePostal(),
            'ville'=>$annonce->getVille(),
            'capacite'=>$annonce->getCapacite(),
            'arriveeDebut'=>$annonce->getArriveeDebut(),
            'arriveeFin'=>$annonce->getArriveeFin(),
            'fumeur'=>$annonce->getFumeur(),
            'television'=>$annonce->getTelevision(),
            'chauffage'=>$annonce->getChauffage(),
            'climatisation'=>$annonce->getClimatisation(),
            'sdb'=>$annonce->getSdb(),
            'parking'=>$annonce->getParking(),
            'laveLinge'=>$annonce->getLaveLinge(),
            'wifi'=>$annonce->getWifi(),
            'hDepart'=>$annonce->getHDepart(),
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);
        
        return $this->connexion->lastInsertId();
    }

    public function updateAnnonce ( Annonce $annonce){
        $query = "UPDATE INTO annonce SET user_id = :userId, titre = :titre, type_logement_id = :typeLogementId, tarif = :tarif, surface = surface, nbreChambre = nbreChambre, nbrePieces = :nbrePieces, description = description, codePostal = :codePostal, ville = ville, capacite = :capacite, arriveeDebut = :arriveeDebut, arriveeFin = :arriveeFin, fumeur = :fumeur, television = television, chauffage = chauffage, climatisation = :climatisation, sdb = :sdb, parking = parking, laveLinge = laveLinge, wifi = wifi, hDepart = hDepart, statut = 1 WHERE id = :id";
        $values = array(
            'id'=>$annonce->getId(),
            'userId'=>$annonce->getUserId(),
            'titre'=>$annonce->getTitre(),
            'typeLogementId'=>$annonce->getTypeLogementId(),
            'tarif'=>$annonce->getTarif(),
            'surface'=>$annonce->getSurface(),
            'nbreChambre'=>$annonce->getNbreChambre(),
            'nbrePieces'=>$annonce->getNbrePieces(),
            'description'=>$annonce->getDescription(),
            'codePostal'=>$annonce->getCodePostal(),
            'ville'=>$annonce->getVille(),
            'capacite'=>$annonce->getCapacite(),
            'arriveeDebut'=>$annonce->getArriveeDebut(),
            'arriveeFin'=>$annonce->getArriveeFin(),
            'fumeur'=>$annonce->getFumeur(),
            'television'=>$annonce->getTelevision(),
            'chauffage'=>$annonce->getChauffage(),
            'climatisation'=>$annonce->getClimatisation(),
            'sdb'=>$annonce->getSdb(),
            'parking'=>$annonce->getParking(),
            'laveLinge'=>$annonce->getLaveLinge(),
            'wifi'=>$annonce->getWifi(),
            'hDepart'=>$annonce->getHDepart()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        // var_dump()
        return $pdo->lastIsertId();
    }


    public function saveAnnonce ( Annonce $annonce ){
        if ( empty( $annonce->getId() ) == TRUE ){
            $id = $this->insertAnnonce($annonce);
            $function = 1;
        }
        else {
            $row = $this->updateAnnonce($annonce);
            $id=0;
            $function = 2;
        }
        $arrayReturn = [];
        $arrayReturn["state"] = $function;
        $arrayReturn["id"] = $id;

        return $arrayReturn;
    }




} 