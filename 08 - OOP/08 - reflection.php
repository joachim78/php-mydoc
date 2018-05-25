<?php
/*
  La réflexion permet:
  
  - de retrouver des infos sur des classes, objets, fonctions, méthodes, propriétés, ...
*/


class Vehicle {
  private $brand;
  private $model;
  
  public function __construct($brand, $model) {
    $this->brand = $brand;
    $this->model = $model;
  }
  
  public function getBrand() {
    return $this->brand;
  }  

  public function getModel() {
    return $this->model;
  } 
  
  protected function drive() {
  
  }
}

class Car extends Vehicle {

  const WHEELS = 4;
  
  private $isEstate;
  
  public static $staticProperty;
  private static $privateStaticProperty;

  public function __construct($brand, $model, $isEstate) {
    parent::__construct($brand, $model);
    $this->isEstate = $isEstate;
  } 
  
  public function isEstate() {
    return $this->isEstate;
  } 
  
  public function drive() {
    echo "drive car<br>";
  }
}

/*
   La classe ReflectionClass  
*/

echo "<h2>ReflectionClass:</h2>";

$r = new ReflectionClass('Car');
// on peut modifier les propriétés statiques (pas les non statiques)
$r->setStaticPropertyValue('staticProperty', 50);

/*
  Ne fonctionne pas avec les prop. privées:
  Fatal error: Uncaught exception 'ReflectionException' with message 'Class Car does not have a property named privateStaticProperty
*/
//$r->setStaticPropertyValue('privateStaticProperty', 50);

echo "<pre>" . $r . "</pre>";
echo $r->getStaticPropertyValue('staticProperty') . "<br>";  //50

echo $r->getName() . "<br>"; // Car
//echo "<pre>" . $r->getParentClass() . "<pre>";  // classe parent: Vehicle

// On peut créer une instance de la classe à partir de la classe Reflection:
$instance = $r->newInstanceArgs(array('Peugeot', '308 SW', true));

/*
  Car Object
(
    [isEstate:Car:private] => 1
    [brand:Vehicle:private] => Peugeot
    [model:Vehicle:private] => 308 SW
)
*/
echo '<pre>' . print_r($instance, true) . "</pre>";

// -----------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ReflectionObject:</h2>";

 /*
   - extends ReflectionClass
 */
 
 
 // -----------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ReflectionMethod:</h2>";

/*
  La classe ReflectionMethod rapporte des informations sur une méthode. 
*/

$rm = new ReflectionMethod('Car', '__construct');
var_dump($rm->isConstructor()); //true
var_dump($rm->isPrivate()); //False
/*
array (size=3)
  0 => &
    object(ReflectionParameter)[4]
      public 'name' => string 'brand' (length=5)
  1 => &
    object(ReflectionParameter)[5]
      public 'name' => string 'model' (length=5)
  2 => &
    object(ReflectionParameter)[6]
      public 'name' => string 'isEstate' (length=8)  
*/
var_dump($rm->getParameters()) ;

 // -----------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ReflectionProperty:</h2>";

/*
  La classe ReflectionProperty rapporte des informations sur les propriétés des classes. 
*/

$rp = new ReflectionProperty('Car', 'isEstate');

var_dump( $rp->isPrivate() ); // true
var_dump( $rp->isStatic() ); // false

 // -----------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ReflectionFunction:</h2>";

/*
  La classe ReflectionFunction rapporte des informations sur une fonction. 
*/

/**
 * blablabla
 * @author JDE
 * @since 14/03/2016
 *
 */
function coucou($firstname, $lastname) {
  return printf("Coucou %s %s<br>", $firstname, $lastname);
}

$rf = new ReflectionFunction('coucou');
$rf->invoke('Albert', 'Dupont');  //Coucou Albert Dupont
echo $rf->getDocComment();  // /** * blablabla * @author JDE * @since 14/03/2016 * */