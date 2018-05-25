<?php
require 'Voiture.php';
require 'Classes\Vehicules\Voiture.php';
require 'Classes\Vehicules\Velo.php';
require 'Classes\test.php';

use Classes\Vehicules\Velo;

$voiture = new Classes\Vehicules\Voiture("Peugeot", "207");
echo $voiture;	//Classes\Vehicules => Peugeot 207
echo "<br>";
$voiture = new Voiture("Fiat", "500");
echo $voiture . "<br>";
echo new Velo();	//Classes\Vehicules	
echo "<br>";

Classes\hello();
Classes\testVoiture();

