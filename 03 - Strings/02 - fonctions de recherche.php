<?php

/**
	int strlen ( string $string )
*/
echo "<h2>strlen:</h2>";

$str = "Hello, World!";
var_dump(strlen($str));	//13
var_dump( strlen(array("Hello, World!")) ); //Null : Warning: strlen() expects parameter 1 to be string, array given in ...
var_dump(strlen(true));	// 1
var_dump(strlen(false)); //0
var_dump(strlen(null)); //0
var_dump(strlen(1978));	//4

class Toto {
	
}

var_dump( strlen(new Toto()) ); // null : Warning: strlen() expects parameter 1 to be string, object given ...

/**
	mixed str_word_count ( string $string [, int $format = 0 [, string $charlist ]] )mixed str_word_count ( string $string [, int $format = 0 [, string $charlist ]] )
	
	- format:
		=> 0: nbre de mots trouvés
		=> 1: array contenant ts les mots trouvés
		=> 2: array associatif: clé = position du mot, valeur = mot
	- charlist: liste de caractères additionnels pouvant être considérés comme des mots
*/

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>str_word_count:</h2>";

var_dump( str_word_count( "Hello, world! How are you today?" ) );	//6

/*
Array
(
    [0] => Hello
    [1] => world
    [2] => How
    [3] => are
    [4] => you
    [5] => today
)
*/
echo "<pre>" .print_r( str_word_count( "Hello, world! How are you today?", 1 ) , true) . "</pre>";

/*
Array
(
    [0] => Hello
    [7] => world
    [14] => How
    [18] => are
    [22] => you
    [26] => today
)
*/
echo "<pre>" .print_r( str_word_count( "Hello, world! How are you today?", 2 ) , true) . "</pre>";

/*
(
    [0] => Je
    [1] => m'appelle
    [2] => Joachim
    [3] => et
    [4] => j'ai
    [5] => ans
)
*/
echo "<pre>" .print_r(  str_word_count( "Je m'appelle Joachim et j'ai 37 ans" , 1) , true) . "</pre>";
echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

/**
	Accéder à un caractère
*/

$myString = "Hello, world!";

var_dump($myString[0]);	//H
var_dump($myString[7]);	//w
$myString[12] = '?';
var_dump($myString);	//Hello, world?
$myString[20] = 'a';
var_dump($myString);	// 'Hello, world?       a'

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>substr:</h2>";

/**
	string substr ( string $string , int $start [, int $length ] )
	
	- start: si > 0 => commence à compter à partir du début de la chaîne (position zéro); si < 0 => compte à partir de la fin de la chaîne
	- length: si < 0 => le même nombre de caractères sera omis, en partant de la fin de la chaîne string
	
	Retourne false si string vide ou erreur
*/

$str = "Hello, World!";

var_dump(substr($str, 7));	// 'World!'
var_dump(substr($str, 0, 5));	// 'Hello'
var_dump(substr($str, -1));	// '!' 
var_dump(substr($str, -6)); // 'World!' 
var_dump(substr($str, -6, 5));	// 'World'

var_dump(substr($str, 0, -5));	//'Hello, W' 
var_dump(substr($str, -6, -1));	//'World'

var_dump(substr('', 3));	// false
var_dump(substr($str, 70));	// false
var_dump(substr('toto', 4));	// false

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strstr:</h2>";

/**
	mixed strstr ( string $haystack , mixed $needle [, bool $before_needle = false ] )
	
	- haystack: la chaîne d'entrée
	- needle: texte à chercher
	
	Détermine si le texte recherché se trouve dans la strign
	Retourne une sous-chaîne de haystack, allant de la première occurrence de needle (incluse) jusqu'à la fin de la chaîne. 
	Case-sensitive => utiliser stristr()
	
	Alias = strchr()
*/

$nuut = "Hello, World!. How are you?";

var_dump( strstr($nuut, 'World') );	//'World!. How are you?'
var_dump( strstr($nuut, 'world') );	// false car case-sensitive; 
var_dump( stristr($nuut, 'world') );//'World!. How are you?'

var_dump( strstr($nuut, 'World', true) ); // 'Hello, '

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strrchr:</h2>";

/*
	string strrchr ( string $haystack , mixed $needle )
	
	Retourne le segment de la chaîne haystack qui commence avec la dernière occurrence de needle, jusqu'à la fin de la chaîne haystack.
	
	- haystack: la chaîne dans laquelle on doit faire la recherche
	- needle: caractère à trouver. Si needle contient plus d'un caractère, seul le premier sera utilisé. Ce comportement est différent de celui de strchr(). 
*/

var_dump(strrchr("Hello world!","world"));

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strpos():</h2>";

/**
	mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
	
	Cherche la position numérique de la PREMIERE occurrence de needle dans la chaîne de caractères haystack. 
	Si offset spécifié, la recherche commencera à partir de ce nombre de caractères compté depuis le début de la chaîne.
	Case-sensitive => utiliser stripos()
*/

$nuut = "Hello, World!. How are you, World?";

var_dump( strpos($nuut, 'World') );	// 7
var_dump( strpos($nuut, 'Hello') );	// 0
var_dump( strpos($nuut, 'nuut') );	// false
var_dump( strpos($nuut, 'World', 13) );	//28
//var_dump( strpos($nuut, 'World', -10) ); // Warning: offset ne peut pas ê négatif

$pos = 0;
while ( ($pos = strpos($nuut, 'l', $pos)) !== false ) {
	echo "la lettre 'l' a été trouvée à la position " . $pos . "<br>";
	$pos++;
}

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strrpos():</h2>";

/**
	mixed strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
	
	Cherche la position numérique de la DERNIERE occurrence de needle dans la chaîne haystack. 
	Case-sensitive => strripos() 
*/

var_dump( strrpos($nuut, 'World') );	//28
var_dump( strrpos($nuut, 'World', -10) );	//7

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>substr_count():</h2>";

/**
	int substr_count ( string $haystack , string $needle [, int $offset = 0 [, int $length ]] )
	
	Compte le nombre d'occurrences de segments dans une chaîne
	- offset: position à partir de laquelle il faut commencer à chercher
	- length: nombre de caractères max à chercher avant de laisser tomber
	
	*/
	
	$myString = "I say, nay, nay, and thrice nay!";
	var_dump(substr_count( $myString, "nay" ));	// 3
	var_dump(substr_count( $myString, "nay", 9 ));	//2
	var_dump(substr_count( $myString, "nay", 9, 6 ));	//1
	
echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strpbrk():</h2>";	

/**
	mixed strpbrk ( string $haystack , string $char_list )
	
	Recherche un ensemble de caractères dans une chaîne de caractères
	Retourne une chaîne, commençant au premier caractère trouvé, ou FALSE s'il n'a pas été trouvé. 
*/

$myString = "Hello, World!";
var_dump( strpbrk($myString, "abcdef") );	//'ello, World!'
var_dump( strpbrk($myString, "xyz") );	//false
	