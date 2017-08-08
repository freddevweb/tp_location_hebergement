<?php

class UserTypeRepo {
   
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }


    public function getUserType ( $userType ){
        $query = 'SELECT * FROM user_type WHERE id = :id';
        $values = array( 
            'id'=>$userType->getId()
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $type = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($type)){
            return new UserType($type[0]);
        }
        return FALSE;
    }

    public function getAllUserTypeSupAs($value){
        $query = 'SELECT * FROM user_type WHERE id > :id';
        $values = array( 
            'id'=>$value
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $type = $objet->fetchAll(PDO::FETCH_ASSOC);
        $arrayUserType = [];
        foreach ( $type as $tableauUserType){
            $arrayUserType[]= new UserType($tableauUserType);
        }
        return $arrayUserType;
    }

    

















    


}