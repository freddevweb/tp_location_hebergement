<?php

class PhotoRepo {
    
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function getUser($email){

        $query = 'SELECT * FROM user WHERE email = :email';
        $values = array( 
            'email'=>$email
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $voiture = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($voiture)){
            
            return new Voiture($voiture[0]);
        }
        return FALSE;
    }





















    

}