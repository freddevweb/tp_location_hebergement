<?php

class Photo {
    
    private $id;
    private $annonceId;
    private $titre;
    private $photoPath;

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
    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }
    public function getPhotoPath(){
        return $this->photoPath;
    }
    public function setPhotoPath($photoPath){
        $this->photoPath = $photoPath;
    }
    

    // *********** methodes
    
}