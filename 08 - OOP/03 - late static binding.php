<?php

class A {
   protected static $staticVar = 5;
 
    /*
     Late Static Binding:
     
     - stores the class named in the last "non-forwarding call"
     - In case of static method calls, this is the class explicitly named (usually the one on the left of the :: operator); ex: ChildClass::xxx
     - in case of non static method calls, it is the class of the object
   */ 
   public static function fctStatique() {
       echo 'self::$staticVar = ' . self::$staticVar . "<br>";
       echo 'static::$staticVar = ' . static::$staticVar . "<br>";
   }    
   
   public static function foo() {
      static::qui();
   }
   
    public static function qui() {
        echo __CLASS__."<br>";
    }
   
   
   protected function nuut() {
      return "Fonction nuut() ex�cut� dans la classe " . __CLASS__ . "<br>";
   }
   
   // usage in a non-static context
   public function test() {
      echo 'self: ' . self::nuut();
      echo 'static: ' . static::nuut();
   }
}

class B extends A {
   protected static $staticVar = 10;  
   
   protected function nuut() {
      return "Fonction nuut() ex�cut� dans la classe " . __CLASS__ . "<br>";
   }
   
    public static function qui() {
        echo __CLASS__."<br>";
    }   
   
   public static function test2() {
      A::foo(); // ''A'
      parent::foo();  // 'B' car late static binding: dans la m�thode parente "foo", on appelle la m�thode "qui" de la classe qui est cit�e plus bas dans l'appel
      self::foo();  // 'B'
   }
   
}

/*
  self::$staticVar = 5
  static::$staticVar = 10
*/
 B::fctStatique();
 
$b = new B();

/*
  self: Fonction nuut() ex�cut� dans la classe A
  static: Fonction nuut() ex�cut� dans la classe B
*/
$b->test();

B::test2();