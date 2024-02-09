<?php

class Employe
{
    private $nom;
    private $prenom;
    private $date_emb;
    private $poste;
    private $salaireBrut;
    private $service;
    private $magasin;
    private $restauration;
    private $enfant;

    public function __construct($nom, $prenom, $date_emb, $poste, $salaireBrut, $service, $magasin, $restauration, $enfant)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->date_emb = new DateTime($date_emb); 
        $this->poste = $poste;
        $this->salaireBrut = $salaireBrut;
        $this->service = $service;
        $this->magasin = $magasin;
        $this->restauration = $restauration;
        $this->enfant = $enfant;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getDate_emb()
    {
        return $this->date_emb;
    }

    public function setDate_emb($date_emb)
    {
        $this->date_emb = new DateTime($date_emb);
    }

    public function getPoste()
    {
        return $this->poste;
    }

    public function setPoste($poste)
    {
        $this->poste = $poste;
    }

    public function getSalaireBrut()
    {
        return $this->salaireBrut;
    }

    public function setSalaireBrut($salaireBrut)
    {
        $this->salaireBrut = $salaireBrut;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    public function getMagasin()
    {
        $this->magasin;
    }

    public function setMagasin($magasin)
    {
        $this->magasin = $magasin;
    }

    public function calculerAnciennete()
    {
        $aujourdHui = new DateTime("now");
        $difference = $aujourdHui->diff($this->date_emb);
        //var_dump($aujourdHui);
        return $difference->y;
    }

    public function calculerPrime()
    {
        $primeAnnuel = 0.05;
        $primeAnciennete = 0.02;

        $anciennete = $this->calculerAnciennete();

        $montantPrimeAnnuel = $this->salaireBrut * $primeAnnuel;
        $montantPrimeAncien = $this->salaireBrut * $primeAnciennete * $anciennete;
        $montantPrimeTotal = $montantPrimeAnnuel + $montantPrimeAncien;

        return $montantPrimeTotal;
    }

    public function ordreTransfert()
    {
        $montantPrime = $this->calculerPrime();
        $dateVirement = "11-30";
        $message = "Votre prime annuelle est virée à la banque le " . $dateVirement . " pour un montant de " . $montantPrime;
        return $message;
    }

    public function chequeVacance()
    {
       $anciennete = $this->calculerAnciennete();
        if ($anciennete >= 1)
        {
            echo "Cet employé peut bénéficier d'un chêque cadeau";
            return true;
        }
        else
        {
            echo "Cet employé n'est pas éligible au chêque vacances";
            return false;
        }
    }

    public function chequeNoel()
    {

    }
}

class Magasin
{
    private $nom;
    private $adresse;
    private $cp;
    private $ville;
    private $restauration;


    public function __construct($nom, $adresse, $cp, $ville, $restauration)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->cp = $cp; 
        $this->ville = $ville;
        $this->restauration = $restauration;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function getCodePostal()
    {
        return $this->cp;
    }

    public function setCodePostal($cp)
    {
        $this->cp = $cp;
    }
    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getRestauration()
    {
       return $this->restauration;
    }
    
}



class Magasin {
    private $nom;
    private $adresse;
    private $codePostal;
    private $ville;
    private $modeRestauration; // Nouvelle propriété pour le mode de restauration

    public function __construct($nom, $adresse, $codePostal, $ville, $modeRestauration) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->modeRestauration = $modeRestauration;
    }

    public function getModeRestauration() {
        return $this->modeRestauration;
    }

    // Ajoutez des méthodes d'accès si nécessaire
}

class Employe {
    private $nom;
    private $prenom;
    private $dateEmb;
    private $poste;
    private $salaireBrut;
    private $service;
    private $magasin;
    private $modeRestaurationEmploye; // Nouvelle propriété pour le mode de restauration de l'employé

    public function __construct($nom, $prenom, $dateEmb, $poste, $salaireBrut, $service, $magasin, $modeRestaurationEmploye) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateEmb = new DateTime($dateEmb);
        $this->poste = $poste;
        $this->salaireBrut = $salaireBrut;
        $this->service = $service;
        $this->magasin = $magasin;
        $this->modeRestaurationEmploye = $modeRestaurationEmploye;
    }

    public function getMagasin() {
        return $this->magasin;
    }

    public function getModeRestaurationEmploye() {
        return $this->modeRestaurationEmploye;
    }
}

// Exemple d'utilisation des classes
$magasinAvecRestaurant = new Magasin("Magasin A", "1 Rue de la Liberté", "75001", "Paris", "Restaurant d'entreprise");
$employe1 = new Employe("Doe", "John", "2022-01-01", "Vendeur", 50000, "Vente", $magasinAvecRestaurant, null);

$magasinAvecTickets = new Magasin("Magasin B", "2 Avenue des Champs", "75002", "Paris", "Tickets restaurants");
$employe2 = new Employe("Smith", "Jane", "2022-01-15", "Caissier", 48000, "Finance", $magasinAvecTickets, "Tickets restaurants");

// Afficher le mode de restauration pour chaque employé
echo "Mode de restauration pour l'employé 1 : " . $employe1->getMagasin()->getModeRestauration() . "\n";
echo "Mode de restauration pour l'employé 2 : " . $employe2->getModeRestaurationEmploye() . "\n";
