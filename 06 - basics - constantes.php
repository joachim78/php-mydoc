<?php
define("TOTO", 10);
var_dump(TOTO);	//10
define("2TOTO", 8);	//invalide
//var_dump(2TOTO);	// Parse error: syntax error, unexpected 'TOTO' (T_STRING) 

echo "<hr>Constantes magiques<hr>";
echo "fichier = " . __FILE__ . "<br>";	//fichier = C:\wamp\www\certif\06 - basics - constantes.php
echo "ligne = " . __LINE__ . "<br>";	//ligne = 9
echo "dossier = " . __DIR__.  "<br>";	//dossier = C:\wamp\www\certif
var_dump(__FUNCTION__);	// ''

function foo() {
	var_dump(__FUNCTION__, __METHOD__);
}

foo();	// 'foo', 'foo'

class Voiture {
	public $marque;
	public $modele;
	
	public function __construct($marque, $modele) {
		$this->marque=$marque;
		$this->modele= $modele;
	}
	public function __toString() {
		return __CLASS__;
	}
}

$v = new Voiture("Lotus","Elan");
var_dump(strval($v));	//'Voiture'

var_dump(__NAMESPACE__);	// ici , '' car pas de namespace défini
var_dump(E_ERROR);	// 1 - Les erreurs sont aussi affichées par défaut, et l'exécution du script est interrompue. (fatal)
var_dump(E_WARNING);	//2 - Les alertes sont affichées par défaut, mais n'interrompent pas l'exécution du script.
var_dump(E_PARSE);	//4
var_dump(E_NOTICE);	//8 - ex: variable non déclarée
var_dump(E_DEPRECATED); //Alertes d'exécution. Activer cette option pour recevoir des alertes sur les portions de votre code qui pourraient ne pas fonctionner avec les futures versions. 

echo "<hr>error_reporting<hr>";
error_reporting(E_ALL & ~E_NOTICE); // affiche ttes les erreurs sauf les notices
var_dump($unknown); // la notice ne sera pas générée
ini_set('error_reporting', E_ALL) ;  // autre façon de procéder
var_dump($unknown); // affiche la notice
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_PARSE); 
include 'does_not_exists.php';   // les warnings ne seront pas affichés

function divide($a,$b) {
  trigger_error("user deprecated", E_USER_DEPRECATED);
  trigger_error("user warning", E_USER_WARNING);
  trigger_error("notice utilisateur", E_USER_NOTICE);
  if ($b == 0)  trigger_error("Division par zero", E_USER_ERROR);
  return $a/b;
}

divide(6/0);


