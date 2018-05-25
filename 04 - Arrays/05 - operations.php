<?php

echo "<h2>addition:</h2>";

$a1 = array(1, 2, 4);
$a2 = array(5, 3, 7);

var_dump($a1 + $a2);  // array(1, 2, 4)
//var_dump($a1 - $a2);  // fatal
//var_dump($a1 * $a2);  //Fatal

$a2 = array(5, 3, 7, 6, 8);

/*
  array (size=5)
    0 => int 1
    1 => int 2
    2 => int 4
    3 => int 6
    4 => int 8
*/
var_dump($a1 + $a2);

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_diff():</h2>";

/*
  array array_diff ( array $array1 , array $array2 [, array $... ] )
  
 array_diff() compare le tableau array1 avec un ou plusieurs tableaux et retourne les valeurs du tableau array1 qui ne sont pas présentes dans les autres tableaux.  
 
 Retourne un tableau contenant toutes les entités du tableau array1 qui ne sont présentes dans aucun des autres tableaux. 
*/

$array1 = array("a" => "green", "red", "blue", "pink");
$array2 = array("b" => "green", "yellow", "red");

/*
  array (size=2)
    1 => string 'blue' (length=4)
    2 => string 'pink' (length=4)
*/
var_dump( array_diff($array1, $array2) );

var_dump( array_diff($array2, $array1) );   // array(0 => 'yellow')

 $array1 = array(1, 2, "3", 4, 5, 6);
 $array2 = array(1, 2, 3, 4, 5, 6);
 
var_dump( array_diff($array1, $array2) ); // array() car (string) $elem1 === (string) $elem2 

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_diff_assoc():</h2>";

/*
  array array_diff_assoc ( array $array1 , array $array2 [, array $... ] )
  
 Contrairement à la fonction array_diff(), les clés du tableau sont également utilisées dans la comparaison.  
*/

$array1 = array("a" => "green", "red", "blue", "pink");
$array2 = array("b" => "green", "yellow", "red");

/*
  array (size=4)
    'a' => string 'green' (length=5)
    0 => string 'red' (length=3)
    1 => string 'blue' (length=4)
    2 => string 'pink' (length=4)
*/
var_dump( array_diff_assoc($array1, $array2) );

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_diff_key():</h2>";

/*
   array array_diff_key ( array $array1 , array $array2 [, array $... ] )
   
  Identique à la fonction array_diff(), excepté sur le fait que la comparaison est faite sur les clés, plutôt que sur les valeurs. 
*/

$a = array('toto' => 5, 'albert' => 15, 'zoé' => 10, 'daisy' => 6);
$b = array('albert' => 20, 'toto' => 7, 'jojo' => 9, 'oscar' => 11);

/*
  array (size=2)
    'zoé' => int 10
    'daisy' => int 6
*/
var_dump(array_diff_key($a, $b));

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_diff_uassoc():</h2>";

/*
  array array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )
  
  Contrairement à la fonction array_diff(), les clés du tableau sont utilisées dans la comparaison. 
*/