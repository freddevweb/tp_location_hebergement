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


    public function getAnnoncesSearch($array){
        // check de ce qu'il faut pas prendre si date de réservations entrées
        if (array_key_exists("arrivee", $array) && array_key_exists("depart", $array)){
            $querySel = "SELECT annonce_id  FROM reservation WHERE ";
            $queryResaArray = array();
            $queryResaEnd = " GROUP BY annonce_id";

            $queryResaArray["date_debut"]= ":arrivee";
            $valueResaArrivee = '"'.$array["arrivee"].'"' ;
        
            $queryResaArray["date_fin"] = ":depart";
            $valueResaDepart = '"'.$array["depart"].'"' ;
            
            $querySel .= '(date_debut <= '.$valueResaArrivee.' AND date_fin > '.$valueResaArrivee.' AND date_fin < '.$valueResaDepart.')';
            $querySel .= ' OR (date_debut > '.$valueResaArrivee.' AND date_debut < '.$valueResaDepart.' AND date_fin >= '.$valueResaDepart.')';
            $querySel .= ' OR (date_debut >= '.$valueResaArrivee.' AND date_fin <= '.$valueResaDepart.')';
            $querySel .= ' OR (date_debut < '.$valueResaArrivee.' AND date_fin > '.$valueResaDepart.')';
            
            $querySel .=$queryResaEnd;
        }

        // selection des annonces
        $queryAnnStart ="SELECT id, titre, tarif, capacite FROM annonce WHERE statut_id = 1 ";
        $queryAnnEnd = " AND id NOT IN (".$querySel.") ORDER BY id";
        
        $queryAnnArray = array();
        $valueAnnArray =array();
        $queryFavArray = array();
        $valueFavArray =array();

        if(array_key_exists("ville", $array)){
            $queryAnnArray[]= "ville = :ville"; 
            $valueAnnArray["ville"] = $array["ville"] ;
        }
        if(array_key_exists("type", $array)){
            $queryAnnArray[]= "type_logement_id = :type";
            $valueAnnArray["type"] = $array["type"] ;
        }
        if(array_key_exists("fumeur", $array)){
            $queryAnnArray[]= "fumeur = :fumeur";
            $valueAnnArray["fumeur"] = 1 ;
        }
        if(array_key_exists("television", $array)){
            $queryAnnArray[]= "television = :television"; 
            $valueAnnArray["television"] = 1 ;
        }
        if(array_key_exists("chaufage", $array)){
            $queryAnnArray[]= "chauffage = :chaufage";
            $valueAnnArray["chaufage"] = 1 ;
        }
        if(array_key_exists("climatisation", $array)){
            $queryAnnArray[]= "climatisation = :climatisation";
            $valueAnnArray["climatisation"] = 1 ;
        }
        if(array_key_exists("sdb", $array)){
            $queryAnnArray[]= "sdb = :sdb";
            $valueAnnArray["sdb"] = 1 ;
        }
        if(array_key_exists("parking", $array)){
            $queryAnnArray[]= "parking = :parking";
            $valueAnnArray["parking"] = 1 ;
        }
        if(array_key_exists("laveLinge", $array)){
            $queryAnnArray[]= "laveLinge = :laveLinge";
            $valueAnnArray["laveLinge"] = 1 ;
        }
        if(array_key_exists("wifi", $array)){
            $queryAnnArray[]= "wifi = :wifi";
            $valueAnnArray["wifi"] = 1 ;
        }
        
        $queryAnn = $queryAnnStart;

        foreach($queryAnnArray as $value){
            $queryAnn .= ' and '.$value;
        }
        $queryAnn .= $queryAnnEnd;

        $objetAnn = $this->connexion->prepare($queryAnn);
        $objetAnn->execute($valueAnnArray);
        $annonces = $objetAnn->fetchAll(PDO::FETCH_ASSOC);

        // sélection des potos correspondantes
        $queryPhoto = "SELECT * FROM photo WHERE annonce_id NOT IN (".$querySel.") order by annonce_id, type_id";
        $valuesPhoto = array(   );
        $objetPhoto = $this->connexion->prepare($queryPhoto);
        $objetPhoto->execute($valuesPhoto);
        $photo = $objetPhoto->fetchAll(PDO::FETCH_ASSOC);
        
        // ajout d'une colone favoris
        $queryFav = "SELECT annonce_id, count(annonce_id) from favoris where annonce_id NOT IN (".$querySel.") group by annonce_id order by annonce_id";
        $valuesFav = array(   );
        $objetFav = $this->connexion->prepare($queryFav);
        $objetFav->execute($valuesFav);
        $fav = $objetFav->fetchAll(PDO::FETCH_ASSOC);
        
        $tableauAnnFav = array();

        foreach($annonces as $key => $value){

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

        if(array_key_exists("classement", $array)){

            switch ($array["classement"]){
                case "pc" :
                    usort($tableauAnnFav, function($a, $b){
                        if ($a["tarif"] == $b["tarif"]) {
                            return 0;
                        }
                        return ($a["tarif"] < $b["tarif"]) ? -1 : 1;
                    });
                    break;
                case "pd" :
                    usort($tableauAnnFav, function($a, $b){
                        if ($a["tarif"] == $b["tarif"]) {
                            return 0;
                        }
                        return ($a["tarif"] < $b["tarif"]) ? 1 : -1;
                    });
                    break;
                case "fc":
                    usort($tableauAnnFav, function($a, $b){
                        if ($a["tarif"] == $b["tarif"]) {
                            return 0;
                        }
                        return ($a["tarif"] < $b["tarif"]) ? -1 : 1;
                    });
                    break;
                case "fd":
                    usort($tableauAnnFav, function($a, $b){
                        if ($a["tarif"] == $b["tarif"]) {
                            return 0;
                        }
                        return ($a["tarif"] < $b["tarif"]) ? 1 : -1;
                    });
                    break;
            }
        }

        if (!empty($tableauAnnFav)){

            return $tableauAnnFav;

        }

        return FALSE;
    }
}