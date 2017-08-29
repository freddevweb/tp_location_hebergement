<?php

class LogementType {
    
    private $id;
    private $nom;

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
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }

    // *********** methodes


}