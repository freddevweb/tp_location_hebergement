<?php

class Annonce {
    
    private $id;
    private $userId;
    private $titre;
    private $typeLogementId;
    private $tarif;
    private $surface;
    private $nbreChambre;
    private $nbrePieces;
    private $description;
    private $codePostal;
    private $ville;
    private $capacite;
    private $arriveeDebut;
    private $arriveeFin;
    private $fumeur;
    private $television;
    private $chauffage;
    private $climatisation;
    private $sdb;
    private $parking;
    private $laveLinge;
    private $wifi;
    private $hDepart;
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
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($pseudo){
        $this->userId = $userId;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    public function getTypeLogementId(){
        return $this->typeLogementId;
    }
    public function setTypeLogementId($typeLogementId){
        $this->typeLogementId = $typeLogementId;
    }
    public function getTarif(){
        return $this->tarif;
    }
    public function setTarif($tarif){
        $this->tarif = $tarif;
    }
    public function getSurface(){
        return $this->surface;
    }
    public function setSurface($surface){
        $this->surface = $surface;
    }
    public function getNbreChambre(){
        return $this->nbreChambre;
    }
    public function setNbreChambre($nbreChambre){
        $this->nbreChambre = $nbreChambre;
    }
    public function getNbrePieces(){
        return $this->nbrePieces;
    }
    public function setNbrePieces($nbrePieces){
        $this->nbrePieces = $nbrePieces;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getCodePostal(){
        return $this->codePostal;
    }
    public function setCodePostal($codePostal){
        $this->codePostal = $codePostal;
    }
    public function getVille(){
        return $this->ville;
    }
    public function setVille($ville){
        $this->ville = $ville;
    }
    public function getCapacite(){
        return $this->capacite;
    }
    public function setCapacite($capacite){
        $this->capacite = $capacite;
    }
    public function getArriveeDebut(){
        return $this->arriveeDebut;
    }
    public function setArriveeDebut($arriveeDebut){
        $this->arriveeDebut = $arriveeDebut;
    }
    public function getArriveeFin(){
        return $this->arriveeFin;
    }
    public function setArriveeFin($arriveeFin){
        $this->arriveeFin = $arriveeFin;
    }
    public function getFumeur(){
        return $this->fumeur;
    }
    public function setFumeur($fumeur){
        $this->fumeur = $fumeur;
    }
    public function getTelevision(){
        return $this->television;
    }
    public function setTelevision($television){
        $this->television = $television;
    }
    public function getChauffage(){
        return $this->chauffage;
    }
    public function setChauffage($chauffage){
        $this->chauffage = $chauffage;
    }
    public function getClimatisation(){
        return $this->climatisation;
    }
    public function setClimatisation($climatisation){
        $this->climatisation = $climatisation;
    }
    public function getSdb(){
        return $this->sdb;
    }
    public function setSdb($sdb){
        $this->sdb = $sdb;
    }
    public function getParking(){
        return $this->parking;
    }
    public function setParking($parking){
        $this->parking = $parking;
    }
    public function getLaveLinge(){
        return $this->laveLinge;
    }
    public function setLaveLinge($laveLinge){
        $this->laveLinge = $laveLinge;
    }
    public function getWifi(){
        return $this->wifi;
    }
    public function setWifi($wifi){
        $this->wifi = $wifi;
    }
    public function getHDepart(){
        return $this->hDepart;
    }
    public function setHDepart($hDepart){
        $this->hDepart = $hDepart;
    }

    // *********** methodes
    
}