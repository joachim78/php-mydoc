<?php

/*
  Une classe abstraite définit la base des classes qui en héritent.
  Une classe abstraite ne peut pas être instanciée.
  Peut contenir des implémentations de méthodes.
  Les méthodes définies comme "abstraites" doivent être implémentées dans les classes enfants.
  La visibilité peut devenir plus permissive (private => public), l'inverse n'est pas autorisé (public => private)
  De plus, les signatures de ces méthodes doivent correspondre, ce qui signifie que les types des paramètres et le nombre d'arguments requis doivent être les mêmes

*/

abstract class Vehicle {
  const A = 'a';
  abstract public function move($param1, $param2);
  
  // méthode commune
  public function nuut() {
    echo "nuut<br>";
  }
}

// Fatal error: Cannot instantiate abstract class Vehicle 
//$v = new Vehicle();


/*
  Si on n'implémente pas la méthode "move" dans la classe Car, on aura une fatal:
  
  Fatal error: Class Car contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Vehicle::move) 
*/
class Car extends Vehicle  {
  const A = 'b';
 // on peut ajouter des paramètres optionnels
  public function move($from, $to, $speed = 0) {
    echo "car is moving from $from to $to <br>";
  }
}


$car = new Car();
// Fatal error: Declaration of Car::move() must be compatible with Vehicle::move($param1, $param2) 
//$car->move();
$car->move('A', 'B');   // car is moving from A to B 
echo Car::A;
echo "<br>";

abstract class Base {
  abstract protected function doSomething();
  abstract static protected function test();
  
  function nuut() {
    return 'nuut';
  }
}

class BaseA extends Base {
    public function doSomething() {
      echo $this->nuut();
    }
    public static function test() {   // Strict standards: Static function Base::test() should not be abstract
    
    }
}

$b = new BaseA();
$b->doSomething();
