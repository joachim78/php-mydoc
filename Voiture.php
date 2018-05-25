<?php
class Voiture {
	public $marque;
	public $modele;
	
	public function __construct($marque, $modele) {
		$this->marque=$marque;
		$this->modele= $modele;
	}
	public function __toString() {
		return  "Je n'ai pas de namespace => " . $this->marque." ".$this->modele;	// DOIT retourner une string
	}
}