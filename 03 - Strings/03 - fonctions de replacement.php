<?php

echo "<h2>str_replace():</h2>";

/**
	mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
	
	- Si le paramètre search est un tableau et que le paramètre replace est une chaîne de caractères, 
		alors cette chaîne de caractères de remplacement sera utilisée pour chaque valeur de search
	- Si les paramètres search et replace sont des tableaux, 
		alors la fonction str_replace() prendra une valeur de chaque tableau et les utilisera pour la recherche et le remplacement sur subject.
	- si suject est un array, alors le remplacement se fera sur chaque élément de celui-ci et la valeur retournée sera aussi un tableau. 
	- $count: Si fournie, cette variable contiendra le nombre de remplacements effectués. 
  
  version case-insensitive: str_ireplace()
*/

$test = "Toto a deux ans. Toto va à la crèche. Albert habite à Floriffoux.";

var_dump( str_replace("Toto", "Alexis", $test, $count) );	// 'Alexis a deux ans. Alexis va à la crèche. Albert habite à Floriffoux.'
var_dump($count);	// 2
var_dump( str_replace(array("Toto", "Albert"), "Alexis", $test) );	//'Alexis a deux ans. Alexis va à la crèche. Alexis habite à Floriffoux.'
$test = "Toto a deux ans. Roger va à la crèche. Albert habite à Floriffoux.";
var_dump( str_replace(array("Toto", "Roger", "Albert"), array("Alexis", "Côme", "Falilou"), $test) );	//'Alexis a deux ans. Côme va à la crèche. Falilou habite à Floriffoux.'

//Si le paramètre "replace" a moins de valeurs que le paramètre "search", alors une chaîne vide sera utilisée comme valeur pour le reste des valeurs de remplacement. 
var_dump( str_replace(array("Toto", "Roger", "Albert"), array("Alexis", "Côme"), $test) );	// 'Alexis a deux ans. Côme va à la crèche.  habite à Floriffoux.'


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>substr_replace():</h2>";

/**
	mixed substr_replace ( mixed $string , mixed $replacement , mixed $start [, mixed $length ] )
	
	substr_replace() remplace un segment de la chaîne string par la chaîne replacement. Le segment est délimité par start et éventuellement par length. 
  Si le paramètre string est un tableau, alors un tableau sera retourné. 
*/

$test = "Alexis a deux ans, il va à la crèche";


var_dump( substr_replace($test, "4 ans", 9) );	// 'Alexis a 4 ans' 
var_dump( substr_replace($test, "4 ans", 9, 8) );	// 'Alexis a 4 ans, il va à la crèche'

$input = array('A: XXX', 'B: XXX', 'C: XXX');

/*
  Array
(
    [0] => A: YYY
    [1] => B: YYY
    [2] => C: YYY
)
*/
echo '<pre>' . print_r( substr_replace($input, 'YYY', 3, 3), true ) . "</pre>";

$replace = array('AAA', 'BBB', 'CCC');

/*
  Array
(
    [0] => A: AAA
    [1] => B: BBB
    [2] => C: CCC
)
*/
echo '<pre>' . print_r( substr_replace($input, $replace, 3, 3), true ) . "</pre>";


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strtr():</h2>";

/**
  string strtr ( string $str , string $from , string $to )
  string strtr ( string $str , array $replace_pairs )
  
  - from: caractères à remplacer
  - to: car. de remplacement
  - si 2 params => le deuxième doit être un array (from => to). La donnée retournée est une string dans laquelle toutes les occurrences des clés du tableau ont été remplacées par les valeurs correspondantes. Les clés les plus longues seront d'abord utilisées. Une fois une sous-chaine remplacée, sa nouvelle valeur ne sera plus recherchée. 
 */

 $test = "L'élève va à l'écôle";
 
// Ici, strtr() remplace octet par octet  (car. par car.)
var_dump( strtr($test, "éèàô", "eeao") ); //  L'eleve va a l'ecole

$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
// avec deux paramètres, elle peut remplacer des sous-chaines plus longues:
echo strtr("hi all, I said hello", $trans) . "<br>";  // hello all, I said hi

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strtolower() et strtoupper():</h2>";

$str = "Marie A un Petit Agneau, et l'aime TRès fORt.";
var_dump(strtolower($str));   // marie a un petit agneau, et l'aime très fort.
var_dump(strtoupper($str));  //MARIE A UN PETIT AGNEAU, ET L'AIME TRÈS FORT. 

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ucfirst() et lcfirst():</h2>";

// Met la première lettre en maj
var_dump( ucfirst('hello world') ); //Hello world

 // Met la première lettre en minuscule
var_dump( lcfirst('HEllo world') ); //hEllo world

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ucwords():</h2>";

/*
  string ucwords ( string $str [, string $delimiters = " \t\r\n\f\v" ] )
  
  Met en majuscule la première lettre de tous les mots.
  
  La définition d'un mot est : toute séquence de caractères qui suit immédiatement n'importe quel caractère listé dans le paramètre delimiters (par défaut, ce sont : une espace, un saut à la ligne, une nouvelle ligne, un retour à la ligne, une tabulation horizontale, et une tabulation verticale). 
*/

var_dump( ucwords("bonjour tout le monde!") );  // Bonjour Tout Le Monde!

$foo = 'hello|world!';
var_dump( ucwords($foo) ); // Hello|world!
// séparateur custom:  PHP 5.5
//var_dump( ucwords($foo, "|") ); // Hello|World!