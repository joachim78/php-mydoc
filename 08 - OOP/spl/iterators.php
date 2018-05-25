<?php
echo "<h1>ArrayIterator</h1>";

/**
 * itérateur = objet qui permet de parcourir des éléments contenus dans un autre objet rendu itératif,
 * le plus souvent il s'agit d'un conteneur (tableau, objet, jeu de résultats, arbre, liste ...).
 * Le conteneur doit alors fournir des méthodes à l'itérateur (en implémentant une interface) afin de lui permettre de le parcourir : il devient alors itératif.
 * Permet d'itérer à travers des objets se comportant comme des arrays
 * Cet itérateur permet de réinitialiser et de modifier les valeurs et les clés lors de l'itération de tableaux et d'objets;
 * Limité aux tableaux à une dimension (=> RecursiveArrayIterator)
 */

$arr = [
    'Toto'  => 10,
    'Alexis' => 4,
    'Valérie' => 40,
    'Albert' => 70
];

// ArrayObject fonctionne comme les arrays - Cette classe permet aux objets de fonctionner comme des tableaux.
$arrObject = new ArrayObject($arr);
$arrObject->offsetSet("Jean", 50); // ajoute l'entrée "Jean" => 50 dans le tableau

/** @var ArrayIterator $iterator */
$iterator = $arrObject->getIterator();

echo $iterator->count() . " éléments: <br>";
while ($iterator->valid()) {
    echo $iterator->key() . " => " . $iterator->current() . "<br>";
    $iterator->next();
}

echo "<br>Rewind: <br>";
$iterator->rewind(); // Revient à la position initiale
while ($iterator->valid()) {
    echo $iterator->key() . " => " . $iterator->current() . "<br>";
    $iterator->next();
}

echo "<br>Foreach: <br>";
foreach($iterator as $key => $value) {  // Pas besoin de faire un rewind ici
    echo $key .  " => " . $value . "<br>";
}