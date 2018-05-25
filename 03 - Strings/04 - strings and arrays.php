<?php

echo "<h2>explode():</h2>";

/*
  array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] )
  
  explode() retourne un tableau de cha�nes, chacune d'elle �tant une sous-cha�ne du param�tre string extraite en utilisant le s�parateur delimiter. 
  
  Si limit est d�fini et positif, le tableau retourn� contient, au maximum, limit �l�ments, et le dernier �l�ment contiendra le reste de la cha�ne. 
  Si le param�tre limit est n�gatif, tous les �l�ments, except� les -limit derniers �l�ments sont retourn�s.
  Si limit vaut z�ro, il est trait� comme valant 1. 
  
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
  Les deux derniers �l�ments ne sont pas pris en compte:
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
  'Pierre', 'Paul', 'Jacques', 'Andr�', 'Bernard'
);

var_dump( implode(';', $arr) );  // Pierre;Paul;Jacques;Andr�;Bernard
var_dump( implode($arr) );  //PierrePaulJacquesAndr�Bernard

// il est possible d'inverser les param�tres (� �viter)
var_dump( implode($arr, ',') ); //Pierre,Paul,Jacques,Andr�,Bernard