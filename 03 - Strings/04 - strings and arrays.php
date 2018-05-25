<?php

echo "<h2>explode():</h2>";

/*
  array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] )
  
  explode() retourne un tableau de chaînes, chacune d'elle étant une sous-chaîne du paramètre string extraite en utilisant le séparateur delimiter. 
  
  Si limit est défini et positif, le tableau retourné contient, au maximum, limit éléments, et le dernier élément contiendra le reste de la chaîne. 
  Si le paramètre limit est négatif, tous les éléments, excepté les -limit derniers éléments sont retournés.
  Si limit vaut zéro, il est traité comme valant 1. 
  
  join() = alias
*/

$str = "Jean, Pierre, Marc, Albert, Alphonse, George";

/*
    Array
    (
        [0] => Jean
        [1] =>  Pierre
        [2] =>  Marc
        [3] =>  Albert
        [4] =>  Alphonse
        [5] =>  George
    )
*/
echo "<pre>" . print_r( explode(',', $str), true ) . "</pre>";

/*
    Array
    (
        [0] => Jean
        [1] =>  Pierre
        [2] =>  Marc, Albert, Alphonse, George
    )
*/
echo "<pre>" . print_r( explode(',', $str, 3), true ) . "</pre>";

/*
  Les deux derniers éléments ne sont pas pris en compte:
   Array
    (
        [0] => Jean
        [1] =>  Pierre
        [2] =>  Marc
        [3] =>  Albert
    )
*/
echo "<pre>" . print_r( explode(',', $str, -2), true ) . "</pre>";

/*
  Array
    (
        [0] => Jean, Pierre, Marc, Albert, Alphonse, George
    )
*/
echo "<pre>" . print_r( explode(',', $str, 0), true ) . "</pre>";

// -------------------------------------------------------------------------------------------------------------------------------------------------------

echo "<h2>implode():</h2>";

/*
  string implode ( string $glue , array $pieces )
  string implode ( array $pieces )    
*/

$arr = array(
  'Pierre', 'Paul', 'Jacques', 'André', 'Bernard'
);

var_dump( implode(';', $arr) );  // Pierre;Paul;Jacques;André;Bernard
var_dump( implode($arr) );  //PierrePaulJacquesAndréBernard

// il est possible d'inverser les paramètres (à éviter)
var_dump( implode($arr, ',') ); //Pierre,Paul,Jacques,André,Bernard