<?php
require_once "Employe.class.php";


// Créer au moins 5 objets Employe avec des informations différentes
$employe1 = new Employe("BOKO", "Jean", "2021-01-22", "Comptable", 50000, "Comptabilité", "magasin A", "Sur place");
$employe2 = new Employe("JOE", "Pascal", "2019-05-28", "Secrétaire", 48000, "Direction", "Magasin B", "ticket restaurant");
$employe3 = new Employe("LA FONTAINE", "Jean", "2017-03-18", "Directeur", 75000, "Direction", "Magasin C", "ticket restaurant");
$employe4 = new Employe("SOZI", "Firmin", "2000-02-15", "Conseiller clientèle", 50000, "Marketing", "Magasin D", "sur place");
$employe5 = new Employe("MOMO", "Guirlin", "1999-10-12", "Agent administratif", 50000, "Accueil", "Magasin E", "sur place");

//Afficher l'ancienneté de chaque employé
echo "Ancienneté de chaque employé: <br>";
echo "Employé1: ".$employe1->calculerAnciennete()." <br>";
echo "Employé2: ".$employe2->calculerAnciennete()." <br>";
echo "Employé3: ".$employe3->calculerAnciennete()." <br>";
echo "Employé4: ".$employe4->calculerAnciennete()." <br>";
echo "Employé5: ".$employe5->calculerAnciennete()." <br><br>";

// Afficher le montant des primes de chaque employé
echo "Montant des primes de chaque employé: <br>";
echo "Employé 1 : " . $employe1->calculerPrime() . " <br>";
echo "Employé 2 : " . $employe2->calculerPrime() . " <br>";
echo "Employé 3 : " . $employe3->calculerPrime() . " <br>";
echo "Employé 4 : " . $employe4->calculerPrime() . " <br>";
echo "Employé 5 : " . $employe5->calculerPrime() . " <br><br>";

// Vérifier la date du versement de la prime
$dateDuJour = new DateTime("now"); 
//var_dump($dateDuJour);

// Comparer avec la date de versement (30/11)
if ($dateDuJour->format("m-d") == "11-30") 
{
   
    echo "C'est le jour du virement de la prime ! <br>";
    
    echo $employe1->ordreTransfert() . "<br>";
    echo $employe2->ordreTransfert() . "<br>";
    echo $employe3->ordreTransfert() . "<br>";
    echo $employe4->ordreTransfert() . "<br>";
    echo $employe5->ordreTransfert() . "<br><br>";
} 
else 
{
    echo "Ce n'est pas le jour du virement de la prime.<br>";
}

