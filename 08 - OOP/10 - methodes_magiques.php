<?php

Class Car {
  private $brand;
  private $model;
  private $color;
  private $additionalData = array();
  public $toto;
  public $instance = 1;
  public static $instances = 1;
  
  public function __construct($brand, $model, $color) {
    $this->brand = $brand;
    $this->model = $model; 
    $this->color = $color;
  }
  
  public function setBrand($brand) {
     $this->brand = $brand;
  }

  /*
    sollicitée lors de l'écriture de données vers des propriétés inaccessibles  
  */
  public function __set($name, $value) {
    printf('__set called for "%s" parameter with value="%s"<br>', $name, $value);
    //$this->{$name} = $value; 
    $this->additionalData[$name] = $value;                    
  }
  /*
    sollicitée pour lire des données depuis des propriétés inaccessibles.  
  */ 
  public function __get($name) {
    //return $this->{$name};
    if (array_key_exists($name, $this->additionalData) ) {
       return $this->additionalData[$name]; 
    }
    return null;
  }
  /*
  sollicitée lorsque isset() ou la fonction empty() sont appelées sur des propriétés inaccessibles.  
  */ 
  public function __isset($name) {
    echo "est-ce que la variable \"" . $name . "\" est initialisée? <br>";
    return isset($this->{$name});
  }
  
  public function __unset($name) {
    unset($this->{$name});
  }
  
  public function __call($name, $args) {
     echo "Appel de la méthode '$name' avec " . implode(', ', $args). "<br>";
  } 
  /*
    Attention! doit retourner une chaîne, sinon une erreur E_RECOVERABLE_ERROR sera levée.
  */
  public function __toString() {
    return sprintf("Je suis une %s %s %s <br>", $this->brand, $this->model, $this->color);
  }
  
  public function __invoke($x) {
    echo "on utilise un objet comme une fonction avec x = " . $x . "<br>";
  }

  public static function __callStatic($name, $args) {
    echo "Appel de la méthode statique '$name' avec " . implode(', ', $args). "<br>";
  }

  /*
    Lorsqu'on appelle la méthode serialize(), celle-ci vérifie si il existe une méthode "__sleep" ;
    si oui, elle sera exécutée avant. Elle doit retourner un array contenant les attributs à sérialiser.
    Le but avoué de __sleep() est de valider des données en attente ou d'effectuer des opérations de nettoyage. 
    De plus, cette fonction est utile si vous avez de très gros objets qui n'ont pas besoin d'être sauvegardés en totalité. 
  */
  public function __sleep() {
    return array('brand', 'model');
  }
  
  public function __wakeup() {
    echo "__wakeup est appelée avant désérialisation<br>";
  }
  
  public function __clone() {
     $this->instance = ++self::$instances;
  }

}

$car = new Car("Peugeot", "207", "noire");
$car->toto = 'test';  // on ne passe pas par __set() car public

var_dump(isset($car->brand)); // true. Si la méthode magique "__isset()" n'était pas définie, isset retounerait false.
//unset($car->brand);  // on détruit l'attribut privé "brand"
//var_dump($car->brand);  // null 
//$car->setBrand('Peugeot');

$car->engineCize = 1.6;
$car->horsePower = 110;
$car->year = 2009;

echo "<pre>" . print_r($car, true) . "</pre>";

$car->plop(1,2,3);  // Appel de la méthode 'plop' avec 1, 2, 3

Car::nuut(500); // Appel de la méthode statique 'nuut' avec 500

echo $car;  //si la méthode "__toString" n'est pas implémentée: Catchable fatal error: Object of class Car could not be converted to string in...

$car(6);

$car2 = clone $car;
 echo "<pre>car2:" . print_r($car2, true) . "</pre>";
var_dump($car == $car2);  //true: deux objets sont égaux s'ils ont les mêmes attributs et valeurs, et qu'ils sont des instances de la même classe. (false si on ajoute le compteur d'instances bien entenu)
var_dump($car === $car2);  //false: les objets sont identiques uniquement s'ils font référence à la même instance de la même classe
$car3 = $car2;
var_dump($car3 === $car2);  // true

$s = serialize($car);
echo "<pre>" . print_r($s, true) . "</pre>";

echo "<pre>" . print_r(unserialize($s), true) ."</pre>";



