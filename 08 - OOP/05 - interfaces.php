<?php
/*
   - d�finit les m�thodes � impl�menter (juste la signature)
   - mot-cl�: interface
   - toutes les m�thodes doivent �tre publiques
   - une interface peut h�riter d'une ou plusieurs interfaces
   - une classe peut impl�menter plusieurs interfaces ("implements")
   
   A la diff�rence des classes abstraites, il n'y a pas de relation parent-enfant; des classes totalement diff�rentes peuvent impl�menter la meme interface.
   
*/

interface iMyInterface1 {
  public function toto($a);
  
  /*
    Ceci n'est pas autoris�:
    Fatal error: Interface function iMyInterface1::test() cannot contain body
  public function test() {
    echo "coucou";
  }
  */
}

interface iMyInterface2 {
  public function nuut($a, $b);
}

interface iMyInterface3 extends iMyInterface1, iMyInterface2 {
   const A = 'a';
   //public function nuut();   // pas possible car il y a d�j� une m�thode "nuut" dans iMyInterface2
   // Par contre, ceci fonctionnera:
   public function nuut($a, $b);
   public function plop();
}

class Brol implements iMyInterface1, iMyInterface2 {
   public function toto($a) {
      // some business logic....
   }
   
   public function nuut($a, $b) {
      // some business logic....
   }
} 

class Brol2 implements iMyInterface3 {
   //const A = 'b';   //Cannot inherit previously-inherited or override constant A from interface iMyInterface3
   public function toto($a) {}
   public function nuut($a, $b) {}
   public function plop() {}
}

 