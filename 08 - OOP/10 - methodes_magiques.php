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
    sollicit�e lors de l'�criture de donn�es vers des propri�t�s inaccessibles  
  */
  public function __set($name, $value) {
    printf('__set called for "%s" parameter with value="%s"<br>', $name, $value);
    //$this->{$name} = $value; 
    $this->additionalData[$name] = $value;                    
  }
  /*
    sollicit�e pour lire des donn�es depuis des propri�t�s inaccessibles.  
  */ 
  public function __get($name) {
    //return $this->{$name};
    if (array_key_exists($name, $this->additionalData) ) {
       return $this->additionalData[$name]; 
    }
    return null;
  }
  /*
  sollicit�e lorsque isset() ou la fonction empty() sont appel�es sur des propri�t�s inaccessibles.  
  */ 
  public function __isset($name) {
    echo "est-ce que la variable \"" . $name . "\" est initialis�e? <br>";
    return isset($this->{$name});
  }
  
  public function __unset($name) {
    unset($this->{$name});
  }
  
  public function __call($name, $args) {
     echo "Appel de la m�thode '$name' avec " . implode(', ', $args). "<br>";
  } 
  /*
    Attention! doit retourner une cha�ne, sinon une erreur E_RECOVERABLE_ERROR sera lev�e.
  */
  public function __toString() {
    return sprintf("Je suis une %s %s %s <br>", $this->brand, $this->model, $this->color);
  }
  
  public function __invoke($x) {
    echo "on utilise un objet comme une fonction avec x = " . $x . "<br>";
  }

  public static function __callStatic($name, $args) {
    echo "Appel de la m�thode statique '$name' avec " . implode(', ', $args). "<br>";
  }

  /*
    Lorsqu'on appelle la m�thode serialize(), celle-ci v�rifie si il existe une m�thode "__sleep" ;
    si oui, elle sera ex�cut�e avant. Elle doit retourner un array contenant les attributs � s�rialiser.
    Le but avou� de __sleep() est de valider des donn�es en attente ou d'effectuer des op�rations de nettoyage. 
    De plus, cette fonction est utile si vous avez de tr�s gros objets qui n'ont pas besoin d'�tre sauvegard�s en totalit�. 
  */
  public function __sleep() {
    return array('brand', 'model');
  }
  
  public function __wakeup() {
    echo "__wakeup est appel�e avant d�s�rialisation<br>";
  }
  
  public function __clone() {
     $this->instance = ++self::$instances;
  }

}

$car = new Car("Peugeot", "207", "noire");
$car->toto = 'test';  // on ne passe pas par __set() car public

var_dump(isset($car->brand)); // true. Si la m�thode magique "__isset()" n'�tait pas d�finie, isset retounerait false.
//unset($car->brand);  // on d�truit l'attribut priv� "brand"
//var_dump($car->brand);  // null 
//$car->setBrand('Peugeot');

$car->engineCize = 1.6;
$car->horsePower = 110;
$car->year = 2009;

echo "<pre>" . print_r($car, true) . "</pre>";

$car->plop(1,2,3);  // Appel de la m�thode 'plop' avec 1, 2, 3

Car::nuut(500); // Appel de la m�thode statique 'nuut' avec 500

echo $car;  //si la m�thode "__toString" n'est pas impl�ment�e: Catchable fatal error: Object of class Car could not be converted to string in...

$car(6);

$car2 = clone $car;
 echo "<pre>car2:" . print_r($car2, true) . "</pre>";
var_dump($car == $car2);  //true: deux objets sont �gaux s'ils ont les m�mes attributs et valeurs, et qu'ils sont des instances de la m�me classe. (false si on ajoute le compteur d'instances bien entenu)
var_dump($car === $car2);  //false: les objets sont identiques uniquement s'ils font r�f�rence � la m�me instance de la m�me classe
$car3 = $car2;
var_dump($car3 === $car2);  // true

$s = serialize($car);
echo "<pre>" . print_r($s, true) . "</pre>";

echo "<pre>" . print_r(unserialize($s), true) ."</pre>";



