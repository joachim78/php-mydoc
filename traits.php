<?php
/**
 * Les traits permettent de réutiliser du code, sans besoin d'héritage.
 * C'est donc un ajout à l'héritage traditionnel: ils permettent de repousser les limites de celui-ci.
 *
 * Ex d'utilisation: logging, caching, etc
 */
echo "<h1>Traits</h1>";

trait TestTrait {
    public function sayHello() {
        echo "Hello from " . __TRAIT__ . " called by " . __CLASS__ . "<br>";
    }

    public function sayGoodbye() {
        echo "Bye bye from " . __TRAIT__ . "<br>";
    }

    public function log($str) {
        echo __TRAIT__ . " => " .$str . "<br>";
    }
}

trait TestTrait2 {
    /**
     * Générera une erreur car déjà définie dans TestTrait
     */
/*    public function log($str, $str2) {
        echo __TRAIT__ . " => " .$str . "<br>";
    }*/
}

class Test extends TestParent{
    use TestTrait, TestTrait2;

    /**
     * Les méthodes de la classe écrasent les éventuelles méthodes avec la même signature dans le trait
     */
    public function sayGoodbye() {
        echo "Bye bye from " . __CLASS__ . "<br>";
    }
}

class TestParent {
    /**
     * Cette méthode sera écrasée si elle est présente dans le trait
     */
    public function log($str) {
        echo self::class . " => " . $str . "<br>";
    }
}

$t = new Test();
$t->sayHello(); // Hello from TestTrait called by Test
$t->sayGoodbye(); // Bye bye from Test
$t->log("toto"); // TestTrait => toto

echo "<h2>Résolution des conflits</h2>";

trait TraitA {
    public function smallTalk() {
        echo "a<br>";
    }
    public function bigTalk() {
        echo "A<br>";
    }
}

trait TraitB {
    public function smallTalk() {
        echo "b<br>";
    }
    public function bigTalk() {
        echo "B<br>";
    }
}

class Talker {
    use TraitA, TraitB {
        TraitB::smallTalk insteadof TraitA;  // on utilise la méthode smallTalk() de TraitB au lieu de celle de TraitA
        TraitA::bigTalk insteadof TraitB;
        TraitB::bigTalk as talk;
    }
}

$t = new Talker();
$t->smallTalk(); // b
$t->bigTalk(); // A
$t->talk(); // B

echo "<h2>Méthodes abstraites</h2>";

trait LoggerTrait {
    abstract public function getDefaultLogger();
}

class Logger {
    use LoggerTrait;

    public function getDefaultLogger()
    {
        // TODO: Implement getDefaultLogger() method.
    }
}

echo "<h2>Méthodes statiques</h2>";

trait CounterTrait {
    public static $counter = 0;
    public static function add($i) {
        self::$counter += $i;
    }
}

class Counter {
    use CounterTrait;
}

Counter::add(5);
echo Counter::$counter . "<br>"; // 5
Counter::add(10);
echo Counter::$counter . "<br>"; // 15


