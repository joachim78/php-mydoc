<?php

class InvalidInputException extends Exception {}

class Stats {
  
  public function calculateConsumption($km, $litres) {
    if (!is_numeric($km)) throw new InvalidInputException ("Parameter must be a number<br>");
    if ($km == 0) throw new Exception ("Division by zero<br>");
    
    return (100/$km) * $litres;
  }
}

try {
   $s = new Stats();
  //$s->calculateConsumption('a', 67);  // => Parameter must be a number
   $s->calculateConsumption(0, 67); // => Division by zero
} catch (InvalidInputException $e) {
  echo $e->getMessage();    
} catch (Exception $e) {
  echo $e->getMessage();
} finally {
  echo 'on passe tjs ici!';
}
