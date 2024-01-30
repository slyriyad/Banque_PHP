<?php

class Compte {
    private string $libelle;
    private int $soldeInit = 0;
    private string $devise;
    private Titulaire $titulaire;
    

    public function __construct(string $libelle,string $devise,Titulaire $titulaire) 
    {
        $this->libelle = $libelle;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $this->titulaire->addCompte($this);
    }

   
    public function getLibelle()
    {
        return $this->libelle;
    }

     
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

     
    public function getSoldeInit()
    {
        return $this->soldeInit;
    }

    
    public function setSoldeInit($soldeInit)
    {
        $this->soldeInit = $soldeInit;

        return $this;
    }

     
    public function getDevise()
    {
        return $this->devise;
    }

    
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    
    public function getTitulaire()
    {
        return $this->titulaire;
    }

     
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }


    public function __tostring(){
        return $this->libelle;
    }

//Crédite le compte d'un montant spécifié.
    public function crediter(int $euros) {
        $this->soldeInit += $euros;;
        echo "Le compte ".$this." a été crédité de $euros €<br>";
    }

// Débite le compte d'un montant spécifié, si le solde est suffisant.
    public function debiter(int $euros) {
        if ($euros <= $this->soldeInit) {
            $this->soldeInit -= $euros; 
            echo "Le compte ".$this." a été débité de $euros €. Nouveau solde : ".$this->soldeInit." €.<br>";
        } else {
            echo "Le montant requis pour le virement en question excède le solde actuel de votre compte.<br>";
        } 
    }

//Version alternative de la méthode 'crediter' qui ne génère pas de message.
    public function crediter1(int $euros) {
        $this->soldeInit += $euros;
        
    }

//Version alternative de la méthode 'debiter' qui ne génère pas de message.
    public function debiter1(int $euros) {
        $this->soldeInit -= $euros; 
    }
        


    public function afficherInfoCompte() {
        echo "<h2> $this de  $this->titulaire </h2>
        Solde Actuel : ".$this->soldeInit." euros" ;
        
    }

    public function virement(int $somme,Compte $compte) {
        if($somme <= $this->soldeInit) { // Vérifie si le montant à transférer est inférieur ou égal au solde actuel du compte source
            $this->debiter1($somme);
            $compte->crediter1($somme);
            echo "<h2>Détails du Virement :</h2>
            <strong>De Compte :</strong> $this<br>
            <strong>Vers Compte :</strong> $compte.<br>
            <strong>Montant :</strong> $somme €<br>
            Nouveau solde de $this : ".$this->soldeInit." €<br>
            Nouveau solde de $compte : $compte->soldeInit €<br>";
        } else {
            echo "Le montant requis pour le virement en question excède le solde actuel de votre compte.<br>";
            }

    }
}