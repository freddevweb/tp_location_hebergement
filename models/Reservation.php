<?php

class Reservation {
    
    private $id;
    private $annonceId;
    private $userId;
    private $dateDebut;
    private $dateFin;

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
    public function getDateDebut(){
        return $this->dateDebut;
    }
    public function setDateDebut($dateDebut){
        $this->dateDebut = $dateDebut;
    }
    public function getDateFin(){
        return $this->dateFin;
    }
    public function setDateFin($dateFin){
        $this->dateFin = $dateFin;
    }
    
    // *********** methodes
    
    public function save(DbManager $dbmanager){
        $check = $dbmanager->getReservationRepo()->checkResa( $this );

        if($check == false ){
            return $dbmanager->getReservationRepo()->saveResa( $this );
        }
        return false;
    }

}