<?php

/*
  SPL = Standard PHP Library
  
  - comporte des classes et des interfaces natives à PHP

*/

echo "<h2>ArrayIterator:</h2>";

Class MonArray extends ArrayIterator {

}
$arr = array(
  'toto'  => 10,
  'albert'  =>  80,
  'alexis'  => 2
);
$test = new MonArray($arr);

var_dump($test->count()); //3

/*
  toto = 10
  albert = 80
  alexis = 2
*/
foreach ($test as $key => $value) {
  echo $key . " = " . $value ."<br>";
}

 // -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ArrayObject:</h2>";

$ar = new ArrayObject(array('a', 'b', 'c'));
$ar[] = 'd';

echo "<pre>" . print_r($ar, true) ."</pre>";
var_dump(count($ar)); //4
var_dump($ar->count()); //4

// En passant une constante spéciale au constructeur, on peut alors utiliser l'accès objet sur cet ArrayObject, en plus de l'accès tableau classique : 

$ar = new ArrayObject(array('a', 'b', 'c'), ArrayObject::ARRAY_AS_PROPS);
$ar->key = 'd';
echo "<pre>" . print_r($ar, true) ."</pre>";

function toto() {
  return array("toto", "nuut", "plop");
}

var_dump(toto()[1]); // nuut