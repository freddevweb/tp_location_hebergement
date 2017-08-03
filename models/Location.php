<?php

class Location {
    
    private $id;
    private $annonceId;
    private $userId;
    private $arrive;
    private $depart;
    private $voyageurs;

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
    public function getAnnonceId(){
        return $this->annonceId;
    }
    public function setAnnonceId($annonceId){
        $this->annonceId = $annonceId;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId = $userId;
    }
    public function getArrive(){
        return $this->arrive;
    }
    public function setArrive($arrive){
        $this->arrive = $arrive;
    }
    public function getDepart(){
        return $this->depart;
    }
    public function setDepart($depart){
        $this->depart = $depart;
    }
    public function getVoyageurs(){
        return $this->voyageurs;
    }
    public function setVoyageurs($voyageurs){
        $this->voyageurs = $voyageurs;
    }
    

    // *********** methodes


    
}