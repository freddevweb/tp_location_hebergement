<?php

class Commentaire {
    
    private $id;
    private $annonceId;
    private $userId;
    private $commentaire;

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
    public function setUserId($email){
        $this->userId = $userId;
    }
    public function getCommentaire(){
        return $this->commentaire;
    }
    public function setCommentaire($commentaire){
        $this->commentaire = $commentaire;
    }

    // *********** methodes

    
    
}