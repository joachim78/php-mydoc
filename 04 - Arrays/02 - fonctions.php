<?php

echo "<h2>array_slice():</h2>";

/*
	array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )
	
	- $array: le tableau d'entrée;
	- $offset: position à partir de laquelle on commence à extraire les éléments. Si il est négatif, on compte à partir de la fin du tableau.
	- $length: si < 0 => exclure x éléments du tableau en partant de la fin
*/

$input = array("a", "b", "c", "d", "e");

/*
	Array
	(
	    [0] => c
	    [1] => d
	    [2] => e
	)
*/
echo "<pre>" . print_r(array_slice($input, 2),true) . "</pre>";

/*
	Array
	(
	    [0] => b
	    [1] => c
	    [2] => d
	)
*/
echo "<pre>" . print_r(array_slice($input, 1, 3),true) . "</pre>";

/*
	Les clés sont conservées:
	Array
	(
	    [1] => b
	    [2] => c
	    [3] => d
	)
*/
echo "<pre>" . print_r(array_slice($input, 1, 3, true),true) . "</pre>";

/*
	Array
	(
	    [0] => c
	    [1] => d
	    [2] => e
	)
*/
echo "<pre>" . print_r(array_slice($input, -3), true) . "</pre>";

/*
	Array
	(
	    [0] => b
	    [1] => c
	)
*/
echo "<pre>" . print_r(array_slice($input, -4, -2),true) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>count():</h2>";

/*
	int count ( mixed $array_or_countable [, int $mode = COUNT_NORMAL ] )
*/

$tab = array(
 0 => array('a', 'b', 'c'),
 1 => array('e', 'f', 'g', 'h'),
 2 => array('i', 'j', 'k', 'l', 'm')
);

var_dump( count($tab) );	// 3
var_dump( count($tab, COUNT_RECURSIVE) );	// 15

var_dump(count('toto'));	//1
var_dump(count(5));				//1
var_dump(count(55));			//1
var_dump(count(0));				//1
var_dump(count(null));		//0

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>current(), next(), prev(), ... :</h2>";

/*
	mixed current ( array &$array )
*/

$tab = array('Fred', 'Blaise', 'Eda', 'Manu');
var_dump(current($tab));	//Fred
var_dump(next($tab));	// Blaise
var_dump(end($tab));	// Manu
var_dump(prev($tab));	// Eda
var_dump(key($tab));	// 2 (Eda)
var_dump(reset($tab));	// Fred	
var_dump(prev($tab));		//false

var_dump( current([]) );	// false

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>each() :</h2>";

/*
	array each ( array &$array )
	
	retourne la paire clé/valeur courante du tableau array et avance le pointeur de tableau. 
	Cette paire est retournée dans un tableau de 4 éléments, avec les clés 0, 1, key, et value. 
	Les éléments 0 et key contiennent le nom de la clé et 1 et value contiennent la valeur. 
*/

reset($tab);
/*
	Array
	(
	    [1] => Fred
	    [value] => Fred
	    [0] => 0
	    [key] => 0
	)
*/
echo "<pre>" . print_r(each($tab), true) . "</pre>";

/*
	Array
	(
	    [1] => Blaise
	    [value] => Blaise
	    [0] => 1
	    [key] => 1
	)
*/
echo "<pre>" . print_r(each($tab), true) . "</pre>";
echo "<pre>" . print_r(each($tab), true) . "</pre>";
/*
	Array
	(
	    [1] => Manu
	    [value] => Manu
	    [0] => 3
	    [key] => 3
	)
*/
echo "<pre>" . print_r(each($tab), true) . "</pre>";
var_dump(each($tab));	// false, car on est arrivé à la fin du tableau

$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');

while (list($key, $val) = each($fruit)) { // rappel: list() ne fonctionne qu'avec des tableaux à indexation numérique!
    echo "$key => $val <br/>";
}

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_push() :</h2>";

/*
	int array_push ( array &$array , mixed $value1 [, mixed $... ] )
	
	Empile un ou plusieurs éléments à la FIN d'un tableau (passé par référence).
	Retourne le nouveau nombre d'éléments dans le tableau. 
*/

$tab = array('Jobs', 'Gates');

var_dump( array_push($tab, 'Wozniak', 'Zuckerberg', 'Trucmuche') );	// 5

/*
	Array
	(
	    [0] => Jobs
	    [1] => Gates
	    [2] => Wozniak
	    [3] => Zuckerberg
	    [4] => Trucmuche
	)
*/
echo "<pre>" . print_r($tab, true) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_unshift() :</h2>";

/*
	int array_unshift ( array &$array , mixed $value1 [, mixed $... ] )
	
	Empile un ou plusieurs éléments au début d'un tableau.
	Toutes les clés numériques seront modifiées afin de commencer à partir de zéro, tandis que les clés littérales ne seront pas touchées. 
	Retourne le nouveau nombre d'éléments du tableau array. 
*/

$tab = array('pomme', 'a' => 'poire', 'pêche');
array_unshift($tab, 'ananas', 'kiwi');
/*
	Array
	(
	    [0] => ananas
	    [1] => kiwi
	    [2] => pomme
	    [a] => poire
	    [3] => pêche
	)
*/
echo "<pre>" . print_r($tab, true) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_pop() et array_shift()  :</h2>";

/*
	mixed array_pop ( array &$array )
	
	array_pop() dépile et retourne le dernier élément du tableau array, le raccourcissant d'un élément. 
	Retourne la dernière valeur du tableau array. Si array est vide (ou n'est pas un tableau), NULL sera retourné. 
*/

var_dump( array_pop($tab) );	//pêche
$test = array();
var_dump( array_pop($test) );	// null
$test = 5;
var_dump( array_pop($test) );	// Warning: array_pop() expects parameter 1 to be array, integer given in...

/*
	mixed array_shift ( array &$array )
	
	extrait la première valeur d'un tableau et la retourne, en raccourcissant le tableau d'un élément, et en déplaçant tous les éléments vers le bas. 
	Toutes les clés numériques seront modifiées pour commencer à zéro. 
	
	Retourne la valeur dépilée, ou NULL si le tableau est vide ou si la valeur d'entrée n'est pas un tableau. 
*/

var_dump( array_shift($tab) );	// ananas

/*
	Array
(
    [0] => kiwi
    [1] => pomme
    [a] => poire
)
*/
echo "<pre>" . print_r($tab, true) . "</pre>";


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_splice():</h2>";

/*
  array array_splice ( array &$input , int $offset [, int $length [, mixed $replacement = array() ]] )
  
  supprime les éléments désignés par offset et length du tableau input et les remplace par les éléments du tableau replacement, si ce dernier est présent.
  les clés numériques de input ne sont pas préservées. 
*/

$input = array("red", "green", "blue", "yellow");
 
var_dump(array_splice($input, 2));  // array(0 => 'blue', 1 => 'yellow')
var_dump($input); // array(0 => "red", 1 => "green")

$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, 2);
/*
   array (size=2)
    0 => string 'red' (length=3)
    1 => string 'yellow' (length=6)
*/
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, 2, -1);
/*
  array (size=3)
    0 => string 'red' (length=3)
    1 => string 'green' (length=5)
    2 => string 'yellow' (length=6)
*/
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, -1);
/*
   array (size=3)
      0 => string 'red' (length=3)
      1 => string 'green' (length=5)
      2 => string 'blue' (length=4)
*/
var_dump($input);

$input = array("red", "green", "blue", "yellow");
array_splice($input, -3);   // si offset est négatif, on commence à compter à partir de la fin du tableau
var_dump($input); // array(0 => 'red')

$input = array("red", "green", "blue", "yellow");
array_splice($input, -3, 2);
/*
  array (size=2)
    0 => string 'red' (length=3)
    1 => string 'yellow' (length=6)
*/
var_dump($input);

$input = array("red", "green", "blue", "yellow", "black", "orange");
array_splice($input, 1, -1);
/*
  array (size=3)
    0 => string 'red' (length=3)
    1 => string 'orange' (length=6)
*/
var_dump($input);

$input = array("red", "green", "blue", "yellow", "black", "orange");
print_r(array_splice($input, -3, -1));
 /*
  Array
  (
      [0] => red
      [1] => green
      [2] => blue
      [3] => orange
  )
 */
print_r($input);
 
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_merge():</h2>";

/*
  array array_merge ( array $array1 [, array $... ] )
  
   Fusionne plusieurs tableaux en un seul, en ajoutant les valeurs de l'un à la fin de l'autre.
   Si les tableaux d'entrées ont des clés en commun, alors, la valeur finale pour cette clé écrasera la précédente. 
   Cependant, si les tableaux contiennent des clés numériques, la valeur finale n'écrasera pas la valeur originale, mais sera ajoutée. 
*/

$a1 = array('Camus', 'Steinbeck');
$a2 = array('Tolkien', 'Orwell');
$a3 = array('Huxley', 'Sartre');

/*
  array (size=6)
    0 => string 'Camus' (length=5)
    1 => string 'Steinbeck' (length=9)
    2 => string 'Tolkien' (length=7)
    3 => string 'Orwell' (length=6)
    4 => string 'Huxley' (length=6)
    5 => string 'Sartre' (length=6)
*/
var_dump(array_merge($a1, $a2, $a3));

$a1 = array('author' => 'Steinbeck', 'title' => '1984', 'year' => 1938);
$a2 = array('author' => 'Orwell', 'title' => '1984', 'year' => 1948);

/*
  array (size=3)
    'author' => string 'Orwell' (length=6)
    'title' => string '1984' (length=4)
    'year' => int 1948
*/
var_dump(array_merge($a1, $a2));

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_merge_recursive():</h2>";

/*
  array array_merge_recursive ( array $array1 [, array $... ] )
  
  Si les tableaux passés en arguments ont les mêmes clés (chaînes de caractères), les valeurs sont alors rassemblées dans un tableau, de manière récursive, de façon à ce que, si l'une de ces valeurs est un tableau elle-même, la fonction la rassemblera avec les valeurs de l'entrée courante. 
  Cependant, si deux tableaux ont la même clé numérique, la dernière valeur n'écrasera pas la précédente, mais sera ajoutée à la fin du tableau. 
*/

$ar1 = array("color" => array("favorite" => "red", "green"), 5);
$ar2 = array(10, "color" => array("favorite" => "green", "blue"));

/*
  array (size=3)
    'color' => 
      array (size=3)
        'favorite' => 
          array (size=2)
            0 => string 'red' (length=3)
            1 => string 'green' (length=5)
        0 => string 'green' (length=5)
        1 => string 'blue' (length=4)
    0 => int 5
    1 => int 10
*/
var_dump(array_merge_recursive($ar1, $ar2));

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_replace():</h2>";

/*
  array|null array_replace ( array $array1 , array $array2 [, array $... ] )
  
  remplace les valeurs du tableau array1 avec les valeurs ayant les mêmes clés dans les tableaux fournis.
  Si une clé du premier tableau existe dans un des tableaux suivants, sa valeur sera remplacée
  Si la clé n'existe pas dans le premier tableau, elle sera créée.
  Si la clé n'existe que dans le premier tableau, elle sera laissée intacte. 
*/

$a1 = array("orange", "pomme", "banane", "fraise");
$a2 = array("ananas", 4 => "framboise");
$a3 = array(1 => "poire");

/*
  array (size=5)
    0 => string 'ananas' (length=6)
    1 => string 'poire' (length=5)
    2 => string 'banane' (length=6)
    3 => string 'fraise' (length=6)
    4 => string 'framboise' (length=9)
*/
var_dump( array_replace($a1, $a2, $a3) );

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_combine():</h2>";

/*
  array array_combine ( array $keys , array $values )
  
  Crée un tableau dont les clés sont les valeurs de keys et les valeurs sont les valeurs de values. 
*/