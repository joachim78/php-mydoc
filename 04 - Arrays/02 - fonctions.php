<?php

echo "<h2>array_slice():</h2>";

/*
	array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )
	
	- $array: le tableau d'entr�e;
	- $offset: position � partir de laquelle on commence � extraire les �l�ments. Si il est n�gatif, on compte � partir de la fin du tableau.
	- $length: si < 0 => exclure x �l�ments du tableau en partant de la fin
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
	Les cl�s sont conserv�es:
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
	
	retourne la paire cl�/valeur courante du tableau array et avance le pointeur de tableau. 
	Cette paire est retourn�e dans un tableau de 4 �l�ments, avec les cl�s 0, 1, key, et value. 
	Les �l�ments 0 et key contiennent le nom de la cl� et 1 et value contiennent la valeur. 
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
var_dump(each($tab));	// false, car on est arriv� � la fin du tableau

$fruit = array('a' => 'apple', 'b' => 'banana', 'c' => 'cranberry');

while (list($key, $val) = each($fruit)) { // rappel: list() ne fonctionne qu'avec des tableaux � indexation num�rique!
    echo "$key => $val <br/>";
}

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_push() :</h2>";

/*
	int array_push ( array &$array , mixed $value1 [, mixed $... ] )
	
	Empile un ou plusieurs �l�ments � la FIN d'un tableau (pass� par r�f�rence).
	Retourne le nouveau nombre d'�l�ments dans le tableau. 
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
	
	Empile un ou plusieurs �l�ments au d�but d'un tableau.
	Toutes les cl�s num�riques seront modifi�es afin de commencer � partir de z�ro, tandis que les cl�s litt�rales ne seront pas touch�es. 
	Retourne le nouveau nombre d'�l�ments du tableau array. 
*/

$tab = array('pomme', 'a' => 'poire', 'p�che');
array_unshift($tab, 'ananas', 'kiwi');
/*
	Array
	(
	    [0] => ananas
	    [1] => kiwi
	    [2] => pomme
	    [a] => poire
	    [3] => p�che
	)
*/
echo "<pre>" . print_r($tab, true) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_pop() et array_shift()  :</h2>";

/*
	mixed array_pop ( array &$array )
	
	array_pop() d�pile et retourne le dernier �l�ment du tableau array, le raccourcissant d'un �l�ment. 
	Retourne la derni�re valeur du tableau array. Si array est vide (ou n'est pas un tableau), NULL sera retourn�. 
*/

var_dump( array_pop($tab) );	//p�che
$test = array();
var_dump( array_pop($test) );	// null
$test = 5;
var_dump( array_pop($test) );	// Warning: array_pop() expects parameter 1 to be array, integer given in...

/*
	mixed array_shift ( array &$array )
	
	extrait la premi�re valeur d'un tableau et la retourne, en raccourcissant le tableau d'un �l�ment, et en d�pla�ant tous les �l�ments vers le bas. 
	Toutes les cl�s num�riques seront modifi�es pour commencer � z�ro. 
	
	Retourne la valeur d�pil�e, ou NULL si le tableau est vide ou si la valeur d'entr�e n'est pas un tableau. 
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
  
  supprime les �l�ments d�sign�s par offset et length du tableau input et les remplace par les �l�ments du tableau replacement, si ce dernier est pr�sent.
  les cl�s num�riques de input ne sont pas pr�serv�es. 
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
array_splice($input, -3);   // si offset est n�gatif, on commence � compter � partir de la fin du tableau
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
  
   Fusionne plusieurs tableaux en un seul, en ajoutant les valeurs de l'un � la fin de l'autre.
   Si les tableaux d'entr�es ont des cl�s en commun, alors, la valeur finale pour cette cl� �crasera la pr�c�dente. 
   Cependant, si les tableaux contiennent des cl�s num�riques, la valeur finale n'�crasera pas la valeur originale, mais sera ajout�e. 
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
  
  Si les tableaux pass�s en arguments ont les m�mes cl�s (cha�nes de caract�res), les valeurs sont alors rassembl�es dans un tableau, de mani�re r�cursive, de fa�on � ce que, si l'une de ces valeurs est un tableau elle-m�me, la fonction la rassemblera avec les valeurs de l'entr�e courante. 
  Cependant, si deux tableaux ont la m�me cl� num�rique, la derni�re valeur n'�crasera pas la pr�c�dente, mais sera ajout�e � la fin du tableau. 
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
  
  remplace les valeurs du tableau array1 avec les valeurs ayant les m�mes cl�s dans les tableaux fournis.
  Si une cl� du premier tableau existe dans un des tableaux suivants, sa valeur sera remplac�e
  Si la cl� n'existe pas dans le premier tableau, elle sera cr��e.
  Si la cl� n'existe que dans le premier tableau, elle sera laiss�e intacte. 
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
  
  Cr�e un tableau dont les cl�s sont les valeurs de keys et les valeurs sont les valeurs de values. 
*/