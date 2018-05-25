<?php

class ParentClass {
   private $a;
   protected $b = 40;
   public $c = 'bar';
   
   const MA_CONSTANTE = 'A';
   
   public function __construct($a, $b, $c) {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
   }
   
   private function blip() {
      echo __CLASS__ . "<br>";
   }
      
   protected function plop() {
    echo __CLASS__ . "<br>";
   }
   
   public function testStaticAndSelf() {
    echo "self: " . self::MA_CONSTANTE . "<br>";  // l’analyse du mot-clef ‘self’ se fait au moment de la compilation, donc son utilisation ignore toutes les classes étendues.
    echo "static: " . static::MA_CONSTANTE . "<br>";  // Late static binding; fait référence à la classe active durant l'exécution
   }

   protected final function fctFinale() {
    echo "méthode finale <br>";
   }
  
}

class ChildClass extends ParentClass {
   private $d;
   
   const MA_CONSTANTE = 'B';
   
   public function __construct($a, $b, $c, $d) {
      parent::__construct($a, $b, $c);
      $this->d = $d;
   }
   
   public function testVarVisib() {
    echo "c = " . $this->c . "<br>";  // bar
    echo "b = " . $this->b . "<br>";  // 40
    echo "a = " . $this->a . "<br>";  // Notice: Undefined property: ChildClass::$nuut in ...
   }
   
   /*
    On ne peut pas redéfinir une méthode avec une visibilité moindre:
     Fatal error: Access level to ChildClass::plop() must be protected (as in class ParentClass) or weaker in...
   private function plop() {
    echo __CLASS__ . "<br>";
   }   
   */
   
   public function plop() {
    echo __CLASS__ . "<br>";
   }
   
   /*
   Fatal error: Cannot override final method ParentClass::fctFinale() 
   public function fctFinale() {
   
   }
   */
   
   public function __destruct() {
    echo "destruct<br>";
   }
}

//$parent = new ParentClass();
$child = new ChildClass('nuut', 40, 'bar', 'toto');
var_dump($child->c);  // bar
//var_dump($child->toto); // Fatal error: Cannot access protected property ChildClass::$toto in

$child->testVarVisib();

//$parent->plop(); // Fatal error: Call to protected method ParentClass::plop()  
$child->plop(); // ChildClass  
//$child->blip(); //  Call to private method ParentClass::blip() from context

/*
  self: A
  static: B
*/
$child->testStaticAndSelf();


