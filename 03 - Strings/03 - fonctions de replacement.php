<?php

echo "<h2>str_replace():</h2>";

/**
	mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )
	
	- Si le param�tre search est un tableau et que le param�tre replace est une cha�ne de caract�res, 
		alors cette cha�ne de caract�res de remplacement sera utilis�e pour chaque valeur de search
	- Si les param�tres search et replace sont des tableaux, 
		alors la fonction str_replace() prendra une valeur de chaque tableau et les utilisera pour la recherche et le remplacement sur subject.
	- si suject est un array, alors le remplacement se fera sur chaque �l�ment de celui-ci et la valeur retourn�e sera aussi un tableau. 
	- $count: Si fournie, cette variable contiendra le nombre de remplacements effectu�s. 
  
  version case-insensitive: str_ireplace()
*/

$test = "Toto a deux ans. Toto va � la cr�che. Albert habite � Floriffoux.";

var_dump( str_replace("Toto", "Alexis", $test, $count) );	// 'Alexis a deux ans. Alexis va � la cr�che. Albert habite � Floriffoux.'
var_dump($count);	// 2
var_dump( str_replace(array("Toto", "Albert"), "Alexis", $test) );	//'Alexis a deux ans. Alexis va � la cr�che. Alexis habite � Floriffoux.'
$test = "Toto a deux ans. Roger va � la cr�che. Albert habite � Floriffoux.";
var_dump( str_replace(array("Toto", "Roger", "Albert"), array("Alexis", "C�me", "Falilou"), $test) );	//'Alexis a deux ans. C�me va � la cr�che. Falilou habite � Floriffoux.'

//Si le param�tre "replace" a moins de valeurs que le param�tre "search", alors une cha�ne vide sera utilis�e comme valeur pour le reste des valeurs de remplacement. 
var_dump( str_replace(array("Toto", "Roger", "Albert"), array("Alexis", "C�me"), $test) );	// 'Alexis a deux ans. C�me va � la cr�che.  habite � Floriffoux.'


// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>substr_replace():</h2>";

/**
	mixed substr_replace ( mixed $string , mixed $replacement , mixed $start [, mixed $length ] )
	
	substr_replace() remplace un segment de la cha�ne string par la cha�ne replacement. Le segment est d�limit� par start et �ventuellement par length. 
  Si le param�tre string est un tableau, alors un tableau sera retourn�. 
*/

$test = "Alexis a deux ans, il va � la cr�che";


var_dump( substr_replace($test, "4 ans", 9) );	// 'Alexis a 4 ans' 
var_dump( substr_replace($test, "4 ans", 9, 8) );	// 'Alexis a 4 ans, il va � la cr�che'

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
  
  - from: caract�res � remplacer
  - to: car. de remplacement
  - si 2 params => le deuxi�me doit �tre un array (from => to). La donn�e retourn�e est une string dans laquelle toutes les occurrences des cl�s du tableau ont �t� remplac�es par les valeurs correspondantes. Les cl�s les plus longues seront d'abord utilis�es. Une fois une sous-chaine remplac�e, sa nouvelle valeur ne sera plus recherch�e. 
 */

 $test = "L'�l�ve va � l'�c�le";
 
// Ici, strtr() remplace octet par octet  (car. par car.)
var_dump( strtr($test, "����", "eeao") ); //  L'eleve va a l'ecole

$trans = array("h" => "-", "hello" => "hi", "hi" => "hello");
// avec deux param�tres, elle peut remplacer des sous-chaines plus longues:
echo strtr("hi all, I said hello", $trans) . "<br>";  // hello all, I said hi

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strtolower() et strtoupper():</h2>";

$str = "Marie A un Petit Agneau, et l'aime TR�s fORt.";
var_dump(strtolower($str));   // marie a un petit agneau, et l'aime tr�s fort.
var_dump(strtoupper($str));  //MARIE A UN PETIT AGNEAU, ET L'AIME TR�S FORT. 

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ucfirst() et lcfirst():</h2>";

// Met la premi�re lettre en maj
var_dump( ucfirst('hello world') ); //Hello world

 // Met la premi�re lettre en minuscule
var_dump( lcfirst('HEllo world') ); //hEllo world

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>ucwords():</h2>";

/*
  string ucwords ( string $str [, string $delimiters = " \t\r\n\f\v" ] )
  
  Met en majuscule la premi�re lettre de tous les mots.
  
  La d�finition d'un mot est : toute s�quence de caract�res qui suit imm�diatement n'importe quel caract�re list� dans le param�tre delimiters (par d�faut, ce sont : une espace, un saut � la ligne, une nouvelle ligne, un retour � la ligne, une tabulation horizontale, et une tabulation verticale). 
*/

var_dump( ucwords("bonjour tout le monde!") );  // Bonjour Tout Le Monde!

$foo = 'hello|world!';
var_dump( ucwords($foo) ); // Hello|world!
// s�parateur custom:  PHP 5.5
//var_dump( ucwords($foo, "|") ); // Hello|World!