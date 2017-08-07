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


    // public function launchControls( User $user ){
        
    //     var_dump($user);
    //     var_dump($user->getpseudo());
    //     die("ici");
    //     $user->getpseudo()

    //     if( empty($user[]) ){ // $this->params['username'] represente ici $_POST['username']
    //         $this->error['username'] = "nom utilisateur manquant";
    //     }
    //     if( empty($this->params['password']) ){ // $this->params['password'] represente ici $_POST['password']
    //         $this->error['password'] = "mot de passe manquant";
    //     }
    //     if( empty($this->error) == false ){
    //         return $this->error;
    //     }
    //     $this->user = $this->checkUsernamePassword();
    //     if( empty($this->user) ){
    //         $this->error['identifiants']="le nom d'\utilisateur ou mot de passe incorrect";
    //         return $this->error;
    //     }
    //     else {
    //         return $this->user;
    //     }
    // }











    
}