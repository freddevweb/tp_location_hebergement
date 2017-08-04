<?php

class UserTypeRepo {
   
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }


    public function getUserType ( UserType $userType){
        $query = 'SELECT * FROM user_type WHERE id = :id';
        $values = array( 
            'id'=>$userType->getId()
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $type = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($type)){
            var_dump($type);
            return new User($type[0]);
        }
        return FALSE;
    }



















    


}