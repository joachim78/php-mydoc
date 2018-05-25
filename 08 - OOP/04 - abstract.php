<?php

/*
  Une classe abstraite d�finit la base des classes qui en h�ritent.
  Une classe abstraite ne peut pas �tre instanci�e.
  Peut contenir des impl�mentations de m�thodes.
  Les m�thodes d�finies comme "abstraites" doivent �tre impl�ment�es dans les classes enfants.
  La visibilit� peut devenir plus permissive (private => public), l'inverse n'est pas autoris� (public => private)
  De plus, les signatures de ces m�thodes doivent correspondre, ce qui signifie que les types des param�tres et le nombre d'arguments requis doivent �tre les m�mes

*/

abstract class Vehicle {
  const A = 'a';
  abstract public function move($param1, $param2);
  
  // m�thode commune
  public function nuut() {
    echo "nuut<br>";
  }
}

// Fatal error: Cannot instantiate abstract class Vehicle 
//$v = new Vehicle();


/*
  Si on n'impl�mente pas la m�thode "move" dans la classe Car, on aura une fatal:
  
  Fatal error: Class Car contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Vehicle::move) 
*/
class Car extends Vehicle  {
  const A = 'b';
 // on peut ajouter des param�tres optionnels
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
