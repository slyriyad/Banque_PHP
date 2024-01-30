<?php

class Titulaire {
    private string $nom;
    private string $prenom;
    private DateTime $birthdate;
    private string $villeNaiss ;
    private array $ensembleComptes;

    public function __construct(string $nom, string $prenom, string $birthdate, string $villeNaiss) 
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthdate = new Datetime($birthdate);
        $this->villeNaiss = $villeNaiss;
        $this->ensembleComptes = [] ;      
    }

    
    public function getNom()
    {
        return $this->nom;
    }

    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

     
    public function getPrenom()
    {
        return $this->prenom;
    }

    
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    
    public function getVilleNaiss()
    {
        return $this->villeNaiss;
    }

    
    public function setVilleNaiss($villeNaiss)
    {
        $this->villeNaiss = $villeNaiss;

        return $this;
    }

     
    public function getEnsembleComptes()
    {
        return $this->ensembleComptes;
    }

    
    public function setEnsembleComptes($ensembleComptes)
    {
        $this->ensembleComptes = $ensembleComptes;

        return $this;
    }

    public function addCompte(Compte $compte) {
        $this->ensembleComptes[] = $compte;
    }


    public function __toString() {
        return $this->nom." ".$this->prenom;
    }
    
    
    // Méthode pour calculer l'âge
    public function age() {
        $now = new DateTime("now");
        $diff = $this->birthdate->diff($now);
        return $diff->y;  // Retourne l'âge en années
    }

    public function afficherInfoTitu() {
        $result = "<h2>".$this."</h2><ul style='list-style-type:none;'>";
        foreach($this->ensembleComptes as $compte){
            $result .= "<li>".$compte->getLibelle()." - Solde: ".$compte->getSoldeInit()." ".$compte->getDevise()."</li>";
        }
        $result .="</ul>";
        echo $result;
    }
}
    

    
