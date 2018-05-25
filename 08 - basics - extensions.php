<?php

/*
  - get_loaded_extensions(): Retourne la liste de tous les modules compilés et chargés
  - phpinfo() permet aussi d'afficher la liste des extensions chargées
  - extension_loaded('extension_name'): Détermine si une extension est chargée ou non
  - get_extension_funcs('extension_name'): Liste les fonctions d'une extension; false si l'extension n'existe pas ou si il n'y a pas de fonctions dans l'extension 
*/


/*
  Ex: Array
(
    [0] => Core
    [1] => bcmath
    [2] => calendar
    [3] => ctype
    [4] => date
    [5] => ereg
    [6] => filter
    ....
*/
echo "<pre>" . print_r(get_loaded_extensions(), true) . "</pre>";

/*
    Ex: Array
(
    [0] => Xdebug
)
*/
echo "<hr><pre>" . print_r(get_loaded_extensions(true), true) . "</pre>";  // n'affiche que les extensions Zend. Ex: Xdebug

var_dump(extension_loaded('pdo'));  //true
var_dump(extension_loaded('fake')); //l'extension n'existe pas => false
var_dump(extension_loaded('oci8'));  // existe mais n'est pas chargée
//dl('ci8'); // supprimée en PHP 5.3

/*
 Exemple: mysql =>
  Array
(
    [0] => mysql_connect
    [1] => mysql_pconnect
    [2] => mysql_close
    [3] => mysql_select_db
    [4] => mysql_query
    ....
*/
echo "<pre>" . print_r(get_extension_funcs('mysql'), true) . "</pre>";

var_dump(get_extension_funcs('fake'));  //False
var_dump(get_extension_funcs('oci8'));  //false

?>
