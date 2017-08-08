<?php

class User {
    
    private $id;
    private $pseudo;
    private $email;
    private $typeId;
    private $wp;
    private $inscription;
    private $derConnexion;

    // *********** constructor
    public function __construct($donnees=array()){
        $this->hydrate($donnees);
    }

    // *********** hydrate
    public function hydrate(array $donneesTableau){

        if(empty($donneesTableau) == false){
            foreach ($donneesTableau as $key => $value){
                $newString=$key;
                if(preg_match("#_#",$key)){
                    $word = explode("_",$key);
                    $newString = "";
                    foreach ($word as $w){
                        $newString.=ucfirst($w);
                    }
                }
                $method = "set".ucfirst($newString);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }
    }

    // *********** getters - setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getTypeId(){
        return $this->typeId;
    }
    public function setTypeId($typeId){
        $this->typeId = $typeId;
    }
    public function getWp(){
        return $this->wp;
    }
    public function setWp($wp){
        $this->wp = $wp;
    }
    public function getInscription(){
        return $this->inscription;
    }
    public function setInscription($inscription){
        $this->inscription = $inscription;
    }
    public function getDerConnexion(){
        return $this->derConnexion;
    }
    public function setDerConnexion($derConnexion){
        $this->derConnexion = $derConnexion;
    }

    // *********** methodes
    public function launchControls(DbManager $dbmanager){
        return $dbmanager->getUserRepo()->checkUserEmailPassword( $this );
    }
    
    public function save(DbManager $dbmanager){
        $dbmanager->getUserRepo()->saveUser( $this );
    }

}