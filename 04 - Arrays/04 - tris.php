<?php

echo "<h2>sort(), rsort():</h2>";

/*
	bool sort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
	
	Les éléments seront triés du plus petit au plus grand. 
	
	sort_flags:
	
	- SORT_REGULAR : compare les éléments normalement (ne modifie pas les types)
	- SORT_NUMERIC : compare les éléments numériquement
	- SORT_STRING : compare les éléments comme des chaînes de caractères
	- SORT_LOCALE_STRING : compare les éléments en utilisant la configuration locale. La locale courante est utilisée, elle peut être changée au moyen de setlocale(). 
	- SORT_NATURAL - compare les éléments comme des chaînes de caractères en utilisant l'ordre nature comme le fait la fonction natsort(). 
	
	Cette fonction retourne TRUE en cas de succès ou FALSE si une erreur survient. 
	Cette fonction assigne de nouvelles clés pour les éléments du paramètre array. 
	
	rsort(): identique à sort(), sauf qu'elle trie en sens inverse
*/

$num = array(30, 10, 5, 40, 1, 20, 100, 0);

var_Dump( sort($num) );	// true

/*
	array (size=8)
	  0 => int 0
	  1 => int 1
	  2 => int 5
	  3 => int 10
	  4 => int 20
	  5 => int 30
	  6 => int 40
	  7 => int 100
*/
var_dump($num);

sort($num, SORT_STRING);
/*
	array (size=8)
	  0 => int 0
	  1 => int 1
	  2 => int 10
	  3 => int 100
	  4 => int 20
	  5 => int 30
	  6 => int 40
	  7 => int 5
*/
var_dump($num);

rsort($num);
/*
	array (size=8)
	  0 => int 100
	  1 => int 40
	  2 => int 30
	  3 => int 20
	  4 => int 10
	  5 => int 5
	  6 => int 1
	  7 => int 0
*/
var_dump($num);



$strs = array('Toto', 'toto', 'albert', 'jean-pierre', 'alexis', 'jacques', 'guillaume');

sort($strs);
/*
	array (size=7)
	  0 => string 'Toto' (length=4)
	  1 => string 'albert' (length=6)
	  2 => string 'alexis' (length=6)
	  3 => string 'guillaume' (length=9)
	  4 => string 'jacques' (length=7)
	  5 => string 'jean-pierre' (length=11)
	  6 => string 'toto' (length=4)
*/
var_dump($strs);

rsort($strs);
/*
	array (size=7)
  	0 => string 'toto' (length=4)
	  1 => string 'jean-pierre' (length=11)
	  2 => string 'jacques' (length=7)
	  3 => string 'guillaume' (length=9)
	  4 => string 'alexis' (length=6)
	  5 => string 'albert' (length=6)
	  6 => string 'Toto' (length=4)
*/
var_dump($strs);

sort($strs, SORT_NUMERIC);
/*
WTF?
array (size=7)
  0 => string 'jean-pierre' (length=11)
  1 => string 'toto' (length=4)
  2 => string 'jacques' (length=7)
  3 => string 'guillaume' (length=9)
  4 => string 'albert' (length=6)
  5 => string 'alexis' (length=6)
  6 => string 'Toto' (length=4)
*/
var_dump($strs);

$mixed = array('Toto', 'toto', 50, 20, 'alexis', 'jacques', 'guillaume', 10);
sort($mixed);
/*
	array (size=8)
	  0 => string 'Toto' (length=4)
	  1 => string 'alexis' (length=6)
	  2 => string 'guillaume' (length=9)
	  3 => string 'jacques' (length=7)
	  4 => string 'toto' (length=4)
	  5 => int 10
	  6 => int 20
	  7 => int 50
*/
var_dump($mixed);

sort($mixed, SORT_NATURAL);
/*
	array (size=8)
	  0 => int 10
	  1 => int 20
	  2 => int 50
	  3 => string 'Toto' (length=4)
	  4 => string 'alexis' (length=6)
	  5 => string 'guillaume' (length=9)
	  6 => string 'jacques' (length=7)
	  7 => string 'toto' (length=4)
*/
var_dump($mixed);

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>asort() et arsort():</h2>";

/*
	bool asort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
	
	Trie un tableau et conserve l'association des index.
*/

$assoc = array(
	'toto' => 12,
	'Joachim' => 37,
	'Guillaume' => 37,
	'Cédric' => 37,
	'Alexis'	=> 2,
	'Albert'	=>	75,
	'Augustin'=> 4
);

asort($assoc);
/*
	array (size=7)
	  'Alexis' => int 2
	  'Augustin' => int 4
	  'toto' => int 12
	  'Cédric' => int 37
	  'Guillaume' => int 37
	  'Joachim' => int 37
	  'Albert' => int 75
*/
var_dump($assoc);

arsort($assoc);
/*
	array (size=7)
	  'Albert' => int 75
	  'Joachim' => int 37
	  'Guillaume' => int 37
	  'Cédric' => int 37
	  'toto' => int 12
	  'Augustin' => int 4
	  'Alexis' => int 2
*/
var_dump($assoc);

$test = array(0 => 'zorro', 1 => 'batman', 2 => 'spiderman', 3 => 'hulk');
asort($test);
/*
	Fonctionne aussi avec les clés numériques:
	array (size=4)
	  1 => string 'batman' (length=6)
	  3 => string 'hulk' (length=4)
	  2 => string 'spiderman' (length=9)
	  0 => string 'zorro' (length=5)
*/
var_dump($test);


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ksort() et krsort():</h2>";

/*
  bool ksort ( array &$array [, int $sort_flags = SORT_REGULAR ] )
  
  Trie le tableau array suivant les clés, en maintenant la correspondance entre les clés et les valeurs.
*/

$assoc = array(
	'toto' => 12,
	'Joachim' => 37,
	'Guillaume' => 37,
	'Cédric' => 37,
	'Alexis'	=> 2,
	'Albert'	=>	75,
	'Augustin'=> 4
);

ksort($assoc);

/*
  array (size=7)
    'Albert' => int 75
    'Alexis' => int 2
    'Augustin' => int 4
    'Cédric' => int 37
    'Guillaume' => int 37
    'Joachim' => int 37
    'toto' => int 12
*/
var_dump($assoc);

krsort($assoc);

/*
  array (size=7)
    'toto' => int 12
    'Joachim' => int 37
    'Guillaume' => int 37
    'Cédric' => int 37
    'Augustin' => int 4
    'Alexis' => int 2
    'Albert' => int 75
*/
var_dump($assoc);

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>array_multisort():</h2>";

/*
bool array_multisort ( array &$array1 [, mixed $array1_sort_order = SORT_ASC [, mixed $array1_sort_flags = SORT_REGULAR [, mixed $... ]]] )

sert à trier simultanément plusieurs tableaux, ou bien à trier un tableau multidimensionnel, suivant l'une ou l'autre de ses dimensions. 

 array1_sort_order = SORT_ASC/ SORT_DESC
array1_sort_flags =  SORT_REGULAR/SORT_NUMERIC/SORT_STRING/...
*/

$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);

/*
   array (size=4)
    0 => int 0
    1 => int 10
    2 => int 100
    3 => int 100
*/
var_dump($ar1);
/*
  Le deuxième (et les éventuels suivants) tableau est trié selon l'ordre du premier:
   array (size=4)
    0 => int 4
    1 => int 1
    2 => int 2
    3 => int 3
*/
var_dump($ar2);

array_multisort($ar1, SORT_DESC, SORT_NUMERIC, $ar2);

/*
   array (size=4)
    0 => int 100
    1 => int 100
    2 => int 10
    3 => int 0
*/
var_dump($ar1);
/*
   array (size=4)
    0 => int 2
    1 => int 3
    2 => int 1
    3 => int 4
*/
var_dump($ar2);

$multi = array(
  array('toto', 'albert', 'jacques', 'martin'),
  array(40, 5, 50, 10)
);

 array_multisort($multi[0], SORT_ASC, SORT_STRING, $multi[1]);
                
/*
   array (size=2)
    0 => 
      array (size=4)
        0 => string 'albert' (length=6)
        1 => string 'jacques' (length=7)
        2 => string 'martin' (length=6)
        3 => string 'toto' (length=4)
    1 => 
      array (size=4)
        0 => int 5
        1 => int 50
        2 => int 10
        3 => int 40
*/
var_dump($multi);


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>usort() et uasort():</h2>";

/*
  bool usort ( array &$array , callable $value_compare_func )
  
  Trie un tableau en utilisant une fonction de comparaison définie par l'utilisateur.
  
  - $value_compare_func: doit retourner un entier inférieur à, égal à, ou supérieur à 0 si le premier argument est considéré comme, respectivement, inférieur à, égal à, ou supérieur au second. 
   int callback ( mixed $a, mixed $b ) 
   
  Cette fonction assigne de nouvelles clés pour les éléments du paramètre array.
  
  uasort() est identique, sauf qu'elle conserve les index.
*/

function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$a = array(3, 2, 5, 6, 1);
usort($a, "cmp"); 

/*
   array (size=5)
    0 => int 1
    1 => int 2
    2 => int 3
    3 => int 5
    4 => int 6
*/
var_dump($a);

 // -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>natsort():</h2>";

/*
  bool natsort ( array &$array )
  
  Trie un tableau avec l'algorithme à "ordre naturel"
*/

 $array1 = array("img12.png", "img10.png", "img2.png", "img1.png");
 
sort($array1);  
/*
array (size=4)
  0 => string 'img1.png' (length=8)
  1 => string 'img10.png' (length=9)
  2 => string 'img12.png' (length=9)
  3 => string 'img2.png' (length=8)
*/
var_dump($array1);

natsort($array1);
/*
array (size=4)
  0 => string 'img1.png' (length=8)
  3 => string 'img2.png' (length=8)
  1 => string 'img10.png' (length=9)
  2 => string 'img12.png' (length=9)
*/
var_dump($array1);