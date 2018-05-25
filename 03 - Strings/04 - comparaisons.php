<?php

echo "<h2>strcmp():</h2>";

/*
  int strcmp ( string $str1 , string $str2 )
  
  Retourne < 0 si str1 est inférieure à str2; > 0 si str1 est supérieure à str2, et 0 si les deux chaînes sont égales. 
  Case-sensitive => utiliser strcasecmp() 
  TRi "naturel" => strnatcmp() ou  strnatcasecmp() 
*/

var_dump( strcmp("Albert", "Albert") );   // 0

var_dump( strcmp("Albert", "Alberto") ); //-1
var_dump( strcmp("Momo", "Momonello") ); //-5
var_dump( strcmp("Momonello", "Momo") );  //5

var_dump( strcmp("Albert", "albert") ); //-1: les majuscules sont "avant"
var_dump( strcmp("albert", "Albert") ); //1

var_dump( strcasecmp("Albert", "albert") ); // 0 car case-insensitive

var_dump( strcmp("123", 123) ); // o car caste les chiffres en string!

var_dump( strcmp("img10.png", "img2.png") );  // -1
var_dump( strnatcmp("img10.png", "img2.png") ); // 1 car "img2.png" se trouve avant "img10.png" selon le tri naturel.

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>similar_text() et levenshtein():</h2>";

// Calcule la similarité entre les deux chaînes. Retourne le nombre de caractères identiques
var_dump( similar_text('sac', 'bac', $percent) ); // 2
var_dump($percent);   //66.666666666667
var_dump( similar_text('carotte', 'carrot', $percent) );  //5

// Calcule la distance Levenshtein entre deux chaînes: définit le nombre de caractères à modifier pour que mot 1 == mot 2
 var_dump( levenshtein('carotte', 'carrot') ); // 3
 
 
