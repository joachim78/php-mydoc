<?php
echo "<h1>Reflection</h1>";

/**
 * L'Api Reflection permet de faire du reverse-engineer sur les classes, les interfaces, les fonctions, les méthodes et les extensions.
 * De plus, l'API Reflection offre la possibilité de récupérer les commentaires des fonctions, des classes et des méthodes.
 */

class Personne {
    public $nom;
    public $prenom;
    public $age;

    public function __construct($nom, $prenom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    public function parler($str) {
        echo $str;
    }

    public function seDéplacer($a, $b, $vitesse) {

    }
}

$rc = new ReflectionClass('Personne');
echo "<pre>" . print_r($rc->getProperties(), true) . "</pre>";
