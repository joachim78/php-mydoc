<?php
namespace Classes;
use Classes\Vehicules\Voiture;

function hello() {
	echo "hello from " . __NAMESPACE__ . "<br>";
}

function testVoiture() {
		$voiture = new Voiture("Citroen", "AX");
		echo $voiture . "<br>";
}
