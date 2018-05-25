<?php

class Car {   
  const TOTO = 'nuut';
  
  public $brand = 'Ford';
  private $priv = 'priv�';
  
  public static $sold = 0;  // les var. statiques sont ind�pendantes des objets cr��s
  
  public function maMethode() {
    echo self::TOTO. "<br>";
    echo Car::TOTO. "<br>"; 
    echo static::TOTO. "<br>";
  }
  
  public static function maMethodeStatique() {
    echo "je suis une m�thode statique<br>";
  }
}

$c = new Car();

var_dump($c->brand);  // Ford
$c->brand = 'BMW';
 var_dump($c->brand);   // BMW
//var_dump($c->priv); //Fatal error: Cannot access private property Car::$priv
//$c->priv = 'jfes';   //Fatal error: Cannot access private property Car::$priv

var_dump(Car::$sold); //0
Car::$sold++;
var_dump(Car::$sold); // 1
Car::$sold++;
var_dump($c::$sold);  // 2

var_Dump(Car::TOTO); // 'nuut'

$c->maMethode(); // 3x 'nuut'

Car::maMethodeStatique(); // je suis une m�thode statique
// cette �criture fonctionne aussi depuis PHP 5.4:
Car::{'maMethodeStatique'}(); // je suis une m�thode statique
$fct = 'maMethodeStatique';
Car::{$fct}();  // je suis une m�thode statique 