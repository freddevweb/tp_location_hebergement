<?php

class LogementTypeRepo {

    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function getType (){

        $query = "SELECT * FROM logement_type";
        $values = array(    );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $type = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($type)){
            
            $arrayType = [];
            foreach ( $type as $tableauType ) {
                $arrayType[] = new LogementType($tableauType);
            }
            return $arrayType;
        }
        return FALSE;
    }





















    
}