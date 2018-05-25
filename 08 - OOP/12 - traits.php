<?php
 /*
  - m�canisme de r�utilisation de code
  - permettent de r�utiliser un certain nombre de m�thodes dans des classes ind�pendantes 
  - Il n'est pas possible d'instancier un Trait
  - les classes utilisent les traits ("use traitA, traitB, ...")
 */
 
 echo "<h2>Pr�c�dence:</h2>";
 
/*
  Pr�c�dence:
  
  - Une m�thode h�rit�e depuis la classe de base est �cras�e par celle provenant du Trait
*/

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$my = new MyHelloWorld();
$my->sayHello();  //Hello World!

echo "<br>";

trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// on utilise le trait mais on red�finit la fonction => celle-ci �crase le trait
class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello() . "<br>"; //Hello Universe!


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>Multiples traits:</h2>";

trait Hello {
    public function sayHello() {
        echo 'Hello, ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

// Fatal error: Cannot redeclare class World
/*
trait World {
    public function sayWorld() {
        echo 'World';
    }
}
*/

class MonHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MonHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>R�solution des conflits:</h2>";

/*
  Si deux Traits ins�rent une m�thode avec le m�me nom, une erreur fatale est lev�e si le conflit n'est pas explicitement r�solu. 
*/

trait A {
  public function smallTalk() {
    echo "a";
  }
  public function bigTalk() {
    echo "A";
  }  
}

trait B {
  public function smallTalk() {
    echo "b";
  }
  public function bigTalk() {
    echo "B";
  }  
}

class Talker {
  // Fatal error: Trait method smallTalk has not been applied, because there are collisions with other trait methods on Talker
  //use A, B;
  
  use A, B {
        B::smallTalk insteadof A; // on choisit d'utiliser la m�thode smallTalk du trait B
        A::bigTalk insteadof B;   // on choisit d'utiliser la m�thode bigTalk du trait A 
  }
  
  public function talk() {
    $this->smallTalk();
    $this->bigTalk();
  }
}

$talker = new Talker();
$talker->talk(); // bA


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>Changer la visibilit� des m�thodes:</h2>";

trait Coucou {
  public function direCoucou() {
    echo "coucou";
  }
}

class Personne {
  use Coucou;
}

$personne = new Personne();
$personne->direCoucou();

class Personne2 {
  use Coucou { direCoucou as private; }
}

$personne = new Personne2();
//$personne->direCoucou(); //  Fatal error: Call to private method Personne2::direCoucou()
