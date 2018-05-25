<?php

/*
  Fonctionne pour:
  
  - les classes
  - les interfaces
  - les arrays
  - les fonctions de callback (depuis PHP 5.4)
*/

interface iMyInterface1 {
  public function toto($a);
}

class Nuut implements iMyInterface1 {
    public function toto($a) {
    
    }
} 

class Car {

}


class Test {
  public function testInterface(iMyInterface1 $obj) {
    echo "foo<br>";
  }
  
  public function testClass(Car $car) {
    echo "bar<br>";
  }
  
  public function testArray(array $arr) {
     echo "brol<br>";
  }
  
  public function testCallable(callable $callback, $data) {
     return call_user_func($callback, $data);
  }
}

$t = new Test();
//$t->testInterface("50");  //fatal error: Argument 1 passed to Test::foo() must implement interface iMyInterface1, string given
$t->testInterface(new Nuut());   // OK

$t->testClass(new Car()); // OK

$t->testArray(array(50,10));  // OK

$t->testCallable("var_dump", 5);  // 5

function callbackFunction($p) {
  return $p*$p;
};
echo $t->testCallable('callbackFunction', 5) . "<br>"; // 25

echo $t->testCallable(function($a) { return $a*$a*$a; }, 5) . "<br>";  // 125 


class Sample {
  /**
   * Méthode magique
   */
  public function __invoke() {
    echo "hello, world<br>";
  }
}

function testCallable(callable $f) {
  $f();
}

$s = new Sample();
$s(); //hello, world
testCallable($s); //hello, world 
