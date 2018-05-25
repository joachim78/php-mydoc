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
		=> 0: nbre de mots trouv�s
		=> 1: array contenant ts les mots trouv�s
		=> 2: array associatif: cl� = position du mot, valeur = mot
	- charlist: liste de caract�res additionnels pouvant �tre consid�r�s comme des mots
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
	Acc�der � un caract�re
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
	
	- start: si > 0 => commence � compter � partir du d�but de la cha�ne (position z�ro); si < 0 => compte � partir de la fin de la cha�ne
	- length: si < 0 => le m�me nombre de caract�res sera omis, en partant de la fin de la cha�ne string
	
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
	
	- haystack: la cha�ne d'entr�e
	- needle: texte � chercher
	
	D�termine si le texte recherch� se trouve dans la strign
	Retourne une sous-cha�ne de haystack, allant de la premi�re occurrence de needle (incluse) jusqu'� la fin de la cha�ne. 
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
	
	Retourne le segment de la cha�ne haystack qui commence avec la derni�re occurrence de needle, jusqu'� la fin de la cha�ne haystack.
	
	- haystack: la cha�ne dans laquelle on doit faire la recherche
	- needle: caract�re � trouver. Si needle contient plus d'un caract�re, seul le premier sera utilis�. Ce comportement est diff�rent de celui de strchr(). 
*/

var_dump(strrchr("Hello world!","world"));

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strpos():</h2>";

/**
	mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ] )
	
	Cherche la position num�rique de la PREMIERE occurrence de needle dans la cha�ne de caract�res haystack. 
	Si offset sp�cifi�, la recherche commencera � partir de ce nombre de caract�res compt� depuis le d�but de la cha�ne.
	Case-sensitive => utiliser stripos()
*/

$nuut = "Hello, World!. How are you, World?";

var_dump( strpos($nuut, 'World') );	// 7
var_dump( strpos($nuut, 'Hello') );	// 0
var_dump( strpos($nuut, 'nuut') );	// false
var_dump( strpos($nuut, 'World', 13) );	//28
//var_dump( strpos($nuut, 'World', -10) ); // Warning: offset ne peut pas � n�gatif

$pos = 0;
while ( ($pos = strpos($nuut, 'l', $pos)) !== false ) {
	echo "la lettre 'l' a �t� trouv�e � la position " . $pos . "<br>";
	$pos++;
}

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>strrpos():</h2>";

/**
	mixed strrpos ( string $haystack , string $needle [, int $offset = 0 ] )
	
	Cherche la position num�rique de la DERNIERE occurrence de needle dans la cha�ne haystack. 
	Case-sensitive => strripos() 
*/

var_dump( strrpos($nuut, 'World') );	//28
var_dump( strrpos($nuut, 'World', -10) );	//7

echo "<hr>";
// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>substr_count():</h2>";

/**
	int substr_count ( string $haystack , string $needle [, int $offset = 0 [, int $length ]] )
	
	Compte le nombre d'occurrences de segments dans une cha�ne
	- offset: position � partir de laquelle il faut commencer � chercher
	- length: nombre de caract�res max � chercher avant de laisser tomber
	
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
	
	Recherche un ensemble de caract�res dans une cha�ne de caract�res
	Retourne une cha�ne, commen�ant au premier caract�re trouv�, ou FALSE s'il n'a pas �t� trouv�. 
*/

$myString = "Hello, World!";
var_dump( strpbrk($myString, "abcdef") );	//'ello, World!'
var_dump( strpbrk($myString, "xyz") );	//false
	