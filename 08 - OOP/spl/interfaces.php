<?php
echo "<h1>Countable</h1>";

/**
 * Class Toto qui implémente Countable => faut redéfinir la méth. count()
 */
class Toto implements Countable {

    public $tab = [
        'nom' => 'Toto',
        'age' => 20,
        'sexe' => 'm'
    ];

    public function count()
    {
        return count($this->tab);
    }
}

$test = [0,1,2,3,4,5];

echo count(new Toto) . "<br>"; // 3
echo count($test); // 6