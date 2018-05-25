<?php

// 4 façons de créer un array indexé:

$arr1 = array('toto', 'jules', 'albert');
$arr2 = ['toto', 'jules', 'albert'];
$arr3 = array(0 => 'toto', 1 => 'jules', 2 => 'albert');
$arr4 = [0 => 'toto', 1 => 'jules', 2 => 'albert'];

var_dump($arr1, $arr2, $arr3, $arr4);

// array associatif:

$tab1 = array(
	'author'	=> 'Ken Follett',
	'title'		=> 'Pillars of Earth',
	'year'		=> 1989
);

$tab2 = [
	'author'	=> 'Ken Follett',
	'title'		=> 'Pillars of Earth',
	'year'		=> 1989
];

var_dump($tab1, $tab2);

// Ajouter des valeurs dans un tableau indexé:
$arr1[] = 'pierre';
$arr1[] = 'jacques';
$arr1[10] = 'martine';
$arr1[] = 'micheline';
$arr1[-1] = 'alexis';
$arr1[] = 'tom';

/*
	Array
	(
	    [0] => toto
	    [1] => jules
	    [2] => albert
	    [3] => pierre
	    [4] => jacques
	    [10] => martine
	    [11] => micheline
	    [-1] => alexis
	    [12] => tom
	)
*/
echo "<pre>" . print_r($arr1,true) . "</pre>";

// les floats ne sont pas acceptés, uniquement la partie entière est prise en compte:
$test = array(
  0		=>	'arf',
  0.23=> 'hep',
	1.6	=>	'nuut',
	1.8 => 'plop',
	2		=> 'yop'
);

	/*
	Array
	(
	    [0] => hep
	    [1] => plop
	    [2] => yop
	)
*/
echo "<pre>" . print_r($test,true) . "</pre>";

// les strings sont castées en entiers:
$test = array(
	0	=> 'harry',
	'0' => 'potter',
	"0" => 'ron',
	'1' => 'Indy',
	1 	=> 'Jones',
	'2.6' => 'Sean'		// Attention!! Un float sous forme de string ne sera pas casté en int!! 
);

/*
	Array
	(
	    [0] => ron
	    [1] => Jones
	    ["2.6"] => Sean
	)
*/
echo "<pre>" . print_r($test,true) . "</pre>";

// Qqques cas tricky:
$test = array(
	null => 'Ford',		// la clé null sera considérée comme une chaîne vide
	false => 'Audi',	// false <=> 0
	true => 'Renault'	// true <=> 1
);

/*
	Array
	(
	    [] => Ford
	    [0] => Audi
	    [1] => Renault
	)
*/
echo "<pre>" . print_r($test,true) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>range():</h2>";

/*
	array range ( mixed $start , mixed $end [, number $step = 1 ] )
	
	Crée un tableau contenant un intervalle d'éléments. 
	
  - step: sera utilisé comme valeur incrémentale entre les éléments de la séquence. Il doit être exprimé comme un nombre entier positif. S'il n'est pas spécifié, step vaut par défaut 1. 
	
*/

/*
	Array
	(
	    [0] => 0
	    [1] => 1
	    [2] => 2
	    [3] => 3
	    [4] => 4
	    [5] => 5
	)
*/
echo "<pre>" . print_r(range(0, 5),true) . "</pre>";

/*
	Array
	(
	    [0] => 2.1
	    [1] => 3.1
	    [2] => 4.1
	)
*/
echo "<pre>" . print_r(range(2.1, 4.6),true) . "</pre>";

/*
	Array
(
    [0] => 9
    [1] => 8
    [2] => 7
    [3] => 6
    [4] => 5
    [5] => 4
)
*/
echo "<pre>" . print_r(range(9, 4),true) . "</pre>";

/*
	Array
	(
	    [0] => a
	    [1] => b
	    [2] => c
	)
*/
echo "<pre>" . print_r(range('a', 'c'),true) . "</pre>";

