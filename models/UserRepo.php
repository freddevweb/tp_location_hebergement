<?php

class UserRepo {
    
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

        $user = $objet->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($user)){
            
            return new User($user[0]);
        }
        return FALSE;
    }

    

    public function checkUserEmailPassword(User $user){
        $userEmail = $user->getEmail();
        $userPass = $user->getWp();

        $query = 'SELECT * FROM user WHERE email = :email and wp = :wp';
        $values = array( 
            'email'=>$userEmail,
            'wp'=>$userPass
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $user = $objet->fetchAll(PDO::FETCH_ASSOC);

        if(empty($user)==false){
            return new User($user[0]);
        }
        return false;
    }

    public function updateConnexion( User $user){
        $userEmail = $user->getEmail();
        
        $query = 'UPDATE user set connexion = NOW() WHERE email = :email';
        $values = array( 
            'email'=>$userEmail,
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
    }

    public function checkEmailExist($email){

        $query = 'SELECT * FROM user WHERE email = :email';
        $values = array( 
            'email'=>$email
        );

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $validation = $objet->fetchAll(PDO::FETCH_ASSOC);

        if(empty($user)){
            return false;
        }
        return true;
    }

    public function saveUser( User $user ){

        $query = "INSERT INTO user SET pseudo = :pseudo, email = :email, type_id = :type_id, wp = :wp, inscription = now(), connexion = now()";
        $values = array(
            'pseudo'=>$user->getPseudo(),
            'email'=>$user->getEmail(),
            'type_id'=>$user->getTypeId(),
            'wp'=>$user->getWp(),
        );

        $pdo = $this->connexion->prepare($query);
        $pdo->execute($values);

        return $pdo->rowCount();
    }

    public function getAllUserByType($type){
        $query = 'SELECT * FROM user WHERE type_id = :type_id';
        $values = array( 
            'type_id'=>$type
        );
        $objet = $this->connexion->prepare($query);
        $objet->execute($values);
        $user = $objet->fetchAll(PDO::FETCH_ASSOC);

        $arrayUser = [];
        foreach ( $user as $tableauUser){
            $arrayUser[]= new User($tableauUser);
        }
        return $arrayUser;
    }

    public function getUserByTypeOrAndName ( User $user){

        if( !empty($user->getTypeId()) && !empty($user->getPseudo()) ){
            $query = 'SELECT * FROM user WHERE type_id = :id and pseudo = :pseudo';
            $values = array( 
                'id'=>$user->getTypeId(),
                'pseudo'=>$user->getPseudo()
            );
        }
        else if( !empty($user->getTypeId()) && empty($user->getPseudo()) ){
            $query = 'SELECT * FROM user WHERE type_id = :id ORDER BY pseudo';
            $values = array( 
                'id'=>$user->getTypeId(),
            );
        }
        else if( empty($user->getTypeId()) && !empty($user->getPseudo()) ){
            $query = 'SELECT * FROM user WHERE pseudo LIKE :pseudo ORDER BY pseudo';
            $values = array(
                'pseudo'=>($user->getPseudo()).'%'
            );
        }
        else if( empty($user->getTypeId()) && empty($user->getPseudo()) ){
            $query = 'SELECT * FROM user';
            $values = array( );
        }

        $objet = $this->connexion->prepare($query);
        $objet->execute($values);

        $users = $objet->fetchAll(PDO::FETCH_ASSOC);
        
        if (!empty($users)){
            $arrayUsers = [];
            foreach ( $users as $user){
                $arrayUsers[]= new User($user);
            }
            return $arrayUsers;
        }
        return FALSE;
    }


/* 
Admin
Validator
Loueur
User */





    
}