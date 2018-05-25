<?php

 $authors = array( "a" => "Steinbeck","b" => "Kafka", "c" => "Tolkien", "d" => "Dickens" );
 $arr2 = array("e" => "Pierre", "f" => "Paul", "g" => "Jacques", "h" => "Bernard");

// dans un foreach, les valeurs sont copi�es. Ceci ne fonctionnera donc pas: 

 foreach($authors as $key => $value) {
 	if ( $value == "Tolkien" ) $value = "Hardy";
 }

 /*
	Array
	(
	    [a] => Steinbeck
	    [b] => Kafka
	    [c] => Tolkien
	    [d] => Dickens
	)
 */
 echo "<pre>" . print_r($authors, true) . "</pre>";
 
// Par contre, en utilisant les r�f�rences:
foreach($authors as $key => & $value) {
 	if ( $value == "Tolkien" ) $value = "Hardy";
}
var_dump($value);	//Dickens
//unset($value);  // tjs supprimer la derni�re valeur pour �viter les bugs bizarres (voir ci-dessous)
foreach($arr2 as $key => $value) { }
var_dump($arr2);
var_dump($value);	//Bernard

 
/*
	Array
	(
	    [a] => Steinbeck
	    [b] => Kafka
	    [c] => Hardy  => bien modifi�
	    [d] => Bernard => ?!? car on a pas supprim� la derni�re valeur ave unset()
	)
*/
 echo "<pre>" . print_r($authors, true) . "</pre>"; 
 
/*
	Le r�f�rencement de $value est seulement possible si le tableau parcouru peut �tre r�f�renc� (i.e. si c'est une variable). Le code suivant ne fonctionnera pas : 
 	foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
	}
*/


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_walk():</h2>";

/*
	bool array_walk ( array &$array , callable $callback [, mixed $userdata = NULL ] )
	
	Ex�cute la fonction callback d�finie par l'utilisateur sur chaque �l�ment du tableau array. 
	array_walk() n'est pas affect� par le pointeur interne du tableau array. array_walk() traversera le tableau en totalit� sans se soucier de la position du pointeur. 
	
	- callback: typiquement, callback prend deux param�tres. La valeur du param�tre array �tant le premier et la cl�/index, le second. 
	- userdata: sera pass� comme troisi�me param�tre � la fonction d�finie par l'utilisateur callback. 
	
	Cette fonction retourne TRUE en cas de succ�s ou FALSE si une erreur survient. 
*/

$tab = array('toTo', 'albert', 'ferNand', 'jacqueS');

function formatName(& $name) {
	$name = ucfirst(strtolower($name));
}

array_walk($tab, 'formatName');

/*
	Array
	(
	    [0] => Toto
	    [1] => Albert
	    [2] => Fernand
	    [3] => Jacques
	)
*/
echo "<pre>" . print_r($tab, true) . "</pre>"; 

// on peut aussi passer directement la fonction:
array_walk($tab, function(& $name) {
	$name = strtoupper($name);
});

/*
	Array
	(
	    [0] => TOTO
	    [1] => ALBERT
	    [2] => FERNAND
	    [3] => JACQUES
	)
*/
echo "<pre>" . print_r($tab, true) . "</pre>"; 

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_map():</h2>";

/*
	array array_map ( callable $callback , array $array1 [, array $... ] )
	
	array_map() retourne un tableau contenant tous les �l�ments du tableau array1, apr�s leur avoir appliqu� la fonction callback. 
	Le nombre de param�tres de la fonction callback doit �tre �gal au nombre de tableaux pass�s dans la fonction array_map(). 
*/

$tab = array('a' => 'toTo', 'b' => 'albert', 'c' => 'ferNand', 'd' => 'jacqueS');

function formatName2($name) {
	return ucfirst(strtolower($name));
}

/*
	Array
	(
	    [a] => Toto
	    [b] => Albert
	    [c] => Fernand
	    [d] => Jacques
	)
*/
echo "<pre>" . print_r(array_map('formatName2', $tab), true) . "</pre>"; 

$a = array(1, 2, 3, 4, 5);
$result = array_map(function($value) { return $value * $value; }, $a);

/*
	Array
(
    [0] => 1
    [1] => 4
    [2] => 9
    [3] => 16
    [4] => 25
)
*/
echo "<pre>" . print_r($result, true) . "</pre>"; 


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_filter():</h2>";

/*
	array array_filter ( array $array [, callable $callback [, int $flag = 0 ]] )
	
	�value chaque valeur du tableau array en les passant � la fonction utilisateur. 
	Si la fonction utilisateur retourne TRUE, la valeur courante du tableau array est retourn�e dans le tableau r�sultant. 
	Les cl�s du tableau sont pr�serv�es. 
	
	- flag : PHP 5.6
*/

$numbers = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);

function isOdd($value) {
	return $value & 1;
}

/*
	Array
	(
	    [a] => 1
	    [c] => 3
	    [e] => 5
	)
*/
echo "<pre>" . print_r(array_filter($numbers, 'isOdd'), true) . "</pre>"; 

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_reduce():</h2>";

/*
	mixed array_reduce ( array $array , callable $callback [, mixed $initial = NULL ] )
	
	array_reduce() applique it�rativement la fonction callback aux �l�ments du tableau array, de mani�re � r�duire le tableau � une valeur simple. 
	
	- callback: mixed callback ( mixed $carry , mixed $item ).  carry contient la valeur retourn�e de l'it�ration pr�c�dente; item == valeur de l'it�ration courante 
	- initial: sera utilis� pour initialiser le processus, ou bien comme valeur finale si le tableau est vide. 
*/

function sum($carry, $item)
{
    $carry += $item;
    return $carry;
}

var_dump(array_reduce($numbers, 'sum')); 	// 15 (1 + 2 + 3 + 4 +5)
var_dump(array_reduce($numbers, 'sum', 10));	// 25 (10 + 1 + 2 + 3 + 4 +5)
var_dump(array_reduce([], 'sum'));	// null
var_dump(array_reduce([], 'sum', 'nuut'));	// nuut


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_key_exists():</h2>";

/*
	bool array_key_exists ( mixed $key , array $array )
	
	retourne TRUE s'il existe une cl� du nom de key dans le tableau array. key peut �tre n'importe quelle valeur valide d'index de tableau. 
*/

$tab = array('nuut' => 'pomme', 'toto' => 'ananas', 0 => 'Albert', 1 => 'Oignon', 3 => 'citrouille', 4 => 50);

var_dump(array_key_exists('nuut', $tab));	//true 
var_dump(array_key_exists(3, $tab));	//true  
var_dump(array_key_exists('3', $tab));	//true 
var_dump(array_key_exists(true, $tab));	//Warning: array_key_exists(): The first argument should be either a string or an integer

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>in_array():</h2>";

/*
	bool in_array ( mixed $needle , array $haystack [, bool $strict = FALSE ] )
	
	- needle: scalaire ou array
*/

var_dump( in_array(50, $tab) );	// true
var_dump( in_array("50", $tab) );	// true
var_dump( in_array("50", $tab, true) );		// false: "50" !== 50
var_dump( in_array("Pomme", $tab) ); // false car sensible � la casse: "pomme" != "Pomme"

$multi = array(
	0 => array(1, 2, 'prout'),
	1 => 'plop',
	2 => 45
);

var_dump( in_array(array(1, 2, 'prout'), $multi) );	// true

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_keys():</h2>";

/*
	array array_keys ( array $array [, mixed $search_value [, bool $strict = false ]] )
	
	Retourne toutes les cl�s ou un ensemble des cl�s d'un tableau
	
	- search_value: si sp�cifi�, alors seulement les cl�s contenant ces valeurs seront retourn�es. 
	- strict: orce la comparaison en mode strict, incluant le type, avec l'op�rateur ==
*/

$tab = array(
	'toto' => 10,
	'Alexis' => 2,
	'Roger' => 80,
	'C�me'	=> 2,
	'JAna'	=> 2,
	'Silja' => "2"
);

/*
	array (size=6)
	  0 => string 'toto' (length=4)
	  1 => string 'Alexis' (length=6)
	  2 => string 'Roger' (length=5)
	  3 => string 'C�me' (length=4)
	  4 => string 'JAna' (length=4)
	  5 => string 'Silja' (length=5)
*/
var_dump( array_keys($tab) );

/*
	array (size=4)
	  0 => string 'Alexis' (length=6)
	  1 => string 'C�me' (length=4)
	  2 => string 'JAna' (length=4)
	  3 => string 'Silja' (length=5)
*/
var_dump( array_keys($tab, 2) );

/*
	array (size=3)
  0 => string 'Alexis' (length=6)
  1 => string 'C�me' (length=4)
  2 => string 'JAna' (length=4)
*/
var_dump( array_keys($tab, 2, true) );

var_dump( array_keys($tab, 20) );	// array()

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_values():</h2>";

/*
	array array_values ( array $array )
	
	Retourne toutes les valeurs d'un tableau dans un autre tableau et l'indexe de facon num�rique. 
*/

/*
	array (size=6)
	  0 => int 10
	  1 => int 2
	  2 => int 80
	  3 => int 2
	  4 => int 2
	  5 => string '2' (length=1)
*/
var_dump( array_values($tab) );


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_search():</h2>";

/*
	mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )
	
	Recherche dans un tableau la cl� associ�e � une valeur
	
	Si needle est trouv� plus d'une fois dans haystack, la premi�re cl� concordante est retourn�e. 
	Pour trouver toutes les cl�s correspondantes, utilisez plut�t la fonction array_keys() avec le param�tre optionnel search_value. 
*/

var_dump( array_search(80, $tab) );	// 'Roger'
var_dump( array_search('80', $tab, true) );	// false
var_dump( array_search(2, $tab) );	// 'Alexis'
var_dump( array_search('aaa', $tab) );	// false
var_dump( array_search('aaa', 'test') );	// null - Warning: array_search() expects parameter 2 to be array, string given in ...
