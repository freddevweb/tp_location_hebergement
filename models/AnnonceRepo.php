<?php

class AnnonceRepo {
    
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }
    
    public function getAnnoncesByHote( $hoteId ){
        $queryAnn = "SELECT id, titre, tarif FROM annonce WHERE statut_id = 1 and user_id = :hote order by id asc";
        $valuesAnn = array( 
            "hote"=> $hoteId
          );
        $objetAnn = $this->connexion->prepare($queryAnn);
        $objetAnn->execute($valuesAnn);
        $annonce = $objetAnn->fetchAll(PDO::FETCH_ASSOC);

        $queryPhoto = "SELECT *  FROM photo order by annonce_id, type_id  ";
        $valuesPhoto = array(   );
        $objetPhoto = $this->connexion->prepare($queryPhoto);
        $objetPhoto->execute($valuesPhoto);
        $photo = $objetPhoto->fetchAll(PDO::FETCH_ASSOC);


        foreach($annonce as &$value){

            $value["photos"] = [];
            
            foreach($photo as $val){

                if( $value["id"] == $val["annonce_id"]){

                    $value["photos"][] = $val;

                }
            }
        }

        if (!empty($annonce)){
            return $annonce;
        }
        return FALSE;
    }

    public function getAnnonceById($id){

        $values = array(  
            "id" => $id
         );

        $queryAnn = "SELECT *  FROM annonce WHERE id = :id";
        $objetAnn = $this->connexion->prepare($queryAnn);
        $objetAnn->execute($values);
        $annonce = $objetAnn->fetchAll(PDO::FETCH_ASSOC);

        $queryPhoto = "SELECT *  FROM photo where annonce_id = :id ";
        $objetPhoto = $this->connexion->prepare($queryPhoto);
        $objetPhoto->execute($values);
        $photo = $objetPhoto->fetchAll(PDO::FETCH_ASSOC);

        foreach($annonce as &$value){

            $value["photos"] = [];
            
            foreach($photo as $val){

                if( $value["id"] == $val["annonce_id"]){

                    $value["photos"][] = $val;

                }
            }
        }

        if (!empty($annonce[0])){
            return $annonce[0];
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
            'hDepart'=>$annonce->getHDepart()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);
        
        return $this->connexion->lastInsertId();
    }

    public function updateAnnonce ( Annonce $annonce){
        $query = "UPDATE annonce SET user_id = :user_id, titre = :titre, type_logement_id = :type_logement_id, adress = :adress, tarif = :tarif, surface = :surface, nbreChambre = :nbreChambre, nbrePieces = :nbrePieces, description = :description, codePostal = :codePostal, ville = :ville, capacite = :capacite, arriveeDebut = :arriveeDebut, arriveeFin = :arriveeFin, fumeur = :fumeur, television = :television, chauffage = :chauffage, climatisation = :climatisation, sdb = :sdb, parking = :parking, laveLinge = :laveLinge, wifi = :wifi, hDepart = :hDepart, statut_id = 2 WHERE id = :id";
        $values = array(
            'id'=>$annonce->getId(),
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
            'hDepart'=>$annonce->getHDepart()
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

    }


    public function saveAnnonce ( Annonce $annonce ){
        if ( empty( $annonce->getId() )){
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

    public function getAnnonces(){

        $queryAnn = "SELECT id, titre, tarif, capacite  FROM annonce WHERE statut_id = 1 order by id asc";
        $valuesAnn = array(   );
        $objetAnn = $this->connexion->prepare($queryAnn);
        $objetAnn->execute($valuesAnn);
        $annonce = $objetAnn->fetchAll(PDO::FETCH_ASSOC);

        $queryPhoto = "SELECT *  FROM photo order by annonce_id, type_id  ";
        $valuesPhoto = array(   );
        $objetPhoto = $this->connexion->prepare($queryPhoto);
        $objetPhoto->execute($valuesPhoto);
        $photo = $objetPhoto->fetchAll(PDO::FETCH_ASSOC);

        $queryFav = "SELECT annonce_id, count(annonce_id) from favoris group by annonce_id order by annonce_id";
        $valuesFav = array(   );
        $objetFav = $this->connexion->prepare($queryFav);
        $objetFav->execute($valuesFav);
        $fav = $objetFav->fetchAll(PDO::FETCH_ASSOC);
        
        $tableauAnnFav = array();

        foreach($annonce as $key => $value){
            foreach($fav as $key1 => $value1){
                if( $value["id"] == $value1["annonce_id"]){
                    $value["count"] = $value1["count(annonce_id)"];
                    break;
                }
                else{
                    $value["count"] =0;
                }
            }
            $tableauAnnFav[]=$value;
        }

        foreach($tableauAnnFav as &$value){

            $value["photos"] = [];
            
            foreach($photo as $val){

                if( $value["id"] == $val["annonce_id"]){

                    $value["photos"][] = $val;

                }
            }
        }

        usort($tableauAnnFav, function($a, $b){
            if ($a["count"] == $b["count"]) {
                return 0;
            }
            return ($a["count"] < $b["count"]) ? 1 : -1;
        });

        if (!empty($tableauAnnFav)){
            return $tableauAnnFav;
        }
        return FALSE;
    }


    public function getAnnoncesSearch( Annonce $annonce){

        $queryAnn = "SELECT id, titre, tarif, capacite  FROM annonce WHERE statut_id = 1 order by id asc";
        $valuesAnn = array(
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
        $objetAnn = $this->connexion->prepare($queryAnn);
        $objetAnn->execute($valuesAnn);
        $annonce = $objetAnn->fetchAll(PDO::FETCH_ASSOC);

        $queryPhoto = "SELECT *  FROM photo order by annonce_id, type_id  ";
        $valuesPhoto = array(   

        );
        $objetPhoto = $this->connexion->prepare($queryPhoto);
        $objetPhoto->execute($valuesPhoto);
        $photo = $objetPhoto->fetchAll(PDO::FETCH_ASSOC);

        $queryFav = "SELECT annonce_id, count(annonce_id) from favoris group by annonce_id order by annonce_id";
        $valuesFav = array(   );
        $objetFav = $this->connexion->prepare($queryFav);
        $objetFav->execute($valuesFav);
        $fav = $objetFav->fetchAll(PDO::FETCH_ASSOC);
        
        $tableauAnnFav = array();

        foreach($annonce as $key => $value){
            foreach($fav as $key1 => $value1){
                if( $value["id"] == $value1["annonce_id"]){
                    $value["count"] = $value1["count(annonce_id)"];
                    break;
                }
                else{
                    $value["count"] =0;
                }
            }
            $tableauAnnFav[]=$value;
        }

        foreach($tableauAnnFav as &$value){

            $value["photos"] = [];
            
            foreach($photo as $val){

                if( $value["id"] == $val["annonce_id"]){

                    $value["photos"][] = $val;

                }
            }
        }

        usort($tableauAnnFav, function($a, $b){
            if ($a["count"] == $b["count"]) {
                return 0;
            }
            return ($a["count"] < $b["count"]) ? 1 : -1;
        });

        if (!empty($tableauAnnFav)){
            return $tableauAnnFav;
        }
        return FALSE;
    }


}